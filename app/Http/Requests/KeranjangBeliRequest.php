<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KeranjangBeliRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if(strpos(url()->previous(), 'create')) {
            return [
              'bahan_baku_id' => ['required', 'numeric'],
              'qty' => ['required', 'numeric'],  
            ];
        }
        
        return [
            'qty' => ['required', 'numeric'],
        ];
    }
}
