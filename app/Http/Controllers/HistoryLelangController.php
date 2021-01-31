<?php

namespace App\Http\Controllers;

use App\Models\{HistoryLelang, Lelang, Barang};
use Illuminate\Http\Request;

class HistoryLelangController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store()
    {
        $lelang = Lelang::with('barang')->where('id', request('lelang_id'))->firstOrFail();
        request()->validate([
            'tawaran' => 'required'
        ]);

        if (request('tawaran') <= $lelang->barang->harga_awal) {
            return back()->with('failed', 'Harga tidak boleh kurang dari harga awal');
        } else {
            // $input = request()->all();

            $input['user_id'] = auth()->user()->id;
            $input['lelang_id'] = request('lelang_id');
            $input['penawaran_harga'] = request('tawaran');

            HistoryLelang::create($input);
            return back()->with('success', 'Penawaran berhasil diajukan');
        }
    }

    public function show(HistoryLelang $historyLelang)
    {
        //
    }

    public function edit(HistoryLelang $historyLelang)
    {
        //
    }

    public function update(Request $request, HistoryLelang $historyLelang)
    {
        //
    }

    public function destroy(HistoryLelang $historyLelang)
    {
        //
    }
}
