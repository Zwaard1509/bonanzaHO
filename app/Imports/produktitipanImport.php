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
            'nama_produk' => $row[0],
            'nama_supplier' => $row[1],
            'harga_jual' => $row[2],
            'harga_beli' => $row[3],
            'stok' => $row[4],
            'keterangan' => $row[5]
        ]);
    }
}
