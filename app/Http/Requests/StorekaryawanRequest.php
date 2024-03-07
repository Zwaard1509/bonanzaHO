<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorekaryawanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nip' => 'required',
            'nik' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'telepon' => 'required',
            'agama' => 'required',
            'status_nikah' => 'required',
            'alamat' => 'required',
            'golongan_id' => 'required'
        ];
    }

    public function massages()
    {
        return [
            'nip.required' => 'nip wajib diisi',
            'nik.required' => 'nik wajib diisi',
            'jenis_kelamin.required' => 'jenis kelamin wajib diisi',
            'tempat_lahir.required' => 'tempat lahir wajib diisi',
            'telepon.required' => 'No Telp wajib diisi',
            'agama.required' => 'agama wajib diisi',
            'status_nikah.required' => 'status nikah wajib diisi',
            'alamat.required' => 'alamat wajib diisi',
            'golongan_id.required' => 'golongan id wajib diisi'
        ];
    }
}
