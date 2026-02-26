<h3>Edit Anggota</h3>

<form method="POST" action="{{ route('anggota.update', $anggota->id_anggota) }}">
    @csrf
    @method('PUT')

    <input name="nis" value="{{ $anggota->nis }}"><br>
    <input name="nama_anggota" value="{{ $anggota->nama_anggota }}"><br>
    <input name="kelas" value="{{ $anggota->kelas }}"><br>
    <input name="jurusan" value="{{ $anggota->jurusan }}"><br>
    <input name="username" value="{{ $anggota->username }}"><br>
    <input name="password" value="{{ $anggota->password }}"><br>

    <button>Update</button>
</form>