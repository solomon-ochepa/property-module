<?php

namespace Modules\Property\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Property\app\Models\Property;
use Illuminate\Http\Response;

class PropertyController extends Controller
{
    public $data = [];

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $this->data['head']['title'] = 'Our Properties';
        $this->data['properties'] = Property::where('active', 1)->latest()->get();

        return response(view('property::index', $this->data));
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property): Response
    {
        $this->data['head']['title'] = $property->name . ' @ ' . $property->address;

        $this->data['property'] = $property;

        return response(view('property::show', $this->data));
    }
}
