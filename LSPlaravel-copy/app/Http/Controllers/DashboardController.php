<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'jumlahBuku' => Buku::count(),
            'jumlahAnggota' => Anggota::count(),
            'bukuDipinjam' => Peminjaman::where('status', 'dipinjam')->count(),
        ]);
    }
}
