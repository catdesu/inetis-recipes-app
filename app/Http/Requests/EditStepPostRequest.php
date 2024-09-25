<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditStepPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'nullable|max:50',
            'description' => 'required',
            'prep_time' => 'nullable|integer',
        ];
    }
}
