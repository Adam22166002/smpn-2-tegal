<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KegiatanRequest extends FormRequest
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
            'nama'      => ['required', 'unique:kegiatans'],
            'content'   => ['required']
        ];
    }

    public function messages()
    {
        return [
            'nama.required'      => 'Ekstrakuliler tidak boleh kosong.',
            'nama.unique'        => 'Ekstrakuliler sudah pernah dibuat.',
            'image.required'     => 'Gambar wajib di isi.',
            'image.mimes'        => 'Hanya file gambar yang di izinkan.',
            'image.mimetypes'    => 'Hanya file gambar yang di izinkan.',
            'image.max'          => 'Ukuran hanya boleh 1MB.',
            'content.required'   => 'Content tidak boleh kosong.'
        ];
    }
}
