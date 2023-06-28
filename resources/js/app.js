import './bootstrap';
import ClassicEditor from './ckeditor';
import Alpine from 'alpinejs';

import '../css/ckeditor.css';

window.Alpine = Alpine;
window.Editor = ClassicEditor;

Alpine.start();
