@extends('layout.layout_front_new')
@section('content')

    <style>

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

    </style>



    <!-- start section 1  -->
    <div class="site-section text-left bg-image rounded-3" style="background-color: white; padding: 1rem!important;">
        <div class="d-flex justify-content-left align-items-left h-100">
            <div class="container">
                <!-- desktop section -->
                <div class="row d-none d-lg-block" style="margin-left: 40px;">
                    <div class="col-8">
                        <div class="text-black" style="text-align: left;">
                            <h4 style="font-size: 2.4rem">{{ __('welcome.video_event') }}</h4>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <div class="col-12">
                        <div class="text-black" style="text-align: justify;">
                            <h5 style="font-size: 1.4rem;">{{ __('welcome.video_desc') }}</h5>
                        </div>
                    </div>

                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{ url('/videos/jipremium_2024.mp4') }}" allowfullscreen></iframe>
                    </div>
                </div>

                <!-- mobile section -->
                <div class="row d-block d-lg-none">
                    <div class="col-12">
                        <div class="text-black" style="text-align: left;">
                            <h4 style="font-size: 1rem; font-weight: 600">{{ __('welcome.video_event') }}</h4>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <div class="text-black" style="text-align: justify;">
                        <h5 style="font-size: 0.7rem;">{{ __('welcome.video_desc') }}</h5>
                    </div>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{ url('/videos/jipremium_2024.mp4') }}" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section 1 -->

    <!-- start section 2 -->
    <div class="container">
        <!-- title desktop -->
        <div class="row">
            <div class="col-8 d-none d-lg-block">
                <div class="text-black" style="text-align: left; margin-top: 20px;">
                    <h4 style="font-size: 2.4rem">{{ __('exhibit.booth_guideline') }}</h4>
                </div>
            </div>
        </div>

        <!-- title mobile -->
        <div class="row">
            <div class="col-12 col-sm-12 d-block d-lg-none">
                <div class="text-black" style="text-align: center; margin-top: 20px;">
                    <h4 style="font-size: 1.2rem">{{ __('exhibit.booth_guideline') }}</h4>
                </div>
            </div>
        </div>
        <hr style="border-top: 1px solid black">
        <div class="row">
            <!-- desktop section -->
            <div class="col-12 d-none d-lg-block">
                <div class="text-black" style="text-align: left;">
                    <ul>
                        <li><h4 style="font-size: 1.2rem">{{ __('exhibit.booth_desc1') }}</h4><br></li>
                        <li><h4 style="font-size: 1.2rem">{{ __('exhibit.booth_desc2') }}</h4></li>
                    </ul>
                </div>
            </div>
            <!-- mobile section -->
            <div class="col-12 d-block d-lg-none">
                <div class="text-black" style="text-align: left;">
                    <ul>
                        <li><h4 style="font-size: 0.7rem">{{ __('exhibit.booth_desc1') }}</h4><br></li>
                        <li><h4 style="font-size: 0.7rem">{{ __('exhibit.booth_desc2') }}</h4></li>
                    </ul>
                </div>
            </div>
        </div>
        <br><br>
        <button onclick="myFunction()" class="btn btn-dark" style="margin-bottom: 30px; width: 300px; background-color: #e6595f; border: none;">{{ __('exhibit.download_exhibitors') }}</button>
        <script>
            function myFunction() {
                alert("Exhibitor's manual will be updated shortly");
            }
        </script>
    </div>
    <!-- end section 2 -->
@endsection
