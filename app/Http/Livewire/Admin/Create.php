<?php

namespace Modules\Property\app\Http\Livewire\Admin;

use Livewire\Component;
use Modules\Property\app\Http\Requests\StorePropertyRequest;
use Modules\Property\app\Models\Property;

class Create extends Component
{
    public $property = [];

    public function mount()
    {
        $this->property = new Property();
    }

    public function render()
    {
        return view('property::livewire.admin.create');
    }

    public function rules()
    {
        $request = new StorePropertyRequest();
        return $request->rules();
    }
}
