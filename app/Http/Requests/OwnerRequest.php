<?php
// app/Http/Requests/OwnerRequest.php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OwnerRequest extends FormRequest
{
    public function rules(): array
    {
        $id = $this->route('owner')?->id ?? null;

        return [
            'name'   => 'required|string|max:255',
            'email'  => [
                'required',
                'email',
                Rule::unique('owners', 'email')->ignore($id),
            ],
            'password' => $id ? 'nullable|string|min:6' : 'required|string|min:6',
        ];
    }
}
