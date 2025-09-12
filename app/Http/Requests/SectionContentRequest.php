<?php
// app/Http/Requests/SectionContentRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionContentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'section_id' => 'required|exists:sections,id',
        ];
    }
}
