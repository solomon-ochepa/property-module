<?php

namespace Modules\Property\app\Http\Livewire\Admin;

use Illuminate\Support\Arr;
use Livewire\Component;

class CreateAttributes extends Component
{
    public $attributes = [
        ['attribute' => '', 'option' => '']
    ];

    protected $listerners = ['refresh' => '$refresh'];

    public function render()
    {
        return view('property::livewire.admin.create-attributes');
    }

    public function add()
    {
        $this->attributes[] = ['attribute' => '', 'option' => ''];

        $this->emit('refresh');
    }

    public function remove($id)
    {
        Arr::forget($this->attributes, $id);

        $this->emit('refresh');
    }
}
