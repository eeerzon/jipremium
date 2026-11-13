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

    <!-- start section 3 -->
    <div class="site-section text-left bg-image rounded-3" style="background-color: #ffffff; padding: 1rem!important;">
        <div class="d-flex justify-content-left align-items-left h-100" style="margin-top: 30px;">
            <div class="container">
                <!-- title dekstop -->
                <div class="row d-none d-lg-block" style="margin-left: 40px;">
                    <div class="col-8">
                        <div class="text-black" style="text-align: left;">
                            <h4 style="font-size: 2.4rem">{{ __('welcome.subscribe_newsletter') }}</h4>
                        </div>
                    </div>
                </div>

                <!-- title mobile -->
                <div class="row d-block d-lg-none">
                    <div class="col-12 col-sm-12">
                        <div class="text-black" style="text-align: left;">
                            <h4 style="font-size: 1rem;">{{ __('welcome.subscribe_newsletter') }}</h4>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 1px solid black">
            </div>
        </div>

        <div class="d-flex justify-content-left align-items-left h-100" style="margin-bottom: 30px;">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <h4 class="d-none d-lg-block" style="margin-left: 40px; font-size: 1.4rem; color:black; font-weight: 100; text-align: left;">{{ __('welcome.desc_newsletter') }}</h4>
                        <h4 class="d-none d-lg-block" style="margin-left: 40px; font-size: 0.9rem; color:black; font-weight: 100; text-align: left;">{{ __('welcome.desc_newsletter_2') }}</h4>


                        <h4 class="d-block d-lg-none" style="font-size: 0.9rem; color:black; font-weight: 100; text-align: left;">{{ __('welcome.desc_newsletter') }}</h4>
                        <h4 class="d-block d-lg-none" style="font-size: 0.7rem; color:black; font-weight: 100; text-align: left;">{{ __('welcome.desc_newsletter_2') }}</h4>

                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>

                        <form id="form" method="POST">
                            @csrf
                            <!-- desktop -->
                            <div class="row d-none d-lg-block" style="margin-left: 40px;">
                                <div class="form-row" style="text-align: left;">
                                    <div class=" col-sm-4">
                                        <br>
                                        <label for="name" style="color:black;">{{ __('welcome.name') }}</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter" required>
                                    </div>
                                    <br>
                                    <div class=" col-sm-4">
                                        <br>
                                        <label for="email" style="color:black;">{{ __('welcome.email') }}</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter" required>
                                    </div>
                                    <div class=" col-sm-4">
                                        <br>
                                        <br>
                                        <button type="submit" class="btn btn-outline-dark btn-md form-control" style="text-align:left; margin-top:8px; ">{{ __('welcome.submit') }}</button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- mobile -->
                            <div class="row d-block d-lg-none">
                                <div class="form-row" style="text-align: left;">
                                    <div class=" col-sm-4">
                                        <br>
                                        <label for="name" style="color:black;">{{ __('welcome.name') }}</label>
                                        <input type="text" class="form-control" name="name" placeholder="Enter" required>
                                    </div>
                                    <br>
                                    <div class=" col-sm-4">
                                        <br>
                                        <label for="email" style="color:black;">{{ __('welcome.email') }}</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter" required>
                                    </div>
                                    <div class=" col-sm-4">
                                        <br>
                                        <br>
                                        <button type="submit" class="btn btn-outline-dark btn-md form-control" style="text-align:center; margin-top:8px; ">{{ __('welcome.submit') }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section 3 -->
@endsection
