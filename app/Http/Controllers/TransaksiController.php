<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Http\Requests\TransaksiRequest;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Tambahkan kode untuk menampilkan daftar transaksi
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tambahkan kode untuk menampilkan form pembuatan transaksi baru
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TransaksiRequest $request)
    {
        DB::beginTransaction();
        try {
            $last_id = Transaksi::where('tanggal', date('Y-m-d'))->orderBy('created_at', 'desc')->select('id')->first();
            $notrans = $last_id == null ? date('Ymd').'0001' : date('Ymd').sprintf('%04d', substr($last_id->id,8,4)+1);
            
            $insertTransaksi = Transaksi::create([
                'id' => $notrans,
                'tanggal' => date('Y-m-d'),
                'total_harga' => $request->total,
                'metode_pembayaran' => 'cash',
                'keterangan' => ''
            ]);
    
            if (!$insertTransaksi) {
                throw new Exception('Gagal membuat transaksi');
            }
    
            // input detail transaksi
            if (!is_null($request->orderedit_list)) {
                foreach ($request->orderedit_list as $detail) {
                    $insertDetailTransaksi = DetailTransaksi::create([
                        'transaksi_id' =>  $notrans,
                        'menu_id'  =>  $detail['menu_id'],
                        'jumlah'   =>  $detail['qty'],
                        'subtotal' =>  $detail['harga'] * $detail['qty']
                    ]);   
                    
                    if (!$insertDetailTransaksi) {
                        throw new Exception('Gagal membuat detail transaksi');
                    }
                }
            }
    
            DB::commit();
            return response()->json(['status'=>true, "message" =>'Pemesanan berhasil!']);
        } catch (Exception | QueryException | PDOException $e) {
            DB::rollback();
            return response()->json(['status'=>false, "message" =>'Pemesanan Gagal: ' . $e->getMessage()]);
        }
    }
    
    

public function faktur($nofaktur)
{
    try {
        $data['transaksi'] = Transaksi::where('id', $nofaktur)->with(['detailTransaksi' => function ($query) {
            $query->with('menu');
        }])->first();

        return view('cetak.faktur')->with($data);
    } catch (Exception | QueryException | PDOException $e) {
        return response()->json(['status' => false, 'message' => 'Pemesanan Gagal']);
    }
}


    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        // Tambahkan kode untuk menampilkan detail transaksi
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        // Tambahkan kode untuk menampilkan form edit transaksi
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransaksiRequest $request, Transaksi $transaksi)
    {
        // Tambahkan kode untuk mengupdate transaksi
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        // Tambahkan kode untuk menghapus transaksi
    }
}
