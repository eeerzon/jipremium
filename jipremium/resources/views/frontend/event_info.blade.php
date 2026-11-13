@extends('layout.layout_front_new')
@section('content')
    <!-- start section 1 jumbotron desktop -->
        <div class="site-section p-5 text-center bg-image rounded-3 d-none d-lg-block" style="background-image: url('images/img-banner.png'); height:300px;">
        </div>
    <!-- end section 1 jumbotron desktop -->

    <!-- start section 1 jumbotron mobile -->
        <div class="d-block d-lg-none">
            <img src="images/img-banner.png" style="max-width: 100%; height: 200px;" alt="">
        </div>
    <!-- end section 1 jumbotron mobile -->

    <!-- start section 2 desktop -->
        <div class="site-section p-5 text-center bg-image rounded-3 d-none d-lg-block" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">{{ __('event_info.about') }}</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <div class="row">
                        <div class="col-4">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">{{ __('event_info.dates') }}</h4><br>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">{{ __('event_info.event_date') }}</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">{{ __('event_info.venue') }}</h4><br>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">JICC Hall A&B, Jakarta, Indonesia</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">{{ __('event_info.exhibit_items') }}</h4><br>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">{{ __('event_info.exhibit_data') }}</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">{{ __('event_info.expected_scale') }}</h4><br>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">300 Exhibitors, 400 Booths</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">{{ __('event_info.previous_result') }}</h4><br>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">443 Exhibitors, 484 Booths (2025) <br> 324 Exhibitors, 413 Booths (2024)</h4>
                            </div>
                        </div>
                    </div>
                    @if(app()->getLocale() == 'en')
                    <hr style="border-top: 1px solid black; margin-top: 4rem; margin-bottom: 3rem;">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">Indonesia is currently one of the most successful emerging economies in  the world with stable growth in GDP with more than 275 million residents. Especially, consumer goods is one of the main industries that is growing rapidly in Indonesia.<br><br> To target this emerging market in Indonesia and connect local and international exhibitors with domestic and overseas buyers, Coex has launched the 1st Jakarta International Premium Products Fair (JIPREMIUM) successfully in 2018.
                                    Coex has a strong background in sales promotion and living supplies industry.<br><br> For example, COEX has been organizing one of the biggest sourcing fair on houseware, cosmetics, and sales promotion items in  South Korea called “Sourcing in Market” for about 35 years. Moreover, Coex has been expanding its business overseas since 2009 by successfully launching Vietnam International Premium Products Fair (VIPREMIUM). <br><br>Our premium products fair has now become a brand and we are continuously trying to strengthen our position in the ASEAN market. We strongly believe that Jakarta International Premium Products Fair (JIPREMIUM), will provide an optimal business opportunity for both local and international companies.</h4>
                            </div>
                        </div>
                    </div>
                    @else
                    @endif
                </div>
            </div>
        </div>
    <!-- end section 2 desktop -->

    <!-- start section 2 mobile -->
        <div class="site-section p-5 text-center bg-image rounded-3 d-block d-lg-none" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">{{ __('event_info.about') }}</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <div class="row">
                        <div class="col-6">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.2rem">{{ __('event_info.dates') }}</h4><br>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.2rem">{{ __('event_info.event_date') }}</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.2rem">{{ __('event_info.venue') }}</h4><br>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.2rem">JICC Hall A&B, Jakarta, Indonesia</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.2rem">{{ __('event_info.exhibit_items') }}</h4><br>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.2rem">{{ __('event_info.exhibit_data') }}</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.2rem">{{ __('event_info.expected_scale') }}</h4><br>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.2rem">300 Exhibitors, 400 Booths</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.2rem">{{ __('event_info.previous_result') }}</h4><br>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.2rem">443 Exhibitors, 484 Booths (2025) <br> 324 Exhibitors, 413 Booths (2024)</h4>
                            </div>
                        </div>
                    </div>
                    @if(app()->getLocale() == 'en')
                        <hr style="border-top: 1px solid black; margin-top: 4rem; margin-bottom: 3rem;">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-black" style="text-align: left;">
                                    <h4 style="font-size: 1.4rem">Indonesia is currently one of the most successful emerging economies in  the world with stable growth in GDP with more than 275 million residents. Especially, consumer goods is one of the main industries that is growing rapidly in Indonesia.<br><br> To target this emerging market in Indonesia and connect local and international exhibitors with domestic and overseas buyers, Coex has launched the 1st Jakarta International Premium Products Fair (JIPREMIUM) successfully in 2018.
                                        Coex has a strong background in sales promotion and living supplies industry.<br><br> For example, COEX has been organizing one of the biggest sourcing fair on houseware, cosmetics, and sales promotion items in  South Korea called “Sourcing in Market” for about 35 years. Moreover, Coex has been expanding its business overseas since 2009 by successfully launching Vietnam International Premium Products Fair (VIPREMIUM). <br><br>Our premium products fair has now become a brand and we are continuously trying to strengthen our position in the ASEAN market. We strongly believe that Jakarta International Premium Products Fair (JIPREMIUM), will provide an optimal business opportunity for both local and international companies.</h4>
                                </div>
                            </div>
                        </div>
                    @else
                    @endif
                </div>
            </div>
        </div>
    <!-- end section 2 mobile -->

    @if(app()->getLocale() == 'en')
        <!-- start section 3 desktop -->
        <div class="site-section p-5 text-center bg-image rounded-3 d-none d-lg-block" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">Why Indonesia</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-black" style="text-align: left;">
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    <li style="font-size: 1.4rem; margin-bottom: 20px;">
                                        Indonesia's domestic market provides excellent opportunities for consumer goods SMEs to develop export routes into the ASEAN region.
                                    </li>
                                    <li style="font-size: 1.4rem; margin-bottom: 20px;">
                                        Indonesia is the world's 4th most populous country (275 million as of 2022) with a median age of just 29 years, which provides vast potential for the consumer goods industry.
                                    </li>
                                    <li style="font-size: 1.4rem; margin-bottom: 20px;">
                                        Indonesia is the largest economy in Southeast Asia (accounting for 40% of ASEAN's GDP) and is steadily growing into a major international market through growing exports.
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end section 3 desktop -->

        <!-- start section 3 mobile -->
        <div class="site-section p-5 text-center bg-image rounded-3 d-block d-lg-none" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">Why Indonesia</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-black" style="text-align: left;">
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    <li style="font-size: 1.4rem; margin-bottom: 20px;">
                                        Indonesia's domestic market provides excellent opportunities for consumer goods SMEs to develop export routes into the ASEAN region.
                                    </li>
                                    <li style="font-size: 1.4rem; margin-bottom: 20px;">
                                        Indonesia is the world's 4th most populous country (275 million as of 2022) with a median age of just 29 years, which provides vast potential for the consumer goods industry.
                                    </li>
                                    <li style="font-size: 1.4rem; margin-bottom: 20px;">
                                        Indonesia is the largest economy in Southeast Asia (accounting for 40% of ASEAN's GDP) and is steadily growing into a major international market through growing exports.
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end section 3 mobile -->
    @else
    @endif

    @if(app()->getLocale() == 'en')
        <!-- start section 4 desktop -->
        <div class="site-section p-5 text-center bg-image rounded-3 d-none d-lg-block" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">Why JIPREMIUM</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-black" style="text-align: left;">
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    <li style="font-size: 1.4rem; margin-bottom: 20px;">
                                        JIPREMIUM is the only exhibition for premium consumer goods in Indonesia and provides opportunities to meet with local buyers and buyers throughout Southeast Asia, such as Vietnam and Thailand.
                                    </li>
                                    <li style="font-size: 1.4rem; margin-bottom: 20px;">
                                        Organizers of JIPREMIUM have proven expertise in successfully organizing and hosting consumer goods exhibitions in Seoul (Seoul International Sourcing Fair, 35 times) and Vietnam (Vietnam International Premium Products Fair, 6 times).
                                    </li>
                                    <li style="font-size: 1.4rem; margin-bottom: 20px;">
                                        Well-established buyers are recruited by KITA, KOTRA and the Indonesian Chamber of Commerce and Industry (KADIN).
                                    </li>
                                    <li style="font-size: 1.4rem; margin-bottom: 20px;">
                                        Featured programs such as 1:1 Biz matching program, Influencer and social media marketing, Photo and live studio, provide efficient marketing effects.
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end section 4 desktop -->

        <!-- start section 4 mobile -->
        <div class="site-section p-5 text-center bg-image rounded-3 d-block d-lg-none" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">Why JIPREMIUM</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-black" style="text-align: left;">
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    <li style="font-size: 1.4rem; margin-bottom: 20px;">
                                        JIPREMIUM is the only exhibition for premium consumer goods in Indonesia and provides opportunities to meet with local buyers and buyers throughout Southeast Asia, such as Vietnam and Thailand.
                                    </li>
                                    <li style="font-size: 1.4rem; margin-bottom: 20px;">
                                        Organizers of JIPREMIUM have proven expertise in successfully organizing and hosting consumer goods exhibitions in Seoul (Seoul International Sourcing Fair, 35 times) and Vietnam (Vietnam International Premium Products Fair, 6 times).
                                    </li>
                                    <li style="font-size: 1.4rem; margin-bottom: 20px;">
                                        Well-established buyers are recruited by KITA, KOTRA and the Indonesian Chamber of Commerce and Industry (KADIN).
                                    </li>
                                    <li style="font-size: 1.4rem; margin-bottom: 20px;">
                                        Featured programs such as 1:1 Biz matching program, Influencer and social media marketing, Photo and live studio, provide efficient marketing effects.
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end section 4 mobile -->
    @else
        <!-- start section 4 desktop -->
            <div class="text-center bg-image p-5 rounded-3 d-none d-lg-block" style="background-color: white;">
                <div class="d-flex justify-content-left align-items-left h-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-8">
                                <div class="text-black" style="text-align: left;">
                                    <h4 style="font-size: 2.4rem">Mengapa JIPREMIUM</h4>
                                </div>
                            </div>
                        </div>
                        <hr style="border-top: 1px solid black">
                        <div class="row">
                            <div class="col-12">
                                <ul style="text-align: left;">
                                    <li><h4 style="font-size: 1.4rem">JIPREMIUM adalah pameran B2B + B2C untuk barang konsumsi premium di Indonesia yang menyediakan peluang tidak hanya bertemu dengan pembeli lokal, namun pembeli dari negara ASEAN seperti Vietnam dan Thailand serta pengunjung umum yang memiliki daya beli.</h4><br></li>
                                    <li><h4 style="font-size: 1.4rem">Penyelenggara JIPREMIUM telah berhasil menyelenggarakan pameran barang konsumsi di Seoul (35 Event untuk Seoul International Sourching Fair) dan Vietnam (6 Event Vietnam International Premium Products Fair). </h4><br></li>
                                    <li><h4 style="font-size: 1.4rem">Mengadakan acara untuk pengunjung seperti make-up show, fashion show, dan cooking show</h4><br></li>
                                    <li><h4 style="font-size: 1.4rem">Pembeli terpercaya yang diundang oleh Kamar Dagang dan Industri (KADIN).</h4></li>
                                    <li><h4 style="font-size: 1.4rem">Program unggulan lainnya seperti 1:1 Biz matching program, Influencer dan social media marketing, Photo dan live studio, untuk menyediakan pemasaran yang efektif</h4></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center bg-image p-5 rounded-3 d-none d-lg-block" style="background-color: white;">
                <div class="d-flex justify-content-left align-items-left h-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-8">
                                <div class="text-black" style="text-align: left;">
                                    <h4 style="font-size: 2.4rem">Pesan Booth Anda</h4>
                                </div>
                            </div>
                        </div>
                        <hr style="border-top: 1px solid black">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-black" style="text-align: left;">
                                    <h4 style="font-size: 1.4rem">Untuk pemesanan Booth, dapat menghubungi jipremium@wwtp.com (Local organizer / PT. Aremgo Grafindo</h4><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="text-center bg-image p-5 rounded-3 d-none d-lg-block" style="background-color: white;">
                <div class="d-flex justify-content-left align-items-left h-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-8">
                                <div class="text-black" style="text-align: left;">
                                    <h4 style="font-size: 2.4rem">Tanggal Penting</h4>
                                </div>
                            </div>
                        </div>
                        <hr style="border-top: 1px solid black">
                        <div class="row" style="background-color:black; color:white;">
                            <div class="col-4">
                                <h5>Batas Pendaftaran</h5>
                                <hr style="border-top: 1px solid white">
                                <div class="row">
                                    <div class="col-6">
                                        <h5>Early Bird</h5>
                                    </div>
                                    <div class="col-6">
                                        <h5>General</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <h5 style="margin-top: 25px;">Final Payment</h5>
                            </div>
                            <div class="col-4">
                                <h5 style="margin-top: 25px;">Show Opening</h5>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-6">
                                        <h5>28 April 2023</h5>
                                    </div>
                                    <div class="col-6">
                                        <h5>28 July 2023</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <h5>28 July 2023</h5>
                            </div>
                            <div class="col-4">
                                <h5>{{ __('event_info.event_date') }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="text-center bg-image p-5 rounded-3 d-none d-lg-block" style="background-color: white;">
                <div class="d-flex justify-content-left align-items-left h-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-8">
                                <div class="text-black" style="text-align: left;">
                                    <h4 style="font-size: 2.4rem">Pedoman Konstruksi Booth</h4>
                                </div>
                            </div>
                        </div>
                        <hr style="border-top: 1px solid black">
                        <div class="row">
                            <div class="col-12">
                                <ul style="text-align: left;">
                                    <li><h4 style="font-size: 1.4rem">Peserta pameran harus menyerahkan rencana tata letak konstruksi dan mendapatkan persetujuan dari sekretariat JIPREMIUM sebelum memulai pembangunan booth.</h4><br></li>
                                    <li><h4 style="font-size: 1.4rem">Permohonan utilitas terpisah harus diserahkan jika menggunakan listrik selain dari 2 lampu fluorescent per Booth. Form Aplikasi akan tersedia di [Exhibitor Forms and Manuals] </h4><br></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- end section 4 desktop -->

        <!-- start section 4 mobile -->
            <div class="text-center bg-image p-5 rounded-3 d-block d-lg-none" style="background-color: white;">
                <div class="d-flex justify-content-left align-items-left h-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-8">
                                <div class="text-black" style="text-align: left;">
                                    <h4 style="font-size: 2.4rem">Mengapa JIPREMIUM</h4>
                                </div>
                            </div>
                        </div>
                        <hr style="border-top: 1px solid black">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-black" style="text-align: left;">
                                    <ul>
                                        <li><h4 style="font-size: 1.4rem">JIPREMIUM adalah pameran B2B + B2C untuk barang konsumsi premium di Indonesia yang menyediakan peluang tidak hanya bertemu dengan pembeli lokal, namun pembeli dari negara ASEAN seperti Vietnam dan Thailand serta pengunjung umum yang memiliki daya beli.</h4><br></li>
                                        <li><h4 style="font-size: 1.4rem">Penyelenggara JIPREMIUM telah berhasil menyelenggarakan pameran barang konsumsi di Seoul (35 Event untuk Seoul International Sourching Fair) dan Vietnam (6 Event Vietnam International Premium Products Fair). </h4><br></li>
                                        <li><h4 style="font-size: 1.4rem">Mengadakan acara untuk pengunjung seperti make-up show, fashion show, dan cooking show</h4><br></li>
                                        <li><h4 style="font-size: 1.4rem">Pembeli terpercaya yang diundang oleh Kamar Dagang dan Industri (KADIN).</h4></li>
                                        <li><h4 style="font-size: 1.4rem">Program unggulan lainnya seperti 1:1 Biz matching program, Influencer dan social media marketing, Photo dan live studio, untuk menyediakan pemasaran yang efektif</h4></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center bg-image p-5 rounded-3 d-block d-lg-none" style="background-color: white;">
                <div class="d-flex justify-content-left align-items-left h-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-8">
                                <div class="text-black" style="text-align: left;">
                                    <h4 style="font-size: 2.4rem">Pesan Booth Anda</h4>
                                </div>
                            </div>
                        </div>
                        <hr style="border-top: 1px solid black">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-black" style="text-align: left;">
                                    <h4 style="font-size: 1.4rem">Untuk pemesanan Booth, dapat menghubungi jipremium@wwtp.com (Local organizer / PT. Aremgo Grafindo</h4><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="text-center bg-image p-5 rounded-3 d-block d-lg-none" style="background-color: white;">
                <div class="d-flex justify-content-left align-items-left h-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-black" style="text-align: left;">
                                    <h4 style="font-size: 2.4rem">Tanggal Penting</h4>
                                </div>
                            </div>
                        </div>
                        <hr style="border-top: 1px solid black">
                        <div class="row">
                            <div class="col-12" style="background-color:black; color:white;">
                                <h5>Batas Pendaftaran</h5>
                                <hr style="border-top: 1px solid white">
                                <div class="row">
                                    <div class="col-6">
                                        <h5>Early Bird</h5>
                                    </div>
                                    <div class="col-6">
                                        <h5>General</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-6">
                                        <h5>28 April 2023</h5>
                                    </div>
                                    <div class="col-6">
                                        <h5>28 July 2023</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" style="background-color:black; color:white;">
                                <h5 style="margin-top: 15px;">Final Payment</h5>
                            </div>
                            <div class="col-12" style="margin-top: 10px;">
                                <h5>28 July 2023</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" style="background-color:black; color:white;">
                                <h5 style="margin-top: 25px;">Show Opening</h5>
                            </div>
                            <div class="col-12" style="margin-top: 10px;">
                                <h5>{{ __('event_info.event_date') }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="text-center bg-image p-5 rounded-3 d-block d-lg-none" style="background-color: white;">
                <div class="d-flex justify-content-left align-items-left h-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-8">
                                <div class="text-black" style="text-align: left;">
                                    <h4 style="font-size: 2.4rem">Pedoman Konstruksi Booth</h4>
                                </div>
                            </div>
                        </div>
                        <hr style="border-top: 1px solid black">
                        <div class="row">
                            <div class="col-12">
                                <ul style="text-align: left;">
                                    <li><h4 style="font-size: 1.4rem">Peserta pameran harus menyerahkan rencana tata letak konstruksi dan mendapatkan persetujuan dari sekretariat JIPREMIUM sebelum memulai pembangunan booth.</h4><br></li>
                                    <li><h4 style="font-size: 1.4rem">Permohonan utilitas terpisah harus diserahkan jika menggunakan listrik selain dari 2 lampu fluorescent per Booth. Form Aplikasi akan tersedia di [Exhibitor Forms and Manuals] </h4><br></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- end section 4 mobile -->
    @endif
@endsection
