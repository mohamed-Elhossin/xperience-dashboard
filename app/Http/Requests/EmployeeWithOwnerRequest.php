<?php

// app/Http/Requests/EmployeeWithOwnerRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeWithOwnerRequest extends FormRequest
{
    public function rules(): array
    {
        $ownerId = $this->input('owner_id');

        return [
            // بيانات Owner (يتم إنشاء owner جديد هنا وليس تعديل)
            'owner.name' => 'required|string|max:255',
            'owner.email' => 'required|email|unique:owners,email',
            'owner.password' => 'required|string|min:6',

            // بيانات employee
            'linkedIn' => 'nullable|url|max:500',
            'image' => 'nullable|string', // هنا فترض نص URL أو base64 لو تريد ترميز مختلف، يمكن تعديلها لاحقاً
            'field_id' => 'required|exists:fields,id',
        ];
    }
}
