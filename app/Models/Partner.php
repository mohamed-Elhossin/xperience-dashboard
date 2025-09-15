<?php

// app/Models/Partner.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'name',
        'description',
        'linkedIn',
        'image',
    ];
}
