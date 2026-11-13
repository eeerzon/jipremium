@extends('layout.layout_front_new')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .gallery-carousel .item {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .gallery-carousel .item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .gallery-carousel .owl-nav {
            position: absolute;
            top: 50%;
            width: 100%;
            transform: translateY(-50%);
        }

        .gallery-carousel .owl-nav button.owl-prev,
        .gallery-carousel .owl-nav button.owl-next {
            position: absolute;
            width: 40px;
            height: 40px;
            background-color: #000 !important;
            color: #fff !important;
            font-size: 24px;
            line-height: 40px;
            text-align: center;
        }

        .gallery-carousel .owl-nav button.owl-prev {
            left: 0px;
            bottom: -10px;
        }

        .gallery-carousel .owl-nav button.owl-next {
            right: 0px;
            bottom: -10px;
        }

        .gallery-carousel .owl-nav button span {
            display: block;
        }

        .border-pink{
            border: 4px solid #ef7d7d;
            border-radius: 40px;
            height: 16rem;
        }

        .border-none{
            border: 0px;
        }

        .border-pink {
            border: 4px solid #ef7d7d;
            border-radius: 50px;
            width: 85%;
            height: 100%;
        }

        .text-pink {
            color:  #E45C71;
        }

        .text-yellow {
            color: #F28705;
            font-size: 2rem;
        }

        .card-category{
            font-weight: bold;
        }

        .custom-img {
            width: 100%;
        }

        .display-5 {
            font-size: 2rem;
        }

        .mb-25{
            margin-bottom: 30px;
        }

        .card-text {
            font-size: 1rem;
            margin-left: 25px;
        }

        .card-events{
            padding: 10px 0px 0px 0px;
        }

        .modal-dialog {
            max-width: 800px;
            width: 90%;
        }

        .modal-content{
            border-radius: 2.3rem;
            border: 5px solid black;
        }

        .modal-body{
            padding: 2rem;
        }

        .modal-image-container {
            width: 100%;
            height: 0;
            padding-bottom: 75%;
            position: relative;
            overflow: hidden;
        }

        .modal-image-container img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-wrapper {
            position: relative;
            width: 100%;
            padding-top: 100%;
            overflow: hidden;
        }

        .image-wrapper img {
            position: absolute;
            top: 50%;
            left: 50%;
            width: auto;
            height: 100%;
            transform: translate(-50%, -50%);
        }

        .square-image {
            width: 100%;
            height: 0;
            padding-bottom: 100%;
            position: relative;
            overflow: hidden;
        }

        .square-image img {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: auto;
            transform: translate(-50%, -50%);
            object-fit: cover;
        }

        .fixed-size-image {
            width: 255px;
            height: 382px;
            overflow: hidden;
            position: relative;
        }

        .fixed-size-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card-img-top {
            width: 100%;
            height: 0;
            padding-bottom: 100%;
            position: relative;
            overflow: hidden;
        }

        .card-img-top img {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            transform: translate(-50%, -50%);
            object-fit: cover;
        }

        .gallery-row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -5px;
            margin-left: -5px;
            margin-bottom: 5px;
        }

        .gallery-col {
            padding-right: 5px;
            padding-left: 5px;
            margin-bottom: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: auto;
        }

        .gallery-col img {
            width: 100%;
            height: auto;
            max-height: 160px;
            object-fit: cover;
        }

        .gallery-col-2 {
            padding-right: 5px;
            padding-left: 5px;
            margin-bottom: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: auto;
        }

        .gallery-col-2 img {
            width: 100%;
            height: auto;
            max-height: 170px;
            object-fit: cover;
        }

        .col-md-3 {
            flex: 0 0 25%;
            max-width: 25%;
        }

        .col-md-5 {
            flex: 0 0 41.666667%;
            max-width: 41.666667%;
        }

        .col-md-4 {
            flex: 0 0 33.333333%;
            max-width: 33.333333%;
        }

        @media (max-width: 767px) {
            .display-4 {
                font-size: 1.8rem;
            }

            .display-5 {
                font-size: 1rem;
            }

            .custom-img {
                width: 121%;
            }

            .image-wrapper {
                width: 600px;
                height: 600px;
            }

            .square-image {
                max-width: 240px;
            }

            h4 {
                font-size: 1.2rem;
            }

            h5 {
                font-size: 1rem;
            }
        }
    </style>
    <div class="site-section rounded-3" style="background-color: #FDEEDC; padding: 15px; margin-top: 50px;">
        <div class="container">
            <div class="row align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-7 col-sm-12">
                    <!-- desktop -->
                    <div class="row d-none d-lg-block" style="margin-left: 40px;">
                        <div style="text-align: left;">
                            <h1 class="display-4 font-weight-bold d-none d-md-block text-pink">INDONESIA MOM&KIDS, BABY WELLNESS FAIR</h1>
                            <h1 class="font-weight-bold d-block d-md-none text-pink" style="font-size: 1.5rem;">INDONESIA MOM&KIDS, BABY WELLNESS FAIR</h1>
                        </div>
                    </div>

                    <!-- mobile -->
                    <div class="row d-block d-lg-none">
                        <div style="text-align: left; margin-left: 10px;">
                            <h1 class="display-4 font-weight-bold d-none d-md-block text-pink">INDONESIA MOM&KIDS, BABY WELLNESS FAIR</h1>
                            <h1 class="font-weight-bold d-block d-md-none text-pink" style="font-size: 1.5rem;">INDONESIA MOM&KIDS, BABY WELLNESS FAIR</h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12 mb-4 mb-md-0">
                    <img src="{{ asset('images/imkids-logo.png') }}" alt="banner-momkids" class="img-fluid custom-img">
                </div>
            </div>
        </div>
    </div>

    <div class="site-section p-5 text-left bg-image rounded-3" style="padding: 1rem !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 col-sm-12"><!-- desktop -->
                    <div class="row d-none d-lg-block" style="margin-left: 40px;">
                        <div class="text-black text-left">
                            <h4 class="display-5 font-weight-bold text-pink">GLOW&GROW!</h4>
                            <h4 class="font-weight-bold text-pink">{{ __('welcome.concurrent_show_desc') }}</h4>
                        </div>
                    </div>

                    <!-- mobile -->
                    <div class="row d-block d-lg-none">
                        <div class="text-black text-left">
                            <h4 class="display-5 font-weight-bold text-pink">GLOW&GROW!</h4>
                            <h4 class="font-weight-bold text-pink">{{ __('welcome.concurrent_show_desc') }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-10 col-md-12 col-sm-12">
                    <!-- desktop -->
                    <div class="row d-none d-lg-block" style="margin-left: 40px;">
                    
                        <div class="text-black font-weight-bold text-left">
                            <h4>{{ __('family.family_desc') }}</h4>
                        </div>
                        
                    </div>

                    <!-- mobile -->
                    <div class="row d-block d-lg-none">
                    
                        <div class="text-black font-weight-bold text-left">
                            <h4>{{ __('family.family_desc') }}</h4>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-8 col-md-10 col-sm-12">
                    <!-- desktop -->
                    <div class="row d-none d-lg-block" style="margin-left: 40px;">
                    
                        <div class="text-black text-left d-flex align-items-center">
                            <img src="{{ asset('images/mom_kids_logo.png') }}" alt="" class="mr-3" style="width: 10%;">
                            <h4 class="font-weight-bold text-yellow">{{ __('family.show_overview') }}</h4>
                        </div>
                        
                    </div>

                    <!-- mobile -->
                    <div class="row d-block d-lg-none">
                    
                        <div class="text-black text-left d-flex align-items-center">
                            <img src="{{ asset('images/mom_kids_logo.png') }}" alt="" class="mr-3" style="width: 10%;">
                            <h4 class="font-weight-bold text-yellow">{{ __('family.show_overview') }}</h4>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-10 col-md-12 col-sm-12">
                    <!-- desktop -->
                    <div class="row d-none d-lg-block" style="margin-left: 40px;">
                    
                        <div class="text-black text-left">
                            <h4 class="mb-25"><b>Exhibition:</b> Indonesia Mom & Kids, Baby Wellness Fair (IMKIDS)</h4>
                            <h4 class="mb-25"><b>{{ __('family.show_1') }}</b> {{ __('family.show_desc_1') }}</h4>
                            <h4 class="mb-25"><b>{{ __('family.show_2') }}</b> {{ __('family.show_desc_2') }}</h4>
                            <h4 class="mb-25"><b>{{ __('family.show_3') }}</b> Coex</h4>
                            <h4 class="mb-25"><b>{{ __('family.show_4') }}</b> Worldwide Trade Promotion</h4>
                        </div>
                        
                    </div>

                    <!-- mobile -->
                    <div class="row d-block d-lg-none">
                    
                        <div class="text-black text-left">
                            <h4 class="mb-25"><b>Exhibition:</b> Indonesia Mom & Kids, Baby Wellness Fair (IMKIDS)</h4>
                            <h4 class="mb-25"><b>{{ __('family.show_1') }}</b> {{ __('family.show_desc_1') }}</h4>
                            <h4 class="mb-25"><b>{{ __('family.show_2') }}</b> {{ __('family.show_desc_2') }}</h4>
                            <h4 class="mb-25"><b>{{ __('family.show_3') }}</b> Coex</h4>
                            <h4 class="mb-25"><b>{{ __('family.show_4') }}</b> Worldwide Trade Promotion</h4>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="padding: 2rem !important;">
        <div class="row mb-4">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <!-- desktop -->
                <div class="row d-none d-lg-block" style="margin-left: 40px;">
                    
                    <div class="text-black text-left d-flex align-items-center">
                        <img src="{{ asset('images/mom_kids_logo.png') }}" alt="" class="mr-3" style="width: 10%;">
                        <h4 class="font-weight-bold text-yellow">{{ __('family.exibit_item') }}</h4>
                    </div>
                        
                </div>

                <!-- mobile -->
                <div class="row d-block d-lg-none">
                    
                    <div class="text-black text-left d-flex align-items-center">
                        <img src="{{ asset('images/mom_kids_logo.png') }}" alt="" class="mr-3" style="width: 10%;">
                        <h4 class="font-weight-bold text-yellow">{{ __('family.exibit_item') }}</h4>
                    </div>
                        
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                
                <div class="card border-pink">
                    <div class="card-body">
                        <div class="text-black d-flex align-items-center">
                            <img src="{{ asset('images/baby-face-icon.png') }}" alt="" style="width: 20%; margin: 5px 20px 20px 20px;">
                            <h4 class="card-title card-category">{{ __('family.produk_1') }}</h4>
                        </div>
                        <h5 class="card-text">
                            <br>{{ __('family.produk_1_desc_1') }}<br><br>
                            {{ __('family.produk_1_desc_2') }}<br><br>
                            {{ __('family.produk_1_desc_3') }}<br><br>
                            {{ __('family.produk_1_desc_4') }}<br><br>
                            {{ __('family.produk_1_desc_5') }}<br><br>
                            {{ __('family.produk_1_desc_6') }}
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    
                <div class="card border-pink">
                    <div class="card-body">
                        <div class="text-black d-flex align-items-center">
                            <img src="{{ asset('images/toy-alphabet-blocks-icon.png') }}" alt="" style="width: 20%; margin: 5px 20px 20px 20px;">
                            <h4 class="card-title card-category">{{ __('family.produk_2') }}</h4>
                        </div>
                        <h5 class="card-text">
                            <br>{{ __('family.produk_2_desc_1') }}<br><br>
                            {{ __('family.produk_2_desc_2') }}<br><br>
                            {{ __('family.produk_2_desc_3') }}<br><br>
                            {{ __('family.produk_2_desc_4') }}<br><br>
                            {{ __('family.produk_2_desc_5') }}
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    
                <div class="card border-pink">
                    <div class="card-body">
                        <div class="text-black d-flex align-items-center">
                            <img src="{{ asset('images/mirror-icon.png') }}" alt="" style="width: 10%; margin: 5px 20px 20px 20px;">
                            <h4 class="card-title card-category">{{ __('family.produk_3') }}</h4>
                        </div>
                        <h5 class="card-text">
                            <br>{{ __('family.produk_3_desc_1') }}<br><br>
                            {{ __('family.produk_3_desc_2') }}<br><br>
                            {{ __('family.produk_3_desc_3') }}<br><br>
                            {{ __('family.produk_3_desc_3') }}<br><br>
                            {{ __('family.produk_3_desc_4') }}<br><br>
                            {{ __('family.produk_3_desc_5') }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="row mb-4">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <!-- desktop -->
                <div class="row d-none d-lg-block" style="margin-left: 40px;">
                    
                    <div class="text-black d-flex align-items-center">
                        <img src="{{ asset('images/mom_kids_logo.png') }}" alt="" class="mr-3" style="width: 10%;">
                        <h4 class="font-weight-bold text-yellow">{{ __('family.event') }}</h4>
                    </div>
                    
                </div>

                <!-- mobile -->
                <div class="row d-block d-lg-none">
                    
                    <div class="text-black d-flex align-items-center">
                        <img src="{{ asset('images/mom_kids_logo.png') }}" alt="" class="mr-3" style="width: 10%;">
                        <h4 class="font-weight-bold text-yellow">{{ __('family.event') }}</h4>
                    </div>
                        
                </div>
            </div>
        </div>

        <div class="row justify-content-center" style="margin-left: 20px;">
                    
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="card border-0" data-toggle="modal" data-target="#imageModal" data-image="{{ asset('images/artcontest.jpg') }}">
                    <div class="card-img-top fixed-size-image">
                        <img src="{{ asset('images/artcontest.jpg') }}" alt="Card image cap" class="img-fluid">
                    </div>
                    <div class="card-body card-events">
                        <h5 class="card-title font-weight-bold">{{ __('family.event_desc_1') }}</h5>
                        <i class="fa fa-calendar"></i> <span class="card-date">2024.09.05</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="card border-0" data-toggle="modal" data-target="#imageModal" data-image="{{ asset('images/parenting.jpg') }}">
                    <div class="card-img-top fixed-size-image">
                        <img src="{{ asset('images/parenting.jpg') }}" alt="Card image cap" class="img-fluid">
                    </div>
                    <div class="card-body card-events">
                        <h5 class="card-title font-weight-bold">Parenting Workshop</h5>
                        <i class="fa fa-calendar"></i> <span class="card-date">2024.09.05</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="card border-0" data-toggle="modal" data-target="#imageModal" data-image="{{ asset('images/photobooth.jpg') }}">
                    <div class="card-img-top fixed-size-image">
                        <img src="{{ asset('images/photobooth.jpg') }}" alt="Card image cap" class="img-fluid">
                    </div>
                    <div class="card-body card-events">
                        <h5 class="card-title font-weight-bold">{{ __('family.event_desc_2') }}</h5>
                        <i class="fa fa-calendar"></i> <span class="card-date">2024.09.05</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="card border-0" data-toggle="modal" data-target="#imageModal" data-image="{{ asset('images/storytime.jpg') }}">
                    <div class="card-img-top fixed-size-image">
                        <img src="{{ asset('images/storytime.jpg') }}" alt="Card image cap" class="img-fluid">
                    </div>
                    <div class="card-body card-events">
                        <h5 class="card-title font-weight-bold">{{ __('family.event_desc_3') }}</h5>
                        <i class="fa fa-calendar"></i> <span class="card-date">2024.09.05</span>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="row mb-4">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <!-- desktop -->
                <div class="row d-none d-lg-block" style="margin-left: 40px;">
                    
                    <div class="text-black d-flex align-items-center">
                        <img src="{{ asset('images/mom_kids_logo.png') }}" alt="" class="mr-3" style="width: 10%;">
                        <h4 class="font-weight-bold text-yellow">{{ __('family.event_desc_4') }}</h4>
                    </div>
                    
                </div>

                <!-- mobile -->
                <div class="row d-block d-lg-none">
                    
                    <div class="text-black d-flex align-items-center">
                        <img src="{{ asset('images/mom_kids_logo.png') }}" alt="" class="mr-3" style="width: 10%;">
                        <h4 class="font-weight-bold text-yellow">{{ __('family.event_desc_4') }}</h4>
                    </div>
                    
                </div>
            </div>
        </div>
        <br>
        <div class="owl-carousel owl-theme gallery-carousel" style="margin-left: 20px;">
            <div class="item">
                <img src="{{ asset('images/gallery/HEN_7536.jpg') }}" alt="Gallery Image 1">
                <img src="{{ asset('images/gallery/HEN_6211.jpg') }}" alt="Gallery Image 2">
            </div>
            <div class="item">
                <img src="{{ asset('images/gallery/HEN_6116.jpg') }}" alt="Gallery Image 3">
                <img src="{{ asset('images/gallery/DSC01340.jpg') }}" alt="Gallery Image 4">
            </div>
            <div class="item">
                <img src="{{ asset('images/gallery/DSC0714.jpg') }}" alt="Gallery Image 5">
                <img src="{{ asset('images/gallery/DSC07157.jpg') }}" alt="Gallery Image 6">
            </div>
            <div class="item">
                <img src="{{ asset('images/gallery/DSC07221.jpg') }}" alt="Gallery Image 7">
                <img src="{{ asset('images/gallery/DSC07244.jpg') }}" alt="Gallery Image 8">
            </div>
            <div class="item">
                <img src="{{ asset('images/gallery/DSC07300.jpg') }}" alt="Gallery Image 9">
                <img src="{{ asset('images/gallery/FRRS0585.jpg') }}" alt="Gallery Image 10">
            </div>
            <div class="item">
                <img src="{{ asset('images/gallery/FRRS0577.jpg') }}" alt="Gallery Image 11">
                <img src="{{ asset('images/gallery/HEN_6082.jpg') }}" alt="Gallery Image 12">
            </div>
            <div class="item">
                <img src="{{ asset('images/gallery/HEN_6083.jpg') }}" alt="Gallery Image 13">
                <img src="{{ asset('images/gallery/HEN_6115.jpg') }}" alt="Gallery Image 14">
            </div>
            {{-- <div class="item">
                <img src="{{ asset('images/gallery/HEN_7534.jpg') }}" alt="Gallery Image 15">
            </div> --}}
        </div>
        <br>
    </div>
    <br>

    <!-- start modal -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-image-container">
                            <img id="modal-image" src="" alt="Card image" class="img-fluid">
                        </div>
                        <h5 id="modal-title" class="font-weight-bold mt-3"></h5>
                        <p><i class="fa fa-calendar" style="color: grey"></i> <span id="modal-date" style="color:grey; font-weight: 700;"></span></p>
                        <p id="modal-description" class="mt-3" style="color:black">To Be Updated</p>
                    </div>
                </div>
            </div>
        </div>
    <!-- end modal-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        var $j = jQuery.noConflict();
        $j(document).ready(function() {
            $j('.gallery-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                navText: [
                    '<i class="fas fa-chevron-left"></i>',
                    '<i class="fas fa-chevron-right"></i>'
                ],
                responsive:{
                    0:{
                        items: 1
                    },
                    768:{
                        items: 3
                    }
                }
            });

            $j('#imageModal').on('show.bs.modal', function (event) {
                var button = $j(event.relatedTarget);
                var imageUrl = button.data('image');
                var title = button.find('.card-title').text();
                var date = button.find('.card-date').text();
                var modal = $j(this);
                modal.find('#modal-image').attr('src', imageUrl);
                modal.find('#modal-title').text(title);
                modal.find('#modal-date').text(date);
            });
        });
    </script>
@endsection
