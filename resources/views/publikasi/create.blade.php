@extends('layouts.app')

@section('title', 'Tambah Publikasi')

@section('content')
<div class="container" style="max-width: 640px; margin: 40px auto;">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <h2 class="fw-bold" style="font-size: 20px; color: #0a2342; border-bottom: 2px solid #eef3fa; padding-bottom: 12px; margin-bottom: 20px;">Tambah Data Publikasi</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <p id="pesanError" class="alert alert-danger" style="display:none;"></p>

            <form name="formTambahPublikasi" action="{{ route('publikasi.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validasiBengkulu()">
                @csrf
                <div class="mb-3 row">
                    <label for="judul" class="col-sm-3 col-form-label fw-semibold">Judul</label>
                    <div class="col-sm-9">
                        <input type="text" name="judul" id="judul" value="{{ old('judul') }}"
                            class="form-control @error('judul') is-invalid @enderror"
                            placeholder="Contoh: Provinsi Bengkulu Dalam Angka 2026">
                        @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="tanggal_rilis" class="col-sm-3 col-form-label fw-semibold">Tanggal Rilis</label>
                    <div class="col-sm-9">
                        <input type="date" name="tanggal_rilis" id="tanggal_rilis" value="{{ old('tanggal_rilis') }}"
                            class="form-control @error('tanggal_rilis') is-invalid @enderror">
                        @error('tanggal_rilis')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="sampul" class="col-sm-3 col-form-label fw-semibold">Sampul</label>
                    <div class="col-sm-9">
                        <input type="file" name="sampul" id="sampul" accept="image/*"
                            class="form-control @error('sampul') is-invalid @enderror">
                        <div class="form-text">JPG/JPEG/PNG maks 2MB. Boleh dikosongkan.</div>
                        @error('sampul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-9 offset-sm-3 d-flex gap-2">
                        <button type="submit" class="btn px-4 fw-bold" style="background:#0a2e52; border-color:#0a2e52; color:#fff;">Simpan</button>
                        <a href="{{ route('publikasi.index') }}" class="btn px-4" style="background:#eef3fa; border-color:#dce8f5; color:#0a2e52; font-weight:600;">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function validasiBengkulu() {
    var judul = document.formTambahPublikasi.judul.value.trim();
    var tanggal = document.formTambahPublikasi.tanggal_rilis.value;
    var pesanError = document.getElementById('pesanError');
    if (judul === '') {
        pesanError.textContent = 'Judul harus diisi!';
        pesanError.style.display = 'block';
        document.formTambahPublikasi.judul.focus();
        return false;
    }
    if (tanggal === '') {
        pesanError.textContent = 'Tanggal Rilis harus diisi!';
        pesanError.style.display = 'block';
        document.formTambahPublikasi.tanggal_rilis.focus();
        return false;
    }
    pesanError.style.display = 'none';
    return true;
}
</script>
@endpush
