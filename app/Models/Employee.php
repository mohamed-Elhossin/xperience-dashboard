<?php
// app/Models/Employee.php
// app/Models/Employee.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'linkedIn',
        'image',
        'field_id',
        'owner_id',
    ];

    // علاقات
    public function field()
    {
        return $this->belongsTo(Field::class, 'field_id');
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }
}
