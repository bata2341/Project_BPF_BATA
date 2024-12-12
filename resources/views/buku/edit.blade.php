@extends ('mylayout', ['title' => "Edit Buku"])

@section('content')
<div class="card">
    <div class="card-body">
        <h3>Edit Buku</h3>

        <form action="{{ url('/buku/'.$buku->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="judul_buku">Judul Buku</label>
                <input type="text" name="judul_buku" class="form-control" value="{{ $buku->judul_buku }}" required>
            </div>

            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" name="isbn" class="form-control" value="{{ $buku->isbn }}" required>
            </div>

            <div class="form-group">
                <label for="pengarang">Pengarang</label>
                <input type="text" name="pengarang" class="form-control" value="{{ $buku->pengarang }}" required>
            </div>

            <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input type="text" name="penerbit" class="form-control" value="{{ $buku->penerbit }}" required>
            </div>

            <button type="submit" class="btn btn-success mt-3">Update</button>
        </form>
    </div>
</div>
@endsection
