<?php

namespace App\Http\Controllers;

use App\Models\{Lelang, Barang, HistoryLelang};
use Illuminate\Http\Request;

class LelangController extends Controller
{
    public function index()
    {
        $lelangs = Lelang::with('barang', 'user')->get();
        return view('lelang.index', compact('lelangs'));
    }

    public function create()
    {
        $barang = Barang::with('lelang')->get();
        return view('lelang.create', compact('barang'));
    }

    public function store()
    {
        request()->validate([
            'barang_id' => 'required',
            'tanggal_lelang' => 'required'
        ]);

        $input = request()->all();
        $input['status'] = 'dibuka';

        Lelang::create($input);

        return redirect()->route('lelang.index')->with('success', 'Barang berhasil dilelang');
    }

    public function show(Lelang $lelang)
    {
        $historyLelang = HistoryLelang::with('lelang')->where('lelang_id', $lelang->id)->orderBy('penawaran_harga', 'DESC')->limit(10)->get();
        return view('lelang.show', compact('historyLelang'));
    }

    public function edit(Lelang $lelang)
    {
        //
    }

    public function update(Request $request, Lelang $lelang)
    {
        //
    }

    public function destroy(Lelang $lelang)
    {
        //
    }

    public function choose(Lelang $lelang)
    {
        $input = [
            'harga_akhir' => request('harga_akhir'),
            'user_id' => request('user_id'),
            'status' => 'ditutup'
        ];

        $lelang->update($input);
        return redirect()->route('lelang.index')->with('success', 'Pemenang berhasil dipilih');
    }
}
