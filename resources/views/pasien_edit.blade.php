@extends('layouts.app_modern',['title'=> 'Edit Data Pasien'])
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"> Edit Data Pasien : <b>{{ strtoupper($pasien->nama) }}</b></h5>
            <form action="/pasien_create/{{ $pasien->id }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group mt-1 mb-3">
                    <label for="nama">Nama Pasien</label>
                    <input type="input" class="form-control @error('nama') is-invalid
                    @enderror" id="nama" name="nama" value="{{ old('nama') ?? $pasien->nama}}" placeholder=" Masukkan Nama">
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="no_pasien">No Pasien</label>
                    <input type="input" class="form-control @error('no_pasien')is-invalid
                    @enderror" id="no_pasien" name="no_pasien" value="{{ old('no_pasien') ?? $pasien->no_pasien}}" placeholder=" Masukkan No Pasien">
                    <span class="text-danger">{{ $errors->first('no_pasien') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="umur">Umur</label>
                    <input type="number" class="form-control @error('umur')is-invalid
                    @enderror"  id="umur" name="umur" value="{{ old('umur') ?? $pasien->umur}}" placeholder="Masukkan Umur">
                    <span class="text-danger">{{ $errors->first('umur') }}</span>
                 </div>
                 <div class="form-group mt-1 mb-3">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input @error('jenis_kelamin')is-invalid
                        @enderror"  id="laki_laki" name="jenis_kelamin" value="laki-laki"
                        {{ old('jenis_kelamin') ?? $pasien->jenis_kelamin === 'Laki-laki' ? 'checked' : ''}} >Laki - Laki
                        <label for="laki-laki" class="form-check-label"></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input @error('jenis_kelamin')is-invalid
                        @enderror"  id="perempuan" name="jenis_kelamin" value="perempuan"
                        {{ old('jenis_kelamin') ?? $pasien->jenis_kelamin === 'Perempuan' ? 'checked' : ''}}>Perempuan
                        <label for="perempuan" class="form-check-label"></label>
                    </div>
                    <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                </div>

                <div class="form-group mt-1 mb-3">
                    <label for="alamat">Alamat</label>
                    <input type="input" class="form-control @error('alamat')is-invalid
                    @enderror" id="alamat" name="alamat" value="{{ old('alamat') ?? $pasien->alamat}}" placeholder="Masukkan Alamat">
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                 </div>

                 <div class="form-group mt-1 mb-3">
                    <label for="foto">Foto Pasien (jpg, jpeg, png) </label>
                    <input type="file" class="form-control @error('foto')is-invalid
                    @enderror"
                        id="foto" name="foto" value="{{ old('foto') }}" placeholder=" Masukkan foto">
                    <span class="text-danger">{{ $errors->first('foto') }}</span>
                    <img src="{{ Storage::url($pasien->foto) }}" alt="foto pasien" class="img-thumbnail mt-2" style="width: 100px">
                </div>


                <button type="submit" class="btn btn-primary">UPDATE</button>
            </form>


    </div>
@endsection

