<?php

namespace App\Http\Controllers;

use App\Models\karyawan  ;
use App\Http\Requests\StorekaryawanRequest;
use App\Http\Requests\UpdatekaryawanRequest;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

class karyawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $data['karyawan'] = karyawan::get();
            return view('karyawan.index')->with($data);
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
    public function store(StorekaryawanRequest $request)
    {
        {
            DB::beginTransaction();
            karyawan::create($request->all());
            DB::commit();
            return redirect('karyawan')->with('success', 'Data karyawan berhasil ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(karyawan $karyawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorekaryawanRequest $request, karyawan $karyawan)
    {
        $karyawan->update($request->all());

        return redirect('karyawan')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(karyawan $karyawan)
    {
        {
            $karyawan->delete();
            return redirect('karyawan')->with('success', 'Data Berhasil Dihapus!');
        }
    }

}