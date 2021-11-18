<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'body' => 'required',
            'judul' => 'required|max:25',
            'categories' => 'required|max:25'
        ];
    }

    public function make()
    {
        return Auth::user()->makeBlog($this->body, $this->judul, $this->categories);
    }
}
