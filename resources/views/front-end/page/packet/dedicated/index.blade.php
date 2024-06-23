@extends('front-end.layout.base')

@section('title',$page_name)
@push('css')
<style>
	.img-hero {
		height: 500px
	}

	.bg--heading {
		background-position: center !important;
		background-repeat: no-repeat;
		background-size: cover !important;
	}

	.pricing-title {
		height: 150px !important;
		align-content: center !important;
		align-items: center !important;
	}

	.nav-tabs .nav-link {
		background-color: #f8f9fa;
		border: 1px solid #dee2e6;
		color: #495057;
		margin-right: 5px;
		border-radius: 0.25rem 0.25rem 0 0;
	}

	.nav-tabs .nav-link.active {
		background-color: #fff;
		border-color: #dee2e6 #dee2e6 #fff;
		color: #495057;
	}

	.nav-tabs .nav-link:hover {
		border-color: #e9ecef #e9ecef #dee2e6;
		color: #0056b3;
	}
</style>
@endpush

@section('content')
<!-- HERO-2
               ============================================= -->
<section id="hero-2" class="bg--snow hero-section">
	<div class="container">
		<div class="row d-flex align-items-center">


			<!-- HERO IMAGE -->
			<div class="col-md-6 order-last order-md-2">
				<div class="hero-2-img wow fadeInRight">
					<img class="img-hero" src="{{ asset('front-end/images/a1.png') }}" alt="hero-image">
				</div>
			</div>


			<!-- HERO TEXT -->
			<div class="col-md-6 order-first order-md-2">
				<div class="hero-2-txt wow fadeInLeft">

					<!-- Title -->
					<h2 class="s-56 w-700 color--black">Dedicated Business Internet</h2>

					<!-- Text -->
					<p class="p-lg">
						Kami memahami bahwa kecepatan dan keandalan internet adalah jantung dari setiap bisnis modern. Dengan
						Dedicated Business Internet Wifi, Anda mendapatkan akses internet yang eksklusif dan cepat tanpa kompromi,
						yang dirancang khusus untuk memenuhi kebutuhan bisnis Anda.
					</p>

					{{--
					<!-- HERO DIGITS -->
					<div class="hero-digits">
						<button class="btn btn--theme btn-outline-light rounded-5 ">Lihat Paket</button>

					</div> <!-- END HERO DIGITS --> --}}

				</div>
			</div> <!-- END HERO TEXT -->


		</div> <!-- End row -->
	</div> <!-- End container -->
</section> <!-- END HERO-2 -->



<!-- IMAGE CONTENT
			============================================= -->
<section id="lnk-3" class=" ct-10 content-section division">
	<div class="section-overlay pt-100">
		<div class="container">


			<!-- SECTION TITLE -->
			<div class="row justify-content-center">
				<div class="col-md-10 col-lg-9">
					<div class="section-title mb-70">

						<!-- Title -->
						<h2 class="s-46 w-700">Performa Jaringan Maksimal</h2>

						<!-- Text -->
						<p class="s-20">Idnet Dedicated Internet memberi Anda konektivitas internet berkecepatan tinggi dengan
							bandwidth simetris (1:1) untuk memastikan kinerja
							jaringan terbaik kapan saja. Infrastruktur telah dirancang dengan keandalan tinggi guna memastikan operasi
							perusahaan
							Anda selalu berjalan lancar.</p>

					</div>
				</div>
			</div>


			<!-- IMAGE BLOCK -->
			<div class="row">
				<div class="col">
					<div class="img-block video-preview wow fadeInUp">

						{{--
						<!-- Play Icon -->
						<a class="video-popup2" href="https://www.youtube.com/watch?v=7e90gBu4pas">
							<div class="video-btn video-btn-xl bg--theme">
								<div class="video-block-wrapper"><span class="flaticon-play-button"></span></div>
							</div>
						</a> --}}

						<!-- Preview Image -->
						<img class="img-fluid"
							src="https://indonet.co.id/wp-content/uploads/2022/03/indonet-dedicated-internet-topology-1536x1168.png"
							alt="video-preview">

					</div>
				</div>
			</div>


		</div> <!-- End container -->
	</div> <!-- End section overlay -->
</section> <!-- END IMAGE CONTENT -->


<!-- FEATURES-11
			============================================= -->
