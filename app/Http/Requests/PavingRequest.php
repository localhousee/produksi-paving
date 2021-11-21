<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PavingRequest extends FormRequest
{
    public function authorize()
    {
        // Agar Request Form di Allow oleh Server
        // https://laravel.com/docs/8.x/validation#authorizing-form-requests
        return true;
    }

    public function rules()
    {
        // Validasi Request Form
        // https://laravel.com/docs/8.x/validation#available-validation-rules
        return [
            'jenis' => ['required', 'max:45', 'string'],
            'stok' => ['required', 'numeric'],
            'stok_biji' => ['required', 'numeric'],
            'ukuran' => ['required', 'max:45', 'string'],
            'harga_satuan' => ['required', 'numeric'],
            'deskripsi' => ['required', 'max:45', 'string'],
            'satuan' => ['required', 'max:45', 'string'],
            'gambar' => [
                'nullable', 
                'image', 
                'max:2048', 
                // https://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types
                'mimetypes:image/jpeg,image/png,image/bmp'
            ],
            'jumlah_per_palet' => ['required', 'numeric'],
        ];
    }
}
