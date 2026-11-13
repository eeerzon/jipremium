@extends('layout.layout_front_id')
@section('content')

    <!-- start section 1 jumbotron desktop -->
        <div class="site-section p-5 text-center bg-image rounded-3 d-none d-lg-block" style="background-image: url('/images/img-banner.png'); height:300px;">
        </div>
    <!-- end section 1 jumbotron desktop -->

    <!-- start section 1 jumbotron mobile -->
        <div class="d-block d-lg-none">
            <img src="/images/img-banner.png" style="max-width: 100%; height: 200px;" alt="">
        </div>
    <!-- end section 1 jumbotron mobile -->

    <!-- start section 2 desktop -->
        <div class="site-section p-5 text-center bg-image rounded-3 d-none d-lg-block" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">Tentang Jakarta International Premium Products Fair</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <div class="row">
                        <div class="col-4">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">Tanggal</h4><br>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">5 - 8 September, 2024</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">Lokasi</h4><br>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">JCC Hall A&B, Jakarta, Indonesia</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">Produk Pameran</h4><br>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">Kecantikan, Furnitur atau Interior Desain, Makanan
                                    & Minuman, Kesehatan, Produk Ibu & Bayi, Smart IT</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">Skala Ekspektasi</h4><br>
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
                                <h4 style="font-size: 1.4rem">Hasil Sebelumnya</h4><br>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">353 Exhibitors, 477 Booths (2023) <br> 206 Exhibitors, 214 Booths (2022)</h4>
                            </div>
                        </div>
                    </div>
                    <!-- <hr style="border-top: 1px solid black; margin-top: 4rem; margin-bottom: 3rem;"> -->
                    {{-- <div class="row">
                        <div class="col-12">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">Indonesia saat ini adalah salah satu negara berkembang yang paling sukses di dunia dengan pertumbuhan PDB yang stabil dengan lebih dari 275 juta penduduk. Terutama, barang-barang konsumen adalah salah satu industri utama yang berkembang pesat di Indonesia.<br><br> Untuk menargetkan pasar yang sedang berkembang ini di Indonesia dan menghubungkan peserta pameran lokal dan internasional dengan pembeli domestik dan luar negeri, Coex telah meluncurkan 1st Jakarta International Premium Pameran Produk (JIPREMIUM) sukses di tahun 2018.
                                    Coex memiliki latar belakang yang kuat dalam promosi penjualan dan industri perlengkapan hidup.<br><br> Seperti contoh, COEX telah menyelenggarakan salah satu pameran sumber daya terbesar untuk peralatan rumah tangga, kosmetik, dan barang promosi penjualan di Korea Selatan yang disebut "Pameran Sumber Internasional Seoul (SIPREMIUM)" selama sekitar 35 tahun. Selain itu, Coex telah memperluas bisnisnya ke luar negeri sejak 2009 dengan sukses meluncurkan Vietnam International Premium Products Fair (VIPREMIUM). <br><br>Pameran produk premium kami kini telah menjadi merek dan kami terus berusaha memperkuat posisi kami di pasar ASEAN. Kami sangat percaya bahwa Pameran Produk Premium Internasional Jakarta (JIPREMIUM), akan memberikan peluang bisnis yang optimal bagi perusahaan lokal dan internasional.</h4>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    <!-- end section 2 desktop -->

    <!-- start section 2 mobile -->
        <div class="site-section text-center bg-image rounded-3 d-block d-lg-none" style="background-color: white; padding: 0;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-black" style="text-align: left; margin-top: 50px;">
                                <h4 style="font-size: 1.2rem; font-weight: 900;">Tentang Jakarta International Premium Products Fair</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black; margin-top: 0rem;">
                    <div class="row">
                        <div class="col-6">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1rem; font-weight: 900;">Tanggal</h4><br>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 0.67rem">5 - 8 September, 2024</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1rem; font-weight: 900;">Lokasi</h4><br>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 0.67rem">JCC Hall A&B, Jakarta, Indonesia</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1rem; font-weight: 900;">Produk Pameran</h4><br>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 0.67rem">Kecantikan, Furnitur atau Interior Desain, Makanan
                                    & Minuman, Kesehatan, Produk Ibu & Bayi, Smart IT</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1rem; font-weight: 900;">Skala Ekspektasi</h4><br>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 0.67rem">300 Exhibitors, 400 Booths</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1rem; font-weight: 900;">Hasil Sebelumnya</h4><br>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 0.67rem">353 Exhibitors, 477 Booths (2023) <br> 206 Exhibitors, 214 Booths (2022)</h4>
                            </div>
                        </div>
                    </div>
                    <!-- <hr style="border-top: 1px solid black; margin-top: 4rem;"> -->
                    {{-- <div class="row">
                        <div class="col-12">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">Indonesia saat ini adalah salah satu negara berkembang yang paling sukses di dunia dengan pertumbuhan PDB yang stabil dengan lebih dari 275 juta penduduk. Terutama, barang-barang konsumen adalah salah satu industri utama yang berkembang pesat di Indonesia.<br><br> Untuk menargetkan pasar yang sedang berkembang ini di Indonesia dan menghubungkan peserta pameran lokal dan internasional dengan pembeli domestik dan luar negeri, Coex telah meluncurkan 1st Jakarta International Premium Pameran Produk (JIPREMIUM) sukses di tahun 2018.
                                    Coex memiliki latar belakang yang kuat dalam promosi penjualan dan industri perlengkapan hidup.<br><br> Seperti contoh, COEX telah menyelenggarakan salah satu pameran sumber daya terbesar untuk peralatan rumah tangga, kosmetik, dan barang promosi penjualan di Korea Selatan yang disebut "Pameran Sumber Internasional Seoul (SIPREMIUM)" selama sekitar 35 tahun. Selain itu, Coex telah memperluas bisnisnya ke luar negeri sejak 2009 dengan sukses meluncurkan Vietnam International Premium Products Fair (VIPREMIUM). <br><br>Pameran produk premium kami kini telah menjadi merek dan kami terus berusaha memperkuat posisi kami di pasar ASEAN. Kami sangat percaya bahwa Pameran Produk Premium Internasional Jakarta (JIPREMIUM), akan memberikan peluang bisnis yang optimal bagi perusahaan lokal dan internasional.</h4>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    <!-- end section 2 mobile -->

    <!-- start section 3 desktop -->
    {{-- <div class="text-center bg-image rounded-3 d-none d-lg-block" style="background-color: white;">
        <div class="d-flex justify-content-left align-items-left h-100">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <div class="text-black" style="text-align: left;">
                            <h4 style="font-size: 2.4rem">Mengapa Indonesia</h4>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 1px solid black">
                <div class="row">
                    <div class="col-12">
                        <div class="text-black" style="text-align: left;">
                            <h4 style="font-size: 1.4rem">1. Pasar domestik Indonesia memberikan peluang yang sangat baik bagi UKM barang konsumsi untuk mengembangkan jalur ekspor ke kawasan ASEAN.</h4><br>
                            <h4 style="font-size: 1.4rem">2. Indonesia adalah negara terpadat ke-4 di dunia (275 juta pada tahun 2022) dengan usia rata-rata hanya 29 tahun, yang memberikan potensi besar bagi industri barang konsumsi. </h4><br>
                            <h4 style="font-size: 1.4rem">3. Indonesia adalah ekonomi terbesar di Asia Tenggara (menyumbang 40% dari PDB ASEAN) dan terus berkembang menjadi pasar internasional utama melalui pertumbuhan ekspor.</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- end section 3 desktop -->

    <!-- start section 3 mobile -->
        {{-- <div class="site-section p-5 text-center bg-image rounded-3 d-block d-lg-none" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">Mengapa Indonesia</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">1. Pasar domestik Indonesia memberikan peluang yang sangat baik bagi UKM barang konsumsi untuk mengembangkan jalur ekspor ke kawasan ASEAN.</h4><br>
                                <h4 style="font-size: 1.4rem">2. Indonesia adalah negara terpadat ke-4 di dunia (275 juta pada tahun 2022) dengan usia rata-rata hanya 29 tahun, yang memberikan potensi besar bagi industri barang konsumsi. </h4><br>
                                <h4 style="font-size: 1.4rem">3. Indonesia adalah ekonomi terbesar di Asia Tenggara (menyumbang 40% dari PDB ASEAN) dan terus berkembang menjadi pasar internasional utama melalui pertumbuhan ekspor.</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    <!-- end section 3 mobile -->

    <!-- start section 4 desktop -->
        <div class="text-center bg-image rounded-3 d-none d-lg-block" style="background-color: white;">
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
        <div class="text-center bg-image rounded-3 d-none d-lg-block" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <div class="text-black" style="text-align: left; margin-top: 50px;">
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
        {{-- <div class="text-center bg-image rounded-3 d-none d-lg-block" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <div class="text-black" style="text-align: left; margin-top: 50px;">
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
                            <h5>14-17 September, 2023</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="text-center bg-image rounded-3 d-none d-lg-block" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <div class="text-black" style="text-align: left; margin-top: 50px;">
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
    <div class="site-section text-center bg-image rounded-3 d-block d-lg-none" style="background-color: white; padding: 0rem;">
        <div class="d-flex justify-content-left align-items-left h-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="text-black" style="text-align: left; margin-top: 50px;">
                            <h4 style="font-size: 1.2rem; font-weight: 900;">Mengapa JIPREMIUM</h4>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 1px solid black">
                <div class="row">
                    <div class="col-12">
                        <div class="text-black" style="text-align: left;">
                            <ul>
                                <li><h4 style="font-size: 0.75rem">JIPREMIUM adalah pameran B2B + B2C untuk barang konsumsi premium di Indonesia yang menyediakan peluang tidak hanya bertemu dengan pembeli lokal, namun pembeli dari negara ASEAN seperti Vietnam dan Thailand serta pengunjung umum yang memiliki daya beli.</h4><br></li>
                                <li><h4 style="font-size: 0.75rem">Penyelenggara JIPREMIUM telah berhasil menyelenggarakan pameran barang konsumsi di Seoul (35 Event untuk Seoul International Sourching Fair) dan Vietnam (6 Event Vietnam International Premium Products Fair). </h4><br></li>
                                <li><h4 style="font-size: 0.75rem">Mengadakan acara untuk pengunjung seperti make-up show, fashion show, dan cooking show</h4><br></li>
                                <li><h4 style="font-size: 0.75rem">Pembeli terpercaya yang diundang oleh Kamar Dagang dan Industri (KADIN).</h4></li>
                                <li><h4 style="font-size: 0.75rem">Program unggulan lainnya seperti 1:1 Biz matching program, Influencer dan social media marketing, Photo dan live studio, untuk menyediakan pemasaran yang efektif</h4></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- mobile -->
    <div class="site-section text-center bg-image rounded-3 d-block d-lg-none" style="background-color: white; padding: 0rem;">
        <div class="d-flex justify-content-left align-items-left h-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="text-black" style="text-align: left; margin-top: 50px">
                            <h4 style="font-size: 1.2rem; font-weight: 900;">Pesan Booth Anda</h4>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 1px solid black">
                <div class="row">
                    <div class="col-12">
                        <div class="text-black" style="text-align: left;">
                            <h4 style="font-size: 0.75rem">Untuk pemesanan Booth, dapat menghubungi jipremium@wwtp.com (Local organizer / PT. Aremgo Grafindo</h4><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="site-section text-center bg-image rounded-3 d-block d-lg-none" style="background-color: white; padding: 0.1rem;">
        <div class="d-flex justify-content-left align-items-left h-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="text-black" style="text-align: left;">
                            <h4 style="font-size: 1.2rem; font-weight: 900;">Tanggal Penting</h4>
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
                        <h5>14-17 September, 2023</h5>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- mobile -->
    <div class="site-section text-center bg-image rounded-3 d-block d-lg-none" style="background-color: white; padding: 0rem;">
        <div class="d-flex justify-content-left align-items-left h-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="text-black" style="text-align: left; margin-top: 50px;">
                            <h4 style="font-size: 1.2rem">Pedoman Konstruksi Booth</h4>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 1px solid black">
                <div class="row">
                    <div class="col-12">
                        <ul style="text-align: left;">
                            <li><h4 style="font-size: 0.75rem">Peserta pameran harus menyerahkan rencana tata letak konstruksi dan mendapatkan persetujuan dari sekretariat JIPREMIUM sebelum memulai pembangunan booth.</h4><br></li>
                            <li><h4 style="font-size: 0.75rem">Permohonan utilitas terpisah harus diserahkan jika menggunakan listrik selain dari 2 lampu fluorescent per Booth. Form Aplikasi akan tersedia di [Exhibitor Forms and Manuals] </h4><br></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section 4 mobile -->
@endsection
