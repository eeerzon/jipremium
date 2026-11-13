@extends('layout.layout_front_new')
@section('content')

<style>
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 1;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .modal.active {
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 1;
    }

    .modal-content {
        background-color: #fff;
        border-radius: 5px;
        position: relative;
        text-align: center;
        max-width: 25%;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    }
    .popup-image {
        max-width: 100%;
        height: auto;
    }

    .close {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 24px;
        cursor: pointer;
    }

    .close:hover {
        color: red;
    }

    @media (max-width: 768px) {
        .modal-content {
            max-width: 90%;
        }
    }


    @keyframes scroll-left {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); } /* karena konten diduplikat */
    }
    
    .partner-scroll-container {
        overflow: hidden;
        width: 100%;
    }

    .partner-scroll-content {
        display: inline-block;
        white-space: nowrap;
    }

    .partner-scroll-container:hover .partner-scroll-content {
        animation-play-state: paused;
    }

    .scroll-left {
        animation: scroll-left 60s linear infinite;
    }


    .video-title {
        font-size: 2.4rem;
        font-weight: 600;
    }

    .video-desc {
        font-size: 1.4rem;
    }

    @media (max-width: 992px) {
        .video-title {
            font-size: 1rem;
        }

        .video-desc {
            font-size: 0.7rem;
        }
    }


</style>



