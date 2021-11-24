<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProduksiPavingRequest extends FormRequest
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
            // https://laravel.com/docs/8.x/urls#accessing-the-current-url
            'paving_id' => [
                Rule::requiredIf(strpos(url()->current(), 'create')), 
                'numeric'
            ],
            'jumlah_produksi' => ['required', 'numeric'],
        ];
    }
}
