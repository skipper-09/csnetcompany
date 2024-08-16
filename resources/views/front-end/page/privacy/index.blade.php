@extends('front-end.layout.base')

@section('title', $page_name)

@section('content')
    <!-- TERMS PAGE
       ============================================= -->
    <section id="terms-page" class="gr--whitesmoke pb-80 inner-page-hero division">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">


                    <!-- INNER PAGE TITLE -->
                    <div class="inner-page-title">
                        <h2 class="s-52 w-700">Privacy Policy</h2>
                        {{-- <p class="p-lg">This policy is effective as of 23th October 2022</p> --}}
                    </div>


                    <!-- TEXT BLOCK -->
                    @foreach ($privacy as $item)
                        
                    <div class="txt-block legal-info">
                        {!! $item->privacy !!}
                    </div> <!-- END TEXT BLOCK -->
                    @endforeach
                </div>
            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END TERMS PAGE -->
@endsection
