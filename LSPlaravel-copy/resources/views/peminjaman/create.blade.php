<!DOCTYPE html>
<html>

<head>
    <title>Tambah Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">

        <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary mb-3">
            ⬅ Kembali
        </a>

        <h3>Tambah Data Peminjaman</h3>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('peminjaman.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="id_anggota" class="form-label">Nama Anggota <span class="text-danger">*</span></label>
                        <select class="form-control @error('id_anggota') is-invalid @enderror" id="id_anggota" name="id_anggota" required>
                            <option value="">-- Pilih Anggota --</option>
                            @foreach($anggota as $item)
                            <option value="{{ $item->id_anggota }}" {{ old('id_anggota') == $item->id_anggota ? 'selected' : '' }}>
                                {{ $item->nama_anggota }}
                            </option>
                            @endforeach
                        </select>
                        @error('id_anggota')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="id_buku" class="form-label">Judul Buku <span class="text-danger">*</span></label>
                        <select class="form-control @error('id_buku') is-invalid @enderror" id="id_buku" name="id_buku" required>
                            <option value="">-- Pilih Buku --</option>
                            @foreach($buku as $item)
                            <option value="{{ $item->id_buku }}" {{ old('id_buku') == $item->id_buku ? 'selected' : '' }}>
                                {{ $item->judul_buku }}
                            </option>
                            @endforeach
                        </select>
                        @error('id_buku')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_peminjaman" class="form-label">Tanggal Peminjaman <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('tanggal_peminjaman') is-invalid @enderror"
                            id="tanggal_peminjaman" name="tanggal_peminjaman" value="{{ old('tanggal_peminjaman') }}" required>
                        @error('tanggal_peminjaman')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                        <input type="date" class="form-control @error('tanggal_pengembalian') is-invalid @enderror"
                            id="tanggal_pengembalian" name="tanggal_pengembalian" value="{{ old('tanggal_pengembalian') }}">
                        @error('tanggal_pengembalian')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="dipinjam" {{ old('status') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                            <option value="dikembalikan" {{ old('status') == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                        </select>
                        @error('status')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>