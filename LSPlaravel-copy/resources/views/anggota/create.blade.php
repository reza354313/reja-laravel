<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Anggota</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5" style="max-width:600px">

        <a href="{{ route('anggota.index') }}" class="btn btn-secondary mb-3">
            ⬅ Kembali ke Data Anggota
        </a>

        <div class="card shadow">
            <div class="card-body">

                <h4 class="mb-4">Tambah Anggota</h4>

                <form method="POST" action="{{ route('anggota.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">NIS</label>
                        <input type="text" name="nis" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Anggota</label>
                        <input type="text" name="nama_anggota" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <input type="text" name="kelas" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
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