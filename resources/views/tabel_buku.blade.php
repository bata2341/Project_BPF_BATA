@extends ('mylayout', ['title' => "Data Buku"])
@section('content')
<div class="card">
    <div class="card-body">
        <h3>Data Buku</h3>
        <div class="row mb-3 mt-3">
            <div class="col-md-6">
                <a href="/buku/create" class="btn btn-primary btn-sm"> Tambah Buku</a>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Judul Buku</th>
                    <th>ISBN</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tanggal Buat</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buku as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->judul_buku }}</td>
                    <td>{{ $item->isbn }}</td>
                    <td>{{ $item->pengarang }}</td>
                    <td>{{ $item->penerbit }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <!-- Add edit and delete buttons here if needed -->
                        <a href="/buku/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <form action="/buku/{{ $item->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $buku->links() !!}
    </div>
</div>
@endsection

