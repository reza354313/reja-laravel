<!DOCTYPE html>
<html>

<head>
    <title>Peminjaman Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <span class="navbar-brand">Perpustakaan - {{ session('anggota_name') ?? 'Anggota' }}</span>

            <form method="POST" action="/logout">
                @csrf
                <button class="btn btn-danger btn-sm">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container mt-4">

        <h3>Peminjaman Saya</h3>

        @if($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Tombol Pinjam Buku Baru -->
        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#pinjamModal">
            ➕ Pinjam Buku Baru
        </button>

        <!-- Tabel Riwayat Peminjaman -->
        @if($peminjaman->count() > 0)
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peminjaman as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->buku->judul_buku ?? '-' }}</td>
                        <td>{{ $item->buku->pengarang ?? '-' }}</td>
                        <td>{{ $item->tanggal_peminjaman }}</td>
                        <td>{{ $item->tanggal_pengembalian ?? '-' }}</td>
                        <td>
                            @if($item->status == 'dipinjam')
                                <span class="badge bg-warning">Dipinjam</span>
                            @else
                                <span class="badge bg-success">Dikembalikan</span>
                            @endif
                        </td>
                        <td>
                            @if($item->status == 'dipinjam')
                                <form action="/peminjaman/{{ $item->id_peminjaman }}/kembalikan" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Yakin ingin mengembalikan buku ini?')">
                                        Kembalikan
                                    </button>
                                </form>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info">
                Anda belum memiliki riwayat peminjaman.
            </div>
        @endif

    </div>

    <!-- Modal Pinjam Buku Baru -->
    <div class="modal fade" id="pinjamModal" tabindex="-1" aria-labelledby="pinjamModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pinjamModalLabel">Pinjam Buku Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/peminjaman/store-anggota" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="id_buku" class="form-label">Pilih Buku <span class="text-danger">*</span></label>
                            <select class="form-control @error('id_buku') is-invalid @enderror" id="id_buku" name="id_buku" required>
                                <option value="">-- Pilih Buku --</option>
                                @foreach($bukuTersedia as $buku)
                                    <option value="{{ $buku->id_buku }}">
                                        {{ $buku->judul_buku }} ({{ $buku->pengarang }})
                                    </option>
                                @endforeach
                            </select>
                            @error('id_buku')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_peminjaman" class="form-label">Tanggal Peminjaman <span class="text-danger">*</span></label>
                            <input type="date" id="tanggal_peminjaman" name="tanggal_peminjaman" class="form-control @error('tanggal_peminjaman') is-invalid @enderror"
                                value="{{ old('tanggal_peminjaman', date('Y-m-d')) }}" required>
                            @error('tanggal_peminjaman')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_pengembalian" class="form-label">Tanggal Pengembalian</label>
                            <input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian" class="form-control @error('tanggal_pengembalian') is-invalid @enderror"
                                value="{{ old('tanggal_pengembalian') }}">
                            @error('tanggal_pengembalian')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Pinjam</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
