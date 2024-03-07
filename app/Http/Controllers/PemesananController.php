<?php

namespace App\Http\Controllers;

use App\Models\pemesanan  ;
use App\Http\Requests\StorepemesananRequest;
use App\Http\Requests\UpdatepemesananRequest;
use App\Models\Jenis;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

class pemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $data['jenis'] = Jenis::with(['menu'])->get();
            // dd($data["jenis"]);
            return view('pemesanan.index')->with($data);
    }

    /**
     * Show the form for creating a neRRw resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepemesananRequest $request)
    {
        {
            DB::beginTransaction();
            pemesanan::create($request->all());
            DB::commit();
            return redirect('pemesanan.data2')->with('success', 'Data pemesanan berhasil ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorepemesananRequest $request, pemesanan $pemesanan)
    {
        $pemesanan->update($request->all());

        return redirect('pemesanan')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pemesanan $pemesanan)
    {
        {
            $pemesanan->delete();
            return redirect('pemesanan')->with('success', 'Data Berhasil Dihapus!');
        }
    }

}