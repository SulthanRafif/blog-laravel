<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Mengaktifkan otorisasi Request untuk Proses Registrasi User
     * 
     * @return true
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Rules validasi untuk mengisi Proses Registrasi User
     * 
     * @return 
     * [
     * 'username' => ['required', 'unique:users', 'alpha_num', 'min:3', 'max:25'], 
     * 'name' => ['required', 'string', 'min:3'], 
     * 'email' => ['required', 'unique:users', 'email'],
     * 'password' => ['required', 'min:8'],
     * ]
     */
    public function rules()
    {
        return [
            'username' => ['required', 'unique:users', 'alpha_num', 'min:3', 'max:25'],
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'unique:users', 'email'],
            'password' => ['required', 'min:8'],
        ];
    }
}
