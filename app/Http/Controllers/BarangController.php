<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\HistoryLelang;
use App\Models\Lelang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::latest()->get();
        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store()
    {
        request()->validate([
            'nama_barang' => 'required',
            'harga_awal' => 'required',
            'deskripsi' => 'required',
            'images' => 'required|image|mimes:jpeg,png,jpg,svg'
        ]);

        $input = request()->all();
        $slug = \Str::slug(request('nama_barang'));

        $image = request()->file('images');
        $imageUrl = $image->storeAs('images/barang', "{$slug}.{$image->extension()}");

        $input['images'] = $imageUrl;

        Barang::create($input);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan');
    }

    public function show(Barang $barang)
    {

        if ($barang->lelang == true) {
            $lelang = Lelang::with('barang')->where('barang_id', $barang->id)->firstOrFail();
            $historyLelang = HistoryLelang::with('lelang',)->where('lelang_id', $lelang->id)->orderByDesc("penawaran_harga")->limit(10)->get();
            return view('barang.show', compact('barang', 'historyLelang'));
        } else {
            return view('barang.show', compact('barang'));
        }
    }

    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    public function update(Barang $barang)
    {
        request()->validate([
            'nama_barang' => 'required',
            'harga_awal' => 'required',
            'deskripsi' => 'required',
            'images' => 'image|mimes:jpeg,png,jpg,svg'
        ]);

        $input = request()->all();
        $slug = \Str::slug(request('nama_barang'));

        $image = request()->file('images');
        if ($image != null) {
            \Storage::delete($barang->images);
            $imageUrl = $image->store('images/barang');
        } else {
            $imageUrl = $barang->images;
        }

        $input['images'] = $imageUrl;

        $barang->update($input);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate');
    }

    public function destroy(Barang $barang)
    {
        \Storage::delete($barang->images);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus');
    }
}
