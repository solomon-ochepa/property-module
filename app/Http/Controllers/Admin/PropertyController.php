<?php

namespace Modules\Property\app\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Property\app\Models\Property;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Plank\Mediable\Facades\MediaUploader;
use Illuminate\Support\Str;
use Modules\Address\app\Models\Address;
use Modules\Attribute\app\Models\Attribute;
use Modules\Property\app\Http\Requests\StorePropertyRequest;
use Modules\Property\app\Http\Requests\UpdatePropertyRequest;

class PropertyController extends Controller
{
    public $data = [];

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $this->data['title'] = 'Properties';
        $this->data['properties'] = Property::where('active', 1)->latest()->get();

        return response(view('property::admin.index', $this->data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $this->data['title'] = 'Create Property';

        return response(view('property::admin.create', $this->data));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request): RedirectResponse
    {
        // Address
        $address = Address::firstOrCreate(Arr::except($request->address, 'description'), $request->address);

        // property
        $property = Property::firstOrCreate([
            'title' => $request->property['title'],
            'address_id'    => $address->id,
        ], $request->property);

        if ($request->filled('category')) {
            // Category
            // $category_csv = $request->category;
        }

        if ($request->filled('attributes')) {
            // Attributes
            foreach ($request['attributes'] as $key => $data) {
                if ($data['name']) {
                    $attribute          = Attribute::firstOrCreate(['name' => Str::singular($data['name'])]);
                    $attribute_option   = $attribute->options()->firstOrCreate(['value' => $data['value']]);

                    $property->attributables()->firstOrCreate(['attribute_option_id' => $attribute_option->id]);
                }
            }
        }

        // Medias
        if ($request->hasFile('images')) {
            $media = MediaUploader::fromSource($request->file('images'))
                ->useHashForFilename()
                ->onDuplicateUpdate()
                ->upload();

            $property->attachMedia($media, 'image');
        }

        session()->flash('status', 'Property created successfully');
        return redirect(route('admin.property.index'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property): Response
    {
        $this->data['title'] = 'Edit Property';
        $this->data['property'] = $property;

        return response(view('property::admin.edit', $this->data));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyRequest $request, Property $property): RedirectResponse
    {
        // property
        $property->update($request['property']);

        // property
        $property->address()->update($request['address']);

        // Attributes
        if ($request->filled('attributes')) {
            foreach ($request['attributes'] ?? [] as $data) {
                if (!empty($data['name'])) {
                    $attribute          = Attribute::firstOrCreate(['name' => Str::singular($data['name'])]);
                    $attribute_option   = $attribute->options()->firstOrCreate(['value' => $data['value']]);

                    $property->attributables()->firstOrCreate(['attribute_option_id' => $attribute_option->id]);
                }
            }
        }

        // Medias
        if ($request->hasFile('images')) {
            $media = MediaUploader::fromSource($request->file('images'))
                ->useHashForFilename()
                ->onDuplicateUpdate()
                ->upload();

            $property->syncMedia($media, 'image');
        }

        session()->flash('status', 'Property updated successfully');
        return redirect(route('admin.property.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property): RedirectResponse
    {
        $property->delete();

        session()->flash('status', 'Property has been deleted successfully.');
        return redirect(route('admin.property.index'));
    }
}
