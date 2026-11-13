@extends('layout.layout_front')
@section('content')
    <!-- start section 1 desktop -->
        <div class="container d-none d-lg-block">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <img src="images/visit.jpg" alt="Image" style="margin-bottom:10px; margin-top:100px;" class="img-fluid">
                </div>
            </div>
        </div>
    <!-- end section 1 -->

    <!-- start section 1 mobile -->
        <div class="d-block d-lg-none">        
            <img src="images/visit.jpg" alt="Image" style="margin-bottom:10px; margin-top:100px;" class="img-fluid">
        </div>
    <!-- end section 1 -->

    <!-- start section 2 desktop -->
        <div class="site-section p-5 text-center bg-image rounded-3 d-none d-lg-block" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">Registration</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <div class="row">
                        <div class="col-5">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">Dates</h4><br>
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
                                <h4 style="font-size: 1.4rem">Venue</h4><br>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">JICC Hall A&B, Jakarta, Indonesia</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row text-black" style="text-align: left;">
                        <div class="col-5">
                            <h4 style="font-size: 1.4rem">Operation Hours</h4><br>
                        </div>
                        <div class="col-7">
                            <h4 style="font-size: 1.4rem">[5-7 September] 10am – 6pm <br> [8 September] 10am – 5pm <br> Last admission 30 mins before closing</h4><br>
                        </div>
                    </div>
                    <div class="row text-black" style="text-align: left;">
                        <div class="col-5">
                            <h4 style="font-size: 1.4rem">Online Pre-registration</h4><br>
                        </div>
                        <div class="col-7">
                            <h4 style="font-size: 1.4rem">All buyers and visitors to JIPREMIUM can receive free admission by registering online.
                            Pre-registrants may receive their entrance badges after going through ID confirmation at the JIPREMIUM registration desks</h4><br>
                        </div>
                    </div>
                    <div class="row text-black" style="text-align: left;">
                        <div class="col-5">
                            <h4 style="font-size: 1.4rem">ON-SITE REGISTRATION</h4><br>
                        </div>
                        <div class="col-7">
                            <h4 style="font-size: 1.4rem">Visitors may register on-site during any day of the exhibition. Visitors may fill out a mobile registration form to receive their entrance badge.
                            Registration desks are located in the lobby of JICC Hall A.</h4><br>
                        </div>
                    </div>
                    {{-- <button type="submit" class="btn btn-dark" style="width: 260px;">BUYER REGISTRATION</button>
                    <button type="submit" class="btn btn-dark" style="width: 260px;">VISITOR REGISTRATION</button> --}}
                </div>
            </div>
        </div>

        <div class="site-section text-left bg-image rounded-3 d-none d-lg-block" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row d-none d-lg-block">
                        <div class="col-sm-8">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">ONLINE PRE-REGISTRATION</h4>
                                <h5 style="font-size: 1.3rem">All pre-registered buyers and visitors can receive free admission by registering online.
