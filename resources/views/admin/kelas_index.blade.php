@extends('layouts.app_modern', ['title' => "Data Kelas"])
@section('content')
<div class="card">
    <div class="card-body">
        <h3>Data Kelas</h3>
        <div class="card-body">
            <form action="">
                <div class="row g-3 mb-2">
                    <div class="col">
                        <input type="text" name="q" class="form-control" placeholder="Cari nama kelas atau tingkat"
                        value="{{ request('q') }}">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row mb-3 mt-3">
            <div class="col-md-6">
                <a href="/kelas/create" class="btn btn-primary btn-sm">Tambah Kelas</a>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama Kelas</th>
                    <th>Tingkat</th>
                    <th>Wali Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_kelas }}</td>
                    <td>{{ $item->tingkat }}</td>
                    <td>{{ $item->waliKelas ? $item->waliKelas->name : 'Belum ditentukan' }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="/kelas/{{ $item->id }}" class="btn btn-info btn-sm">Detail</a>
                            <form action="/kelas/{{ $item->id }}" method="POST" class="d-inline ml-2">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $kelas->links() !!}
    </div>
</div>
@endsection