<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Anggota;
use App\Models\Buku;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['anggota', 'buku'])->get();
        return view('peminjaman.index', compact('peminjaman'));
    }


    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $anggota = Anggota::all();
        $buku = Buku::all();
        return view('peminjaman.edit', compact('peminjaman', 'anggota', 'buku'));
    }

    public function update(Request $request, $id)
    {
        Peminjaman::findOrFail($id)->update($request->all());
        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil diupdate');
    }

    public function destroy($id)
    {
        Peminjaman::destroy($id);
        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus');
    }

    public function peminjamanSaya()
    {
        $anggotaId = session('anggota_id');

        if (!$anggotaId) {
            return redirect('/login');
        }

        $peminjaman = Peminjaman::with(['buku'])
            ->where('id_anggota', $anggotaId)
            ->get();

        $bukuTersedia = Buku::all();

        return view('peminjaman.peminjaman_saya', compact('peminjaman', 'bukuTersedia'));
    }

    public function storeAnggota(Request $request)
    {
        $anggotaId = session('anggota_id');

        if (!$anggotaId) {
            return redirect('/login');
        }

        $request->validate([
            'id_buku' => 'required|exists:buku,id_buku',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'nullable|date|after_or_equal:tanggal_peminjaman'
        ]);

        Peminjaman::create([
            'id_anggota' => $anggotaId,
            'id_buku' => $request->id_buku,
            'tanggal_peminjaman' => $request->input('tanggal_peminjaman') ?? now()->format('Y-m-d'),
            'tanggal_pengembalian' => $request->input('tanggal_pengembalian') ?: null,
            'status' => 'dipinjam'
        ]);

        return redirect('/peminjaman-saya')->with('success', 'Buku berhasil dipinjam!');
    }

    public function kembalikan($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $anggotaId = session('anggota_id');

        if ($peminjaman->id_anggota != $anggotaId) {
            return redirect('/peminjaman-saya')->with('error', 'Anda tidak memiliki akses');
        }

        $peminjaman->update([
            'tanggal_pengembalian' => now()->format('Y-m-d'),
            'status' => 'dikembalikan'
        ]);

        return redirect('/peminjaman-saya')->with('success', 'Buku berhasil dikembalikan!');
    }
}
