@extends('backend.layout.app')

@section('title', $page_name)

@push('css')
    <link href="https://vjs.zencdn.net/7.20.3/video-js.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4 ">
            <div class="d-flex align-items-center align-content-center justify-content-between px-4 pt-3 pb-1">
                <h4 class="fw-bold">{{ $media[0]->name }}</h4>
                {{-- <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item">{{ $page_name }}</li>
                </ol> --}}
            </div>
        </div>
        <!-- Striped Rows -->

        <div class="card px-4 py-4">
            @if ($media[0]->type == 'vidio')
                {{-- <iframe style="height: 100vh" src="https://www.youtube.com/embed/{{ $media[0]->url }}?si=WxRE9THu8zx6k-1Z" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> --}}
                <video id="my-video" class="video-js vjs-big-play-centered vjs-theme-sea" controls fluid='true' autoplay>
                    <source
                        src="{{ $media[0]->url }}"
                        type="video/mp4" />
                </video>
            @else
                <canvas id="the-canvas"></canvas>
                <div class="d-flex mt-3 gap-3 justify-content-center">
                    <button class="btn btn-sm btn-primary" id="prev">Previous</button>
                    &nbsp; &nbsp;
                    <div>
                        <span>page: <span id="page_num"></span>/<span id="page_count"></span></span>
                    </div>
                    <button class="btn btn-sm btn-primary" id="next">Next</button>
                </div>
            @endif




        </div>
        <!--/ Striped Rows -->
    </div>
@endsection


@push('js')
    <script src="//mozilla.github.io/pdf.js/build/pdf.mjs" type="module"></script>

    <script type="module">
        // If absolute URL from the remote server is provided, configure the CORS
        // header on that server.
        //    var url = 'https://raw.githubusercontent.com/mozilla/pdf.js/ba2edeae/web/compressed.tracemonkey-pldi-09.pdf';
        var url;
        var data = @json($media);
        data.forEach(element => {
            url = element.pdf;
        });
        console.log(data);
        

        // Loaded via <script> tag, create shortcut to access PDF.js exports.
        var {
            pdfjsLib
        } = globalThis;

        // The workerSrc property shall be specified.
        pdfjsLib.GlobalWorkerOptions.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.mjs';

        var pdfDoc = null,
            pageNum = 1,
            pageRendering = false,
            pageNumPending = null,
            scale = 1.5,
            canvas = document.getElementById('the-canvas'),
            ctx = canvas.getContext('2d');

        /**
         * Get page info from document, resize canvas accordingly, and render page.
         * @param num Page number.
         */
        function renderPage(num) {
            pageRendering = true;
            // Using promise to fetch the page
            pdfDoc.getPage(num).then(function(page) {
                var viewport = page.getViewport({
                    scale: scale
                });
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                // Render PDF page into canvas context
                var renderContext = {
                    canvasContext: ctx,
                    viewport: viewport
                };
                var renderTask = page.render(renderContext);

                // Wait for rendering to finish
                renderTask.promise.then(function() {
                    pageRendering = false;
                    if (pageNumPending !== null) {
                        // New page rendering is pending
                        renderPage(pageNumPending);
                        pageNumPending = null;
                    }
                });
            });

            // Update page counters
            document.getElementById('page_num').textContent = num;
        }

        /**
         * If another page rendering in progress, waits until the rendering is
         * finised. Otherwise, executes rendering immediately.
         */
        function queueRenderPage(num) {
            if (pageRendering) {
                pageNumPending = num;
            } else {
                renderPage(num);
            }
        }

        /**
         * Displays previous page.
         */
        function onPrevPage() {
            if (pageNum <= 1) {
                return;
            }
            pageNum--;
            queueRenderPage(pageNum);
        }
        document.getElementById('prev').addEventListener('click', onPrevPage);

        /**
         * Displays next page.
         */
        function onNextPage() {
            if (pageNum >= pdfDoc.numPages) {
                return;
            }
            pageNum++;
            queueRenderPage(pageNum);
        }
        document.getElementById('next').addEventListener('click', onNextPage);

        /**
         * Asynchronously downloads PDF.
         */
        pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
            pdfDoc = pdfDoc_;
            document.getElementById('page_count').textContent = pdfDoc.numPages;

            // Initial/first page rendering
            renderPage(pageNum);
        });
    </script>


    {{-- //vidio --}}
    <script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/videojs-youtube/dist/Youtube.min.js"></script>
    <script>
        var player = videojs('my-video');
    </script>
@endpush
