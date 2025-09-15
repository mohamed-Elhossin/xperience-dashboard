<?php
// app/Http/Requests/RealRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RealRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:500',
            'description' => 'nullable|string|max:1000',
            'pay_course_id' => 'required|exists:pay_courses,id',
        ];
    }
}
