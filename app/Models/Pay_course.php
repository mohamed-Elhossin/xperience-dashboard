<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Section;
class Pay_course extends Model
{
    protected $table = 'pay_courses';
    protected $fillable = [
        'name',
        'description',
        'price',
        'hours',
        'image',
        'contentFile',
        'contentDrive',
    ];
    // app/Models/Pay_course.php
    public function sections()
    {
        return $this->hasMany(Section::class, 'pay_course_id');
    }
}
