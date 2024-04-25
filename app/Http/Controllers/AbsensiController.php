<?php

namespace App\Http\Controllers;

use App\Models\absensi;
use App\Exports\ExportAbsensi;
use App\Http\Requests\StoreabsensiRequest;
use App\Http\Requests\UpdateabsensiRequest;
use Illuminate\Support\Facades\DB;
use Exception;
use Excel;
use Illuminate\Database\QueryException;
use PDOException;

class absensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $data['absensi'] = absensi::get();
            return view('absensi.index')->with($data);
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
    public function store(StoreabsensiRequest $request)
    {
        {
            DB::beginTransaction();
            absensi::create($request->all());
            DB::commit();
            return redirect('absensi')->with('success', 'Data absensi berhasil ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(absensi $absensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreabsensiRequest $request, absensi $absensi)
    {
        $absensi->update($request->all());

        return redirect('absensi')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(absensi $absensi)
    {
        {
            $absensi->delete();
            return redirect('absensi')->with('success', 'Data Berhasil Dihapus!');
        }
    }
    
    public function exportData()
    {
        return Excel::download(new ExportAbsensi, 'Absensi.xlsx');
    }
}