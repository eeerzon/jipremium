@extends('layout.layout_front_kor')
@section('content')
    <!-- start section 1 desktop -->
        <div class="site-section p-5 text-center bg-image rounded-3" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row d-none d-lg-block">
                        <div class="col-12">
                            <div class="text-black" style="text-align: left;">
                            <h4 style="font-size: 1.4rem">JIPREMIUM 사무국은 이벤트 참여와 관련하여 궁금한 사항에 대해 도움을 드리고자 합니다.
                                JIPREMIUM 사무국에 질문이나 의견을 제출하려면 다음 양식을 작성하거나 아래 연락처를 통해 직접 문의하십시오.</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row d-block d-lg-none" style="margin-top: 100px;">
                        <div class="col-12">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">JIPREMIUM 사무국은 귀하의 이벤트 참여에 관한 모든 질문에 답변을 드릴 준비가 되어 있습니다.<br><br>
                                JIPREMIUM 사무국에 질문이나 의견을 보내려면 다음 양식을 작성하거나 아래 세부 정보를 사용하여 직접 문의하십시오.</h4>
                            </div>
                        </div>
                    </div>
                    <br><br>

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <p style="color:black; font-weight:500;">{{ $message }}</p>
                    </div>
                    @endif

                    <form action="{{ route('inquiries.korea') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <h4 style="text-align: left; font-size: 1.4rem;">이름 <b style="color: red;">*</b></h4>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="first_name" placeholder="이름" required>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="last_name" placeholder="성" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <h4 style="text-align: left; font-size: 1.4rem;">회사 이름 <b style="color: red;">*</b></h4>
                                    <input type="text" class="form-control" name="company" placeholder="회사 이름" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <h4 style="text-align: left; font-size: 1.4rem;">국가 <b style="color: red;">*</b></h4>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="country" placeholder="South Korea" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12" style="text-align: left;">
                                    <h4 style="text-align: left; font-size: 1.4rem;">질문 <b style="color: red;">*</b></h4>
                                    <input type="text" class="form-control" name="inquiry" placeholder="질문" required>
                                    <br>
                                    <!-- button dekstop -->
                                    <button type="submit" class="btn btn-dark d-none d-lg-block" style="width: 300px;">보내다</button>
                                </div>
                            </div>
                            <!-- button mobile -->
                            <div class="row">
                                <div class="col-12 col-sm-12 d-block d-lg-none" style="text-align: left;">
                                    <button type="submit" class="btn btn-dark btn-md form-control">보내다</button>
                                </div>
                            </div>
                        </div>
                    </form>
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

    <!-- start section 1 mobile -->
        {{-- <div class="site-section p-5 text-center bg-image rounded-3 d-block d-lg-none" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100" style="margin-top: 30px;">
                <div class="container">
                    <div class="row d-block d-lg-none">
                        <div class="col-12">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">JIPREMIUM 사무국은 귀하의 이벤트 참여에 관한 모든 질문에 답변을 드릴 준비가 되어 있습니다.<br><br>
                                JIPREMIUM 사무국에 질문이나 의견을 보내려면 다음 양식을 작성하거나 아래 세부 정보를 사용하여 직접 문의하십시오.</h4>
                            </div>
                        </div>
                    </div>
                    <br><br>

                    @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <p style="color:black; font-weight:500;">{{ $message }}</p>
                    </div>
                    @endif

                    <form>
                        <div class="form-group">
                            <h4 style="text-align: left; font-size: 1.4rem;">NAME <b style="color: red;">*</b></h4>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="first_name" placeholder="first" required>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="last_name" placeholder="last" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <h4 style="text-align: left; font-size: 1.4rem;">COMPANY NAME <b style="color: red;">*</b></h4>
                                    <input type="text" class="form-control" name="company" placeholder="Company Name" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <h4 style="text-align: left; font-size: 1.4rem;">COUNTRY <b style="color: red;">*</b></h4>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="country" placeholder="Indonesia" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12" style="text-align: left;">
                                    <h4 style="text-align: left; font-size: 1.4rem;">INQUIRY <b style="color: red;">*</b></h4>
                                    <input type="text" class="form-control" name="inquiry" placeholder="Inquiry" required><br>
                                    <button type="submit" class="btn btn-dark" style="width: 200px;">SUBMIT</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr style="border-top: 1px solid black; margin-top: 4rem; margin-bottom: 3rem;">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-black" style="text-align: left;">
                                <h4 style="font-size: 1.4rem">For more information, please contact the JIPREMIUM Secretariat</h4><br>
                                <h4 style="font-size: 1.5rem"><b> INTERNATIONAL <b></h4>
                                <h4 style="font-size: 1.4rem">+82-2-6000-8004  coexoverseas@gmail.com</h4><br>
                                <h4 style="font-size: 1.5rem"><b> INDONESIA LOCAL <b></h4>
                                <h4 style="font-size: 1.4rem">+62-21-3854348  jipremium@wwtp.com </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    <!-- end section 1 mobile -->
@endsection
