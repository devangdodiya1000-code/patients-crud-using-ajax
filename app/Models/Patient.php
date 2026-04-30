<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'full_name', 'age', 'gender', 'contact_number',
        'type_id', 'subtype_id', 'department',
        'doctor_assigned', 'room_number', 'status',
        'bill_amount', 'admission_date', 'discharge_date'
    ];

    public function type() {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function subtype() {
        return $this->belongsTo(Subtype::class, 'subtype_id');
    }
}
