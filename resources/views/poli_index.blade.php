@extends ('layouts.app_modern', ['title'=> "Data Poli"])
@section('content')
<div class="card">
    <div class="card-body">
        <h3>Data Poli</h3>
        <div class="row mb-3 mt-3">
            <div class="col-md-6">
                <a href="/poli/create" class="btn btn-primary btrn -sm"> Tambah Poli</a>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Biaya</th>
                    <th>Keterangan</th>
                    <th>AKSI</th>
                </tr>
                <Tbody>
                    @foreach ($poli as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->biaya }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="/poli/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                <form action="/poli/{{ $item->id }}" method="POST" class="d-inline ml-2">
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
        {!! $poli->links() !!}
    </div>
</div>
@endsection
