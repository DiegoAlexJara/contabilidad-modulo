<?php

namespace App\Livewire\Invoices;

use App\Models\Invoice;
use Livewire\Component;
use Livewire\WithPagination;

class InvoicesIndex extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $invoices = Invoice::where('folio', 'like', "%" . $this->search . "%")->paginate(15);
        return view('livewire.invoices.invoices-index', compact('invoices'));
    }

    public function deleteInvoice($id)
    {
        if (!$invoice = Invoice::find($id)) return;

        $invoice->update(['status' => 'cancel']);
    }
}
