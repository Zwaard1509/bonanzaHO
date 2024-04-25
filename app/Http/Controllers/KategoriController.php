<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Exports\ExportKategori;
use App\Imports\KategoriImport;
use App\Http\Requests\StorekategoriRequest;
use App\Http\Requests\UpdatekategoriRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Exception;
use Excel;
use Illuminate\Database\QueryException;
use PDOException;

class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $data['kategoris'] = kategori::get();
            return view('kategori.index')->with($data);
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
    public function store(StorekategoriRequest $request)
    {
        {
            DB::beginTransaction();
            kategori::create($request->all());
            DB::commit();
            return redirect('kategori')->with('success', 'Data kategori berhasil ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorekategoriRequest $request, kategori $kategori)
    {
        $kategori->update($request->all());

        return redirect('kategori')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategori $kategori)
    {
        {
            $kategori->delete();
            return redirect('kategori')->with('success', 'Data Berhasil Dihapus!');
        }
    }

    public function exportData()
    {
        return Excel::download(new ExportKategori, 'Kategori.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new KategoriImport, $request->import);
        return redirect('kategori')->with('success', 'Import data berhasil');
    }
}