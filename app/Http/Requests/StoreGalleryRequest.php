<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGalleryRequest extends FormRequest
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
            'description' => ['required', 'min:3', 'max:255'],
            'image' => ['required', 'image', 'max:2048'],
            'is_active' => ['required']
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

            'description.required' => 'Kolom deskripsi wajib diisi!',
            'description.min' => 'Kolom judul minimal 3 karakter!',
            'description.max' => 'Kolom judul maksimal 255 karakter!',

            'image.required' => 'Kolom gambar wajib diisi!',
            'image.image' => 'File yang diupload bukan gambar!',
            'image.max' => 'Ukuran gambar maksimal 2mb!',

            'is_active.required' => 'Kolom status aktif/tidak aktif wajib diisi!'
        ];
    }
}
