<script src="{{ asset('backend/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('backend/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('backend/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('backend/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('backend/vendor/js/menu.js') }}"></script>

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>



<!-- endbuild -->

<!-- Vendors JS -->

<script src="{{ asset('backend/vendor/libs/fontawesome/js/all.min.js') }}"></script>
<script src="{{ asset('backend/vendor/libs/fontawesome/js/solid.min.js') }}"></script>
<script src="{{ asset('backend/vendor/libs/apex-charts/apexcharts.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('backend/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('backend/js/dashboards-analytics.js') }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

{{-- toat js --}}
<script src="{{ asset('backend/js/ui-toasts.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('backend/js/custom.js') }}"></script>

{{-- ckeditor --}}
<script type="importmap">
  {
        "imports": {
            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.1/ckeditor5.js",
            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.1/"
        }
    }
</script>

<script type="module">
  import {
        ClassicEditor,
        Essentials,
        Bold,
        Italic,
        Font,
        Paragraph,
        List
    } from 'ckeditor5';

    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            plugins: [ Essentials, Bold, Italic, Font, Paragraph,List ],
            toolbar: {
                items: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor','bulletedList', 'numberedList'
                ]
            }
        } )
        .then( /* ... */ )
        .catch( /* ... */ );
</script>
@stack('js')