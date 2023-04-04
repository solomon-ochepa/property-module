<?php

namespace Modules\Property\app\Http\Livewire\Sidebar;

use Illuminate\Support\Arr;
use Livewire\Component;
use Modules\Property\app\Models\Property;

class FeaturedProperties extends Component
{
    public $property;
    public $limit = 3;
    public $rate = 0.2;

    public function render()
    {
        $featuredProperties = Property::whereNotIn('id', [$this->property->id])
            ->whereBetween('price', [$this->property->price - ($this->property->price * $this->rate), $this->property->price + ($this->property->price * $this->rate)])
            ->latest()
            ->take($this->limit)
            ->get();

        if ($featuredProperties->count() < $this->limit) {
            $this->limit = $this->limit - $featuredProperties->count();

            $ids = Arr::prepend($featuredProperties->pluck('id')->toArray(), $this->property->id);
            $featuredProperties = $featuredProperties->merge(Property::whereNotIn('id', $ids)
                ->latest()
                ->take($this->limit)
                ->get());
        }

        $data['featuredProperties'] = $featuredProperties;

        return view('property::livewire.sidebar.featured-properties', $data);
    }
}
