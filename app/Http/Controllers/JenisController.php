<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Kategori;
use App\Http\Requests\StorejenisRequest;
use App\Http\Requests\UpdatejenisRequest;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

class jenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
            $jenis = Jenis::with('kategori')->get();
            $kategori = kategori::all();
            return view('jenis.index', compact('jenis','kategori'));
      
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorejenisRequest $request)
    {
        DB::beginTransaction();
    
        try {
            $requestData = $request->all();
            jenis::create($requestData);
            DB::commit();
            return redirect('jenis')->with('success', 'Data jenis berhasil ditambahkan!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect('jenis')->with('error', 'Gagal menambahkan data jenis.');
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(jenis $jenis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorejenisRequest $request, jenis $jenis)
    {
        $jenis->update($request->all());

        return redirect('jenis')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(jenis $jenis)
    {
        $jenis->delete();
        return redirect('jenis')->with('success', 'Data Berhasil Dihapus!');
    }
}
