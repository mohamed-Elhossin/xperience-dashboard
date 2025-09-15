<?php


// app/Models/Owner.php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Owner extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
    ];

    protected $dates = [
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

// app/Models/Owner.php
public function employees()
{
    return $this->hasMany(Employee::class, 'owner_id');
}


}