<section id="features-11" class="pt-100 features-section division">
	<div class="container">


		<!-- SECTION TITLE -->
		<div class="row justify-content-center">
			<div class="col-md-10 col-lg-9">
				<div class="section-title mb-80">

					<!-- Title -->
					<h2 class="s-46 w-700">Fitur Layanan</h2>

					<!-- Text -->
					{{-- <p class="s-21 color--grey">Ligula risus auctor tempus magna feugiat lacinia.</p> --}}

				</div>
			</div>
		</div>


		<!-- FEATURES-11 WRAPPER -->
		<div class="fbox-wrapper">
			<div class="row row-cols-1 row-cols-md-2 rows-3">


				<!-- FEATURE BOX #1 -->
				<div class="col">
					<div class="fbox-11 fb-1 wow fadeInUp">

						<!-- Icon -->
						<div class="fbox-ico-wrap">
							<div class="fbox-ico ico-50">
								<div class="shape-ico color--theme">

									<!-- Vector Icon -->
									<span class="flaticon-graphics"></span>

									<!-- Shape -->
									<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z"
											transform="translate(100 100)" />
									</svg>

								</div>
							</div>
						</div> <!-- End Icon -->

						<!-- Text -->
						<div class="fbox-txt">
							<h6 class="s-22 w-700">100% Fiber Oftic</h6>
							<p>Kami menggunakan 100% fiber optic untuk memastikan Anda mendapatkan kecepatan internet
								yang tak tertandingi. Dengan teknologi ini, Anda dapat menikmati streaming, gaming, dan
								browsing tanpa hambatan.
							</p>
						</div>

					</div>
				</div> <!-- END FEATURE BOX #1 -->


				<!-- FEATURE BOX #2 -->
				<div class="col">
					<div class="fbox-11 fb-2 wow fadeInUp">

						<!-- Icon -->
						<div class="fbox-ico-wrap">
							<div class="fbox-ico ico-50">
								<div class="shape-ico color--theme">

									<!-- Vector Icon -->
									<span class="flaticon-24-hours"></span>

									<!-- Shape -->
									<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z"
											transform="translate(100 100)" />
									</svg>

								</div>
							</div>
						</div> <!-- End Icon -->

						<!-- Text -->
						<div class="fbox-txt">
							<h6 class="s-22 w-700">24/7 Customer Service</h6>
							<p>Kami berkomitmen untuk memberikan layanan pelanggan terbaik. Tim kami siap membantu Anda
								24/7 untuk memastikan pengalaman internet Anda selalu optimal.
							</p>
						</div>

					</div>
				</div> <!-- END FEATURE BOX #2 -->


				<!-- FEATURE BOX #3 -->
				<div class="col">
					<div class="fbox-11 fb-3 wow fadeInUp">

						<!-- Icon -->
						<div class="fbox-ico-wrap">
							<div class="fbox-ico ico-50">
								<div class="shape-ico color--theme">

									<!-- Vector Icon -->
									<span class="flaticon-price-label"></span>

									<!-- Shape -->
									<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z"
											transform="translate(100 100)" />
									</svg>

								</div>
							</div>
						</div> <!-- End Icon -->

						<!-- Text -->
						<div class="fbox-txt">
							<h6 class="s-22 w-700">Harga Kompetitif</h6>
							<p>Kami menawarkan paket internet dengan harga yang kompetitif tanpa mengorbankan kualitas.
								Dengan 100% fiber optic, Anda mendapatkan nilai terbaik untuk investasi Anda.
							</p>
						</div>

					</div>
				</div> <!-- END FEATURE BOX #3 -->


				<!-- FEATURE BOX #4 -->
				<div class="col">
					<div class="fbox-11 fb-4 wow fadeInUp">

						<!-- Icon -->
						<div class="fbox-ico-wrap">
							<div class="fbox-ico ico-50">
								<div class="shape-ico color--theme">

									<!-- Vector Icon -->
									<span class="flaticon-iteration"></span>

									<!-- Shape -->
									<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z"
											transform="translate(100 100)" />
									</svg>

								</div>
							</div>
						</div> <!-- End Icon -->

						<!-- Text -->
						<div class="fbox-txt">
							<h6 class="s-22 w-700">Komitmen Terhadap Kepuasan Pelanggan</h6>
							<p>Kepuasan Anda adalah prioritas kami. Dengan jaringan 100% fiber optic dan kestabilan
								jaringan, kami memastikan setiap pelanggan mendapatkan layanan yang memenuhi dan
								melebihi harapan.
							</p>
						</div>

					</div>
				</div> <!-- END FEATURE BOX #4 -->


				<!-- FEATURE BOX #5 -->
				<div class="col">
					<div class="fbox-11 fb-5 wow fadeInUp">

						<!-- Icon -->
						<div class="fbox-ico-wrap">
							<div class="fbox-ico ico-50">
								<div class="shape-ico color--theme">

									<!-- Vector Icon -->
									<span class="flaticon-trophy"></span>

									<!-- Shape -->
									<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z"
											transform="translate(100 100)" />
									</svg>

								</div>
							</div>
						</div> <!-- End Icon -->

						<!-- Text -->
						<div class="fbox-txt">
							<h6 class="s-22 w-700">Stabil dan Handal</h6>
							<p>Dengan 100% fiber optic, kami menjamin koneksi internet yang stabil dan andal. Tidak ada
								lagi masalah buffering atau gangguan koneksi di saat-saat penting.
							</p>
						</div>

					</div>
				</div> <!-- END FEATURE BOX #5 -->


				<!-- FEATURE BOX #6 -->
				<div class="col">
					<div class="fbox-11 fb-6 wow fadeInUp">

						<!-- Icon -->
						<div class="fbox-ico-wrap">
							<div class="fbox-ico ico-50">
								<div class="shape-ico color--theme">

									<!-- Vector Icon -->
									<span class="flaticon-search-engine-1"></span>

									<!-- Shape -->
									<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
										<path
											d="M69.8,-23C76.3,-2.7,57.6,25.4,32.9,42.8C8.1,60.3,-22.7,67,-39.1,54.8C-55.5,42.7,-57.5,11.7,-48.6,-11.9C-39.7,-35.5,-19.8,-51.7,5.9,-53.6C31.7,-55.6,63.3,-43.2,69.8,-23Z"
											transform="translate(100 100)" />
									</svg>

								</div>
							</div>
						</div> <!-- End Icon -->

						<!-- Text -->
						<div class="fbox-txt">
							<h6 class="s-22 w-700">Tim Teknisi Handal</h6>
							<p>Kami memiliki tim teknisi yang terlatih dan berpengalaman dalam menangani berbagai
								masalah teknis. Setiap teknisi kami adalah profesional yang berdedikasi untuk memberikan
								layanan terbaik.
							</p>
						</div>

					</div>
				</div> <!-- END FEATURE BOX #6 -->


			</div> <!-- End row -->
		</div> <!-- END FEATURES-11 WRAPPER -->


	</div> <!-- End container -->
