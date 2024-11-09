<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditNote extends Model
{
    protected $fillable = [
        'pending_amount',
        'concept',
        'currency',
        'exchange_rate',
        'created_by',
        'total_amount',
        'suplier_id',
        'folio',
        'observations',
        'status',

    ];
    public function provider()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function applications()
    {
        return $this->hasMany(AplicationsCreditNote::class);
    }
}
