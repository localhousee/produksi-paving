<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransaksiBeliRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'supplier_id' => ['required', 'numeric'],
            'tgl_transaksi' => ['required', 'date'],
            'total' => ['required', 'numeric'],
        ];
    }
}
