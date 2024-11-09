<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AplicationsCreditNote extends Model
{
    protected $fillable = [
        'credit_note_id',
        'suplier_id',
        'created_by',
        'total_amount',
        'status',
    ];
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function details()
    {
        return $this->hasMany(AplicationsDetailsCreditNote::class);
    }
}
