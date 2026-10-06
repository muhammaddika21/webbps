@extends('layouts.app')

@section('title', 'Daftar Publikasi')

@push('styles')
<style>
    .publication-container { width: 90%; max-width: 1300px; margin: 40px auto; }
    .page-title { font-size: 22px; font-weight: 700; color: #0a2342; border-bottom: 3px solid #00897b; display: inline-block; padding-bottom: 6px; }
    /* Tabel ala DKI di atas Bootstrap */
    .table-publikasi { background: #fff; border: 1px solid #dce8f5; font-size: 13px; }
    .table-publikasi thead th { background: #0a2e52; color: #fff; padding: 12px; border: none; }
    .table-publikasi tbody td { padding: 12px; border-bottom: 1px solid #eef3fa; vertical-align: middle; }
    /* Tombol aksi selaras tema biru DKI */
    .btn-aksi { display: inline-flex; align-items: center; gap: 6px; font-size: 12px; font-weight: 700; padding: 6px 14px; border-radius: 7px; text-decoration: none; border: 1.5px solid transparent; transition: all .18s ease; cursor: pointer; white-space: nowrap; }
    .btn-edit { background: #e8effc; color: #0a2e52; border-color: #b8d0f0; }
    .btn-edit:hover { background: #0a2e52; border-color: #0a2e52; color: #ffd54f; transform: translateY(-1px); box-shadow: 0 4px 10px rgba(10,46,82,.25); }
    .btn-hapus { background: #fdeeee; color: #9b1c1c; border-color: #f3c1c1; }
    .btn-hapus:hover { background: #b71c1c; border-color: #b71c1c; color: #fff; transform: translateY(-1px); box-shadow: 0 4px 10px rgba(183,28,28,.25); }
    .aksi-wrap { display: flex; gap: 8px; flex-wrap: wrap; }
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
    <div class="table-responsive bg-white rounded shadow-sm">
        <table class="table table-publikasi table-striped align-middle mb-0">
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
                        <div class="aksi-wrap">
                            <a href="#" class="btn-aksi btn-edit" title="Edit data">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.1 2.1 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                Edit
                            </a>
                            <form action="{{ route('publikasi.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus publikasi {{ addslashes($item->judul) }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-aksi btn-hapus" title="Hapus data" style="font-family: inherit;">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Belum ada data publikasi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
