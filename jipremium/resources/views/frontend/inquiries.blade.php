@extends('layout.layout_front_new')
@section('content')
    <!-- start section 1 desktop -->
        <div class="site-section text-center bg-image rounded-3" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row d-none d-lg-block">
                        <div class="col-12">
                            <div class="text-black" style="text-align: left;">
                            <h4 style="font-size: 1.4rem">{{ __('inquiries.title') }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row d-block d-lg-none" style="margin-top: 100px;">
                        <div class="col-12">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 0.9rem">{{ __('inquiries.title') }}</h4>
                            </div>
                        </div>
                    </div>
                    <br><br>

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <p style="color:black; font-weight:500;">{{ $message }}</p>
                    </div>
                    @endif

                    <form action="{{ route('inquiries.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <h4 style="text-align: left; font-size: 1.4rem;">{{ __('inquiries.name') }} <b style="color: red;">*</b></h4>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="first_name" placeholder="{{ __('inquiries.first') }}" required>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="last_name" placeholder="{{ __('inquiries.last') }}" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <h4 style="text-align: left; font-size: 1.4rem;">EMAIL <b style="color: red;">*</b></h4>
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <h4 style="text-align: left; font-size: 1.4rem;">{{ __('inquiries.company_name') }} <b style="color: red;">*</b></h4>
                                    <input type="text" class="form-control" name="company" placeholder="{{ __('inquiries.company_placeholder') }}" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <h4 style="text-align: left; font-size: 1.4rem;">{{ __('inquiries.country') }} <b style="color: red;">*</b></h4>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="country" placeholder="Indonesia" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12" style="text-align: left;">
                                    <h4 style="text-align: left; font-size: 1.4rem;">{{ __('inquiries.inquiry') }} <b style="color: red;">*</b></h4>
                                    <input type="text" class="form-control" name="inquiry" placeholder="{{ __('inquiries.inquiry_desc') }}" required>
                                    <br>
                                    <!-- button dekstop -->
                                    <button type="submit" class="btn btn-dark d-none d-lg-block" style="width: 300px;">{{ __('inquiries.submit') }}</button>
                                </div>
                            </div>
                            <!-- button mobile -->
                            <div class="row">
                                <div class="col-12 col-sm-12 d-block d-lg-none" style="text-align: left;">
                                    <button type="submit" class="btn btn-dark btn-md form-control">{{ __('inquiries.submit') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr style="border-top: 1px solid black; margin-top: 4rem; margin-bottom: 3rem;">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-black d-none d-lg-block" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">{{ __('inquiries.contact_detail') }}</h4><br>
                                <h4 style="font-size: 1.5rem"><b> INTERNATIONAL <b></h4>
                                <h4 style="font-size: 1.4rem">+82-2-6000-8125  coexoverseas@gmail.com</h4><br>
                                <h4 style="font-size: 1.5rem"><b> INDONESIA LOCAL <b></h4>
                                <h4 style="font-size: 1.4rem">+62-21-3854348  jipremium@wwtp.com </h4>
                            </div>
                            <div class="text-black d-block d-lg-none" style="text-align: left;">
                                <h5 style="font-size: 1.2rem">{{ __('inquiries.contact_detail') }}</h5><br>
                                <h5 style="font-size: 1.2rem"><b> INTERNATIONAL <b></h5>
                                <h5 style="font-size: 1.2rem">+82-2-6000-8125  coexoverseas@gmail.com</h5><br>
                                <h5 style="font-size: 1.2rem"><b> INDONESIA LOCAL <b></h5>
                                <h5 style="font-size: 1.2rem">+62-21-3854348  jipremium@wwtp.com </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- end section 1 desktop -->
@endsection
