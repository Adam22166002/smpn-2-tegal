<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramRequest extends FormRequest
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
            'nama'      => ['required', 'unique:jurusans'],
            'singkatan' => ['required', 'unique:jurusans'],
            'content'   => ['required'],
            'image'     => ['required']
        ];
    }

    public function messages()
    {
        return [
            'nama.required'      => 'Nama jurusan tidak boleh kosong.',
            'nama.unique'        => 'Nama jurusan sudah pernah dibuat.',
            'singkatan.required' => 'Singkatan tidak boleh kosong.',
            'singkatan.unique'   => 'Singkatan sudah pernah dibuat.',
            'content.required'   => 'Content tidak boleh kosong.',
            'image.required'     => 'Gambar tidak boleh kosong.',
            'image.mimes'        => 'Hanya file gambar yang di upload.',
            'image.mimetypes'    => 'Hanya file gambar yang di upload.',
            'image.max'          => 'Ukuran file gambar hanya bisa 1MB',
        ];
    }
}
