@extends('front-end.layout.base')

@section('title', $page_name)

@section('content')
<!-- CAREER ROLE
			============================================= -->
			<section id="role-page" class="pb-80 inner-page-hero division">
				<div class="container">
					<div class="row justify-content-center">	
						<div class="col-xl-10">


							<!-- INNER PAGE TITLE -->
							<div class="inner-page-title">
								<span>{{ $job[0]->categoryjob->name }}</span>
								<h2 class="s-52 w-700">{{ $job[0]->name }}</h2>
								<p class="p-lg">{{ $job[0]->joblocation->name }}</p>
							</div>


							<!-- TEXT BLOCK -->	
							<div class="txt-block role-info">

								{!! $job[0]->qualification !!}

								<!-- Button -->
								<a href="mailto:loker@csnet.id" target="_blank" class="btn r-04 btn--theme hover--theme">Apply to this job!</a>

							</div>	<!-- END TEXT BLOCK -->	


						</div>  
					</div>    <!-- End row -->
				</div>     <!-- End container -->
			</section>	<!-- END CAREER ROLE -->
@endsection