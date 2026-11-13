@extends('layout.layout_front_id')
@section('content')
    <!-- start section 1 desktop -->
        <div class="container d-none d-lg-block">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <img src="https://jipremium.com/images/visit.jpg" alt="Image" style="margin-bottom:10px; margin-top:100px;" class="img-fluid">
                </div>
            </div>
        </div>
    <!-- end section 1 -->

    <!-- start section 1 mobile -->
        <div class="d-block d-lg-none">        
            <img src="https://jipremium.com/images/visit.jpg" alt="Image" style="margin-bottom:10px; margin-top:100px;" class="img-fluid">
        </div>
    <!-- end section 1 -->
    
        <!-- start section 2 desktop -->
        <div class="site-section p-5 text-center bg-image rounded-3 d-none d-lg-block" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">Pendaftaran</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <div class="row">
                        <div class="col-5">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem"><b>Tanggal</b></h4><br>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">5 - 8 September, 2024</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem"><b>Lokasi</b></h4><br>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">JCC Hall A&B, Jakarta, Indonesia</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row text-black" style="text-align: left;">
                        <div class="col-5">
                            <h4 style="font-size: 1.4rem"><b>Jam Operasional</b></h4><br>
                        </div>
                        <div class="col-7">
                            <h4 style="font-size: 1.4rem">[5-7 September] 10am – 6pm <br> [8 September] 10am – 5pm <br> Penerimaan terakhir 30 menit sebelum penutupan</h4><br>
                        </div>
                    </div>
                    <div class="row text-black" style="text-align: left;">
                        <div class="col-5">
                            <h4 style="font-size: 1.4rem"><b>Pendaftaran Online</b></h4><br>
                        </div>
                        <div class="col-7">
                            <h4 style="font-size: 1.4rem">Seluruh pembeli dan pengunjung JIPREMIUM dapat
                                menerima tiket masuk gratis dengan mendaftar
                                secara online. Pendaftar online akan mendapatkan
                                tanda masuk setelah konfirmasi ID di meja
                                pendaftaran.
                                </h4><br>
                        </div>
                    </div>
                    <!-- <div class="row text-black" style="text-align: left;">
                        <div class="col-5">
                            <h4 style="font-size: 1.4rem"><b>Pendaftaran di Tempat</b></h4><br>
                        </div>
                        <div class="col-7">
                            <h4 style="font-size: 1.4rem">Pengunjung dapat mendaftar di tempat selama hari pameran. Pengunjung dapat mengisi formulir pendaftaran seluler untuk menerima lencana masuk mereka.
                            Meja pendaftaran terletak di lobi JCC Hall A.</h4><br>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-dark" style="width: 300px;" onclick="alertBuyer()">Pendaftaran Pembeli</button>
                    <button type="submit" class="btn btn-dark" style="width: 300px;" onclick="alertVisitor()">Pendaftaran Pengunjung</button>
                    <script>
                        function alertVisitor() {
                            alert("Pendaftaran Pengunjung akan segera dibuka");
                        }

                        function alertBuyer() {
                            alert("Pendaftaran Pembeli akan segera dibuka");
                        }
                    </script>
                    {{-- <button type="submit" class="btn btn-dark" style="width: 300px;">Pendaftaran Pembeli</button>
                    <button type="submit" class="btn btn-dark" style="width: 300px;">Pendaftaran Pengunjung</button> --}} -->
                </div>
            </div>
        </div>

        <div class="site-section text-left bg-image rounded-3 d-none d-lg-block" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row d-none d-lg-block">
                        <div class="col-sm-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">Pendaftaran Online</h4>
                                <h5 style="font-size: 1.3rem">Semua pengunjung JIPREMIUM dapat menerima akses gratis dengan mendaftar secara online.</h5>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    {{-- <button type="submit" class="btn btn-dark" style="width: 260px;" onclick="alertVisitor()">PENDAFTARAN PENGUNJUNG</button>
                    <button type="submit" class="btn btn-dark" style="width: 260px;" onclick="alertBuyer()">PENDAFTARAN PEMBELI</button> --}}
                    <a href="{{ route('visitor_online.create') }}" class="btn btn-dark" style="width: 260px;">Pendaftaran Pengunjung</a>
                    <a href="{{ route('buyer_online.create') }}" class="btn btn-dark" style="width: 260px;">Pendaftaran Pembeli</a>
                    
                    <script>
                        function alertVisitor() {
                            alert("Pendaftaran Pengunjung akan segera dibuka");
                        }

                        function alertBuyer() {
                            alert("Pendaftaran Pembeli akan segera dibuka");
                        }
                    </script>
                </div>
            </div>
        </div>

        <div class="site-section p-5 text-left bg-image rounded-3 d-none d-lg-block" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row d-none d-lg-block">
                        <div class="col-sm-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">Pendaftaran di Tempat</h4>
                                <h5 style="font-size: 1.3rem">Pengunjung dapat mendaftar di tempat selama hari pameran. Pengunjung dapat mengisi formulir pendaftaran seluler untuk menerima lencana masuk mereka.
                            Meja pendaftaran terletak di lobi JCC Hall A.</h5>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <!-- <a href="{{ route('visitor_online.create') }}" class="btn btn-dark" style="width: 260px;">Pendaftaran Pengunjung</a>
                    <a href="{{ route('buyer_online.create') }}" class="btn btn-dark" style="width: 260px;">Pendaftaran Pembeli</a> -->
                    <a href="#" onclick="alertVisitorOnsite()" class="btn btn-dark" style="width: 260px;">Pendaftaran Pengunjung</a>
                    <a href="#" onclick="alertBuyerOnsite()" class="btn btn-dark" style="width: 260px;">Pendaftaran Pembeli</a>
                    <script>
                        function alertVisitorOnsite() {
                            alert("Pendaftaran Pengunjung akan segera dibuka");
                        }

                        function alertBuyerOnsite() {
                            alert("Pendaftaran Pembeli akan segera dibuka");
                        }
                    </script>
                </div>
            </div>
        </div>
        <!-- end section 2 desktop -->

        <!-- start section 2 mobile -->
        <div class="site-section text-center bg-image rounded-3 d-block d-lg-none" style="background-color: white; padding: 0rem;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-black" style="text-align: left; margin-top: 50px;">
                                <h4 style="font-size: 2.4rem; font-weight: 900;">Pendaftaran</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <div class="row">
                        <div class="col-5">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.2rem"><b>Tanggal</b></h4><br>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.2rem">5 - 8 September, 2024</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.2rem"><b>Lokasi</b></h4><br>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.2rem">JCC Hall A&B, Jakarta, Indonesia</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row text-black" style="text-align: left;">
                        <div class="col-5">
                            <h4 style="font-size: 1.2rem"><b>Jam Operasional</b></h4><br>
                        </div>
                        <div class="col-7">
                            <h4 style="font-size: 1.2rem">[5-7 September] 10am – 6pm <br> [8 September] 10am – 5pm <br> Penerimaan terakhir 30 menit sebelum penutupan</h4><br>
                        </div>
                    </div>
                    <div class="row text-black" style="text-align: left;">
                        <div class="col-5">
                            <h4 style="font-size: 1.2rem"><b>Pendaftaran Online</b></h4><br>
                        </div>
                        <div class="col-7">
                            <h4 style="font-size: 1.2rem">Seluruh pembeli dan pengunjung JIPREMIUM dapat
                                menerima tiket masuk gratis dengan mendaftar
                                secara online. Pendaftar online akan mendapatkan
                                tanda masuk setelah konfirmasi ID di meja
                                pendaftaran.
                                </h4><br>
                        </div>
                    </div>
                    <div class="row text-black" style="text-align: left;">
                        <div class="col-5">
                            <h4 style="font-size: 0.9rem"><b>Pendaftaran di Tempat</b></h4><br>
                        </div>
                        <div class="col-7">
                            <h4 style="font-size: 1.2rem">Pengunjung dapat mendaftar di tempat selama hari pameran. Pengunjung dapat mengisi formulir pendaftaran seluler untuk menerima lencana masuk mereka.
                            Meja pendaftaran terletak di lobi JCC Hall A.</h4><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- end section 2 mobile -->
    <div class="text-left bg-image rounded-3 d-block d-lg-none" style="background-color: white;">
        <div class="d-flex justify-content-left align-items-left h-100">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="text-black" style="text-align: left; margin-top: 50px;">
                            <h4 style="font-size: 1.2rem">Pendaftaran Online</h4>
                            <h5 style="font-size: 0.6rem; color: #e6595f;">Seluruh pembeli dan pengunjung JIPREMIUM dapat
                                menerima tiket masuk gratis dengan mendaftar
                                secara online. Pendaftar online akan mendapatkan
                                tanda masuk setelah konfirmasi ID di meja
                                pendaftaran.</h5>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 1px solid black">
                <a href="{{ route('visitor_online.create') }}" class="btn btn-dark" style="width: 260px; margin-left: 50px; margin-bottom: 10px;">Pendaftaran Pengunjung</a>
                <a href="{{ route('buyer_online.create') }}" class="btn btn-dark" style="width: 260px; margin-left: 50px; margin-bottom: 10px;">Pendaftaran Pembeli</a>
            </div>
        </div>
    </div>
    
    <div class="text-left bg-image rounded-3 d-block d-lg-none" style="background-color: white;  margin-bottom: 25px;">
        <div class="d-flex justify-content-left align-items-left h-100">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="text-black" style="text-align: left; margin-top: 50px;">
                            <h4 style="font-size: 1.2rem">Pendaftaran di Tempat</h4>
                            <h5 style="font-size: 0.6rem; color: #e6595f;">Pengunjung dapat mendaftar di tempat selama hari pameran. Pengunjung dapat mengisi formulir pendaftaran seluler untuk menerima lencana masuk mereka.
                            Meja pendaftaran terletak di lobi JCC Hall A.</h5>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 1px solid black">
                <a href="#"class="btn btn-dark" style="width: 260px; margin-left: 50px; margin-bottom: 10px;" onclick="alertVisitor()">Pendaftaran Pengunjung</a>
                <a href="#" class="btn btn-dark" style="width: 260px; margin-left: 50px; margin-bottom: 10px;" onclick="alertBuyer()">Pendaftaran Pembeli</a>
                
                <script>
                    function alertVisitor() {
                        alert("Pendaftaran Pengunjung akan segera dibuka");
                    }

                    function alertBuyer() {
                        alert("Pendaftaran Pembeli akan segera dibuka");
                    }
                </script>
            </div>
        </div>
    </div>
@endsection