Pre-registration period : ~ 4 September(Wed), 2024</h5>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <a href="{{ route('visitor_online.create') }}" class="btn btn-dark" style="width: 260px;">VISITOR REGISTRATION</a>
                    <a href="{{ route('buyer_online.create') }}" class="btn btn-dark" style="width: 260px;">BUYER REGISTRATION</a>

                    <script>
                        function alertVisitor() {
                            alert("Visitor registration will be open shortly");
                        }

                        function alertBuyer() {
                            alert("Buyer registration will be open shortly");
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
                                <h4 style="font-size: 2.4rem">ON-SITE REGISTRATION</h4>
                                <h5 style="font-size: 1.3rem">Visitors may register on-site during any day of the exhibition</h5>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    {{-- <a href="{{ route('visitor_onsite.create') }}" class="btn btn-dark" style="width: 260px;">VISITOR REGISTRATION</a> --}}
                    {{-- <a href="{{ route('buyer_onsite.create') }}" class="btn btn-dark" style="width: 260px;">BUYER REGISTRATION</a> --}}
                    <a href="#" onclick="alertVisitorOnsite()" class="btn btn-dark" style="width: 260px;">VISITOR REGISTRATION</a>
                    <a href="#" onclick="alertBuyerOnsite()" class="btn btn-dark" style="width: 260px;">BUYER REGISTRATION</a>
                    
                    <script>
                        function alertVisitorOnsite() {
                            alert("On-site registration will be open during the exhibition days");
                        }

                        function alertBuyerOnsite() {
                            alert("On-site registration will be open during the exhibition days");
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
                        <div class="col-12">
                            <div class="text-black" style="text-align: left; margin-top: 50px;">
                                <h4 style="font-size: 1.2rem; font-weight: 900;">Registration</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <div class="row">
                        <div class="col-5">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1rem; font-weight: 900;">Dates</h4><br>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 0.67rem">5 - 8 September, 2024</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1rem; font-weight: 900;">Venue</h4><br>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 0.67rem">JICC Hall A&B, Jakarta, Indonesia</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row text-black" style="text-align: left;">
                        <div class="col-5">
                            <h4 style="font-size: 1rem; font-weight: 900;">Operation Hours</h4><br>
                        </div>
                        <div class="col-7">
                            <h4 style="font-size: 0.67rem">[5-7 September] 10am – 6pm <br> [8 September] 10am – 5pm <br> Last admission 30 mins before closing</h4><br>
                        </div>
                    </div>
                    <div class="row text-black" style="text-align: left;">
                        <div class="col-5">
                            <h4 style="font-size: 1rem; font-weight: 900;">Online Pre-registration</h4><br>
                        </div>
                        <div class="col-7">
                            <h4 style="font-size: 0.67rem">All buyers and visitors to JIPREMIUM can receive free admission by registering online.
                            Pre-registrants may receive their entrance badges after going through ID confirmation at the JIPREMIUM registration desks</h4><br>
                        </div>
                    </div>
                    <div class="row text-black" style="text-align: left;">
                        <div class="col-5">
                            <h4 style="font-size: 1rem; font-weight: 900;">ON-SITE REGISTRATION</h4><br>
                        </div>
                        <div class="col-7">
                            <h4 style="font-size: 0.67rem">Visitors may register on-site during any day of the exhibition. Visitors may fill out a mobile registration form to receive their entrance badge.
                            Registration desks are located in the lobby of JICC Hall A.</h4><br>
                        </div>
                    </div>
                    <br>
                    {{-- <div class="row text-black">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-dark" style="width: 200px; margin-bottom:10px;text-align: right;">BUYER REGISTRATION</button>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-dark" style="width: 200px; text-align: left;">VISITOR REGISTRATION</button>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    <!-- end section 2 mobile -->

    <div class="text-left bg-image rounded-3 d-block d-lg-none" style="background-color: white;">
        <div class="d-flex justify-content-left align-items-left h-100">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="text-black" style="text-align: left;">
                            <h4 style="font-size: 1.2rem">ONLINE PRE-REGISTRATION</h4>
                            <h5 style="font-size: 0.6rem; color: #e6595f;">All pre-registered buyers and visitors can receive free admission by registering online.
Pre-registration period : ~ 4 September(Wed), 2024</h5>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 1px solid black">
                <a href="{{ route('visitor_online.create') }}" class="btn btn-dark" style="width: 260px; margin-left: 50px; margin-bottom: 10px;">VISITOR REGISTRATION</a>
                <a href="{{ route('buyer_online.create') }}" class="btn btn-dark" style="width: 260px; margin-left: 50px; margin-bottom: 10px;">BUYER REGISTRATION</a>
            </div>
        </div>
    </div>
    
    <div class="text-left bg-image rounded-3 d-block d-lg-none" style="background-color: white;  margin-bottom: 25px;">
        <div class="d-flex justify-content-left align-items-left h-100">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="text-black" style="text-align: left; margin-top: 50px;">
                            <h4 style="font-size: 1.2rem">ON-SITE REGISTRATION</h4>
                            <h5 style="font-size: 0.6rem; color: #e6595f;">Visitors may register on-site during any day of the exhibition</h5>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 1px solid black">
                <a href="#" onclick="alertVisitor2()" class="btn btn-dark" style="width: 260px; margin-left: 50px; margin-bottom: 10px;">VISITOR REGISTRATION</a>
                <a href="#" onclick="alertBuyer2()" class="btn btn-dark" style="width: 260px; margin-left: 50px; margin-bottom: 10px;">BUYER REGISTRATION</a>
                
                <script>
                    function alertVisitor2() {
                        alert("On-site registration will be open during the exhibition days");
                    }

                    function alertBuyer2() {
                        alert("On-site registration will be open during the exhibition days");
                    }
                </script>
            </div>
        </div>
    </div>
@endsection
