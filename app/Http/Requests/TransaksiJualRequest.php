<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TransaksiJualRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if (strpos(url()->previous(), 'create')) {
            return [
                'pembeli_id' => ['numeric', Rule::requiredIf(strpos(url()->previous(), 'create'))],
                'tgl_transaksi' => ['required', 'date'],
                'total' => ['required', 'string'],
                'bayar' => ['required', 'string'],
                'status' => ['required', 'max:45'],
            ];
        }

        return [
            'bayar' => ['required', 'numeric'],
            'status' => ['required', 'max:45'],
        ];
    }
}
