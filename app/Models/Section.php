<?php

// app/Models/Section.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pay_course;
use App\Models\SectionContent;
class Section extends Model
{
    protected $table = 'sections';
    protected $fillable = [
        'name',
        'description',
        'hours',
        'pay_course_id',
    ];

    public function payCourse()
    {
        return $this->belongsTo(Pay_course::class, 'pay_course_id');
    }

    // app/Models/Section.php

    public function contents()
    {
        return $this->hasMany(SectionContent::class, 'section_id');
    }
}
