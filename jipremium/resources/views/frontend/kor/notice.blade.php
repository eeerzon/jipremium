@extends('layout.layout_front_kor')
@section('content')
    <!-- start section 1 desktop -->
        <div class="site-section p-5 text-center bg-image rounded-3 " style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-8 d-none d-lg-block">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">알림</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 d-block d-lg-none">
                            <div class="text-black" style="text-align: left; margin-top: 100px;">
                                <h4 style="font-size: 2.14rem">알림</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <div class="text-black" style="text-align: left;">
                                @foreach ($notice as $data)
                                    <h4 style="font-size: 1.4rem">{{ \Carbon\Carbon::parse($data->date)->format('d/m/Y')}} <a href="{{ route('notices.show',$data->id) }}" style="color:black; font-size: 1.4rem; margin-left: 40px;"> {{ $data->title }}</a></h4>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black; margin-top: 4rem; margin-bottom: 3rem;">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">자세한 사항은 지프리미움 사무국으로 문의 바랍니다.</h4><br>
                                <h4 style="font-size: 1.5rem"><b> INTERNATIONAL <b></h4>
                                <h4 style="font-size: 1.4rem">+82-2-6000-8004  coexoverseas@gmail.com</h4><br>
                                <h4 style="font-size: 1.5rem"><b> INDONESIA LOCAL <b></h4>
                                <h4 style="font-size: 1.4rem">+62-21-3854348  jipremium@wwtp.com </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- end section 1 desktop -->
@endsection
