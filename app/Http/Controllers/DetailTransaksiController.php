<?php

namespace App\Http\Controllers;

    use App\Models\Menu;
    use App\Models\Transaksi;
    use App\Models\DetailTransaksi;
    use App\Http\Requests\StoreDetailtransaksiRequest;
    use App\Http\Requests\UpdateDetailtransaksiRequest;
    use Illuminate\Support\Facades\DB;
    use Exception;
    use Illuminate\Database\QueryException;
    use PDOException;

    class DetailTransaksiController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $menus = Menu::get();
            $transaksis = Transaksi::all(); 
            $detail_transaksis = DetailTransaksi::all(); 

            return view('detailtransaksi.index', compact('menus', 'transaksis', 'detail_transaksis'));
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
        public function store(StoreDetail_transaksiRequest $request)
        {
            //
        }

        /**
         * Display the specified resource.
         */
        public function show(Detail_transaksi $detail_transaksi)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(Detail_transaksi $detail_transaksi)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         */
        public function update(UpdateDetail_transaksiRequest $request, Detail_transaksi $detail_transaksi)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Detail_transaksi $detail_transaksi)
        {
            //
        }
    }