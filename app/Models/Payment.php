<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'suplier_id',
        'date_aplyed',
        'currency',
        'exchange_rate',
        'created_by',
        'observations',
        'status',
    ];
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function details()
    {
        return $this->hasMany(PaymentDetail::class);
    }
}
