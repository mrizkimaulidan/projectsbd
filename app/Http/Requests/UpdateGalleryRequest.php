<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGalleryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:3', 'max:255'],
            'image' => ['image', 'max:2048'],
            'is_active' => ['required']
        ];
    }

    public function messages()
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
