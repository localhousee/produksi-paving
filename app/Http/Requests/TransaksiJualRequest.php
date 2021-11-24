<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TransaksiJualRequest extends FormRequest
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

        if(strpos(url()->previous(), 'create')) {
            return [
                'pembeli_id' => ['numeric', Rule::requiredIf(strpos(url()->previous(), 'create'))],
                'tgl_transaksi' => ['required', 'date'],
                'total' => ['required', 'numeric'],
                'bayar' => ['required', 'numeric'],
                'status' => ['required', 'max:45'],
            ];
        }
        
        return [
            'bayar' => ['required', 'numeric'],
            'status' => ['required', 'max:45'],
        ];
    }
}
