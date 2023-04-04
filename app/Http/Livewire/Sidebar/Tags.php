<?php

namespace Modules\Property\app\Http\Livewire\Sidebar;

use Livewire\Component;

class Tags extends Component
{
    public $property;

    public function render()
    {
        return view('property::livewire.sidebar.tags');
    }
}
