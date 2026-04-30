<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subtype extends Model
{
    Protected $fillable = [
        'image',
        'name',
        'type_id',
        'status',
    ];

    public function type() {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function patients() {
        return $this->hasMany(Patient::class, 'type_id');
    }
}
