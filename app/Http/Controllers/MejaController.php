<?php

namespace App\Http\Controllers;

use App\Models\meja  ;
use App\Http\Requests\StoremejaRequest;
use App\Http\Requests\UpdatemejaRequest;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;

class mejaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $data['mejas'] = meja::get();
            return view('meja.index')->with($data);
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
    public function store(StoremejaRequest $request)
    {
        {
            DB::beginTransaction();
            meja::create($request->all());
            DB::commit();
            return redirect('meja')->with('success', 'Data meja berhasil ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(meja $meja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(meja $meja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoremejaRequest $request, meja $meja)
    {
        $meja->update($request->all());

        return redirect('meja')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(meja $meja)
    {
        {
            $meja->delete();
            return redirect('meja')->with('success', 'Data Berhasil Dihapus!');
        }
    }

}