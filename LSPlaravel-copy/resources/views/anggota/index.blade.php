<!DOCTYPE html>
<html>

<head>
    <title>Data Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-4">

        <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">
            ⬅ Kembali ke Dashboard
        </a>

        <h3>Data Anggota</h3>

        <table class="table table-bordered">
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>

            @foreach ($anggota as $item)
            <tr>
                <td>{{ $item->nis }}</td>
                <td>{{ $item->nama_anggota }}</td>
                <td>{{ $item->kelas }}</td>
                <td>{{ $item->jurusan }}</td>
                <td>
                    <a href="{{ route('anggota.edit', $item->id_anggota) }}">Edit</a>
                    |
                    <form action="{{ route('anggota.destroy', $item->id_anggota) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button>Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </table>

    </div>

</body>

</html>