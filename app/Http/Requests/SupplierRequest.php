<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_supplier' => ['required', 'max:45', 'string'],
            'jenis_supplier' => ['required', 'max:45', 'string'],
            'no_telp' => ['required', 'string'],
            'alamat_supplier' => ['required', 'max:45', 'string'],
        ];
    }
}
