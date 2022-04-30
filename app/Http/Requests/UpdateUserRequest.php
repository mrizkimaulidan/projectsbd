<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'min:3', 'max:255'],
            'password' => ['nullable', 'min:3', 'max:255', 'confirmed'],
            'password_confirmation' => ['nullable', 'required_with:password', 'min:3', 'max:255']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Kolom nama lengkap wajib diisi!',
            'name.min' => 'Kolom nama lengkap minimal 3 karakter',
            'name.max' => 'Kolom nama lengkap maksimal 255 karakter',

            'email.required' => 'Kolom email wajib diisi!',
            'email.email' => 'Email harus valid!',
            'email.min' => 'Kolom email minimal 3 karakter!',
            'email.max' => 'Kolom email maksimal 255 karakter!',

            'password.min' => 'Kolom password minimal 3 karakter!',
            'password.max' => 'Kolom password maksimal 255 karakter!',
            'password.confirmed' => 'Konfirmasi password salah!',

            'password_confirmation.required_with' => 'Kolom konfirmasi password wajib diisi jika kolom password ada terisi!',
            'password_confirmation.min' => 'Kolom konfirmasi password minimal 3 karakter!',
            'password_confirmation.max' => 'Kolom konfirmasi password maksimal 255 karakter!',
        ];
    }
}
