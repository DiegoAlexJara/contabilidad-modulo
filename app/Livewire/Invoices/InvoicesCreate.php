<?php

namespace App\Livewire\Invoices;

use App\Models\Concept;
use App\Models\Invoice;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class InvoicesCreate extends Component
{
    use WithFileUploads;

    public $showSquare = false;
    public $moneda = '';
    public $tipoCambio = false;
    public $cambio = 1;
    public $total = 0;
    public $number = 0;
    public $provedor = '';
    public $searchs = '';
    public $provedores = '';
    public $fechaActual;
    public $FechaRes;
    public $Credit = 1;
    public $suppliers;
    public $folio;
    public $observations;
    public $Concepto = '';
    public $file;

    function mount()
    {
        $this->fechaActual = now()->toDateString();
    }

    public function render()
    {
        $supplierss = Supplier::where('name', 'like', "%" . $this->searchs . "%")->get();
        $conceptos = Concept::all();
        return view('livewire.invoices.invoices-create', compact('supplierss', 'conceptos'));
    }
    public function search()
    {
        $this->showSquare = !$this->showSquare;
    }
    function selecionar($suppliers_id)
    {
        $this->suppliers = Supplier::find($suppliers_id);
        $this->moneda = $this->suppliers->currency;
        if ($this->moneda == 'USD') {

            $this->tipoCambio = false;
        } else {
            $this->tipoCambio = true;
            $this->cambio = 1;
            $this->updatedcambio(true);
        }
        $this->provedor = $this->suppliers->name;
        $this->search();
    }

    public function updatedNumber($value)
    {
        if (!empty($this->number)) {
            $this->total = $this->cambio * $this->number;
        } else {
            $this->total = 0;
        }
    }
    public function updatedcambio($value)
    {
        if (!empty($this->cambio)) {
            $this->total = $this->cambio * $this->number;
        } else {
            $this->total = 0;
        }
    }
    public function updatedCredit()
    {
        // Asegurarse de que $this->diasSeleccionados es un entero
        $this->Credit = (int) $this->Credit;
        if ($this->fechaActual) {
            // Crear un objeto DateTime a partir de la fecha seleccionada
            $fecha = \Carbon\Carbon::parse($this->fechaActual);

            // Sumar los días seleccionados
            $this->FechaRes = $fecha->addDays($this->Credit)->toDateString();
        }
    }
    function save()
    {
        $this->validate([
            'folio' => 'required|unique:invoices,folio', //FOLIO
            'fechaActual' => 'required|date', //	emition_at
            'FechaRes' => 'required|date', //expiration_at
            'Credit' => 'required|numeric', //credit_days
            'moneda' => 'required|in:USD,MXN', //currency
            'cambio' => 'required|numeric', //exchange_rate
            'number' => 'required|numeric', //total_amount
            'suppliers' => 'required', //suplier_id 
            'Concepto' => 'required', //description
            'observations' => 'nullable', //observations,
            'file' => 'required|file|mimes:pdf|max:2048', // Solo PDFs, máximo 2MB
        ], [
            'folio.required' => 'El campo folio es obligatorio.',
            'folio.unique' => 'El folio ya ha sido registrado.',
            'fechaActual.required' => 'La fecha de emisión es obligatoria.',
            'fechaActual.date' => 'La fecha de emisión debe ser una fecha válida.',
            'FechaRes.required' => 'La fecha de vencimiento es obligatoria.',
            'FechaRes.date' => 'La fecha de vencimiento debe ser una fecha válida.',
            'Credit.required' => 'El campo de días de crédito es obligatorio.',
            'Credit.numeric' => 'El campo de días de crédito debe ser numérico.',
            'moneda.required' => 'La moneda es obligatoria.',
            'moneda.in' => 'La moneda debe ser USD o MXN.',
            'cambio.required' => 'El tipo de cambio es obligatorio.',
            'cambio.numeric' => 'El tipo de cambio debe ser numérico.',
            'number.required' => 'El monto total es obligatorio.',
            'number.numeric' => 'El monto total debe ser numérico.',
            'suppliers.required' => 'El proveedor es obligatorio.',
            'Concepto.required' => 'El concepto es obligatorio.',
            'file.required' => 'El archivo PDF es obligatorio.',
            'file.mimes' => 'El archivo debe ser un PDF.',
            'file.max' => 'El archivo PDF no debe superar los 2MB.',
        ]);

        $user = Auth::id();
        $invoice = new Invoice();
        $invoice->folio = $this->folio;
        $invoice->expiration_at = $this->FechaRes;
        $invoice->emition_at = $this->fechaActual;
        $invoice->currency = $this->moneda;
        $invoice->exchange_rate = $this->cambio;
        $invoice->created_by = $user;
        $invoice->total_amount = $this->number;
        $invoice->pending_amount = $this->total;
        $invoice->suplier_id  = $this->suppliers->id;
        $invoice->description = $this->Concepto;
        $invoice->observations = $this->observations;
        $invoice->credit_days = $this->Credit;
        $invoice->status = 'pedient';
        $invoice->save();

        $this->uploadFile($invoice);

        return redirect()->route('invoices.index')->with('message', 'Proveedor guardado correctamente.');
    }

    public function uploadFile($invoice)
    {
        if ($this->file) {
            $nameFile = 'factura-' . $invoice->folio;
            if (!$storagePath = Storage::disk('public')->putFileAs("pdf/invoice", $this->file, $nameFile . '.' . $this->file->getClientOriginalExtension())) return;

            $data = [
                'name' => $nameFile,
                'path' => $storagePath,
                'disk' => 'public'
            ];

            $invoice->archive()->create($data);
        }
    }
}
