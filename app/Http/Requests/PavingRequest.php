<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PavingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'jenis' => ['required', 'max:45', 'string'],
            'stok' => ['required', 'numeric'],
            'ukuran' => ['required', 'max:45', 'string'],
            'harga' => ['required', 'numeric'],
            'deskripsi' => ['required', 'max:45', 'string'],
            'satuan' => ['required', 'max:45', 'string'],
            'gambar' => [
                'nullable',
                'image',
                'max:2048',
                'mimetypes:image/jpeg,image/png,image/bmp'
            ],
            'semen' => ['required', 'numeric'],
            'abu_batu' => ['required', 'numeric'],
        ];
    }
}
