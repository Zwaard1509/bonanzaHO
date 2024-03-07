<?php

namespace App\Http\Controllers;

use App\Models\pelanggan ;
use App\Http\Requests\StorepelangganRequest;
use App\Http\Requests\UpdatepelangganRequest;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

class pelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $data['pelanggans'] = pelanggan::get();
            return view('pelanggan.index')->with($data);
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
    public function store(StorepelangganRequest $request)
    {
        {
            DB::beginTransaction();
            pelanggan::create($request->all());
            DB::commit();
            return redirect('pelanggan')->with('success', 'Data pelanggan berhasil ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorepelangganRequest $request, pelanggan $pelanggan)
    {
        $pelanggan->update($request->all());

        return redirect('pelanggan')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pelanggan $pelanggan)
    {
        {
            $pelanggan->delete();
            return redirect('pelanggan')->with('success', 'Data Berhasil Dihapus!');
        }
    }

}