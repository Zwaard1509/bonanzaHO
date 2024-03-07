<?php

namespace App\Imports;

use App\Models\produktitipan;
use Maatwebsite\Excel\Concerns\ToModel;

class produktitipanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new produktitipan([
            'nama_produk' => $row['nama_produk'],
            'nama_supplier' => $row['nama_supplier'],
            'harga_jual' => $row['harga_jual'],
            'harga_beli' => $row['harga_beli'],
            'stok' => $row['stok'],
            'keterangan' => $row['keterangan']
        ]);
    }

    public function headingRow(): int
    {
        return 5;
    }
}
