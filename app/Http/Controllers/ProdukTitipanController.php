<?php

namespace App\Http\Controllers;

use App\Models\produktitipan  ;
use App\Exports\Exportproduktitipan;
use App\Exports\produktitipanImport;
use App\Http\Requests\StoreproduktitipanRequest;
use App\Http\Requests\UpdateproduktitipanRequest;
use Illuminate\Support\Facades\DB;
use Exception;
use Excel;
use Illuminate\Database\QueryException;
use PDOException;

class produktitipanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $data['produktitipans'] = produktitipan::get();
            return view('produktitipan.index')->with($data);
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
    public function store(StoreproduktitipanRequest $request)
    {
        {
            DB::beginTransaction();
            produktitipan::create($request->all());
            DB::commit();
            return redirect('produktitipan')->with('success', 'Data Produk berhasil ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(produktitipan $produktitipan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produktitipan $produktitipan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreproduktitipanRequest $request, produktitipan $produktitipan)
    {
        $produktitipan->update($request->all());
        

        return redirect('produktitipan')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(produktitipan $produktitipan)
    {
        {
            $produktitipan->delete();
            return redirect('produktitipan')->with('success', 'Data Berhasil Dihapus!');
        }
    }

    public function exportData()
    {
        return Excel::download(new Exportproduktitipan, 'produktitipan.xlsx');
    }

    public function importData()
    {
        Excel::import(new produktitipanImport, request()->file('import'));
        return redirect(request()->segment(1).'produktitipan')->with('sukses ya kak');
    }

}