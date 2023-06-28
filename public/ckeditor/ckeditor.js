window.addEventListener('load', function() {
    // Kondisi ini dijalankan setelah semua konten pada halaman selesai dimuat
    window.Editor
    .create(document.querySelector('#ckeditor-input'))
    .then(editor => {
        console.log('ok');
        console.log('Editor was initialized', editor);

        // Ambil elemen yang ingin Anda tambahkan kelasnya
        var elemen = document.querySelector('div.ck.ck-reset.ck-editor');

        // Tambahkan kelas ke elemen
        elemen.classList.add('prose');
        elemen.classList.add('max-w-none');
    })
    .catch(error => {
        console.error(error.stack);
    });
});