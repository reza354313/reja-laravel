<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <span class="navbar-brand">Perpustakaan</span>

            <form method="POST" action="/logout">
                @csrf
                <button class="btn btn-danger btn-sm">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container mt-4">

        <h3>Dashboard Admin</h3>
        <p>Selamat datang admin 👋</p>

        <div class="row">

            <div class="col-md-4">
                <div class="card text-bg-primary mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Buku</h5>
                        <h2>{{ $jumlahBuku ?? 0 }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Jumlah Anggota</h5>
                        <h2>{{ $jumlahAnggota ?? 0 }}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-bg-info mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Buku Sedang Dipinjam</h5>
                        <h2>{{ $bukuDipinjam ?? 0 }}</h2>
                    </div>
                </div>
            </div>

        </div>

        <hr>

        <a href="/buku" class="btn btn-primary">Kelola Buku</a>
        <a href="/anggota" class="btn btn-success">Kelola Anggota</a>
        <a href="/peminjaman" class="btn btn-warning">Kelola Transaksi Peminjaman</a>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>