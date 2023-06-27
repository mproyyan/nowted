import './bootstrap';
import ClassicEditor from './ckeditor';
import Alpine from 'alpinejs';

import '../css/ckeditor.css';

window.Alpine = Alpine;

Alpine.start();

ClassicEditor
      .create(document.querySelector('#ckeditor-input'))
      .then(editor => {
        console.log('Editor was initialized', editor);
      })
      .catch(error => {
        console.error(error.stack);
      });

window.addEventListener('load', function() {
  // Kondisi ini dijalankan setelah semua konten pada halaman selesai dimuat

  // Ambil elemen yang ingin Anda tambahkan kelasnya
  var elemen = document.querySelector('div.ck.ck-reset.ck-editor');

  // Tambahkan kelas ke elemen
  elemen.classList.add('prose');
  elemen.classList.add('max-w-none');
});