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

        @media (max-width: 768px) {
            .modal-content {
                max-width: 90%;
            }
        }

    </style>



    <div class="site-section text-left bg-image rounded-3" style="background-color: white; padding: 1rem!important;">
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

@endsection