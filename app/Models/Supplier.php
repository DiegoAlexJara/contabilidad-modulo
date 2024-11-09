<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    
    use HasFactory;

    protected $fillable = ['name', 'currency', 'status'];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function creditNotes()
    {
        return $this->hasMany(CreditNote::class);
    }

}
