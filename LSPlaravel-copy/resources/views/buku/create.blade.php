<!DOCTYPE html>
<html>

<head>
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5" style="max-width:600px">

        <a href="{{ route('buku.index') }}" class="btn btn-secondary mb-3">
            ⬅ Kembali ke Data Buku
        </a>

        <div class="card shadow">
            <div class="card-body">

                <h4 class="mb-4">Tambah Buku</h4>

                <form method="POST" action="{{ route('buku.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label>Kode Buku</label>
                        <input type="text" name="kode_buku" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Judul Buku</label>
                        <input type="text" name="judul_buku" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Pengarang</label>
                        <input type="text" name="pengarang" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Penerbit</label>
                        <input type="text" name="penerbit" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" class="form-control" required>
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-primary">
                            💾 Simpan
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</body>

</html>