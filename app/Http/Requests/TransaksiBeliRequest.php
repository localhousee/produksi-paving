<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TransaksiBeliRequest extends FormRequest
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
            'no_nota' => [
                // https://laravel.com/docs/8.x/urls#accessing-the-current-url
                Rule::requiredIf(strpos(url()->current(), 'create')),
                'max:45'
            ],
            'supplier_id' => [
                Rule::requiredIf(strpos(url()->current(), 'create')), 
                'numeric'
            ],
            'bahan_baku_id' => ['required', 'numeric'],
            'tgl_transaksi' => ['required', 'date'],
            'harga' => ['required', 'numeric'],
            'qty' => ['required', 'numeric'],
            'subtotal' => ['required', 'numeric'],
            'total' => ['required', 'numeric'],
        ];
    }
}
