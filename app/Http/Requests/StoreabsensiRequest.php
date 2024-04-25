<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreabsensiRequest extends FormRequest
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
            'namaKaryawan' => 'required',
            'tanggalMasuk' => 'required',
            'waktu_mulai' => 'required',
            'status' => 'required',
            'waktu_selesai' => 'required'
        ];
    }

    public function massages()
    {
        return [
            'namaKaryawan.required' => 'nama karyawan belum diisi!',
            'tanggalMasuk.required' => 'tanggal masuk belum diisi',
            'waktu_mulai.required' => 'waktu masuk belum diisi',
            'status.required' => 'status belum dipilih',
            'waktu_selesai' => 'waktu keluar belum diisi'
        ];
    }
}
