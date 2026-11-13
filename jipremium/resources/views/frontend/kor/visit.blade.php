@extends('layout.layout_front_kor')
@section('content')
    <!-- start section 1 -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <img src="/images/banner1.png" alt="Image" style="margin-bottom:10px; margin-top:100px;" class="img-fluid">
                </div>
            </div>
        </div>
        <!-- end section 1 -->

        <!-- start section 2 desktop -->
        <div class="site-section p-5 text-center bg-image rounded-3 d-none d-lg-block" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">등록</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <div class="row">
                        <div class="col-5">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">날짜</h4><br>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">2023년 9월 14일~17일</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">위치</h4><br>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">JCC 홀 A&B, 자카르타, 인도네시아</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row text-black" style="text-align: left;">
                        <div class="col-5">
                            <h4 style="font-size: 1.4rem">운영시간</h4><br>
                        </div>
                        <div class="col-7">
                            <h4 style="font-size: 1.4rem">[9월 14-16일] 오전 10시 – 오후 6시 <br> [9월 17일] 오전 10시 – 오후 5시 <br> 폐장 30분 전 입장 마감</h4><br>
                        </div>
                    </div>
                    <div class="row text-black" style="text-align: left;">
                        <div class="col-5">
                            <h4 style="font-size: 1.4rem">온라인 사전등록</h4><br>
                        </div>
                        <div class="col-7">
                            <h4 style="font-size: 1.4rem">모든 JIPREMIUM 구매자 및 방문자는 온라인 등록을 통해 무료 입장권을 얻을 수 있습니다.
                            사전등록자는 JIPREMIUM 등록데스크에서 본인 확인 후 로그인 뱃지 수령 가능</h4><br>
                        </div>
                    </div>
                    <div class="row text-black" style="text-align: left;">
                        <div class="col-5">
                            <h4 style="font-size: 1.4rem">현장 등록</h4><br>
                        </div>
                        <div class="col-7">
                            <h4 style="font-size: 1.4rem">관람객은 전시기간 동안 현장에서 등록할 수 있다. 방문자는 모바일 등록 양식을 작성하여 로그인 배지를 받을 수 있습니다.
                            등록 데스크는 JCC Hall A 로비에 있습니다.</h4><br>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-dark" style="width: 300px;" onclick="alertBuyer()">구매자 등록</button>
                    <button type="submit" class="btn btn-dark" style="width: 300px;" onclick="alertVisitor()">방문자 등록</button>
                    <script>
                        function alertVisitor() {
                            alert("방문자 등록 곧 열릴 것입니다");
                        }

                        function alertBuyer() {
                            alert("구매자 등록 곧 열릴 것입니다");
                        }
                    </script>
                    {{-- <button type="submit" class="btn btn-dark" style="width: 300px;">구매자 등록</button>
                    <button type="submit" class="btn btn-dark" style="width: 300px;">방문자 등록</button> --}}
                </div>
            </div>
        </div>
        <!-- end section 2 desktop -->

        <!-- start section 2 mobile -->
        <div class="site-section p-5 text-center bg-image rounded-3 d-block d-lg-none" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 2.4rem">등록</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <div class="row">
                        <div class="col-5">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.2rem">날짜</h4><br>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.2rem">2023년 9월 14일~17일</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.2rem">위치</h4><br>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.2rem">JCC 홀 A&B, 자카르타, 인도네시아</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row text-black" style="text-align: left;">
                        <div class="col-5">
                            <h4 style="font-size: 1.2rem">운영시간</h4><br>
                        </div>
                        <div class="col-7">
                            <h4 style="font-size: 1.2rem">[9월 14-16일] 오전 10시 – 오후 6시 <br> [9월 17일] 오전 10시 – 오후 5시 <br> 폐장 30분 전 입장 마감</h4><br>
                        </div>
                    </div>
                    <div class="row text-black" style="text-align: left;">
                        <div class="col-5">
                            <h4 style="font-size: 1.2rem">온라인 사전등록</h4><br>
                        </div>
                        <div class="col-7">
                            <h4 style="font-size: 1.2rem">모든 JIPREMIUM 구매자 및 방문자는 온라인 등록을 통해 무료 입장권을 얻을 수 있습니다.
                            사전등록자는 JIPREMIUM 등록데스크에서 본인 확인 후 로그인 뱃지 수령 가능</h4><br>
                        </div>
                    </div>
                    <div class="row text-black" style="text-align: left;">
                        <div class="col-5">
                            <h4 style="font-size: 0.9rem">현장 등록</h4><br>
                        </div>
                        <div class="col-7">
                            <h4 style="font-size: 1.2rem">관람객은 전시기간 동안 현장에서 등록할 수 있다. 방문자는 모바일 등록 양식을 작성하여 로그인 배지를 받을 수 있습니다.
                            등록 데스크는 JCC Hall A 로비에 있습니다.</h4><br>
                        </div>
                    </div>
                    <br>
                    <div class="row text-black">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-dark" style="width: 200px; margin-bottom:10px;text-align: center;">구매자 등록</button>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-dark" style="width: 223px; text-align: center;">방문자 등록</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- end section 2 mobile -->
@endsection
