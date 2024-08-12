@extends('front-end.layout.base')

@section('title',$page_name)
    

@section('content')
<!-- FAQs-2
      			============================================= -->
<section id="faqs-2" class="gr--whitesmoke pb-30 inner-page-hero faqs-section division">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-11 col-xl-10">


        <!-- INNER PAGE TITLE -->
        <div class="inner-page-title">
          <h2 class="s-46 w-700">Pertanyaan & Jawaban</h2>
          <p class="p-lg">Temukan jawaban untuk pertanyaan-pertanyaan yang sering diajukan oleh pelanggan lainnya</p>
        </div>


        <!-- QUESTIONS ACCORDION -->
        <div class="accordion-wrapper">
          <ul class="accordion">


            @foreach ($faq as $item)
                <!-- QUESTIONS CATEGORY #1 -->
            <li class="{{ $loop->first ? 'accordion-item is-active' : 'accordion-item' }}">


              <!-- CATEGORY HEADER -->
              <div class="accordion-thumb">
                <h4 class="s-20 w-700">{{$item->question}}</h4>
              </div>


              <!-- CATEGORY ANSWERS -->
              <div class="accordion-panel">
                <!-- Answer -->
                <div class="faqs-2-answer color--grey">
                  <!-- Text -->
                  {!! $item->answer !!}
                  

                </div> <!-- END QUESTION #1 -->
              </div> <!-- END CATEGORY ANSWERS -->
            </li> <!-- END QUESTIONS CATEGORY #1 -->
            @endforeach
          </ul>
        </div> <!-- END QUESTIONS ACCORDION -->


        <!-- MORE QUESTIONS LINK -->
        <div class="more-questions">
          <div class="more-questions-txt bg--white-400 r-100">
            <p class="p-lg">Punya Pertanyaan Lainnya? <a href="{{ route('contact') }}" class="color--theme">Hubungi Kami</a></p>
          </div>
        </div>


      </div>
    </div> <!-- End row -->
  </div> <!-- End container -->
</section> <!-- END FAQs-2 -->
@endsection