<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AplicationsDetailsCreditNote extends Model
{
    protected $fillable = [
        'aplication_credit_id',
        'applied_amount',
        'invoice_id',
    ];
    public function creditNoteApplication()
    {
        return $this->belongsTo(AplicationsCreditNote::class);
    }
}
