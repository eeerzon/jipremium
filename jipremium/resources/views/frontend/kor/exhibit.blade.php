@extends('layout.layout_front_kor')
<style>
    /* start pricing */
        @import url(https://fonts.googleapis.com/css?family=Century Gothic:400,100,100italic,300,300italic,400italic,700italic,700,900italic,900);
        @import url(https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900);
        @import url(https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900);
        body{background-color:#eee;}

        #generic_price_table{
            background-color: #f0eded;
        }

        /*PRICE COLOR CODE START*/
        #generic_price_table .generic_content{
            background-color: #fff;
        }

        #generic_price_table .generic_content .generic_head_price{
            background-color: #f6f6f6;
        }

        #generic_price_table .generic_content .generic_head_price .generic_head_content .head_bg{
            border-color: #e4e4e4 rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) #e4e4e4;
        }

        #generic_price_table .generic_content .generic_head_price .generic_head_content .head span{
            color: #525252;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .price .sign{
            color: #414141;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .price .currency{
            color: #414141;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .price .cent{
            color: #414141;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .month{
            color: #414141;
        }

        #generic_price_table .generic_content .generic_feature_list ul li{
            color: #a7a7a7;
        }

        #generic_price_table .generic_content .generic_feature_list ul li span{
            color: #414141;
        }
        #generic_price_table .generic_content .generic_feature_list ul li:hover{
            background-color: #E4E4E4;
            border-left: 5px solid black;
        }

        #generic_price_table .generic_content .generic_price_btn a{
            border: 1px solid black;
            color: black;
        }

        #generic_price_table .generic_content.active .generic_head_price .generic_head_content .head_bg,
        #generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head_bg{
            border-color: black rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) black;
            color: #fff;
        }

        #generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head span,
        #generic_price_table .generic_content.active .generic_head_price .generic_head_content .head span{
            color: #fff;
        }

        #generic_price_table .generic_content:hover .generic_price_btn a,
        #generic_price_table .generic_content.active .generic_price_btn a{
            background-color: black;
            color: #fff;
        }
        #generic_price_table{
            margin: 50px 0 50px 0;
            font-family: 'Raleway', sans-serif;
        }
        .row .table{
            padding: 28px 0;
        }

        /*PRICE BODY CODE START*/

        #generic_price_table .generic_content{
            overflow: hidden;
            position: relative;
            text-align: center;
        }

        #generic_price_table .generic_content .generic_head_price {
            margin: 0 0 20px 0;
        }

        #generic_price_table .generic_content .generic_head_price .generic_head_content{
            margin: 0 0 50px 0;
        }

        #generic_price_table .generic_content .generic_head_price .generic_head_content .head_bg{
            border-style: solid;
            border-width: 90px 1411px 0px 500px;
            position: absolute;
        }

        #generic_price_table .generic_content .generic_head_price .generic_head_content .head{
            padding-top: 20px;
            position: relative;
            z-index: 1;
        }

        #generic_price_table .generic_content .generic_head_price .generic_head_content .head span{
            font-family: "Raleway",sans-serif;
            font-size: 28px;
            font-weight: 400;
            letter-spacing: 2px;
            margin: 0;
            padding: 0;
            text-transform: uppercase;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag{
            padding: 0 0 20px;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .price{
            display: block;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .price .sign{
            display: inline-block;
            font-family: "Century Gothic",sans-serif;
            font-size: 28px;
            font-weight: 400;
            vertical-align: middle;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .price .currency{
            font-family: "Century Gothic",sans-serif;
            font-size: 60px;
            font-weight: 300;
            letter-spacing: -2px;
            line-height: 60px;
            padding: 0;
            vertical-align: middle;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .price .cent{
            display: inline-block;
            font-family: "Century Gothic",sans-serif;
            font-size: 24px;
            font-weight: 400;
            vertical-align: bottom;
        }

        #generic_price_table .generic_content .generic_head_price .generic_price_tag .month{
            font-family: "Century Gothic",sans-serif;
            font-size: 18px;
            font-weight: 400;
            letter-spacing: 3px;
            vertical-align: bottom;
        }

        #generic_price_table .generic_content .generic_feature_list ul{
            list-style: none;
            padding: 0;
            margin: 0;
        }

        #generic_price_table .generic_content .generic_feature_list ul li{
            font-family: "Century Gothic",sans-serif;
            font-size: 18px;
            padding: 15px 0;
            transition: all 0.3s ease-in-out 0s;
        }
        #generic_price_table .generic_content .generic_feature_list ul li:hover{
            transition: all 0.3s ease-in-out 0s;
            -moz-transition: all 0.3s ease-in-out 0s;
            -ms-transition: all 0.3s ease-in-out 0s;
            -o-transition: all 0.3s ease-in-out 0s;
            -webkit-transition: all 0.3s ease-in-out 0s;

        }
        #generic_price_table .generic_content .generic_feature_list ul li .fa{
            padding: 0 10px;
        }
        #generic_price_table .generic_content .generic_price_btn{
            margin: 20px 0 32px;
        }

        #generic_price_table .generic_content .generic_price_btn a{
            border-radius: 50px;
            -moz-border-radius: 50px;
            -ms-border-radius: 50px;
            -o-border-radius: 50px;
            -webkit-border-radius: 50px;
            display: inline-block;
            font-family: "Century Gothic",sans-serif;
            font-size: 18px;
            outline: medium none;
            padding: 12px 30px;
            text-decoration: none;
            text-transform: uppercase;
        }

        #generic_price_table .generic_content,
        #generic_price_table .generic_content:hover,
        #generic_price_table .generic_content .generic_head_price .generic_head_content .head_bg,
        #generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head_bg,
        #generic_price_table .generic_content .generic_head_price .generic_head_content .head h2,
        #generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head h2,
        #generic_price_table .generic_content .price,
        #generic_price_table .generic_content:hover .price,
        #generic_price_table .generic_content .generic_price_btn a,
        #generic_price_table .generic_content:hover .generic_price_btn a{
            transition: all 0.3s ease-in-out 0s;
            -moz-transition: all 0.3s ease-in-out 0s;
            -ms-transition: all 0.3s ease-in-out 0s;
            -o-transition: all 0.3s ease-in-out 0s;
            -webkit-transition: all 0.3s ease-in-out 0s;
        }
        @media (max-width: 320px) {
        }

        @media (max-width: 767px) {
            #generic_price_table .generic_content{
            margin-bottom:75px;
            }
        }
        @media (min-width: 768px) and (max-width: 991px) {
            #generic_price_table .col-md-3{
            float:left;
            width:50%;
            }

            #generic_price_table .col-md-4{
            float:left;
            width:50%;
            }

            #generic_price_table .generic_content{
            margin-bottom:75px;
            }
        }
        @media (min-width: 992px) and (max-width: 1199px) {
        }
        @media (min-width: 1200px) {
        }
        #generic_price_table_home{
            font-family: 'Raleway', sans-serif;
        }

        .text-center h1,
        .text-center h1 a{
            color: #7885CB;
            font-size: 30px;
            font-weight: 300;
            text-decoration: none;
        }
        .demo-pic{
            margin: 0 auto;
        }
        .demo-pic:hover{
            opacity: 0.7;
        }

        #generic_price_table_home ul{
            margin: 0 auto;
            padding: 0;
            list-style: none;
            display: table;
        }
        #generic_price_table_home li{
            float: left;
        }
        #generic_price_table_home li + li{
            margin-left: 10px;
            padding-bottom: 10px;
        }
        #generic_price_table_home li a{
            display: block;
            width: 50px;
            height: 50px;
            font-size: 0px;
        }
        #generic_price_table_home .blue{
            background: #3498DB;
            transition: all 0.3s ease-in-out 0s;
        }
        #generic_price_table_home .emerald{
            background: black;
            transition: all 0.3s ease-in-out 0s;
        }
        #generic_price_table_home .grey{
            background: #7F8C8D;
            transition: all 0.3s ease-in-out 0s;
        }
        #generic_price_table_home .midnight{
            background: #34495E;
            transition: all 0.3s ease-in-out 0s;
        }
        #generic_price_table_home .orange{
            background: #E67E22;
            transition: all 0.3s ease-in-out 0s;
        }
        #generic_price_table_home .purple{
            background: #9B59B6;
            transition: all 0.3s ease-in-out 0s;
        }
        #generic_price_table_home .red{
            background: #E74C3C;
            transition:all 0.3s ease-in-out 0s;
        }
        #generic_price_table_home .turquoise{
            background: black;
            transition: all 0.3s ease-in-out 0s;
        }

        #generic_price_table_home .blue:hover,
        #generic_price_table_home .emerald:hover,
        #generic_price_table_home .grey:hover,
        #generic_price_table_home .midnight:hover,
        #generic_price_table_home .orange:hover,
        #generic_price_table_home .purple:hover,
        #generic_price_table_home .red:hover,
        #generic_price_table_home .turquoise:hover{
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
            border-top-left-radius: 50px;
            border-top-right-radius: 50px;
            transition: all 0.3s ease-in-out 0s;
        }
        #generic_price_table_home .divider{
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
            padding: 20px;
        }
        #generic_price_table_home .divider span{
            width: 100%;
            display: table;
            height: 2px;
            background: #ddd;
            margin: 50px auto;
            line-height: 2px;
        }
        #generic_price_table_home .itemname{
            text-align: center;
            font-size: 50px ;
            padding: 50px 0 20px ;
            border-bottom: 1px solid #ddd;
            margin-bottom: 40px;
            text-decoration: none;
            font-weight: 300;
        }
        #generic_price_table_home .itemnametext{
            text-align: center;
            font-size: 20px;
            padding-top: 5px;
            text-transform: uppercase;
            display: inline-block;
        }
        #generic_price_table_home .footer{
            padding:40px 0;
        }

        .price-heading{
            text-align: center;
        }
        .price-heading h1{
            color: #666;
            margin: 0;
            padding: 0 0 50px 0;
        }
        .demo-button {
            background-color: #333333;
            color: #ffffff;
            display: table;
            font-size: 20px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
            margin-bottom: 50px;
            outline-color: -moz-use-text-color;
            outline-style: none;
            outline-width: medium ;
            padding: 10px;
            text-align: center;
            text-transform: uppercase;
        }
        .bottom_btn{
            background-color: #333333;
            color: #ffffff;
            display: table;
            font-size: 28px;
            margin: 60px auto 20px;
            padding: 10px 25px;
            text-align: center;
            text-transform: uppercase;
        }
        .demo-button:hover{
            background-color: #666;
            color: #FFF;
            text-decoration:none;

        }
        .bottom_btn:hover{
            background-color: #666;
            color: #FFF;
            text-decoration:none;
        }
    /* end pricing */
