<?php

namespace App\Livewire\Suppliers;

use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class ProvedoresIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $showSquare = false;
    public $IdProvedor;


    public function render()
    {
        $provedores = Supplier::where('id', 'like', "%" . $this->search . "%")
            ->orWhere('name', 'like', "%" . $this->search . "%")
            ->paginate(15);

        return view('livewire.suppliers.provedores-index', [
            'provedores' => $provedores
        ]);
    }
    function toggleSquare($Id)
    {
        $this->showSquare = !$this->showSquare;
        $this->IdProvedor = $Id;
    }
}
