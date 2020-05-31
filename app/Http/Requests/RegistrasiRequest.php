<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrasiRequest extends FormRequest
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
            'brand_nama' => 'required|string|max:300',
            'brand_phone' => 'required|max:14|unique:brand,brand_phone',
            'brand_email' => 'required',
            'brand_alamat' => 'required',
            'brand_deskripsi' => 'required',
            'brand_foto' => 'required|image|max:500|mimes:jpeg,jpg,bmp,png',
            'brand_pemilik_nama' => 'required',
            'brand_pemilik_email' => 'required',
            'brand_pemilik_phone' => 'required|max:14',
            'brand_delivery' => 'required|in:gratis,flat',
            'brand_delivery_jarak' => 'required|integer',
            'brand_delivery_minimum' => 'required|integer',
            'brand_pajak_pb_satu' => 'required|integer',
            'brand_kategori' => 'required',
        ];
    }
    //|unique:kurir,kurir_phone'
}
