@extends('layouts.app_modern_laporan')
@section('content')
    <h3>LAPORAN DATA PASIEN</h3>

    {{-- Tampilkan Filter Aktif --}}
    <div class="mb-3">
        <strong>Filter Aktif:</strong>
        <ul>
            @if (request()->filled('tanggal_mulai') || request()->filled('tanggal_akhir'))
                <li>
                    Tanggal Daftar:
                    {{ request('tanggal_mulai') ? \Carbon\Carbon::parse(request('tanggal_mulai'))->format('d/m/Y') : 'Tidak dibatasi' }}
                    -
                    {{ request('tanggal_akhir') ? \Carbon\Carbon::parse(request('tanggal_akhir'))->format('d/m/Y') : 'Tidak dibatasi' }}
                </li>
            @endif

            @if (request()->filled('jenis_kelamin') && request('jenis_kelamin') !== 'semua')
                <li>Jenis Kelamin: {{ ucfirst(request('jenis_kelamin')) }}</li>
            @endif

            @if (request()->filled('umur_min') || request()->filled('umur_max'))
                <li>
                    Umur:
                    {{ request('umur_min') ?? '0' }} - {{ request('umur_max') ?? 'Tidak dibatasi' }}
                </li>
            @endif
        </ul>
    </div>

    {{-- Tabel Data Pasien --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="1%">NO</th>
                <th>No Pasien</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Jenis Kelamin</th>
                <th>Tgl Buat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($models as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->no_pasien }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->umur }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->created_at->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
