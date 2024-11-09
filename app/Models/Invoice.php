<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Invoice extends Model
{

    protected $fillable = [
        'folio',
        'expiration_at',
        'emition_at',
        'currency',
        'exchange_rate',
        'created_by',
        'total_amount',
        'pending_amount',
        'suplier_id',
        'description',
        'observations',
        'status',
    ];
    public function provider()
    {
        return $this->belongsTo(Supplier::class, 'suplier_id');
    }

    public function creditNoteApplications()
    {
        return $this->hasMany(AplicationsCreditNote::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function concept()
    {
        return $this->hasMany(Concept::class);
    }

    public function archive(): MorphOne
    {
        return $this->morphOne(Archive::class, 'archivable');
    }
}
