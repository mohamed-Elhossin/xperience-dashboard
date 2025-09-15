<?php

// app/Models/Instructor.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'linkedIn',
        'field_id',
        'cv',
    ];

    public function field()
    {
        return $this->belongsTo(Field::class, 'field_id');
    }
}
