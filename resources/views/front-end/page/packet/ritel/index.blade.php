@extends('front-end.layout.base')
@section('content')
    <!-- HERO-2
               ============================================= -->
    <section id="hero-2" class="bg--snow hero-section">
        <div class="container">
            <div class="row d-flex align-items-center">


                <!-- HERO IMAGE -->
                <div class="col-md-6 order-last order-md-2">
                    <div class="hero-2-img wow fadeInRight">
                        <img class="img-fluid" src="{{ asset('front-end/images/hero-2-img.png') }}" alt="hero-image">
                    </div>
                </div>


                <!-- HERO TEXT -->
                <div class="col-md-6 order-first order-md-2">
                    <div class="hero-2-txt wow fadeInLeft">

                        <!-- Title -->
                        <h2 class="s-56 w-700 color--black">Internet Broadband Tercepat Dengan Harga Murah</h2>

                        <!-- Text -->
                        <p class="p-lg">Transformasikan cara Anda berinternet dengan kecepatan broadband kami yang tak
                            tertandingi. Baik untuk hiburan, pendidikan, atau pekerjaan, layanan kami dirancang untuk
                            memenuhi semua kebutuhan digital Anda. Dengan teknologi canggih dan jaringan yang luas, kami
                            menjamin koneksi yang stabil dan andal setiap saat.
                        </p>

                        <!-- HERO DIGITS -->
                        <div class="hero-digits">
                            <button class="btn btn--theme btn-outline-light rounded-5 ">Lihat Paket</button>

                        </div> <!-- END HERO DIGITS -->

                    </div>
                </div> <!-- END HERO TEXT -->


            </div> <!-- End row -->
        </div> <!-- End container -->
    </section> <!-- END HERO-2 -->
    <!-- PRICING-1
       ============================================= -->
    <section id="pricing-1" class="gr--whitesmoke pb-40 inner-page-hero pricing-section">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="section-title mb-70">

                        <!-- Title -->
                        <h2 class="s-52 w-700">Simple, Flexible Pricing</h2>

                        <!-- TOGGLE BUTTON -->
                        <div class="toggle-btn ext-toggle-btn toggle-btn-md mt-30">
                            <span class="toggler-txt">Billed monthly</span>
                            <label class="switch-wrap">
                                <input type="checkbox" id="checbox" onclick="check()">
                                <span class="switcher bg--grey switcher--theme">
                                    <span class="show-annual"></span>
                                    <span class="show-monthly"></span>
                                </span>
                            </label>
                            <span class="toggler-txt">Billed yearly</span>

                            <!-- Text -->
                            <p class="color--theme">Save up to 35% with yearly billing</p>

                        </div>


                    </div>
                </div>
            </div> <!-- END SECTION TITLE -->


            <!-- PRICING TABLES -->
            <div class="pricing-1-wrapper">
                <div class="row row-cols-1 row-cols-md-3">


                    <!-- STARTER PLAN -->
                    <div class="col">
                        <div id="pt-1-1" class="p-table pricing-1-table bg--white-100 block-shadow r-12 wow fadeInUp">


                            <!-- TABLE HEADER -->
                            <div class="pricing-table-header">

                                <!-- Title -->
                                <h5 class="s-24 w-700">Starter</h5>

                                <!-- Price -->
                                <div class="price">
                                    <sup class="color--black">$</sup>
                                    <span class="color--black">0</span>
                                    <sup class="validity color--grey">&nbsp;/&ensp;forever</sup>
                                    <p class="color--grey">For professionals getting started with smaller projects.</p>
                                </div>

                                <!-- Button -->
                                <a href="#" class="pt-btn btn r-04 btn--theme hover--theme">Get srarted - it's
                                    free</a>
                                <p class="p-sm btn-txt text-center color--grey">No credit card required</p>

                            </div> <!-- END TABLE HEADER -->


                            <!-- PRICING FEATURES -->
                            <ul class="pricing-features color--black ico-10 ico--green mt-25">
                                <li>
                                    <p><span class="flaticon-check"></span> 2 free projects</p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span> 1 GB of cloud storage</p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span> For personal use</p>
                                </li>
                                <li class="disabled-option">
                                    <p><span class="flaticon-check"></span> Weekly data backup</p>
                                </li>
                                <li class="disabled-option">
                                    <p><span class="flaticon-check"></span> No Ads. No trackers</p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span> 12/5 email support</p>
                                </li>
                            </ul>


                        </div>
                    </div> <!-- END STARTER PLAN -->


                    <!-- BASIC PLAN -->
                    <div class="col">
                        <div id="pt-1-2" class="p-table pricing-1-table bg--white-100 block-shadow r-12 wow fadeInUp">


                            <!-- TABLE HEADER -->
                            <div class="pricing-table-header">

                                <!-- Title -->
                                <h5 class="s-24">Basic</h5>

                                <!-- Price -->
                                <div class="price">

                                    <!-- Monthly Price -->
                                    <div class="price2">
                                        <sup class="color--black">$</sup>
                                        <span class="color--black">16.99</span>
                                        <sup class="validity color--grey">&nbsp;/&ensp;mo</sup>
                                    </div>

                                    <!-- Yearly Price -->
                                    <div class="price1">
                                        <sup class="color--black">$</sup>
                                        <span class="color--black">142.75</span>
                                        <sup class="validity color--grey">&nbsp;/&ensp;yr</sup>

                                        <!-- Discount Badge -->
                                        <div class="pricing-discount bg--yellow-400 color--black r-36">
                                            <h6 class="s-17">Save 30%</h6>
                                        </div>

                                    </div>

                                    <!-- Text -->
                                    <p class="color--grey">For personal use or small teams with simple workflows.</p>

                                </div> <!-- End Price -->

                                <!-- Button -->
                                <a href="#" class="pt-btn btn r-04 btn--theme hover--theme">Start 14-day trial</a>
                                <p class="p-sm btn-txt text-center color--grey">7-Day Money Back Guarantee</p>

                            </div> <!-- END TABLE HEADER -->


                            <!-- PRICING FEATURES -->
                            <ul class="pricing-features color--black ico-10 ico--green mt-25">
                                <li>
                                    <p><span class="flaticon-check"></span> Up to 250 projects</p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span> 15 GB of Cloud Storage</p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span> Shared team workspace</p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span> Daily data backup</p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span> No Ads. No trackers</p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span> 12/7 email support</p>
                                </li>
                            </ul>


                        </div>
                    </div> <!-- END BASIC PLAN -->


                    <!-- ADVANCED PLAN -->
                    <div class="col">
                        <div id="pt-1-3" class="p-table pricing-1-table bg--white-100 block-shadow r-12 wow fadeInUp">


                            <!-- TABLE HEADER -->
                            <div class="pricing-table-header">

                                <!-- Title -->
                                <h5 class="s-24">Advanced</h5>

                                <!-- Price -->
                                <div class="price">

                                    <!-- Monthly Price -->
                                    <div class="price2">
                                        <sup class="color--black">$</sup>
                                        <span class="color--black">24.99</span>
                                        <sup class="validity color--grey">&nbsp;/&ensp;mo</sup>
                                    </div>

                                    <!-- Yearly Price -->
                                    <div class="price1">
                                        <sup class="color--black">$</sup>
                                        <span class="color--black">194.99</span>
                                        <sup class="validity color--grey">&nbsp;/&ensp;yr</sup>

                                        <!-- Discount Badge -->
                                        <div class="pricing-discount bg--yellow-400 color--black r-36">
                                            <h6 class="s-17">Save 35%</h6>
                                        </div>

                                    </div>

                                    <!-- Text -->
                                    <p class="color--grey">For growing teams that need more services and flexibility.</p>

                                </div> <!-- End Price -->

                                <!-- Button -->
                                <a href="#" class="pt-btn btn r-04 btn--theme hover--theme">Upgrade your plan</a>
                                <p class="p-sm btn-txt text-center color--grey">7-Day Money Back Guarantee</p>

                            </div> <!-- END TABLE HEADER -->


                            <!-- PRICING FEATURES -->
                            <ul class="pricing-features color--black ico-10 ico--green mt-25">
                                <li>
                                    <p><span class="flaticon-check"></span> Everything in Basic</p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span> Private cloud hosting</p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span> Custom security</p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span> Advanced user permissions</p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span> Multi-team management</p>
                                </li>
                                <li>
                                    <p><span class="flaticon-check"></span> 24/7 Email Support</p>
                                </li>
                            </ul>


                        </div>
                    </div> <!-- END ADVANCED PLAN -->


                </div>
            </div> <!-- PRICING TABLES -->


        </div> <!-- End container -->
    </section> <!-- END PRICING-1 -->




    <!-- BRANDS-1
       ============================================= -->
    <div id="brands-1" class="pb-100 brands-section">
        <div class="container">


            <!-- BRANDS TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="brands-title mb-50">
                        <h5 class="s-17">Trusted and used by over 3,400 companies</h5>
                    </div>
                </div>
            </div>


            <!-- BRANDS CAROUSEL -->
            <div class="row">
                <div class="col text-center">
                    <div class="owl-carousel brands-carousel-6">


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="images/brand-1.png" alt="brand-logo"></a>
                        </div>


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="images/brand-2.png" alt="brand-logo"></a>
                        </div>


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="images/brand-3.png" alt="brand-logo"></a>
                        </div>


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="images/brand-4.png" alt="brand-logo"></a>
                        </div>


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="images/brand-5.png" alt="brand-logo"></a>
                        </div>


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="images/brand-6.png" alt="brand-logo"></a>
                        </div>


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="images/brand-7.png" alt="brand-logo"></a>
                        </div>


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="images/brand-8.png" alt="brand-logo"></a>
                        </div>


                        <!-- BRAND LOGO IMAGE -->
                        <div class="brand-logo">
                            <a href="#"><img class="img-fluid" src="images/brand-9.png" alt="brand-logo"></a>
                        </div>


                    </div>
                </div>
            </div> <!-- END BRANDS CAROUSEL -->


        </div> <!-- End container -->
    </div> <!-- END BRANDS-1 -->




    <!-- DIVIDER LINE -->
    <hr class="divider">




    <!-- PRICING COMPARE
       ============================================= -->
    <section id="comp-table" class="pt-100 pb-60 pricing-section division">
        <div class="container">


            <!-- SECTION TITLE -->
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-9">
                    <div class="section-title mb-70">

                        <!-- Title -->
                        <h2 class="s-52 w-700">Compare Our Plans</h2>

                        <!-- Text -->
                        <p class="p-xl">Complete list of features available in our pricing plans</p>

                    </div>
                </div>
            </div>


            <!-- PRICING COMPARE -->
            <div class="comp-table wow fadeInUp">
                <div class="row">
                    <div class="col">


                        <!-- Table -->
                        <div class="table-responsive mb-50">
                            <table class="table text-center">

                                <thead>
                                    <tr>
                                        <th style="width: 34%;"></th>
                                        <th style="width: 22%;">Starter</th>
                                        <th style="width: 22%;">Basic</th>
                                        <th style="width: 22%;">Premium</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <th scope="row" class="text-start">Available Projects</th>
                                        <td class="color--black">Up to 2</td>
                                        <td class="color--black">Up to 250</td>
                                        <td class="color--black">Unlimited</td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="text-start">Available Storage</th>
                                        <td class="color--black">2Gb</td>
                                        <td class="color--black">50Gb</td>
                                        <td class="color--black">350Gb</td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="text-start">Private Cloud Hosting</th>
                                        <td class="ico-15 disabled-option"><span class="flaticon-cancel"></span></td>
                                        <td class="ico-15 disabled-option"><span class="flaticon-cancel"></span></td>
                                        <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="text-start">User Permissions</th>
                                        <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                        <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                        <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="text-start">Direct Integrations</th>
                                        <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                        <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                        <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="text-start">Reusable Components</th>
                                        <td class="ico-15 disabled-option"><span class="flaticon-cancel"></span></td>
                                        <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                        <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="text-start">Data Backup</th>
                                        <td class="color--black">Weekly</td>
                                        <td class="color--black">Daily</td>
                                        <td class="color--black">Daily</td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="text-start">No Ads. No Trackers</th>
                                        <td class="ico-15 disabled-option"><span class="flaticon-cancel"></span></td>
                                        <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                        <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="text-start">Advanced Security</th>
                                        <td class="ico-15 disabled-option"><span class="flaticon-cancel"></span></td>
                                        <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                        <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="text-start">Shared Team Workspace</th>
                                        <td class="ico-15 disabled-option"><span class="flaticon-cancel"></span></td>
                                        <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                        <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="text-start">Team Management</th>
                                        <td class="ico-15 disabled-option"><span class="flaticon-cancel"></span></td>
                                        <td class="ico-15 disabled-option"><span class="flaticon-cancel"></span></td>
                                        <td class="ico-20 color--theme"><span class="flaticon-check"></span></td>
                                    </tr>

                                    <tr class="table-last-tr">
                                        <th scope="row" class="text-start">Customer Support</th>
                                        <td class="color--black">Limited</td>
                                        <td class="color--black">Basic</td>
                                        <td class="color--black">Priority</td>
                                    </tr>

                                </tbody>

                            </table>
                        </div> <!-- End Table -->

                    </div>
                </div>
            </div> <!-- END PRICING COMPARE -->


            <!-- PRICING COMPARE PAYMENT -->
            <div class="comp-table-payment">
                <div class="row row-cols-1 row-cols-md-3">


                    <!-- Payment Methods -->
                    <div class="col col-lg-5">
                        <div id="pbox-1" class="pbox mb-40 wow fadeInUp">

                            <!-- Title -->
                            <h6 class="s-18 w-700">Accepted Payment Methods</h6>

                            <!-- Payment Icons -->
                            <ul class="payment-icons ico-45 mt-25">
                                <li><img src="images/png_icons/visa.png" alt="payment-icon"></li>
                                <li><img src="images/png_icons/am.png" alt="payment-icon"></li>
                                <li><img src="images/png_icons/discover.png" alt="payment-icon"></li>
                                <li><img src="images/png_icons/paypal.png" alt="payment-icon"></li>
                                <li><img src="images/png_icons/jcb.png" alt="payment-icon"></li>
                                <li><img src="images/png_icons/shopify.png" alt="payment-icon"></li>
                            </ul>

                        </div>
                    </div>


                    <!-- Payment Guarantee -->
                    <div class="col col-lg-4">
                        <div id="pbox-2" class="pbox mb-40 wow fadeInUp">

                            <!-- Title -->
                            <h6 class="s-18 w-700">Money Back Guarantee</h6>

                            <!-- Text -->
                            <p>Explore Martex Premium for 14 days. If it’s not a perfect fit, receive a full refund.</p>

                        </div>
                    </div>


                    <!-- Payment Encrypted -->
                    <div class="col col-lg-3">
                        <div id="pbox-3" class="pbox mb-40 wow fadeInUp">

                            <!-- Title -->
                            <h6 class="s-18 w-700">SSL Encrypted Payment</h6>

                            <!-- Text -->
                            <p>Your information is protected by 256-bit SSL encryption.</p>

                        </div>
                    </div>


                </div>
            </div> <!-- END PRICING COMPARE PAYMENT -->


        </div> <!-- End container -->
    </section> <!-- END PRICING COMPARE -->