</section> <!-- END FEATURES-11 -->


<!-- FAQs-2
      			============================================= -->
<section id="faqs-2" class=" pb-30 inner-page-hero faqs-section division">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-11 col-xl-10">


				<!-- INNER PAGE TITLE -->
				<div class="inner-page-title">
					<h2 class="s-46 w-700">Pertanyaan & Jawaban</h2>
					<p class="p-lg">Temukan jawaban untuk pertanyaan-pertanyaan terkait internet Dedicated.</p>
				</div>


				<!-- QUESTIONS ACCORDION -->
				<div class="accordion-wrapper">
					<ul class="accordion">


						<!-- QUESTIONS CATEGORY #1 -->
						<li class="accordion-item is-active">


							<!-- CATEGORY HEADER -->
							<div class="accordion-thumb">
								<h4 class="s-20 w-700">Apa itu Internet Dedicatd?</h4>
							</div>


							<!-- CATEGORY ANSWERS -->
							<div class="accordion-panel">
								<!-- Answer -->
								<div class="faqs-2-answer color--grey">
									<!-- Text -->
									<br>
									Internet Dedicated adalah layanan koneksi internet yang dirancang secara eksklusif untuk memenuhi
									tuntutan bisnis dan
									keperluan para profesional. Berbeda dengan layanan broadband biasa, Internet Dedicated menghadirkan
									performa yang dapat
									diandalkan, kecepatan yang tinggi, dan kestabilan yang konsisten. Keberadaan layanan ini menjadi
									sangat penting dalam
									menjalankan operasi bisnis masa kini yang sangat bergantung pada konektivitas yang tidak
									terganggu.<br />

									Koneksi internet yang handal dan cepat membentuk landasan vital bagi suksesnya bisnis di era modern.
									Perlunya menjaga
									kerahasiaan data bisnis dan melindunginya dari gangguan eksternal seperti serangan siber atau
									lonjakan trafik pada
									jaringan internet umum, mendorong perlunya memiliki koneksi yang tahan banting dan aman. Tidak hanya
									itu, dibutuhkan
									performa layanan yang sesuai untuk beragam jenis bisnis, terutama yang membutuhkan koneksi intensif.


									</p>

								</div> <!-- END QUESTION #1 -->
							</div> <!-- END CATEGORY ANSWERS -->
						</li> <!-- END QUESTIONS CATEGORY #1 -->
						<!-- QUESTIONS CATEGORY #1 -->
						<li class="accordion-item ">


							<!-- CATEGORY HEADER -->
							<div class="accordion-thumb">
								<h4 class="s-20 w-700">Bagaiman cara mengetahui Informasi mengenai Idnet?</h4>
							</div>


							<!-- CATEGORY ANSWERS -->
							<div class="accordion-panel">
								<!-- Answer -->
								<div class="faqs-2-answer color--grey">
									<!-- Text -->
									<p>Kunjungi website : idnet.id atau email ke contact@idnet.id atau menghubungi call center 021-3000
										1515, WA 0815 900 1515, media sosial Idnet atau datang langsung ke kantor kami.
									</p>

								</div> <!-- END QUESTION #1 -->
							</div> <!-- END CATEGORY ANSWERS -->
						</li> <!-- END QUESTIONS CATEGORY #1 -->
						<!-- QUESTIONS CATEGORY #1 -->
						<li class="accordion-item ">


							<!-- CATEGORY HEADER -->
							<div class="accordion-thumb">
								<h4 class="s-20 w-700">Bagaimana syarat & ketentuan untuk berlangganan layanan Idnet?</h4>
							</div>


							<!-- CATEGORY ANSWERS -->
							<div class="accordion-panel">
								<!-- Answer -->
								<div class="faqs-2-answer color--grey">
									<!-- Text -->
									<p>Syarat & ketentuan berlangganan :
									</p>
									<ol>
										<li>Pelanggan warga negara Indonesia wajib menggunakan KTP yang berlaku.</li>
										<li>Pelanggan warga negara Indonesia wajib menggunakan KTP yang berlaku.</li>
										<li>Pelanggan warga negara Indonesia wajib menggunakan KTP yang berlaku.</li>
										<li>Pelanggan warga negara Indonesia wajib menggunakan KTP yang berlaku.</li>
										<li>Pelanggan warga negara Indonesia wajib menggunakan KTP yang berlaku.</li>
										<li>Pelanggan warga negara Indonesia wajib menggunakan KTP yang berlaku.</li>
										<li>Pelanggan warga negara Indonesia wajib menggunakan KTP yang berlaku.</li>
									</ol>

								</div> <!-- END QUESTION #1 -->
							</div> <!-- END CATEGORY ANSWERS -->
						</li> <!-- END QUESTIONS CATEGORY #1 -->
						<!-- QUESTIONS CATEGORY #1 -->
						<li class="accordion-item ">


							<!-- CATEGORY HEADER -->
							<div class="accordion-thumb">
								<h4 class="s-20 w-700">Apa keunggulan dari layanan Idnet?</h4>
							</div>


							<!-- CATEGORY ANSWERS -->
							<div class="accordion-panel">
								<!-- Answer -->
								<div class="faqs-2-answer color--grey">
									<!-- Text -->
									<ol>
										<li>Menggunakan teknologi Fiber-to-the-home (FTTH) dengan 100% fiber optic untuk memberikan layanan
											yang dapat diandalkan oleh pelanggan.</li>
										<li>Layanan internet unlimited, cepat, stabil serta dapat diandalkan.</li>
										<li>Memberikan "value for money" bagi pelanggan untuk kebutuhan terkini dan kebutuhan lainnya..</li>
										<li>Memiliki pelayanan pelanggan yang baik dengan dukungan call center, email dan social media.</li>
										<li>Memiliki billing untuk melihat informasi tagihan internet secara berkala.</li>
									</ol>

								</div> <!-- END QUESTION #1 -->
							</div> <!-- END CATEGORY ANSWERS -->
						</li> <!-- END QUESTIONS CATEGORY #1 -->
						<!-- QUESTIONS CATEGORY #1 -->
						<li class="accordion-item ">


							<!-- CATEGORY HEADER -->
							<div class="accordion-thumb">
								<h4 class="s-20 w-700">Berapa lama waktu pemasangan baru Idnet?</h4>
							</div>


							<!-- CATEGORY ANSWERS -->
							<div class="accordion-panel">
								<!-- Answer -->
								<div class="faqs-2-answer color--grey">
									<!-- Text -->
									<p>1 -3* hari setelah kesepakatan pelanggan & Indosat HiFi
										*Hanya estimasi, waktu pemasangan sebenarnya akan tergantung situasi di lapangan.
										Petugas Indosat Ooredoo Hutchison yang ditunjuk akan menghubungi pelanggan untuk kepastian
										pemasangan.
									</p>

								</div> <!-- END QUESTION #1 -->
							</div> <!-- END CATEGORY ANSWERS -->
						</li> <!-- END QUESTIONS CATEGORY #1 -->


					</ul>
				</div> <!-- END QUESTIONS ACCORDION -->


				<!-- MORE QUESTIONS LINK -->
				<div class="more-questions">
					<div class="more-questions-txt bg--white-400 r-100">
						<p class="p-lg">Punya Pertanyaan Lainnya? <a href="contacts.html" class="color--theme">Hubungi Kami</a></p>
					</div>
				</div>


			</div>
		</div> <!-- End row -->
	</div> <!-- End container -->
</section> <!-- END FAQs-2 -->

@endsection