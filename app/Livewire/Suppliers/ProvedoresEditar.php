<?php

namespace App\Livewire\Suppliers;

use App\Models\Supplier;
use Livewire\Component;

class ProvedoresEditar extends Component
{
    public $Idprovedor;
    public $name = '';
    public $moneda ='';
    public $status = '';

    protected $rules = [
        'name' => 'required|min:3|max:50',
        'moneda' => 'required|in:USD,MXN',
    ];

    public function mount($Idprovedor)
    {
        $this->Idprovedor = Supplier::find($this->Idprovedor);
        if (!$this->Idprovedor) {
            return redirect()->route('provedores.index')->with('message', 'El proveedor no existe.');
        }
        $this->name = $this->Idprovedor->name;
        $this->status = $this->Idprovedor->status;
        $this->moneda = $this->Idprovedor->currency;

    }
    public function render()
    {
        return view('livewire.suppliers.provedores-editar');
    }
    function delete()
    {
        $this->Idprovedor->status = 'inactive';
        $this->Idprovedor->save();
        return redirect()->route('provedores.index')->with('message', 'Proveedor Se Inactivó correctamente.');
    }
    function edit()
    {
        $this->validate();
        $this->Idprovedor->name = $this->name;
        $this->Idprovedor->currency = $this->moneda;
        $this->Idprovedor->status = $this->status;
        $this->Idprovedor->save();
        return redirect()->route('provedores.index')->with('message', 'Proveedor editado correctamente.');
    }
}