<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
{{-- <div class="modal" id="myModal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <a href="https://jipremium.com/visit">
                <img src="https://i.ibb.co/khzFmCB/a2e9d60a-7395-43e4-900f-b7e4708aaa30.jpg" style="width: 350px;" alt="popup-image" />
            </a>
        </div>
    </div>
    --}}

    <!-- haeder -->
    <!-- start section 1 jumbotron desktop -->
    <div class="site-section d-none d-lg-block"
            style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.8)), url('images/img_banner_new.png') no-repeat center center / cover;
                    height: 100vh; position: relative; margin-left: 40px;">

        <div class="d-flex justify-content-center align-items-center text-center text-white"
            style="position: relative; z-index: 2; height: 100%; width: 100%;">
            <div>
                <h5 style="font-size: 1.5vmax;">Premium products for premium life</h5>
                <h1 style="font-size: 4.5vmax; font-weight: bold;">JAKARTA INTERNATIONAL PREMIUM PRODUCT FAIR</h1>
                <h5 style="font-size: 2vmax; font-weight: 100; margin-top: 30px;">{{ __('event_info.event_date') }}</h5>
                <h5 style="font-size: 2vmax; font-weight: 100;">JICC, Jakarta, Indonesia</h5>
                <h5 style="font-size: 1.5vmax; font-style: italic; margin-top: 50px;">STYLISH LIFE IN JAKARTA</h5>
                <div class="mt-3">
                    <img style="margin-right: 4px; max-width: 4.7vmax;" src="images/Icon1.png" alt="">
                    <img style="margin-right: 4px; max-width: 4.7vmax;" src="images/Icon2.png" alt="">
                    <img style="margin-right: 4px; max-width: 4.7vmax;" src="images/Icon3.png" alt="">
                    <img style="margin-right: 4px; max-width: 4.7vmax;" src="images/Icon4.png" alt="">
                    <img style="margin-right: 4px; max-width: 4.7vmax;" src="images/Icon5.png" alt="">
                    <img style="margin-right: 4px; max-width: 4.7vmax;" src="images/Icon6.png" alt="">
                </div>
            </div>
        </div>
        <a href="/exhibit"
            style="position: absolute;
                    bottom: 40px;
                    left: 50%;
                    transform: translateX(-50%);
                    background-color: white;
                    color: #e6595f;
                    font-weight: bold;
                    padding: 10px 20px;
                    border: 1px solid #e6595f;
                    border-radius: 4px;
                    text-decoration: none;
                    font-size: 1rem;
                    z-index: 3;">
            {{ __('welcome.sign_up') }}
        </a>
    </div>
    <!-- end section 1 jumbotron desktop -->

    <!-- start section 1 jumbotron mobile -->
    <div class="site-section text-left bg-image rounded-3 d-block d-lg-none" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.8)), url('images/img_banner_new.png') no-repeat center center / cover; 
                height:100%!important;padding: 1rem!important;">

        <div class="d-flex justify-content-center align-items-center text-center text-white"
            style="position: relative; z-index: 2; height: 100%; width: 100%;">
            <div>
                <h5 style="font-size: 1.5vmax;">Premium products for premium life</h5>
                <h1 style="font-size: 4.5vmax; font-weight: bold;">JAKARTA INTERNATIONAL PREMIUM PRODUCT FAIR</h1>
                <h5 style="font-size: 2vmax; font-weight: 100; margin-top: 30px;">{{ __('event_info.event_date') }}</h5>
                <h5 style="font-size: 2vmax; font-weight: 100;">JICC, Jakarta, Indonesia</h5>
                <h5 style="font-size: 1.5vmax; font-style: italic; margin-top: 50px;">STYLISH LIFE IN JAKARTA</h5>
                <div class="mt-3">
                    <img style="margin-right: 4px; max-width: 4.7vmax;" src="images/Icon1.png" alt="">
                    <img style="margin-right: 4px; max-width: 4.7vmax;" src="images/Icon2.png" alt="">
                    <img style="margin-right: 4px; max-width: 4.7vmax;" src="images/Icon3.png" alt="">
                    <img style="margin-right: 4px; max-width: 4.7vmax;" src="images/Icon4.png" alt="">
                    <img style="margin-right: 4px; max-width: 4.7vmax;" src="images/Icon5.png" alt="">
                    <img style="margin-right: 4px; max-width: 4.7vmax;" src="images/Icon6.png" alt="">
                </div>
            </div>
        </div>
        <a href="/exhibit"
            style="position: absolute;
                    bottom: 40px;
                    left: 50%;
                    transform: translateX(-50%);
                    background-color: white;
                    color: #e6595f;
                    font-weight: bold;
                    padding: 10px 20px;
                    border: 1px solid #e6595f;
                    border-radius: 4px;
                    text-decoration: none;
                    font-size: 1rem;
                    z-index: 3;">
            {{ __('welcome.sign_up') }}
        </a>
    </div>
    <!-- end header -->

    <!-- exhibition overview -->
    <div class="site-section text-left bg-image rounded-3" style="background-color: white; padding: 1rem!important; margin-top: 100px;">
        <div class="d-flex justify-content-left align-items-left h-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="text-black">
                            <h4 class="video-title">{{ __('welcome.video_event') }}</h4>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <div class="col-12">
                        <div class="text-black">
                            <h5 class="video-desc">{{ __('welcome.video_desc') }}</h5>
                        </div>
                    </div>
                    <!-- <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{ url('/videos/jipremium_2024.mp4') }}" allowfullscreen></iframe>
                    </div> -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe 
                            class="embed-responsive-item"
                            src="https://www.youtube.com/embed/HXGFkCl0tWs"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end exhibition overview -->


    <!-- partners -->
    <div class="site-section text-left bg-image rounded-3" style="background-color: white; padding: 1rem!important; margin-top: 100px;">
        <div class="d-flex justify-content-left align-items-left h-100">
            <div class="container">
                <!-- title desktop -->
                <div class="row d-none d-lg-block" style="margin-left: 40px;">
                    <div class="col-sm-8">
                        <div class="text-black" style="text-align: left;">
                            <h4 style="font-size: 2.4rem">{{ __('welcome.official_partner') }}</h4>
                        </div>
                    </div>
                </div>

                <!-- title mobile -->
                <div class="row d-block d-lg-none">
                    <div class="col-sm-12">
                        <div class="text-black" style="text-align: left; font-weight: 600;">
                            <h4 style="font-size: 1rem; font-weight: 600;">{{ __('welcome.official_partner') }}</h4>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 1px solid black">
            </div>
        </div>

        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="container">

                <!-- section desktop -->
                <div class="d-none d-lg-block" style="margin-left: 40px;">
                    @foreach ($partners as $partner)
                        @php
                            $logos = $partner->partnerAsset()->get();
                            $logoCount = $logos->count();
                            $isScrollable = $logoCount >= 5;
                        @endphp

                        <div style="margin-bottom: 50px;">
                            <!-- Nama partner -->
                            <div class="text-black" style="text-align: center; margin-top: 28px;">
                                <h4 style="font-size: 1rem;">{{ $partner->name }}</h4>
                            </div>

                            <!-- Scrollable logo -->
                            <div class="partner-scroll-container">
                                <div style="text-align: center;">
                                    <div class="partner-scroll-content {{ $isScrollable ? 'scroll-left' : '' }}" style="
                                        display: inline-block;
                                        white-space: nowrap;">
                                        @foreach ($logos as $item)
                                            @php 
                                                $link = $item->img == '20240312024106.png'
                                                    ? 'https://indonesia.rxhuabo.com.cn/en/index.html'
                                                    : null;
                                            @endphp
                                            <span style="margin: 0 1rem;">
                                                @if ($link)
                                                    <a href="{{ $link }}" target="_blank">
                                                        <img src="/public/image/{{ $item->img }}" style="height: 70px; vertical-align: middle;">
                                                        <!-- <img src="{{ url('/image/') }}/{{ $item->img }}" style="height: 70px; vertical-align: middle;"> -->
                                                    </a>
                                                @else
                                                        <img src="/public/image/{{ $item->img }}" style="height: 70px; vertical-align: middle;">
                                                    <!-- <img src="{{ url('/image/') }}/{{ $item->img }}" style="height: 70px; vertical-align: middle;"> -->
                                                @endif
                                            </span>
                                        @endforeach

                                        <!-- Duplikat logo if more than 5 -->
                                        @if ($isScrollable)
                                            @foreach ($logos as $item)
                                                @php 
                                                    $link = $item->img == '20240312024106.png'
                                                        ? 'https://indonesia.rxhuabo.com.cn/en/index.html'
                                                        : null;
                                                @endphp
                                                <span style="display: inline-block; margin: 0 1rem;">
                                                    @if ($link)
                                                        <a href="{{ $link }}" target="_blank">
                                                            <img src="/public/image/{{ $item->img }}" style="height: 70px;">
                                                            <!-- <img src="{{ url('/image/') }}/{{ $item->img }}" style="height: 70px;"> -->
                                                        </a>
                                                    @else
                                                        <img src="/public/image/{{ $item->img }}" style="height: 70px;">
                                                            <!-- <img src="{{ url('/image/') }}/{{ $item->img }}" style="height: 70px;"> -->
                                                    @endif
                                                </span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- section mobile -->
                <div class="d-block d-lg-none">
                    @foreach ($partners as $partner)
                        @php
                            $logos = $partner->partnerAsset()->get();
                            $logoCount = $logos->count();
                            $isScrollable = $logoCount >= 5;
                        @endphp

                        <div>
                            <!-- Nama partner -->
                            <div class="text-black" style="text-align: center; margin-top: 28px;">
                                <h4 style="font-size: 1rem;">{{ $partner->name }}</h4>
                            </div>

                            <!-- Scrollable logo -->
                            <div class="partner-scroll-container" style="overflow: hidden; width: 100%;">
                                <div style="text-align: center;">
                                    <div class="partner-scroll-content {{ $isScrollable ? 'scroll-left' : '' }}" style="
                                        display: inline-block;
                                        white-space: nowrap;
                                        animation: {{ $isScrollable ? 'scroll-left 180s linear infinite' : 'none' }};
                                    ">
                                        @foreach ($logos as $item)
                                            @php 
                                                $link = $item->img == '20240312024106.png'
                                                    ? 'https://indonesia.rxhuabo.com.cn/en/index.html'
                                                    : null;
                                            @endphp
                                            <span style="margin: 0 1rem;">
                                                @if ($link)
                                                    <a href="{{ $link }}" target="_blank">
                                                        <img src="/public/image/{{ $item->img }}" style="height: 40px; vertical-align: middle;">
                                                        <!-- <img src="{{ url('/image/') }}/{{ $item->img }}" style="height: 40px; vertical-align: middle;"> -->
                                                    </a>
                                                @else
                                                        <img src="/public/image/{{ $item->img }}" style="height: 40px; vertical-align: middle;">
                                                    <!-- <img src="{{ url('/image/') }}/{{ $item->img }}" style="height: 40px; vertical-align: middle;"> -->
                                                @endif
                                            </span>
                                        @endforeach

                                        <!-- Duplikat logo if more than 5 -->
                                        @if ($isScrollable)
                                            @foreach ($logos as $item)
                                                @php 
                                                    $link = $item->img == '20240312024106.png'
                                                        ? 'https://indonesia.rxhuabo.com.cn/en/index.html'
                                                        : null;
                                                @endphp
                                                <span style="display: inline-block; margin: 0 1rem;">
                                                    @if ($link)
                                                        <a href="{{ $link }}" target="_blank">
                                                            <img src="/public/image/{{ $item->img }}" style="height: 40px;">
                                                            <!-- <img src="{{ url('/image/') }}/{{ $item->img }}" style="height: 40px;"> -->
                                                        </a>
                                                    @else
                                                        <img src="/public/image/{{ $item->img }}" style="height: 40px;">
                                                            <!-- <img src="{{ url('/image/') }}/{{ $item->img }}" style="height: 40px;"> -->
                                                    @endif
                                                </span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

    </div> 
    <!-- end partner -->


    <!-- subscription -->
    <div class="site-section text-left bg-image rounded-3" style="background-color: #e6595f; padding: 1rem!important; margin-top: 100px;">
        <div class="d-flex justify-content-left align-items-left h-100" style="margin-top: 30px;">
            <div class="container">
                <!-- title dekstop -->
                <div class="row d-none d-lg-block" style="margin-left: 40px;">
                    <div class="col-8">
                        <div class="text-white" style="text-align: left;">
                            <h4 style="font-size: 2.4rem">{{ __('welcome.subscribe_newsletter') }}</h4>
                        </div>
                    </div>
                </div>

                <!-- title mobile -->
                <div class="row d-block d-lg-none">
                    <div class="col-12 col-sm-12">
                        <div class="text-white" style="text-align: left;">
                            <h4 style="font-size: 1rem;">{{ __('welcome.subscribe_newsletter') }}</h4>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 1px solid white">
            </div>
        </div>

        <div class="d-flex justify-content-left align-items-left h-100" style="margin-bottom: 30px;">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <h4 class="d-none d-lg-block" style="margin-left: 40px; font-size: 1.4rem; color:white; font-weight: 100; text-align: left;">{{ __('welcome.desc_newsletter') }}</h4>
                        <h4 class="d-none d-lg-block" style="margin-left: 40px; font-size: 0.9rem; color:white; font-weight: 100; text-align: left;">{{ __('welcome.desc_newsletter_2') }}</h4>


                        <h4 class="d-block d-lg-none" style="font-size: 0.9rem; color:white; font-weight: 100; text-align: left;">{{ __('welcome.desc_newsletter') }}</h4>
                        <h4 class="d-block d-lg-none" style="font-size: 0.7rem; color:white; font-weight: 100; text-align: left;">{{ __('welcome.desc_newsletter_2') }}</h4>

                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>

                        <form id="form" method="POST">
                            @csrf
                            <!-- desktop -->
                            <div class="row d-none d-lg-block" style="margin-left: 40px;">
                                <div class="form-row" style="text-align: left;">
                                    <div class=" col-sm-4">
                                        <br>
                                        <label for="name" style="color:white;">{{ __('welcome.name') }}</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter" required>
                                    </div>
                                    <br>
                                    <div class=" col-sm-4">
                                        <br>
                                        <label for="email" style="color:white;">{{ __('welcome.email') }}</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter" required>
                                    </div>
                                    <div class=" col-sm-4">
                                        <br>
                                        <br>
                                        <button type="submit" class="btn btn-outline-light btn-md form-control" style="text-align:left; margin-top:8px; ">{{ __('welcome.submit') }}</button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- mobile -->
                            <div class="row d-block d-lg-none">
                                <div class="form-row" style="text-align: left;">
                                    <div class=" col-sm-4">
                                        <br>
                                        <label for="name" style="color:white;">{{ __('welcome.name') }}</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter" required>
                                    </div>
                                    <br>
                                    <div class=" col-sm-4">
                                        <br>
                                        <label for="email" style="color:white;">{{ __('welcome.email') }}</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter" required>
                                    </div>
                                    <div class=" col-sm-4">
                                        <br>
                                        <br>
                                        <button type="submit" class="btn btn-outline-light btn-md form-control" style="text-align:center; margin-top:8px; ">{{ __('welcome.submit') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end subscription -->


    <!-- concurrent show -->
    <div class="site-section text-left bg-image rounded-3" style="background-color: white; padding: 1rem!important; margin-top: 100px;">
        <div class="d-flex justify-content-left align-items-left h-100">
            <div class="container">
                <!-- title desktop -->
                <div class="row d-none d-lg-block" style="margin-left: 40px;">
                    <div class="col-sm-8">
                        <div class="text-black" style="text-align: left;">
                            <h4 style="font-size: 2.4rem">{{ __('welcome.concurrent_show') }}</h4>
                        </div>
                    </div>
                </div>

                <!-- title mobile -->
                <div class="row d-block d-lg-none">
                    <div class="col-sm-12">
                        <div class="text-black" style="text-align: left;">
                            <h4 style="font-size: 1rem; text-align:left; font-weight: 600;">{{ __('welcome.concurrent_show') }}</h4>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 1px solid black">
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="container">
                <div class="row">
                    <!-- desktop section -->
                    <div class="col-sm-6">
                        <div class="img-exhibition d-none d-lg-block" style="position: relative; margin-bottom: 10px;">
                            <img src="{{ asset('images/imkids_update_logo.png') }}" alt="Image" class="img-fluid" style="max-width: 100%;">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="img-exhibition d-none d-lg-block" style="position: relative; margin-bottom: 10px;">
                            <h4 style="font-size: 1rem; color: #e6595f;">GLOW&GROW!</h4>
                            <h4 style="font-size: 1rem; color: #e6595f; text-align: justify;">{{ __('welcome.concurrent_show_desc') }}</h4>
                            <h4 style="font-size: 1rem; text-align: justify;">{{ __('welcome.con_show_desc') }}</h4>
                            <a href="{{ url('/mom-and-kids') }}" class="bottom-left" style="text-align: left; position: inherit; bottom: 0;padding: 10px; left: 90%; background-color: #e6595f; color: white;">
                                {{ __('welcome.more') }}
                            </a>
                        </div>
                    </div>

                    <!-- mobile section -->
                    <div class="col-sm-12">
                        <div class="img-exhibition d-block d-lg-none" style="position: relative; margin-bottom: 10px;">
                            <a href="{{ url('/mom-and-kids') }}">
                                <img src="{{ asset('images/imkids_update_logo.png') }}" alt="Image" class="img-fluid" style="max-width: 100%;">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="img-exhibition d-block d-lg-none" style="position: relative; margin-bottom: 10px;">
                            <h4 style="font-size: 1rem; color: #e6595f;">GLOW&GROW!</h4>
                            <h4 style="font-size: 1rem; color: #e6595f; text-align: justify;">{{ __('welcome.concurrent_show_desc') }}</h4>
                            <h4 style="font-size: 1rem; text-align: justify;">{{ __('welcome.con_show_desc') }}</h4>
                            <a href="{{ url('/mom-and-kids') }}" class="bottom-left" style="text-align: left; position: inherit; bottom: 0;padding: 10px; left: 90%; background-color: #e6595f; color: white;">
                                {{ __('welcome.more') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end concurrent show -->


    <!-- exhibitor item -->
    <div class="site-section text-left bg-image rounded-3" style="background-color: rgb(222, 222, 222); padding: 1rem!important; margin-top: 100px;">
        <div class="d-flex justify-content-left align-items-left h-100">
            <div class="container">
                <!-- title desktop -->
                <div class="row d-none d-lg-block" style="margin-left: 40px;">
                    <div class="col-sm-8">
                        <div class="text-black" style="text-align: left;">
                            <!-- <hr style="border-top: 1px solid black; width: 340px;"> -->
                            <h4 style="font-size: 2.4rem">{{ __('welcome.exhibitor_item') }}</h4>
                        </div>
                    </div>
                </div>

                <!-- title mobile -->
                <div class="row d-block d-lg-none">
                    <div class="col-sm-12">
                        <div class="text-black" style="text-align: left;">
                            <!-- <hr style="border-top: 1px solid black; width: 340px;"> -->
                            <h4 style="font-size: 1rem; text-align:left; font-weight: 600;">{{ __('welcome.exhibitor_item') }}</h4>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 1px solid black">
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="container">
                <!-- desktop -->
                <div class="row d-none d-lg-block" style="margin-left: 40px;">
                    <div class="row">
                        @foreach($bestProducts->take(6) as $best)

                            <div class="col-md-4 col-sm-6 mb-4">
                                <div class="product-container" style="border: 1px solid #f5f5f5 !important; border-radius: 5px; padding: 25px; background-color: white;">

                                    <p class="card-text category" data-category-id="{{ $best->category_id }}" hidden>
                                        {{ $best->brand->brand_name }}
                                    </p>

                                    <div class="card" style="border: none !important;">
                                        <a href="{{ route('brand.product', $best->id) }}">
                                            <img class="card-img-top" src="{{ $best->product_image }}" alt="Card image cap"
                                                style=" /* max-width: 100%;*/ /* max-height: 200px; */ object-fit: contain; border-radius: 5px;">
                                        </a>
                                    </div>

                                    <div class="product-details">
                                        <div class="row" style="display: flex; flex-direction: column;">
                                            <div style="padding: 5px 15px;">
                                                <h4 class="card-text" style="font-size: 1rem; font-weight: 700; text-align: left; margin: 0;">
                                                    {{ $best->brand->brand_name }}
                                                </h4>
                                            </div>
                                            <div style="padding: 5px 15px;">
                                                <p class="card-text" style="text-align: left; font-weight: 300; color: #e6595f; margin: 0;">
                                                    {{ $best->brand->booth_no }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- Button More Products -->
                        <div class="col-12 text-center mt-4">
                            <a href="{{ url('/brands') }}" class="btn btn-primary" style="background-color: #e6595f; border: none; width: 250px;">
                                {{ __('welcome.more_product') }}
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- mobile -->
                <div class="row d-block d-lg-none">
                    <div class="row">
                        @foreach($bestProducts->take(6) as $best)
                            <div class="col-md-4 col-sm-6 mb-4" style="display: flex; justify-content: center;">
                                <div class="product-container" style="border: 1px solid #f5f5f5 !important; border-radius: 5px; padding: 25px; background-color: white; width: fit-content;">

                                    <p class="card-text category" data-category-id="{{ $best->category_id }}" hidden>
                                        {{ $best->brand->brand_name }}
                                    </p>

                                    <div class="card" style="border: none !important;">
                                        <a href="{{ route('brand.product', $best->id) }}">
                                            <img class="card-img-top" src="{{ $best->product_image }}" alt="Card image cap"
                                                style=" /* max-width: 100%; */ /* max-height: 200px; */ object-fit: contain; border-radius: 5px;">
                                        </a>
                                    </div>

                                    <div class="product-details">
                                        <div class="row" style="display: flex; flex-direction: column;">
                                            <div style="padding: 5px 15px;">
                                                <h4 class="card-text" style="font-size: 1rem; font-weight: 700; text-align: left; margin: 0;">
                                                    {{ $best->brand->brand_name }}
                                                </h4>
                                            </div>
                                            <div style="padding: 5px 15px;">
                                                <p class="card-text" style="text-align: left; font-weight: 300; color: #e6595f; margin: 0;">
                                                    {{ $best->brand->booth_no }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!-- Button More Products -->
                        <div class="col-12 text-center mt-4">
                            <a href="{{ url('/brands') }}" class="btn btn-primary" style="background-color: #e6595f; border: none; width: 250px;">
                                {{ __('welcome.more_product') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end exhibitor item -->


    <!-- family exhibition -->
    <div class="site-section text-left bg-image rounded-3" style="background-color: white; padding: 1rem!important; margin-top: 100px;">
        <div class="d-flex justify-content-left align-items-left h-100">
            <div class="container">
                <!-- title desktop -->
                <div class="row d-none d-lg-block" style="margin-left: 40px;">
                    <div class="col-sm-8">
                        <div class="text-black" style="text-align: left;">
                            <h4 style="font-size: 2.4rem">{{ __('welcome.family_exhibition') }}</h4>
                        </div>
                    </div>
                </div>

                <!-- title mobile -->
                <div class="row d-block d-lg-none">
                    <div class="col-sm-12">
                        <div class="text-black" style="text-align: left;">
                            <h4 style="font-size: 1rem; text-align:left; font-weight: 600;">{{ __('welcome.family_exhibition') }}</h4>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 1px solid black">
            </div>
        </div>
        <div class="d-flex justify-content-left align-items-left h-100">
            <div class="container">
                <!-- desktop -->
                <div class="row d-none d-lg-block" style="margin-left: 40px;">
                    <div class="row">
                        @foreach ($exhibition as $data)
                        <div class="col-sm-6">
                            <div class="img-exhibition d-none d-lg-block" style="position: relative; margin-bottom: 10px;">
                                <a href="{{ $data->hyperlink }}" target="_blank">
                                    <img src="/public/image/{{ $data->image }}" alt="Image" class="img-fluid" style="max-width: 100%;">
                                </a>
                                <div class="bottom-left" style="text-align: left; width: 100%;position: absolute;bottom: 0;padding: 10px;left: 0; background-color: #e6595f8a;">
                                    <a href="{{ $data->hyperlink }}" target="_blank">
                                        <h5 style="margin-left: 20px; margin-right: 20px; color:white; font-style:bold; font-weight: 900;">{{ $data->title }}</h5>
                                    </a>
                                    <a href="{{ $data->hyperlink }}" target="_blank">
                                        <h5 style="margin-left: 20px; margin-right: 20px; color:white; font-weight: 900;">{{ $data->description }}</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        @foreach ($exhibition as $data)
                        <div class="col-sm-12">
                            <div class="img-exhibition d-block d-lg-none" style="position: relative; margin-bottom: 10px;">
                                <a href="{{ $data->hyperlink }}" target="_blank">
                                    <img src="/public/image/{{ $data->image }}" alt="Image" class="img-fluid" style="max-width: 100%;">
                                </a>
                                <div class="bottom-left" style="text-align: left; width: 100%;position: absolute;bottom: 0;padding: 10px;left: 0; background-color: #e6595f8a;">
                                    <a href="{{ $data->hyperlink }}" target="_blank">
                                        <b style=" color:white; font-style:bold; font-size: 14px; font-weight: 900;">{{ Str::limit($data->title, 40) }}</b>
                                    </a>
                                    <br>
                                    <a href="{{ $data->hyperlink }}" target="_blank">
                                        <b style=" color:white; font-size: 14px; font-weight: 900;">{{ Str::limit($data->description, 30) }}</b>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- mobile -->
                <div class="row d-block d-lg-none">
                    <div class="row">
                        @foreach ($exhibition as $data)
                        <div class="col-sm-6">
                            <div class="img-exhibition d-none d-lg-block" style="position: relative; margin-bottom: 10px;">
                                <a href="{{ $data->hyperlink }}" target="_blank">
                                    <img src="/public/image/{{ $data->image }}" alt="Image" class="img-fluid" style="max-width: 100%;">
                                </a>
                                <div class="bottom-left" style="text-align: left; width: 100%;position: absolute;bottom: 0;padding: 10px;left: 0; background-color: #e6595f8a;">
                                    <a href="{{ $data->hyperlink }}" target="_blank">
                                        <h5 style="margin-left: 20px; margin-right: 20px; color:white; font-style:bold; font-weight: 900;">{{ $data->title }}</h5>
                                    </a>
                                    <a href="{{ $data->hyperlink }}" target="_blank">
                                        <h5 style="margin-left: 20px; margin-right: 20px; color:white; font-weight: 900;">{{ $data->description }}</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        @foreach ($exhibition as $data)
                        <div class="col-sm-12">
                            <div class="img-exhibition d-block d-lg-none" style="position: relative; margin-bottom: 10px;">
                                <a href="{{ $data->hyperlink }}" target="_blank">
                                    <img src="/public/image/{{ $data->image }}" alt="Image" class="img-fluid" style="max-width: 100%;">
                                </a>
                                <div class="bottom-left" style="text-align: left; width: 100%;position: absolute;bottom: 0;padding: 10px;left: 0; background-color: #e6595f8a;">
                                    <a href="{{ $data->hyperlink }}" target="_blank">
                                        <b style=" color:white; font-style:bold; font-size: 14px; font-weight: 900;">{{ Str::limit($data->title, 40) }}</b>
                                    </a>
                                    <br>
                                    <a href="{{ $data->hyperlink }}" target="_blank">
                                        <b style=" color:white; font-size: 14px; font-weight: 900;">{{ Str::limit($data->description, 30) }}</b>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- end family exhibition -->

    <script>
        $(document).ready(function() {
            $('#form').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: '{{ route('news.store') }}',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                $('.alert-success').html(response.message);
                $('.alert-success').fadeIn().delay(2000).fadeOut();
                },
                error: function(xhr) {
                alert('Error: ' + xhr.responseText);
                }
            });
            });
        });
    </script>
    <script>
        var modal = document.getElementById('myModal');
        var closeModal = document.getElementById('closeModal');

        function openModal() {
            modal.style.display = 'block';
            modal.style.position = 'fixed';
            modal.style.top = '50%';
            modal.style.left = '50%';
            modal.style.transform = 'translate(-50%, -50%)';
            setTimeout(function () {
                modal.classList.add('active');
            }, 50);
        }

        function closeModalFunc() {
            modal.classList.remove('active');
            setTimeout(function () {
                modal.style.display = 'none';
            }, 300);
        }

        window.onload = function () {
            openModal();
        }

        closeModal.onclick = function () {
            closeModalFunc();
        }

        window.onclick = function (event) {
            if (event.target === modal) {
                closeModalFunc();
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const isMobile = window.innerWidth < 992; // Bootstrap lg breakpoint

            if (isMobile) {
            document.querySelector('.d-none.d-lg-block')?.remove(); // remove desktop section
            } else {
            document.querySelector('.d-block.d-lg-none')?.remove(); // remove mobile section
            }
        });
    </script>
@endsection