</style>
@section('content')
    <!-- start section 1 -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <img src="/images/banner2.png" alt="Image" style="margin-bottom:10px; margin-top:100px;" class="img-fluid">
                </div>
            </div>
        </div>
    <!-- end section 1 -->

    <!-- start section 2 desktop -->
        <div class="site-section p-5 text-center bg-image rounded-3 d-none d-lg-block" style="background-color: white;">
            <div class="d-flex justify-content-left align-items-left h-100">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <div class="text-black" style="text-align: left;">
                            <h4 style="font-size: 2.4rem">부스 예약</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-black" style="text-align: left;">
                            <h4 style="font-size: 1.4rem">JIPREMIUM 전시에 관심을 가져주셔서 감사합니다. JIPREMIUM 2022 전시회 등록 및 참가업체 결제를 완료하려면 아래 단계를 완료하세요.</h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="row text-black" style="text-align: left;">
                        <div class="col-4" >
                            <h4 style="font-size: 1.4rem">1 단계</h4><br>
                            <h4 style="font-size: 1.4rem; color:#e6595f;"><i>전시회 참가자 제출 양식 보내기</i></h4><br>
                            <h4 style="font-size: 1.2rem;">전시 참가 신청서를 작성하여 이메일로 보내주십시오.</h4><br>
                            <h4 style="font-size: 1.3rem;"><b>이메일</b></h4>
                            <h4 style="font-size: 1.2rem;">coexoverseas@gmail.com</h4><br>
                            <h4 style="font-size: 1.3rem;"><b>노트</b></h4>
                            <h4 style="font-size: 1.2rem;">참가업체는 선착순으로 등록됩니다.</h4><br>

                            <a href="{{url('/download/application_form.docx')}}" class="btn btn-dark" style="width: 300px; background-color: #e6595f;" download>에서 등록 다운로드</a>
                        </div>
                        <div class="col-4" style="border-left: 1px solid black; border-right: 1px solid black;">
                            <h4 style="font-size: 1.4rem">2 단계</h4><br>
                            <h4 style="font-size: 1.4rem; color:#e6595f;"><i>결제하기</i></h4><br><br>
                            <h4 style="font-size: 1.2rem;">참가신청서 제출 시 총 부스비와 공과금 100%를 아래 계좌로 송금해주셔야 합니다. 최종 마감일은 2023년 7월 28일입니다. 신청서 접수 후 JIPREMIUM 사무국에서 개별적으로 청구서를 발행합니다.</h4><br>
                        </div>
                        <div class="col-4">
                            <h4 style="font-size: 1.4rem">3단계</h4><br>
                            <h4 style="font-size: 1.4rem; color:#e6595f;"><i>추가 양식 작성</i></h4><br>
                            <h4 style="font-size: 1.2rem;">배지 주문 양식, Fascia Board 이름 주문 양식, 공인 디렉토리 주문 양식 및 유틸리티 양식과 같은 모든 출품자 양식 제출</h4><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- end section 2 desktop -->

    <!-- start section 2 mobile -->
    <div class="site-section p-5 text-center bg-image rounded-3 d-block d-lg-none" style="background-color: white;">
        <div class="d-flex justify-content-left align-items-left">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="text-black" style="text-align: center;">
                            <h4 style="font-size: 1.64rem">부스 예약</h4>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 1px solid black">
                <div class="row">
                    <div class="col-12">
                        <div class="text-black" style="text-align: left;">
                            <h4 style="font-size: 1.4rem">JIPREMIUM 전시에 관심을 가져주셔서 감사합니다. JIPREMIUM 2022 전시회 등록 및 참가업체 결제를 완료하려면 아래 단계를 완료하세요.</h4><br>
                        </div>
                    </div>
                </div>
                <div class="row text-black" style="text-align: left;">
                    <div class="col-sm-12" style="margin-bottom:30px;">
                        <h4 style="font-size: 1.4rem"><b>1 단계<b></h4><br>
                        <h4 style="font-size: 1.4rem; color:#e6595f;"><i>전시회 참가자 제출 양식 보내기</i></h4><br>
                        <h4 style="font-size: 1.2rem;">전시 참가 신청서를 작성하여 이메일로 보내주십시오.</h4><br>
                        <h4 style="font-size: 1.3rem;"><b>이메일</b></h4>
                        <h4 style="font-size: 1.2rem;">coexoverseas@gmail.com</h4><br>
                        <h4 style="font-size: 1.3rem;"><b>노트</b></h4>
                        <h4 style="font-size: 1.2rem;">참가업체는 선착순으로 등록됩니다.</h4><br>

                        <a href="download/application_form.docx" class="btn btn-dark" style="max-width: 100%; background-color: #e6595f;" download>에서 등록 다운로드</a>
                    </div>
                    <div class="col-sm-12">
                        <h4 style="font-size: 1.4rem"><b>2 단계<b></h4><br>
                        <h4 style="font-size: 1.4rem; color:#e6595f;"><i>결제하기</i></h4><br><br>
                        <h4 style="font-size: 1.2rem;">참가신청서 제출 시 총 부스비와 공과금 100%를 아래 계좌로 송금해주셔야 합니다. 최종 마감일은 2023년 7월 28일입니다. 신청서 접수 후 JIPREMIUM 사무국에서 개별적으로 청구서를 발행합니다.</h4><br>
                    </div>
                    <div class="col-sm-12">
                        <h4 style="font-size: 1.4rem"><b>3단계<b></h4><br>
                        <h4 style="font-size: 1.4rem; color:#e6595f;"><i>추가 양식 작성</i></h4><br><br>
                        <h4 style="font-size: 1.2rem;">배지 주문 양식, Fascia Board 이름 주문 양식, 공인 디렉토리 주문 양식 및 유틸리티 양식과 같은 모든 출품자 양식 제출</h4><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section 2 mobile -->

    <!-- start section 3 pricing -->
        <div id="generic_price_table">
            <section>
                <div class="container">
                    <!-- title dekstop -->
                    <div class="row">
                        <div class="col-8 d-none d-lg-block">
                            <div class="text-black" style="text-align: left; margin-top: 20px;">
                                <h4 style="font-size: 2.4rem">부스비</h4>
                            </div>
                        </div>
                    </div>

                    <!-- title mobile -->
                    <div class="row">
                        <div class="col-12 col-sm-12 d-block d-lg-none">
                            <div class="text-black" style="text-align: center; margin-top: 20px;">
                                <h4 style="font-size: 1.64rem">부스비</h4>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 1px solid black">
                </div>
                <div class="container" style="padding-bottom: 20px;">
                    <!--BLOCK ROW START-->
                    <div class="row">
                        <div class="col-md-4">
                            <!--PRICE CONTENT START-->
                            <div class="generic_content clearfix">
                                <!--HEAD PRICE DETAIL START-->
                                <div class="generic_head_price clearfix">
                                    <!--HEAD CONTENT START-->
                                    <div class="generic_head_content clearfix">
                                        <!--HEAD START-->
                                        <div class="head_bg"></div>
                                        <div class="head">
                                            <span>유일한 장소</span><br>
                                            <span style="font-size: 15px;">(최소 2부스)</span>
                                        </div>
                                        <!--//HEAD END-->
                                    </div>
                                    <!--//HEAD CONTENT END-->
                                    <!--PRICE START-->
                                    <div class="generic_price_tag clearfix">
                                        <h5> Early Bird </h5>
                                        <span class="price">
                                            <span class="sign">USD</span>
                                            <span class="currency">2</span>
                                            <span class="cent">.800</span>
                                        </span><br>
                                        <h5> General </h5>
                                        <span class="price">
                                            <span class="sign">USD</span>
                                            <span class="currency">3</span>
                                            <span class="cent">.100</span>
                                        </span>
                                    </div>
                                    <!--//PRICE END-->
                                </div>
                                <!--//HEAD PRICE DETAIL END-->
                                <!--FEATURE LIST START-->
                                <div class="generic_feature_list">
                                    <ul style="height: 596px;">
                                        <li><span>✓ 유일한 장소 단품 제공 (3x3m/부스)</span></li>
                                        <li><span>✓ 부스는 설치 전 주최자의 승인을 받아야 합니다.</span></li>
                                        <li><span>✓ 추가 시설은 필요한 경우 별도로 요청해야 합니다.</span></li>
                                    </ul>
                                </div>
                                <!--//FEATURE LIST END-->
                            </div>
                            <!--//PRICE CONTENT END-->
                        </div>
                        <div class="col-md-4">
                            <!--PRICE CONTENT START-->
                            <div class="generic_content active clearfix">
                                <!--HEAD PRICE DETAIL START-->
                                <div class="generic_head_price clearfix">
                                    <!--HEAD CONTENT START-->
                                    <div class="generic_head_content clearfix">
                                        <!--HEAD START-->
                                        <div class="head_bg"></div>
                                        <div class="head">
                                            <span>기준</span>
                                        </div>
                                        <!--//HEAD END-->
                                    </div>
                                    <!--//HEAD CONTENT END-->
                                    <!--PRICE START-->
                                    <div class="generic_price_tag clearfix">
                                        <br>
                                        <h5> Early Bird </h5>
                                        <span class="price">
                                            <span class="sign">USD</span>
                                            <span class="currency">3</span>
                                            <span class="cent">.100</span>
                                        </span><br>
                                        <h5> General </h5>
                                        <span class="price">
                                            <span class="sign">USD</span>
                                            <span class="currency">3</span>
                                            <span class="cent">.400</span>
                                        </span>
                                    </div>
                                    <!--//PRICE END-->
                                </div>
                                <!--//HEAD PRICE DETAIL END-->
                                <!--FEATURE LIST START-->
                                <div class="generic_feature_list">
                                    <ul style="height: 596px;">
                                        <li><span>✓ 표준 쉘 제공</span></li>
                                        <li style="border-bottom: 1px solid black; border-top: 1px solid black;"><span><b>• 장비 •</b></span></li>
                                        <li><span>✓ 회사 명판 및 부스 번호 </span></li>
                                        <li><span>✓ 파이텍스 바닥재 </span></li>
                                        <li><span>✓ 의자 1개가 있는 안내 데스크 1개 </span></li>
                                        <li><span>✓ 1kW 조명(전원 포함)</span></li>
                                        <li><span>✓ 전원 플러그 1개, 휴지통 1개 </span></li>
                                        <li><span>✓ 추가 시설은 필요한 경우 별도로 요청해야 합니다. </span></li>
                                    </ul>
                                </div>
                                <!--//FEATURE LIST END-->
                            </div>
                            <!--//PRICE CONTENT END-->
                        </div>
                        <div class="col-md-4">
                            <!--PRICE CONTENT START-->
                            <div class="generic_content clearfix">
                                <!--HEAD PRICE DETAIL START-->
                                <div class="generic_head_price clearfix">
                                    <!--HEAD CONTENT START-->
                                    <div class="generic_head_content clearfix">
                                        <!--HEAD START-->
                                        <div class="head_bg"></div>
                                        <div class="head">
                                            <span>프리미엄</span><br>
                                            <span style="font-size: 15px;">( 최소 6부스 )</span>
                                        </div>
                                        <!--//HEAD END-->
                                    </div>
                                    <!--//HEAD CONTENT END-->
                                    <!--PRICE START-->
                                    <div class="generic_price_tag clearfix">
                                        <span class="price">
                                            <h5> Early Bird </h5>
                                            <span class="price">
                                                <span class="sign">USD</span>
                                                <span class="currency">4</span>
                                                <span class="cent">.300</span>
                                            </span><br>
                                            <h5> General </h5>
                                            <span class="price">
                                            <span class="sign">USD</span>
                                            <span class="currency">4</span>
                                            <span class="cent">.600</span>
                                            </span>
                                        </span>
                                    </div>
                                    <!--//PRICE END-->
                                </div>
                                <!--//HEAD PRICE DETAIL END-->
                                <!--FEATURE LIST START-->
                                <div class="generic_feature_list">
                                    <ul>
                                        <li><span>✓ 특별한 프리미엄 부스 디자인 제공 </span></li>
                                        <li style="border-bottom: 1px solid black; border-top: 1px solid black;"><span><b>• 장비 •</b></span></li>
                                        <li><span>✓ 회사 명판 및 부스 번호 </span></li>
                                        <li><span>✓ 파이텍스 바닥재 </span></li>
                                        <li><span>✓ 의자 1개가 있는 안내 데스크 1개 </span></li>
                                        <li><span>✓ 4인용 컨설팅 테이블 1개 </span></li>
                                        <li><span>✓ 1kW 조명(전원 포함) </span></li>
                                        <li><span>✓ 전원 플러그 1개, 휴지통 1개 </span></li>
                                        <li><span>✓ 추가 시설은 필요한 경우 별도로 요청해야 합니다. </span></li>
                                    </ul>
                                </div>
                                <!--//FEATURE LIST END-->
                            </div>
                            <!--//PRICE CONTENT END-->
                        </div>
                    </div>
                    <!--//BLOCK ROW END-->
                </div>
            </section>
        </div>
    <!-- end section 3 pricing -->

    <!-- end section 4 -->
        <div class="container">
            <!-- title dekstop -->
            <div class="row">
                <div class="col-8 d-none d-lg-block">
                    <div class="text-black" style="text-align: left; margin-top: 20px;">
                        <h4 style="font-size: 2.4rem">중요한 날들</h4>
                    </div>
                </div>
            </div>

            <!-- title mobile -->
            <div class="row">
                <div class="col-12 col-sm-12 d-block d-lg-none">
                    <div class="text-black" style="text-align: center; margin-top: 20px;">
                        <h4 style="font-size: 1.64rem">중요한 날들</h4>
                    </div>
                </div>
            </div>
            <hr style="border-top: 1px solid black">
            <!-- card desktop -->
            <div class="row">
                <div class="col-sm-6 d-none d-lg-block">
                    <div class="card border-dark mb-3" style="padding-bottom: 15px;">
                        <div class="card-body">
                            <h4 class="card-title"><b>양식 제출 마감 </b></h4><br>
                            <h5> <b> Early Bird: </b> 28 April 2023</h5>
                            <h5> <b> General: </b> 28 July 2023</h5>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 d-none d-lg-block">
                    <div class="card border-dark mb-3">
                        <div class="card-body">
                            <h4 class="card-title"><b> 마지막 결제 </b></h4>
                            <h5>28 July 2023</h5><hr>
                            <h4 class="card-title"><b>개막식</b></h4>
                            <h5>14 - 17 September 2023</h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card mobile -->
            <div class="row">
                <div class="col-sm-6 d-block d-lg-none" style="text-align:center;">
                    <div class="card border-dark mb-3" style="padding-bottom: 15px;">
                        <div class="card-body">
                            <h4 class="card-title"><b>양식 제출 마감 </b></h4><br>
                            <h5> <b> Early Bird: </b> 28 April 2023</h5>
                            <h5> <b> General: </b> 28 July 2023</h5>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 d-block d-lg-none" style="text-align:center;">
                    <div class="card border-dark mb-3">
                        <div class="card-body">
                            <h4 class="card-title"><b> 마지막 결제 </b></h4>
                            <h5>28 July 2023</h5><hr>
                            <h4 class="card-title"><b>개막식</b></h4>
                            <h5>14 - 17 September 2023</h5>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
        </div>
        <div class="container">
            <!-- title desktop -->
            <div class="row">
                <div class="col-8 d-none d-lg-block">
                    <div class="text-black" style="text-align: left; margin-top: 20px;">
                        <h4 style="font-size: 2.4rem">부스 구성 가이드라인</h4>
                    </div>
                </div>
            </div>

            <!-- title mobile -->
            <div class="row">
                <div class="col-12 col-sm-12 d-block d-lg-none">
                    <div class="text-black" style="text-align: center; margin-top: 20px;">
                        <h4 style="font-size: 1.64rem">부스 구성 가이드라인</h4>
                    </div>
                </div>
            </div>
            <hr style="border-top: 1px solid black">
            <div class="row">
                <div class="col-12">
                    <div class="text-black" style="text-align: left;">
                        <h4 style="font-size: 1.4rem">1. 참가업체는 부스 시공을 시작하기 전에 건축 배치도를 제출하고 JIPREMIUM 사무국의 승인을 받아야 합니다.</h4><br>
                        <h4 style="font-size: 1.4rem">2. 각 부스에 구비된 형광등 2개 이외의 전기를 사용할 경우 별도의 유틸리티 신청을 하여야 합니다. 이 신청서는 [참가자 양식 및 매뉴얼]에서 확인할 수 있습니다.</h4>
                    </div>
                </div>
            </div>
            <br><br>
            <button onclick="myFunction()" class="btn btn-dark" style="width: 300px; background-color: #e6595f;">참가업체 지침 다운로드</button>
            <script>
                function myFunction() {
                    alert("참가업체 매뉴얼은 곧 업데이트 될 예정입니다.");
                }
            </script>
        </div>
        <div class="container" style="margin-bottom: 30px;">
            <hr style="border-top: 1px solid black; margin-top: 4rem; margin-bottom: 3rem;">
            <div class="row">
                <div class="col-12 col-sm-12">
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
    <!-- end section 4  -->
@endsection
