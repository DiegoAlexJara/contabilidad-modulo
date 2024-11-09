<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $fillable = [
        'path',
        'disk',
        'name',
        'archivable_type',
        'archivable_id',
    ];
    public function archivable()
    {
        return $this->morphTo();
    }
}
