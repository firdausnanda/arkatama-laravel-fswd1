<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePenerbitRequest extends FormRequest
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
            'nama_penerbit' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_telepon' => 'required|numeric|unique:penerbit,no_telepon|max_digits:13',
            'tanggal_berdiri' => 'required'
        ];
    }
}
