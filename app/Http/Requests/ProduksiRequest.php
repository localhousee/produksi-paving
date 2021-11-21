<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduksiRequest extends FormRequest
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
            'tanggal' => ['required', 'date'],
        ];
    }
}
