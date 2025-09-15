<?php
// app/Models/Real.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Real extends Model
{
    protected $fillable = [
        'title',
        'url',
        'description',
        'pay_course_id',
    ];

    public function payCourse()
    {
        return $this->belongsTo(Pay_course::class, 'pay_course_id');
    }
}
