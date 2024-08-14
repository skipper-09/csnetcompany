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


{{-- //select 2 --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>


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
        List,
        Link,
        AutoLink,
        Image, ImageInsert,
        HeadingButtonsUI, ParagraphButtonUI,Heading 
    } from 'ckeditor5';

    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            plugins: [ Essentials, Bold, Italic, Font, Paragraph,List,Link,AutoLink,
            AutoLink,Image, ImageInsert,Heading ],
            toolbar: {
                items: [
                    'undo', 'redo', '|', 'bold', 'italic', '|', 'heading','|',
                    'fontSize', 'fontFamily', '|', 'fontColor', 'fontBackgroundColor','bulletedList', 'numberedList','link','insertImage'
                ]
            },
            menuBar: {
            isVisible: true
        },
        } )
        .then( /* ... */ )
        .catch( /* ... */ );
</script>



{{-- //toast --}}
<script>
    @if (session('success'))
            setTimeout(function() {
                var toastHTML = `
                        <div class="bs-toast toast fade show bg-primary" role="alert" aria-live="assertive" aria-atomic="true" data-delay="1000">
                        <div class="toast-header">
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">{{ session('success') }}</div></div>`;
                $('#toast-container').append(toastHTML);
                var toastElement = $('.toast').last().toast({ autohide: true, delay: 500 });
                toastElement.toast('show');
                
                
            }, 1000); // 500 milidetik delay
        @endif
</script>
@stack('js')