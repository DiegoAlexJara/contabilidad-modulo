<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    protected $fillable = [
        'invoice_id',
        'payment_id',
        'applied_amount',

    ];
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
