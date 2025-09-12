<?php

// app/Http/Requests/SectionRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'          => 'required|string|max:255',
            'description'   => 'nullable|string|max:1000',
            'hours'         => 'nullable|integer|min:0',
            'pay_course_id' => 'required|exists:pay_courses,id',
        ];
    }
}
