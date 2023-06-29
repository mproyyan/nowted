import { ClassicEditor } from '@ckeditor/ckeditor5-editor-classic';
import '../css/ckeditor.css';

import { Essentials } from '@ckeditor/ckeditor5-essentials';
import { Autoformat } from '@ckeditor/ckeditor5-autoformat';
import { Bold, Italic } from '@ckeditor/ckeditor5-basic-styles';
import { Paragraph } from '@ckeditor/ckeditor5-paragraph';
import { Indent } from '@ckeditor/ckeditor5-indent';
import { Link } from '@ckeditor/ckeditor5-link';
import { List } from '@ckeditor/ckeditor5-list';
import { Heading } from '@ckeditor/ckeditor5-heading';
import { Table } from '@ckeditor/ckeditor5-table';

ClassicEditor
    .create(document.querySelector('#ckeditor-input'), {
        plugins: [
            Essentials,
            Autoformat,
            Bold,
            Italic,
            Paragraph,
            Indent,
            Link,
            List,
            Heading,
            Table
        ],

        toolbar: [
            'undo', 'redo',
            '|', 'heading',
            '|', 'bold', 'italic',
            '|', 'link', 'insertTable',
            '|', 'bulletedList', 'numberedList', 'outdent', 'indent'
        ]
    })
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