<!-- FAQs-2
			============================================= -->
			<section id="faqs-2" class="gr--whitesmoke pb-30 inner-page-hero faqs-section division">				
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-11 col-xl-10">


							<!-- INNER PAGE TITLE -->
							<div class="inner-page-title">
								<h2 class="s-52 w-700">Questions & Answers</h2>
								<p class="p-lg">Some common questions we get about Martex</p>
							</div>


							<!-- QUESTIONS ACCORDION -->
					 		<div class="accordion-wrapper">
								<ul class="accordion">


									<!-- QUESTIONS CATEGORY #1 -->
									<li class="accordion-item is-active">

										
										<!-- CATEGORY HEADER -->
										<div class="accordion-thumb">
											<h4 class="s-28 w-700">Getting Started</h4>
										</div>


										<!-- CATEGORY ANSWERS -->
										<div class="accordion-panel">


											<!-- QUESTION #1 -->
											<div class="accordion-panel-item mb-35">
												
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>1.</span> What is Martex and how does it work?</h5>
												</div>

												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">

													<!-- Text -->
													<p>Sagittis congue augue egestas volutpat egestas magna suscipit 
													   egestas magna ipsum vitae purus congue efficitur and ipsum primis 
													   in cubilia laoreet augue egestas luctus donec and curabitur dapibus
													</p>

												</div>

											</div>	<!-- END QUESTION #1 -->


											<!-- QUESTION #2 -->
											<div class="accordion-panel-item mb-35">
												
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>2.</span> What's inside the package?</h5>
												</div>

												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">

													<!-- Text -->	
										      		<p>Sagittis congue augue egestas volutpat egestas magna suscipit 
										      		   egestas and magna ipsum vitae purus and efficitur ipsum primis in 
										      		   cubilia laoreet tempor gravida congue laoreet turpis neque auctor
													</p>
										        
										      		<!-- Text -->	
													<p>Sapien egestas, congue gestas posuere cubilia congue ipsum mauris 
														undo lectus laoreet and gestas neque vitae auctor eros dolor luctus 
														placerat a magna cursus congue magna impedit ligula congue maecenas
													</p>

												</div>

											</div>	<!-- END QUESTION #2 -->


											<!-- QUESTION #3 -->
											<div class="accordion-panel-item mb-35">
												
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>3.</span> Which languages does Martex support?</h5>
												</div>

												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">

													<!-- Text -->
													<ul class="simple-list">

														<li class="list-item">
															<p>Curabitur ac dapibus libero quisque eu congue tristique 
															   neque. Phasellus blandit tristique justo aliquam quisque 
															   aliquam vitae and molestie sapien nunc justo, aliquet non 
															   molestie purus tempor
															</p>
														</li>

														<li class="list-item">
															<p>Sagittis congue augue egestas volutpat egestas magna suscipit 
															   egestas magna ipsum undo purus vitae efficitur ipsum primis in
															   cubilia laoreet augue donec egestas luctus curabitur dapibus 
															   libero
															</p>
														</li>

													</ul>

												</div>

											</div>	<!-- END QUESTION #3 -->


											<!-- QUESTION #4 -->
											<div class="accordion-panel-item">
												
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>4.</span> Automate testing with API</h5>
												</div>

												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">

													<!-- Text -->
										      		<p>An augue cubilia laoreet and magna suscipit egestas magna ipsum 
										      		   purus ipsum primis and augue ultrice ligula egestas suscipit lectus 
										      		   gestas integer congue a lectus porta phasellus neque blandit tristique
													</p> 

												</div>

											</div>	<!-- END QUESTION #4 -->


										</div>	<!-- END CATEGORY ANSWERS -->


									</li>	<!-- END QUESTIONS CATEGORY #1 -->


									<!-- QUESTIONS CATEGORY #2 -->
									<li class="accordion-item">

										
										<!-- CATEGORY HEADER -->
										<div class="accordion-thumb">
											<h4 class="s-28 w-700">Manage your account</h4>
										</div>


										<!-- CATEGORY ANSWERS -->
										<div class="accordion-panel">


											<!-- QUESTION #1 -->
											<div class="accordion-panel-item mb-35">
												
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>1.</span> Sign up and manage your account</h5>
												</div>

												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">

													<!-- Text -->
													<ol class="digit-list">

														<li class="list-item">
															<p>Curabitur ac dapibus libero eu congue tristique neque</p>
														</li>

														<li class="list-item">
															<p>Sagittis congue augue egestas volutpat egestas</p>
														</li>

														<li class="list-item">
															<p>An aliquam justo suscipit congue augue</p>
														</li>

														<li class="list-item">
															<p>Gestas integer congue a lectus porta</p>
														</li>

													</ol>

												</div>

											</div>	<!-- END QUESTION #1 -->


											<!-- QUESTION #2 -->
											<div class="accordion-panel-item mb-35">
												
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>2.</span> Manage account settings</h5>
												</div>

												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">

													<!-- Text -->
													<p>Sagittis congue augue egestas volutpat egestas magna suscipit egestas 
													   magna ipsum vitae purus congue and efficitur ipsum primis in cubilia 
													   laoreet augue egestas luctus donec and curabitur dapibus
													</p>

												</div>

											</div>	<!-- END QUESTION #2 -->


											<!-- QUESTION #3 -->
											<div class="accordion-panel-item mb-35">
												
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>3.</span> Change language or location settings</h5>
												</div>

												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">

													<!-- Text -->
													<p>Sapien egestas, congue gestas posuere cubilia congue ipsum mauris 
													   lectus laoreet gestas neque pulvinar vitae auctor eros dolor luctus 
													   placerat a magna cursus congue magna nihil mpedit ligula congue. 
													   Maecenas gravida porttitor nunc, quis vehicula magna luctus tempor. 
													   Quisque vel laoreet turpis. Viverra augue augue eget, dictum tempor 
													   diam. Sed pulvinar a consectetur nibh, imperdiet varius viverra
													</p>

												</div>

											</div>	<!-- END QUESTION #3 -->


											<!-- QUESTION #4 -->
											<div class="accordion-panel-item mb-35">
												
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>4.</span> Troubleshoot account issues</h5>
												</div>

												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">
													
													<!-- Text -->
										      		<p>An augue cubilia laoreet and magna suscipit egestas magna ipsum purus 
										      		   ipsum primis and augue ultrice ligula egestas suscipit lectus gestas 
										      		   integer congue a lectus porta phasellus neque blandit tristique
													</p> 

													<!-- Text -->	
										      		<p>Sagittis congue augue egestas volutpat egestas magna suscipit egestas 
										      			and magna ipsum vitae
													</p>

													<!-- Text -->	
										      		<p>Sagittis congue augue egestas volutpat egestas and magna suscipit 
										      		   egestas magna ipsum vitae efficitur purus congue ipsum primis in 
										      		   cubilia laoreet augue egestas luctus donec and curabitur dapibus
													</p>

												</div>

											</div>	<!-- END QUESTION #4 -->


											<!-- QUESTION #5 -->
											<div class="accordion-panel-item">
												
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>5.</span> Manage accessibility settings</h5>
												</div>

												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">

													<!-- Text -->	
													<p>Sapien egestas, congue gestas posuere cubilia congue ipsum mauris 
													   lectus laoreet at gestas neque cubilia vitae auctor eros dolor luctus
													   placerat a magna cursus congue magna nihil mpedit ligula congue. 
													   Maecenas gravida porttitor nunc, quis vehicula magna luctus tempor. 
													   Quisque vel laoreet turpis augue
													</p>

													<!-- Text -->	
										      		<p>Sagittis congue augue egestas volutpat egestas magna suscipit egestas 
										      		   and magna ipsum and vitae purus efficitur ipsum primis in cubilia 
										      		   laoreet tempor gravida sapien cursus congue magna purus quaerat
													</p>
													
												</div>

											</div>	<!-- END QUESTION #5 -->


										</div>	<!-- END CATEGORY ANSWERS -->


									</li>	<!-- END QUESTIONS CATEGORY #2 -->


									<!-- QUESTIONS CATEGORY #3 -->
									<li class="accordion-item">

										
										<!-- CATEGORY HEADER -->
										<div class="accordion-thumb">
											<h4 class="s-28 w-700">Purchase and License</h4>
										</div>


										<!-- CATEGORY ANSWERS -->
										<div class="accordion-panel">


											<!-- QUESTION #1 -->
											<div class="accordion-panel-item mb-35">
												
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>1.</span> How much does Martex cost?</h5>
												</div>

												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">

													<!-- Text -->
										      		<p>An augue cubilia laoreet and magna suscipit egestas magna ipsum 
										      		   purus ipsum primis and augue ultrice ligula egestas suscipit lectus 
										      		   gestas integer congue a lectus porta phasellus neque blandit tristique
													</p>

												</div>

											</div>	<!-- END QUESTION #1 -->


											<!-- QUESTION #2 -->
											<div class="accordion-panel-item mb-35">
												
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>2.</span> Do you offer discounts for annual plans?</h5>
												</div>

												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">
													
													<!-- Text -->	
										      		<p>Sagittis congue augue egestas volutpat egestas magna suscipit egestas 
										      		   and magna ipsum vitae
													</p>

													<!-- Text -->	
										      		<p>Sagittis congue augue egestas volutpat egestas and magna suscipit egestas
										      		   magna ipsum vitae purus congue efficitur ipsum primis in cubilia laoreet
										      		   augue egestas luctus donec and curabitur dapibus
													</p>

												</div>

											</div>	<!-- END QUESTION #2 -->


											<!-- QUESTION #3 -->
											<div class="accordion-panel-item">
												
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>3.</span> I didn't receive the license key after purchased</h5>
												</div>

												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">

													<!-- Text -->
													<ul class="simple-list">

														<li class="list-item">
															<p>Curabitur ac dapibus libero. Quisque eu congue tristique neque
															   phasellus blandit tristique justo aliquam. Aliquam vitae undo
															   molestie nunc. Quisque sapien justo, aliquet non molestie purus 
															   tempor
															</p>
														</li>

														<li class="list-item">
															<p>Sagittis congue augue egestas volutpat egestas magna suscipit 
															   egestas magna ipsum vitae purus undo efficitur ipsum primis in
															   cubilia laoreet augue egestas luctus donec curabitur dapibus libero
															</p>
														</li>

													</ul>

												</div>

											</div>	<!-- END QUESTION #3 -->


											<!-- QUESTION #4 -->
											<div class="accordion-panel-item">
												
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>4.</span> I can't activate Martex</h5>
												</div>

												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">
													
													<!-- Text -->
													<p>Sapien egestas, congue gestas posuere cubilia congue ipsum mauris lectus
													   laoreet gestas neque pulvinar vitae auctor eros dolor luctus placerat a 
													   magna cursus congue magna nihil mpedit ligula congue. Maecenas gravida
													   porttitor nunc, quis vehicula magna luctus tempor. Quisque vel laoreet
													   turpis. Viverra augue augue eget, dictum tempor diam. Sed pulvinar a
													   consectetur nibh, imperdiet varius viverra
													</p>

													<!-- Text -->	
										      		<p>Sagittis congue augue egestas volutpat egestas magna suscipit egestas 
										      			and magna ipsum vitae purus and efficitur ipsum primis in cubilia laoreet
										      			tempor gravida
													</p>

												</div>

											</div>	<!-- END QUESTION #4 -->


											<!-- QUESTION #5 -->
											<div class="accordion-panel-item">
												
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>5.</span> How to request a refund?</h5>
												</div>

												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">

													<!-- Text -->
													<ul class="simple-list">

														<li class="list-item">
															<p>Curabitur ac dapibus libero. Quisque eu congue tristique</p>
														</li>

														<li class="list-item">
															<p>Congue tristique neque phasellus blandit tristique justo undo 
															   aliquam aliquam vitae molestie quisque sapien justo, aliquet non
															   molestie purus tempor
															</p>
														</li>

														<li class="list-item">
															<p>Sagittis congue augue egestas volutpat egestas magna suscipit 
															   egestas magna ipsum
															</p>
														</li>

													</ul>

												</div>

											</div>	<!-- END QUESTION #5 -->


										</div>	<!-- END CATEGORY ANSWERS -->


									</li>	<!-- END QUESTIONS CATEGORY #3 -->


									<!-- QUESTIONS CATEGORY #4 -->
									<li class="accordion-item">


										<!-- CATEGORY HEADER -->
										<div class="accordion-thumb">
											<h4 class="s-28 w-700">Policy, Safety & Copyright</h4>
										</div>


										<!-- CATEGORY ANSWERS -->
										<div class="accordion-panel">


											<!-- QUESTION #1 -->
											<div class="accordion-panel-item mb-35">
												
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>1.</span> Copyright and rights management</h5>
												</div>

												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">

													<!-- Text -->
													<p>Sapien egestas, congue gestas posuere cubilia congue ipsum mauris 
													   lectus laoreet gestas neque pulvinar vitae auctor eros dolor luctus 
													   placerat a magna cursus congue magna nihil mpedit ligula congue. 
													   Maecenas gravida porttitor nunc, quis vehicula magna luctus tempor. 
													   Quisque vel laoreet turpis. Viverra augue augue eget, dictum tempor 
													   diam. Sed pulvinar a consectetur nibh, imperdiet varius viverra
													</p>

												</div>

											</div>	<!-- END QUESTION #1 -->


											<!-- QUESTION #2 -->
											<div class="accordion-panel-item mb-35">
												
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>2.</span> Manage privacy settings</h5>
												</div>

												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">

													<!-- Text -->	
													<p>Sagittis congue augue egestas volutpat egestas magna suscipit egestas 
													   magna ipsum vitae purus congue efficitur ipsum and primis undo cubilia 
													   a laoreet augue egestas luctus donec and curabitur dapibus
													</p>

													<!-- Text -->
													<ol class="digit-list">

														<li class="list-item">
															<p>Gestas integer congue a lectus porta</p>
														</li>

														<li class="list-item">
															<p>An aliquam justo suscipit congue augue</p>
														</li>

														<li class="list-item">
															<p>Sagittis congue augue egestas volutpat egestas</p>
														</li>

													</ol>

												</div>

											</div>	<!-- END QUESTION #2 -->


											<!-- QUESTION #3 -->
											<div class="accordion-panel-item mb-35">
												
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>3.</span> Change your subscription privacy settings</h5>
												</div>

												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">

													<!-- Text -->	
													<p>Sapien egestas, congue gestas posuere cubilia congue ipsum mauris 
													   lectus laoreet and gestas neque vitae auctor eros dolor luctus placerat 
													   a magna cursus congue magna nihil mpedit ligula congue maecenas undo 
													   gravida porttitor nunc, quis vehicula magna luctus tempor. Quisque 
													   vel laoreet turpis augue
													</p>

													<!-- Text -->
													<ul class="simple-list">

														<li class="list-item">
															<p>Congue tristique neque phasellus blandit tristique justo 
															   undo aliquam aliquam vitae molestie quisque and sapien justo, 
															   aliquet non molestie purus tempor
															</p>
														</li>

														<li class="list-item">
															<p>Sagittis congue augue egestas volutpat egestas magna suscipit 
															   egestas magna ipsum
															</p>
														</li>

													</ul>

												</div>

											</div>	<!-- END QUESTION #3 -->


											<!-- QUESTION #4 -->
											<div class="accordion-panel-item">
												
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>4.</span> Protecting your identity</h5>
												</div>

												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">

													<!-- Text -->
													<p>Sapien egestas, congue gestas posuere cubilia congue ipsum mauris 
													   lectus laoreet gestas neque pulvinar vitae auctor eros dolor luctus 
													   placerat a magna cursus congue magna nihil mpedit ligula congue. 
													   Maecenas gravida porttitor nunc, quis vehicula magna luctus tempor. 
													   Quisque vel laoreet turpis. Viverra augue augue eget, dictum tempor 
													   diam. Sed pulvinar a consectetur nibh, imperdiet varius viverra
													</p>

													<!-- Text -->	
										      		<p>Sagittis congue augue egestas volutpat egestas magna suscipit egestas 
										      		   and magna ipsum vitae purus and efficitur ipsum primis in cubilia 
										      		   laoreet tempor gravida
													</p>

												</div>

											</div>	<!-- END QUESTION #4 -->


										</div>	<!-- END CATEGORY ANSWERS -->


									</li>	<!-- END QUESTIONS CATEGORY #4 -->


									<!-- QUESTIONS CATEGORY #5 -->
									<li class="accordion-item acc-last-item">

										
										<!-- CATEGORY HEADER -->
										<div class="accordion-thumb">
											<h4 class="s-28 w-700">Other Questions</h4>
										</div>


										<!-- CATEGORY ANSWERS -->
										<div class="accordion-panel">


											<!-- QUESTION #1 -->
											<div class="accordion-panel-item mb-35">
												
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>1.</span> How do I get the error log?</h5>
												</div>

												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">
													
													<!-- Text -->	
										      		<p>Sagittis congue augue egestas volutpat egestas magna suscipit egestas 
										      			and magna ipsum vitae
													</p>

													<!-- Text -->	
										      		<p>Sagittis congue augue egestas volutpat egestas and magna suscipit 
										      		   egestas and magna ipsum vitae purus congue efficitur ipsum primis 
										      		   in cubilia laoreet augue egestas luctus donec and curabitur dapibus
													</p>

												</div>

											</div>	<!-- END QUESTION #1 -->


											<!-- QUESTION #2 -->
											<div class="accordion-panel-item mb-35">
												
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>2.</span> I forgot my folder password, what should I do?</h5>
												</div>

												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">
													
													<!-- Text -->	
													<p>Sagittis congue augue egestas volutpat egestas magna suscipit egestas 
														magna ipsum vitae purus congue efficitur ipsum and primis in cubilia 
														laoreet augue egestas luctus donec and curabitur dapibus
													</p>

													<!-- Text -->
													<ol class="digit-list">

														<li class="list-item">
															<p>Gestas integer congue a lectus porta</p>
														</li>

														<li class="list-item">
															<p>An aliquam justo suscipit congue augue</p>
														</li>

														<li class="list-item">
															<p>Sagittis congue augue egestas volutpat egestas</p>
														</li>

													</ol>

												</div>

											</div>	<!-- END QUESTION #2 -->


											<!-- QUESTION #3 -->
											<div class="accordion-panel-item mb-35">
												
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>3.</span> Limitations of folder password protection</h5>
												</div>

												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">

													<!-- Text -->
													<p>Sapien egestas, congue gestas posuere cubilia congue ipsum mauris 
													   lectus laoreet gestas neque pulvinar vitae auctor eros dolor luctus 
													   placerat a magna cursus congue magna nihil mpedit ligula congue. 
													   Maecenas gravida porttitor nunc, quis vehicula magna luctus tempor. 
													   Quisque vel laoreet turpis. Viverra augue augue eget, dictum tempor 
													   diam. Sed pulvinar a consectetur nibh, imperdiet varius viverra
													</p>

												</div>

											</div>	<!-- END QUESTION #3 -->


											<!-- QUESTION #4 -->
											<div class="accordion-panel-item mb-35">
												
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>4.</span> Import existing library</h5>
												</div>

												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">
													
													<!-- Text -->	
													<p>Sapien egestas, congue gestas posuere cubilia congue an ipsum mauris 
													   lectus laoreet gestas neque vitae auctor eros dolor luctus placerat a 
													   magna cursus congue magna nihil mpedit ligula congue gravida tempor 
													   porttitor nunc, quis vehicula magna luctus tempor. Quisque vel laoreet 
													   turpis augue
													</p>

													<!-- Text -->	
										      		<p>Sagittis congue augue egestas volutpat egestas magna suscipit egestas
										      		   and magna ipsum vitae purus and efficitur ipsum primis in cubilia laoreet
										      		   tempor gravida
													</p>

												</div>

											</div>	<!-- END QUESTION #4 -->


											<!-- QUESTION #5 -->
											<div class="accordion-panel-item">
												
												<!-- Question -->	
												<div class="faqs-2-question">
													<h5 class="s-22 w-700"><span>5.</span> I lost my license. Can you send it to me?</h5>
												</div>

												<!-- Answer -->	
												<div class="faqs-2-answer color--grey">
													
													<!-- Text -->
										      		<p>An augue cubilia laoreet and magna suscipit egestas magna ipsum purus 
										      		   ipsum primis augue ultrice ligula egestas suscipit lectus gestas integer
										      		   congue a lectus porta phasellus neque blandit tristique
													</p> 

													<!-- Text -->	
										      		<p>Sagittis congue augue egestas volutpat egestas magna suscipit egestas 
										      		   and magna ipsum vitae
													</p>

												</div>

											</div>	<!-- END QUESTION #5 -->


										</div>	<!-- END CATEGORY ANSWERS -->


									</li>	<!-- END QUESTIONS CATEGORY #5 -->


								</ul>
							</div>	<!-- END QUESTIONS ACCORDION -->


							<!-- MORE QUESTIONS LINK -->	
							<div class="more-questions">
								<div class="more-questions-txt bg--white-400 r-100">
									<p class="p-lg">Have any questions? <a href="contacts.html" class="color--theme">Get in Touch</a></p>
								</div>
							</div>


						</div>	
					</div>    <!-- End row -->	
				</div>	   <!-- End container -->	
			</section>	<!-- END FAQs-2 -->	




    <!-- BANNER-1
       ============================================= -->
    <section id="banner-1" class="pt-100 banner-section">
        <div class="container">


            <!-- BANNER-1 WRAPPER -->
            <div class="banner-1-wrapper r-16">
                <div class="banner-overlay bg--05 bg--fixed">
                    <div class="row">


                        <!-- BANNER-1 TEXT -->
                        <div class="col">
                            <div class="banner-1-txt color--white">

                                <!-- Title -->
                                <h2 class="s-45 w-700">Give it a try, it's free!</h2>

                                <!-- Text -->
                                <p class="p-xl">It only takes a few clicks to get started</p>

                                <!-- Button -->
                                <a href="signup-1.html" class="btn r-04 btn--theme hover--tra-white">Get srarted - it's
                                    free
                                </a>

                                <!-- Button Text -->
                                <p class="p-sm btn-txt ico-15 o-85">
                                    <span class="flaticon-check"></span> Free for 14 days, no credit card required.
                                </p>

                            </div>
                        </div> <!-- END BANNER-1 TEXT -->


                    </div> <!-- End row -->
                </div> <!-- End banner overlay -->
            </div> <!-- END BANNER-1 WRAPPER -->


        </div> <!-- End container -->
    </section> <!-- END BANNER-1 -->
@endsection
