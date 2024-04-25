<?php

namespace App\Http\Controllers;

use App\Models\stok  ;
use App\Http\Requests\StorestokRequest;
use App\Http\Requests\UpdatestokRequest;
use Illuminate\Support\Facades\DB;
use Exception;
use Excel;
use App\Exports\ExportStok;
use Illuminate\Database\QueryException;
use PDOException;

class stokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $data['stoks'] = stok::get();
            return view('stok.index')->with($data);
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
    public function store(StorestokRequest $request)
    {
        {
            DB::beginTransaction();
            stok::create($request->all());
            DB::commit();
            return redirect('stok')->with('success', 'Data stok berhasil ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(stok $stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorestokRequest $request, stok $stok)
    {
        $stok->update($request->all());

        return redirect('stok')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(stok $stok)
    {
        {
            $stok->delete();
            return redirect('stok')->with('success', 'Data Berhasil Dihapus!');
        }
    }

    public function exportData()
    {
        return Excel::download(new ExportStok, 'Stok.xlsx');
    }

}