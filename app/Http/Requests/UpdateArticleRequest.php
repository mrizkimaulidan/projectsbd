<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
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
            'title' => ['required', 'min:3', 'max:255'],
            'is_active' => ['required'],
            'thumbnail' => ['image', 'max:2048'],
            'body' => ['required', 'min:3']
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
            'title.required' => 'Kolom judul wajib diisi!',
            'title.min' => 'Kolom judul minimal 3 karakter!',
            'title.max' => 'Kolom judul maksimal 255 karakter!',

            'is_active.required' => 'Kolom status aktif/tidak aktif wajib diisi!',

            'thumbnail.required' => 'Kolom gambar wajib diisi!',
            'thumbnail.image' => 'File yang diupload bukan gambar!',
            'thumbnail.max' => 'Ukuran gambar maksimal 2mb!',

            'body.required' => 'Kolom konten wajib diisi!',
            'body.min' => 'Kolom konten minimal 3 karakter!'
        ];
    }
}
