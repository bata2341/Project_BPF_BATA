@extends('layouts.app_modern',['title'=> 'Tambah Data Pasien'])
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> Tambah Poli</h5>
            <form action="/poli" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-1 mb-3">
                    <label for="nama">Nama Poli</label>
                    <input type="input" class="form-control @error('nama') is-invalid
                    @enderror" id="nama" name="nama" value="{{ old('nama') }}" placeholder=" Masukkan Nama">
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="biaya">Biaya </label></label>
                    <input type="input" class="form-control @error('biaya')is-invalid
                    @enderror" id="biaya" name="biaya" value="{{ old('biaya') }}" placeholder=" Masukkan biaya">
                    <span class="text-danger">{{ $errors->first('biaya') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="keterangan">Keterangan </label>
                    <input type="input" class="form-control @error('keterangan') is-invalid
                    @enderror" id="keterangan" name="keterangan" value="{{ old('keterangan') }}" placeholder=" Masukkan Keterangan">
                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>


    </div>
@endsection

