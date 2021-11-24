<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BahanBakuRequest extends FormRequest
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
            'jenis' => ['required', Rule::in(['abu batu', 'semen'])],
            'merk' => ['required', 'max:45', 'string'],
            'harga' => ['required', 'numeric'],
            'stok' => ['required', 'numeric'],
            'satuan' => ['required', 'max:45', 'string'],
        ];
    }
}
