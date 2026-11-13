@extends('layout.layout_front')
@section('content')
    <!-- start section 1 jumbotron desktop -->
        <div class="site-section p-5 text-center bg-image rounded-3 d-none d-lg-block" style="background-image: url('images/bg-jumbotron1.png');height: 900px;">
            <div class="mask">
                <div class="d-flex justify-content-left align-items-left h-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-8">
                                <div class="text-white" style="text-align: left;">
                                    <h1 style="font-size: 5.0rem;">JAKARTA INTERNATIONAL PREMIUM PRODUCT FAIR</h1>
                                    <h5 style="font-weight:100; margin-top: 30px;">14 - 17 September 2023</h5>
                                    <h5 style="font-weight:100;">JCC, Jakarta, Indonesia</h5>
                                    <h5 style="font-style: italic; margin-top: 120px;">STYLISH LIFE IN JAKARTA</h5>
                                    <img style="margin-right: 8px; max-width: 100px;" src="images/Icon1.png" alt="">
                                    <img style="margin-right: 8px; max-width: 100px;" src="images/Icon2.png" alt="">
                                    <img style="margin-right: 8px; max-width: 100px;" src="images/Icon3.png" alt="">
                                    <img style="margin-right: 8px; max-width: 100px;" src="images/Icon4.png" alt="">
                                    <img style="margin-right: 8px; max-width: 100px;" src="images/Icon5.png" alt="">
                                    <img style="margin-right: 8px; max-width: 100px;" src="images/Icon6.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- end section 1 jumbotron desktop -->

    <!-- start section 1 jumbotron mobile -->
        <div class="site-section p-5 text-center bg-image rounded-3 d-block d-lg-none" style="background-image: url('images/bg-jumbotron1.png');height: 900px;">
            <div class="mask" style="margin-top: 30px;">
                <div class="d-flex justify-content-left align-items-left h-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-8">
                                <div class="text-white" style="text-align: center;">
                                    <h1 style="font-size: 2.5rem;">JAKARTA INTERNATIONAL PREMIUM PRODUCT FAIR</h1>
                                    <h5 style="font-weight:100; margin-top: 30px;">14 - 17 September 2023</h5>
                                    <h5 style="font-weight:100;">JCC, Jakarta, Indonesia</h5>
                                    <h5 style="font-style: italic; margin-top: 50px;">STYLISH LIFE IN JAKARTA</h5>
                                    <img style="max-width: 70px;" src="images/Icon1.png" alt="">
                                    <img style="max-width: 70px;" src="images/Icon2.png" alt="">
                                    <img style="max-width: 70px;" src="images/Icon3.png" alt="">
                                    <img style="max-width: 70px;" src="images/Icon4.png" alt="">
                                    <img style="max-width: 70px;" src="images/Icon5.png" alt="">
                                    <img style="max-width: 66px;" src="images/Icon6.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- end section 1 jumbotron mobile -->


    <!-- start section 2 desktop -->
        <div class="site-section p-5 text-center bg-image rounded-3 d-none d-lg-block" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">PREVIOUS SHOW VIDEO</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/hgy3dDWNIA8" allowfullscreen></iframe>
                    </div>
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
                                <h4 style="font-size: 1.6rem">PREVIOUS SHOW VIDEO</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/hgy3dDWNIA8" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    <!-- end section 2 mobile -->

    <!-- start section 3 desktop -->
        <div class="site-section p-5 text-center bg-image rounded-3 d-none d-lg-block" style="background-color: #e6595f;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <div class="text-white" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">SUBSCRIBE OUR NEWS LETTER</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid white">
                </div>
            </div>

            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <h4 style="font-size: 1.4rem; color:white; font-weight: 100; text-align: left;">SIGNUP & BE THE FIRST TO GET THE LATEST NEWS</h4>
                    <div class="row" style="text-align: left; margin-top: 28px;">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="name" style="color:white;">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="email" style="color:white;">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <br>
                                <button type="button" class="btn btn-outline-light btn-md" style="text-align:center; margin-top:8px; padding: 6px 85px;">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- end section 3 desktop -->

    <!-- start section 3 mobile -->
        <div class="site-section p-5 text-center bg-image rounded-3 d-block d-lg-none" style="background-color: #e6595f;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <div class="text-white" style="text-align: left;">
                                <h4 style="font-size: 1.6rem">SUBSCRIBE OUR NEWS LETTER</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid white">
                </div>
            </div>
            <div class="container">
                <h4 style="font-size: 1.4rem; color:white; font-weight: 100; text-align: left;">SIGNUP & BE THE FIRST TO GET THE LATEST NEWS</h4>
                <div class="row" style="text-align: left; margin-top: 28px;">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name" style="color:white;">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="email" style="color:white;">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter">
                        </div>
                    </div>
                    <div class="col-sm-3" style="text-align:center;">
                        <div class="form-group">
                            <br>
                            <button type="button" class="btn btn-outline-light btn-md" style="text-align:center; margin-top:8px; padding: 6px 85px;">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- end section 3 mobile -->

    <!-- start section 4 desktop -->
        <div class="site-section p-5 text-center bg-image rounded-3 d-none d-lg-block" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">JIPREMIUM OFFICIAL PARTNER</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                </div>
            </div>
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row" >
                        <div class="col-8">
                            <div class="text-black" style="text-align: left;margin-top: 28px;">
                                @foreach ($partners as $partner)
                                <h4 style="font-size: 1.4rem">• {{ $partner->name }}</h4>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-section p-5 text-center bg-image rounded-3 d-none d-lg-block" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">FAMILY EXHIBITION</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                </div>
            </div>
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <img src="images/banner_rectangle.png" alt="Image" class="img-fluid">
                        </div>
                        <div class="col-6">
                            <img src="images/banner_rectangle.png" alt="Image" class="img-fluid">
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
                        <div class="col-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.6rem">JIPREMIUM OFFICIAL PARTNER</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                </div>
            </div>
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row" >
                        <div class="col-8">
                            <div class="text-black" style="text-align: left;margin-top: 28px;">
                                <h4 style="font-size: 1.3rem; margin-bottom: 20px;">• ORGANIZER</h4>
                                <h4 style="font-size: 1.3rem; margin-bottom: 20px;">• SUPPORTING MINISTRY</h4>
                                <h4 style="font-size: 1.3rem; margin-bottom: 20px;">• SUPPORTING ASSOCIATION</h4>
                                <h4 style="font-size: 1.3rem; margin-bottom: 20px;">• SUPPORTING MEDIA</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-section p-5 text-center bg-image rounded-3 d-block d-lg-none" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.6rem">FAMILY EXHIBITION</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                </div>
            </div>

            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6" style="margin-bottom: 10px;">
                            <img src="images/banner_rectangle.png" alt="Image" class="img-fluid">
                        </div>
                        <div class="col-sm-6">
                            <img src="images/banner_rectangle.png" alt="Image" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- end section 4 mobile -->
@endsection
