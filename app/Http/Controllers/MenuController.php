<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\jenis;
use App\Exports\ExportMenu;
use App\Imports\MenuImport;
use App\Http\Requests\StoremenuRequest;
use App\Http\Requests\UpdatemenuRequest;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\Request;
use Excel;
use Illuminate\Database\QueryException;
use PDOException;

class menuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::with('jenis')->get();
        $jenis = jenis::all();
        return view('menu.index', compact('menus','jenis'));
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
    public function store(StoremenuRequest $request)
    {
        {
            DB::beginTransaction();
            menu::create($request->all());
            DB::commit();
            return redirect('menu')->with('success', 'Data menu berhasil ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoremenuRequest $request, menu $menu)
    {
        $menu->update($request->all());

        return redirect('menu')->with('success', 'Update data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(menu $menu)
    {
        {
            $menu->delete();
            return redirect('menu')->with('success', 'Data Berhasil Dihapus!');
        }
    }

    public function exportData()
    {
        return Excel::download(new ExportMenu, 'Menu.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new MenuImport, $request->import);
        return redirect('menu')->with('success', 'Import data berhasil');
    }

}