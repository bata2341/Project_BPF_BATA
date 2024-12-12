@extends ('layouts.app_modern', ['title'=> "Data Pasien"])
@section('content')
<div class="card">
    <div class="card-body">
        <h3>Data Pasien</h3>
        <div class="row mb-3 mt-3">
            <div class="col-md-6">
                <a href="/pasien/create" class="btn btn-primary btrn -sm"> Tambah Pasien</a>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>No Pasien</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Buat</th>
                    <th>AKSI</th>
                </tr>
                <Tbody>
                    @foreach ($pasien as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->no_pasien }}</td>
                        <td>
                            @if($item->foto)
                                <a href="{{ \Storage::url($item->foto) }}" target="blank"></a>
                                    <img src="{{ \Storage::url($item->foto) }}" width="50" />
                            @endif
                            {{ $item->nama }}</td>
                        <td>{{ $item->umur }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="/pasien_create/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <form action="/pasien_create/{{ $item->id }}" method="POST" class="d-inline ml-2">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </Tbody>
            </thead>
        </table>
        {!! $pasien->links() !!}
    </div>
</div>
@endsection
