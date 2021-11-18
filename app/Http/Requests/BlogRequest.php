<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Mengaktifkan otorisasi Request untuk Data Blog
     * 
     * @return true
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Rules validasi untuk mengisi Data Blog
     * 
     * @return 
     * [
     * 'body' => 'required', 
     * 'judul' => 'required|max:25', 
     * 'categories' => 'required|max:25' 
     * ]
     */
    public function rules()
    {
        return [
            'body' => 'required',
            'judul' => 'required|max:25',
            'categories' => 'required|max:25'
        ];
    }
}
