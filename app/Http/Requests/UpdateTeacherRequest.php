<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email,' . $this->route('teacher')->id,
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
        ];
    }
}
