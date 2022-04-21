<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'min:3', 'max:255'],
            'password' => ['required', 'min:3', 'max:255', 'confirmed'],
            'password_confirmation' => ['required', 'min:3', 'max:255']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Kolom nama lengkap wajib diisi!',
            'name.min' => 'Kolom nama lengkap minimal 3 karakter',
            'name.max' => 'Kolom nama lengkap maksimal 255 karakter',

            'email.required' => 'Kolom email wajib diisi!',
            'email.email' => 'Email harus valid!',
            'email.min' => 'Kolom email minimal 3 karakter!',
            'email.max' => 'Kolom email maksimal 255 karakter!',

            'password.required' => 'Kolom password wajib diisi!',
            'password.min' => 'Kolom password minimal 3 karakter!',
            'password.max' => 'Kolom password maksimal 255 karakter!',
            'password.confirmed' => 'Konfirmasi password salah!',

            'password_confirmation.required' => 'Kolom konfirmasi password wajib diisi!',
            'password_confirmation.min' => 'Kolom konfirmasi password minimal 3 karakter!',
            'password_confirmation.max' => 'Kolom konfirmasi password maksimal 255 karakter!',
        ];
    }
}
