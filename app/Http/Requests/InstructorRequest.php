<?php
// app/Http/Requests/InstructorRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InstructorRequest extends FormRequest
{
    public function rules(): array
    {
        $id = $this->route('instructor')?->id ?? null;
        return [
            'name'     => 'required|string|max:255',
            'phone'    => 'required|string|max:20',
            'email'    => [
                'required',
                'email',
                Rule::unique('instructors', 'email')->ignore($id),
            ],
            'linkedIn' => 'required|url|max:500',
            'field_id' => 'required|exists:fields,id',
            'cv'       => $id ? 'nullable|file|mimes:pdf,doc,docx,txt|max:4096' : 'required|file|mimes:pdf,doc,docx,txt|max:4096',
        ];
    }
}

