<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login Anggota</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center" style="height:100vh">

        <div class="card shadow" style="width: 400px">
            <div class="card-body">

                <h4 class="text-center mb-4">Login Anggota</h4>

                @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form method="POST" action="/login-anggota" autocomplete="off">
                    @csrf

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required autofocus autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required autocomplete="off">
                    </div>

                    <button class="btn btn-success w-100 mb-3">
                        Login
                    </button>
                </form>

                <hr>

                <p class="text-center text-muted mb-0">
                    Belum punya akun? <a href="/register-anggota">Daftar di sini</a>
                </p>

                <p class="text-center text-muted mt-2 mb-0">
                    Login sebagai Admin? <a href="/login">Klik di sini</a>
                </p>

            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
