<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreproduktitipanRequest extends FormRequest
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
                'nama_produk' => 'required',
                'nama_supplier' => 'required',
                'harga_jual' => 'required',
                'harga_beli' => 'required',
                'stok' => 'required',
                'keterangan' => 'required'
            ];
        }
        
        public function massages()
        {
            return [
                'nama_produk.required' => 'Data nama jenis belum diisi!',
                'nama_supplier.required' => 'Nama Supplier belum diisi!',
                'harga_jual.required' => 'Harga Beli belum diisi!',
                'harga_beli.required' => 'Harga Jual belum diisi!',
                'stok.required' => 'Stok belum Diisi',
                'keterangan.required' => 'keterangan wajib diisi'
            ];
        }
    }
