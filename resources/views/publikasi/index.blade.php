@extends('layouts.app')

@section('title', 'Daftar Publikasi')

@push('styles')
<style>
    .publication-container { width: 90%; max-width: 1300px; margin: 40px auto; }
    .page-title { font-size: 22px; font-weight: 700; color: #0a2342; border-bottom: 3px solid #00897b; display: inline-block; padding-bottom: 6px; }
    /* Header tabel selaras tema navy BPS */
    .table-publikasi { background: #fff; font-size: 13.5px; }
    .table-publikasi thead th { background: #0a2e52; color: #fff; border: none; vertical-align: middle; }
    .table-publikasi tbody td { vertical-align: middle; }
    /* Tombol tambah selaras header navy */
    .btn-tambah { display: inline-flex; align-items: center; gap: 8px; background: #0a2e52; color: #fff; font-size: 13px; font-weight: 700; padding: 10px 22px; border-radius: 8px; text-decoration: none; border: 1.5px solid #0a2e52; transition: all .18s ease; }
    .btn-tambah:hover { background: #1565c0; border-color: #1565c0; color: #ffd54f; transform: translateY(-1px); box-shadow: 0 6px 16px rgba(10,46,82,.3); }
</style>
@endpush

@section('content')
<div style="width: 90%; max-width: 1300px; margin: 28px auto 0;" class="d-flex justify-content-between align-items-center flex-wrap gap-2">
    <h2 class="page-title">Daftar Publikasi BPS Provinsi Bengkulu</h2>
    <a href="{{ route('publikasi.create') }}" class="btn-tambah">+ Tambah Publikasi</a>
</div>

<div class="publication-container">
    <div class="table-responsive rounded shadow-sm">
        <table class="table table-publikasi table-striped table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Tanggal Rilis</th>
                    <th>Sampul</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($publikasi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="fw-semibold">{{ $item->judul }}</td>
                    <td>{{ $item->tanggal_rilis }}</td>
                    <td>
                        @if ($item->sampul)
                            <img src="{{ asset('images/' . $item->sampul) }}" alt="{{ $item->judul }}" class="rounded shadow-sm" style="max-width: 60px;">
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm fw-semibold">Edit</a>
                        <form action="{{ route('publikasi.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus publikasi {{ addslashes($item->judul) }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm fw-semibold">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">Belum ada data publikasi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
