function validate() {

    var no            = document.formTambahPublikasi.no.value;
    var judul         = document.formTambahPublikasi.judul.value;
    var frekuensi     = document.formTambahPublikasi.frekuensi_terbit.value;
    var tanggal_rilis = document.formTambahPublikasi.tanggal_rilis.value;
    var bahasa        = document.formTambahPublikasi.bahasa.value;
    var ukuran_file   = document.formTambahPublikasi.ukuran_file.value;
    var sampul        = document.formTambahPublikasi.sampul.value;

    var pesanError = document.getElementById('pesanError');

    if (no == '') {

        pesanError.innerHTML = 'Nomor harus diisi!';
        pesanError.style.display = 'block';
        document.formTambahPublikasi.no.focus();
        return false;

    } else if (judul == '') {

        pesanError.innerHTML = 'Judul harus diisi!';
        pesanError.style.display = 'block';
        document.formTambahPublikasi.judul.focus();
        return false;

    } else if (frekuensi == '') {

        pesanError.innerHTML = 'Frekuensi Terbit harus dipilih!';
        pesanError.style.display = 'block';
        document.formTambahPublikasi.frekuensi_terbit.focus();
        return false;

    } else if (tanggal_rilis == '') {

        pesanError.innerHTML = 'Tanggal Rilis harus diisi!';
        pesanError.style.display = 'block';
        document.formTambahPublikasi.tanggal_rilis.focus();
        return false;

    } else if (bahasa == '') {

        pesanError.innerHTML = 'Bahasa harus diisi!';
        pesanError.style.display = 'block';
        document.formTambahPublikasi.bahasa.focus();
        return false;

    } else if (ukuran_file == '') {

        pesanError.innerHTML = 'Ukuran File harus diisi!';
        pesanError.style.display = 'block';
        document.formTambahPublikasi.ukuran_file.focus();
        return false;

    } else if (sampul == '') {

        pesanError.innerHTML = 'Sampul harus dipilih!';
        pesanError.style.display = 'block';
        document.formTambahPublikasi.sampul.focus();
        return false;

    } else {

        pesanError.innerHTML = '';
        pesanError.style.display = 'none';
        return true;

    }

}