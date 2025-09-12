<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayCourseRequest extends FormRequest
{
    public function rules(): array
    {
            return [
            'name'         => 'required|string|max:255',
            'description'  => 'nullable|string|max:1000',
            'price'        => 'nullable|numeric|min:0',
            'hours'        => 'nullable|integer|min:0',
            'image'        => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'contentFile'  => 'nullable|url|max:255',
            'contentDrive' => 'nullable|url|max:255',
        ];

    }
}
