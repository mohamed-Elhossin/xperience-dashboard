<?php

// app/Models/SectionContent.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionContent extends Model
{
    protected $table = 'section__contents';
    protected $fillable = [
        'title',
        'section_id',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}
