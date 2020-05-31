<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TopUpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tipe' => 'required|in:Brand,Konsumen',
            'phone_number' => 'required|max:14',
            'value' => 'required|integer',
            'konfirmasi_value' => 'required|integer'
        ];
    }
}
