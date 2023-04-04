<?php

namespace Modules\Property\app\Http\Livewire\Sidebar;

use Livewire\Component;

class TopAgents extends Component
{
    public $property;

    public function render()
    {
        return view('property::livewire.sidebar.top-agents');
    }
}
