<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'password'=>[
                'required', 'string', 'max:255', 'confirmed'
            ]
        ];
    }
}
