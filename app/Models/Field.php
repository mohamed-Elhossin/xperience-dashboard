<?php
// app/Models/Field.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Instructor;
class Field extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

public function instructors()
{
    return $this->hasMany(Instructor::class, 'field_id');
}

}
