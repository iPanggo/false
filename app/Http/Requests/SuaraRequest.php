<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuaraRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'suara' => 'required|in:setuju,tidak_setuju,netral',
        ];
    }
}