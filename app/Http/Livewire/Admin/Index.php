<?php

namespace Modules\Property\app\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Property\app\Models\Property;

class Index extends Component
{
    use WithPagination;

    public $selected = [];

    public $search = "";
    public $limit = 10;
    public $page = 1;

    protected $queryString = [
        'search'    => ['except' => ''],
        'page'      => ['except' => 1],
    ];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $data = [];
        if ($this->search) {
            $data['properties'] = Property::join('addresses', 'address_id', 'addresses.id')
                ->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('addresses.description', 'like', '%' . $this->search . '%')
                ->orWhere('addresses.street', 'like', '%' . $this->search . '%')
                ->orWhere('addresses.area', 'like', '%' . $this->search . '%')
                ->orWhere('addresses.city', 'like', '%' . $this->search . '%')
                ->orWhere('addresses.state', 'like', '%' . $this->search . '%')
                ->orWhere('addresses.country', 'like', '%' . $this->search . '%')
                ->orWhere('price', 'like', '%' . $this->search . '%')
                ->orWhere('properties.description', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate($this->limit);
        } else {
            $data['properties'] = Property::latest()->paginate($this->limit);
        }

        return view('property::livewire.admin.index', $data);
    }
}
