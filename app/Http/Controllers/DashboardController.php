<?php

namespace App\Http\Controllers;

use App\Models\{Barang, Lelang, Masyarakat, Petugas, User};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $barang = Barang::count();
        $users = User::count();
        $lelang = Lelang::count();
        $petugas = Petugas::count();
        $masyarakat = Masyarakat::count();
        $lelangs = Lelang::with('barang')->where('status', 'dibuka')->simplePaginate(12);
        return view('dashboard.index', compact('users', 'barang', 'lelang', 'petugas', 'masyarakat', 'lelangs'));
    }
}
