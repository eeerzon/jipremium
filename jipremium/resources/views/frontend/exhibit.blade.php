@extends('layout.layout_front_new')
<style>
    @import url(https://fonts.googleapis.com/css?family=Century Gothic:400,100,100italic,300,300italic,400italic,700italic,700,900italic,900);
    @import url(https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900);
    @import url(https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900);
    body{background-color:#eee;}

    #generic_price_table{
        background-color: #f0eded;
    }

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

    .generic_price_tag .price .sign{
        color: #414141;
    }

    .generic_price_tag .price .currency{
        color: #414141;
    }

    .generic_price_tag .price .cent{
        color: #414141;
    }

    #generic_price_table .generic_content .generic_head_price .generic_price_tag .month{
        color: #414141;
    }

    /* #generic_price_table .generic_content .generic_feature_list ul li{
        color: #a7a7a7;
    }

    #generic_price_table .generic_content .generic_feature_list ul li span{
        color: #414141;
    }
    #generic_price_table .generic_content .generic_feature_list ul li:hover{
        background-color: #E4E4E4;
        border-left: 5px solid black;
    } */

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

    .generic_price_tag{
        padding: 0 0 20px;
    }

    .generic_price_tag .price{
        display: block;
    }

    .generic_price_tag .price .sign{
        display: inline-block;
        font-family: "Century Gothic",sans-serif;
        font-size: 28px;
        font-weight: 400;
        vertical-align: middle;
    }

    .generic_price_tag .price .currency{
        font-family: "Century Gothic",sans-serif;
        font-size: 60px;
        font-weight: 300;
        letter-spacing: -2px;
        line-height: 60px;
        padding: 0;
        vertical-align: middle;
    }

    .generic_price_tag .price .cent{
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
    /* #generic_price_table .generic_content .generic_feature_list ul li:hover{
        transition: all 0.3s ease-in-out 0s;
        -moz-transition: all 0.3s ease-in-out 0s;
        -ms-transition: all 0.3s ease-in-out 0s;
        -o-transition: all 0.3s ease-in-out 0s;
        -webkit-transition: all 0.3s ease-in-out 0s;

    } */
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

    .table {
        width: 300px;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 5px;
        text-align: center;
        border: 1px solid black;
    }

    .table th {
        font-weight: 900;
    }

    .table .merged-cell {
        border-right: none;
    }
    
</style>

@section('content')
@if(app()->getLocale() == 'en')
 
    <!-- start section 1 desktop -->
    <div class="container d-none d-lg-block">
        <div class="row">
            <div class="col-sm-12 text-center">
                <img src="images/exhibit.jpg" alt="Image" style="margin-bottom:10px; margin-top:100px;" class="img-fluid">
            </div>
        </div>
    </div>
    <!-- end section 1 -->

    <!-- start section 1 mobile -->
    <div class="d-block d-lg-none">        
        <img src="images/exhibit.jpg" alt="Image" style="margin-bottom:10px; margin-top:100px;" class="img-fluid">
    </div>
    <!-- end section 1 -->

    <!-- start section 2 desktop -->
    <div class="text-center bg-image rounded-3 d-none d-lg-block" style="background-color: white;">
        <div class="d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <div class="text-black" style="text-align: left;">
                        <h4 style="font-size: 2.4rem">{{ __('exhibit.book_booth') }}</h4>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 1px solid black">
                <div class="row">
                    <div class="col-12">
                        <div class="text-black" style="text-align: left;">
                        <h4 style="font-size: 1.4rem">{{ __('exhibit.book_desc') }}</h4><br>
                        </div>
                    </div>
                </div>

                <div style="display: flex ; 
                            flex-wrap: nowrap; 
                            text-align: center; 
                            flex-direction: row; 
                            align-items: 
                            flex-start;
                            gap: 20px;
                            overflow-x: auto;
                            margin: 20px 0px;
                            justify-content: center;">

                    <!-- Step 01 -->
                    <div style="display: flex; flex-direction: column; align-items: center; min-width: 150px; max-width: 200px;">
                        <img src="images/procedur_step_(1).png" style="height: 100px;" alt="Step 1 Icon">
                        <div style="font-size: 2rem; font-weight: bold; color: #00B7FF;">01</div>
                        <div style="height: 60px;">
                            <div style="font-size: 0.9rem; font-weight: bold; margin: 10px 0;">{{ __('exhibit.step1_title') }}</div>
                        </div>
                        <div style="font-size: 0.7rem; color: gray; margin-top: 4px;">{{ __('exhibit.step1_desc') }}</div>
                        <div style="font-size: 0.7rem; color: gray; margin-top: 10px;"><b>Email</b></div>
                        <div style="font-size: 0.7rem; color: gray;">coexoverseas@gmail.com</div>
                        <div style="font-size: 0.7rem; color: gray; margin-top: 10px;"><b>{{ __('exhibit.note') }}</b></div>
                        <div style="font-size: 0.7rem; color: gray;">{{ __('exhibit.note_desc') }}</div>
                    </div>

                    <!-- Arrow -->
                    <div style="font-size: 2rem; font-weight: bold; color: #00B7FF; align-self: center;">&#8250;</div>

                    <!-- Step 02 -->
                    <div style="display: flex; flex-direction: column; align-items: center; min-width: 150px; max-width: 200px;">
                        <img src="images/procedur_step_(2).png" style="height: 100px;" alt="Step 2 Icon">
                        <div style="font-size: 2rem; font-weight: bold; color: #00B7FF;">02</div>
                        <div style="height: 60px;">
                            <div style="font-size: 0.9rem; font-weight: bold; margin: 10px 0;">{{ __('exhibit.step2_title') }}</div>
                        </div>
                        <div style="font-size: 0.7rem; color: gray; margin-top: 4px;"><b>DEPOSIT</b></div>
                        <div style="font-size: 0.7rem; color: gray;">{{ __('exhibit.step2_desc') }}</div>
                        <div style="font-size: 0.7rem; color: gray; margin-top: 10px;"><b>{{ __('exhibit.balance') }}</b></div>
                        <div style="font-size: 0.7rem; color: gray;">{{ __('exhibit.balance_desc') }}</div>
                    </div>

                    <!-- Arrow -->
                    <div style="font-size: 2rem; cfont-weight: bold; color: #00B7FF; align-self: center;">&#8250;</div>

                    <!-- Step 03 -->
                    <div style="display: flex; flex-direction: column; align-items: center; min-width: 150px; max-width: 200px;">
                        <img src="images/procedur_step_(3).png" style="height: 100px;" alt="Step 3 Icon">
                        <div style="font-size: 2rem; font-weight: bold; color: #00B7FF;">03</div>
                        <div style="height: 60px;">
                            <div style="font-size: 0.9rem; font-weight: bold; margin: 10px 0;">{{ __('exhibit.step3_title') }}</div>
                        </div>
                        <div style="font-size: 0.7rem; color: gray; margin-top: 4px;">{{ __('exhibit.step3_desc') }}</div>
                    </div>

                    <!-- Arrow -->
                    <div style="font-size: 2rem; font-weight: bold; color: #00B7FF; align-self: center;">&#8250;</div>

                    <!-- Step 04 -->
                    <div style="display: flex; flex-direction: column; align-items: center; min-width: 150px; max-width: 200px;">
                        <img src="images/procedur_step_(6).png" style="height: 100px;" alt="Step 4 Icon">
                        <div style="font-size: 2rem; font-weight: bold; color: #00B7FF;">04</div>
                        <div style="height: 60px;">
                            <div style="font-size: 0.9rem; font-weight: bold; margin: 10px 0;">{{ __('exhibit.step4_title') }}</div>
                        </div>
                    </div>
                </div>

                <a href="download/jipremium_2025_application_form.docx" style="display: inline-block; padding: 6px 12px; background-color: #e6595f; color: #fff; text-decoration: none; border: 1px solid #e6595f; border-radius: 4px;" download>{{ __('exhibit.download_form') }}</a>
            </div>
        </div>
    </div>
    <!-- end section 2 desktop -->

    <!-- start section 2 mobile -->
    <div class="text-center bg-image rounded-3 d-block d-lg-none" style="background-color: white;">
        <div class="d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="text-black" style="text-align: left;">
                            <h4 style="font-size: 1.2rem; font-weight: 900">{{ __('exhibit.book_booth') }}</h4>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 1px solid black">
                <div class="row">
                    <div class="col-12">
                        <div class="text-black" style="text-align: left;">
                            <h4 style="font-size: 0.8rem">{{ __('exhibit.book_desc') }}</h4><br>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin: 20px 0px; display: contents;">
                    <div style="display: flex ; 
                            flex-wrap: nowrap; 
                            text-align: center; 
                            flex-direction: column; 
                            align-items: center;
                            flex-start;
                            overflow-x: auto;
                            scroll-behavior: smooth;
                            gap: 2rem; ">

                        <!-- Step 01 -->
                        <div style="display: flex; flex-direction: column; align-items: center; min-width: 150px; max-width: 200px;">
                            <img src="images/procedur_step_(1).png" style="height: 100px;" alt="Step 1 Icon">
                            <div style="font-size: 2rem; font-weight: bold; color: #00B7FF;">01</div>
                            <div style="height: 60px;">
                                <div style="font-size: 0.9rem; font-weight: bold; margin: 10px 0;">{{ __('exhibit.step1_title') }}</div>
                            </div>
                            <div style="font-size: 0.7rem; color: gray; margin-top: 4px;">{{ __('exhibit.step1_desc') }}</div>
                            <div style="font-size: 0.7rem; color: gray; margin-top: 10px;"><b>Email</b></div>
                            <div style="font-size: 0.7rem; color: gray;">coexoverseas@gmail.com</div>
                            <div style="font-size: 0.7rem; color: gray; margin-top: 10px;"><b>{{ __('exhibit.note') }}</b></div>
                            <div style="font-size: 0.7rem; color: gray;">{{ __('exhibit.note_desc') }}</div>
                        </div>

                        <!-- Step 02 -->
                        <div style="display: flex; flex-direction: column; align-items: center; min-width: 150px; max-width: 200px;">
                            <img src="images/procedur_step_(2).png" style="height: 100px;" alt="Step 2 Icon">
                            <div style="font-size: 2rem; font-weight: bold; color: #00B7FF;">02</div>
                            <div style="height: 60px;">
                                <div style="font-size: 0.9rem; font-weight: bold; margin: 10px 0;">{{ __('exhibit.step2_title') }}</div>
                            </div>
                            <div style="font-size: 0.7rem; color: gray; margin-top: 4px;"><b>DEPOSIT</b></div>
                            <div style="font-size: 0.7rem; color: gray;">{{ __('exhibit.step2_desc') }}</div>
                            <div style="font-size: 0.7rem; color: gray; margin-top: 10px;"><b>{{ __('exhibit.balance') }}</b></div>
                            <div style="font-size: 0.7rem; color: gray;">{{ __('exhibit.balance_desc') }}</div>
                        </div>
                        
                        <!-- Step 03 -->
                        <div style="display: flex; flex-direction: column; align-items: center; min-width: 150px; max-width: 200px;">
                            <img src="images/procedur_step_(3).png" style="height: 100px;" alt="Step 3 Icon">
                            <div style="font-size: 2rem; font-weight: bold; color: #00B7FF;">03</div>
                            <div style="height: 60px;">
                                <div style="font-size: 0.9rem; font-weight: bold; margin: 10px 0;">{{ __('exhibit.step3_title') }}</div>
                            </div>
                            <div style="font-size: 0.7rem; color: gray; margin-top: 4px;">{{ __('exhibit.step3_desc') }}</div>
                        </div>
                        
                        <!-- Step 04 -->
                        <div style="display: flex; flex-direction: column; align-items: center; min-width: 150px; max-width: 200px;">
                            <img src="images/procedur_step_(6).png" style="height: 100px;" alt="Step 4 Icon">
                            <div style="font-size: 2rem; font-weight: bold; color: #00B7FF;">04</div>
                            <div style="height: 60px;">
                                <div style="font-size: 0.9rem; font-weight: bold; margin: 10px 0;">{{ __('exhibit.step4_title') }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="download/jipremium_2025_application_form.docx" style="display: inline-block; padding: 6px 12px; background-color: #e6595f; color: #fff; text-decoration: none; border: 1px solid #e6595f; border-radius: 4px;" download><small style="font-size: 10px;">{{ __('exhibit.download_form') }}</small></a>
            </div>
        </div>   
    </div>
    <!-- end section 2 mobile -->

    <!-- start section Important date -->
    <div class="container">
        <!-- title dekstop -->
        <div class="row">
            <div class="col-8 d-none d-lg-block">
                <div class="text-black" style="text-align: left; margin-top: 20px;">
                    <h4 style="font-size: 2.4rem">{{ __('exhibit.important_date') }}</h4>
                </div>
            </div>
        </div>

        <!-- title mobile -->
        <div class="row">
            <div class="col-12 col-sm-12 d-block d-lg-none">
                <div class="text-black" style="text-align: center; margin-top: 20px;">
                    <h4 style="font-size: 1.2rem">{{ __('exhibit.important_date') }}</h4>
                </div>
            </div>
        </div>

        <!-- card desktop -->        
        <div class="col-12 d-none d-lg-block" style="padding: 0px;">
            <div style="display: flex; flex-direction: column; gap: 8px; width:100%;">
    
                <div style="display: flex; justify-content: space-between;">
                    <h5>{{ __('exhibit.early_access_reg') }}</h5>
                    <h5 style="text-align: left; width: 30%;"><b>{{ __('exhibit.early_access_reg_tgl') }}</b></h5>
                </div>

                <div style="display: flex; justify-content: space-between;">
                    <h5>{{ __('exhibit.general_reg') }}</h5>
                    <h5 style="text-align: left; width: 30%;"><b>{{ __('exhibit.general_reg_tgl') }}</b></h5>
                </div>

                <div style="display: flex; justify-content: space-between;">
                    <h5>{{ __('exhibit.final_payment') }}</h5>
                    <h5 style="text-align: left; width: 30%;"><b>{{ __('exhibit.final_payment_tgl') }}</b></h5>
                </div>

                <div style="display: flex; justify-content: space-between;">
                    <h5>{{ __('exhibit.utiliti') }}</h5>
                    <h5 style="text-align: left; width: 30%;"><b>{{ __('exhibit.util_tgl') }}</b></h5>
                </div>

                <div style="display: flex; justify-content: space-between;">
                    <h5>{{ __('exhibit.exhibit') }}</h5>
                    <h5 style="text-align: left; width: 30%;"><b>{{ __('event_info.event_date') }}</b></h5>
                </div>

            </div>
        </div>
        
        <!-- card mobile -->
        <div class="row">
            <div class="col-sm-12 d-block d-lg-none">
                <div style="display: flex; flex-direction: column; gap: 8px; width:100%;">
        
                    <div style="display: flex; justify-content: space-between;">
                        <h4 style="font-size: 0.8rem">{{ __('exhibit.early_access_reg') }}</h4>
                        <h4 style="font-size: 0.8rem; text-align: left;"><b>{{ __('exhibit.general_reg_tgl') }}</b></h4>
                    </div>

                    <div style="display: flex; justify-content: space-between;">
                        <h4 style="font-size: 0.8rem">{{ __('exhibit.general_reg') }}</h4>
                        <h4 style="font-size: 0.8rem; text-align: left;"><b>{{ __('exhibit.general_reg_tgl') }}</b></h4>
                    </div>

                    <div style="display: flex; justify-content: space-between;">
                        <h4 style="font-size: 0.8rem">{{ __('exhibit.final_payment') }}</h4>
                        <h4 style="font-size: 0.8rem; text-align: left;"><b>{{ __('exhibit.final_payment_tgl') }}</b></h4>
                    </div>

                    <div style="display: flex; justify-content: space-between;">
                        <h4 style="font-size: 0.8rem">{{ __('exhibit.utiliti') }}</h4>
                        <h4 style="font-size: 0.8rem; text-align: left;"><b>{{ __('exhibit.util_tgl') }}</b></h4>
                    </div>

                    <div style="display: flex; justify-content: space-between;">
                        <h4 style="font-size: 0.8rem">{{ __('exhibit.exhibit') }}</h4>
                        <h4 style="font-size: 0.8rem; text-align: left;"><b>{{ __('event_info.event_date') }}</b></h4>
                    </div>

                </div>
            </div>
        </div>
        <br><br>
    </div>
    <!-- end section Important date -->

    <!-- start section 3 pricing -->
    {{-- desktop --}}
    <div class="d-none d-lg-block" id="generic_price_table">
        <section>
            <div class="container">
                <!-- title dekstop -->
                <div class="row">
                    <div class="col-8 d-none d-lg-block">
                        <div class="text-black" style="text-align: left;">
                            <h4 style="font-size: 2.4rem">{{ __('exhibit.booth_fee') }}</h4>
                        </div>
                    </div>
                </div>

                <!-- title mobile -->
                <div class="row">
                    <div class="col-12 col-sm-12 d-block d-lg-none">
                        <div class="text-black" style="text-align: center; margin-top: 20px;">
                            <h4 style="font-size: 1.64rem">{{ __('exhibit.booth_fee') }}</h4>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 1px solid black">
            </div>
            <div class="container" style="padding-bottom: 20px;">
                <div class="row">

                    <div style="font-family: Century Gothic, sans-serif; border: 1px solid #ddd;">
                        <!-- Header Row -->
                        <div style="display: flex; background-color: #ffffff; border-bottom: 1px solid #ccc;">
                            <div style="flex: 1; padding: 16px; font-weight: bold;"> </div>
                            <div style="flex: 1; padding: 16px; font-weight: bold; text-align: center;">{{ __('exhibit.space_only') }}<br>( Min. 2 Booths )</div>
                            <div style="flex: 1; padding: 16px; font-weight: bold; text-align: center;">Standard</div>
                            <div style="flex: 1; padding: 16px; font-weight: bold; text-align: center;">Premium<br>( Min. 6 Booths )</div>
                        </div>

                        <!-- Booth Image Row -->
                        <div style="display: flex; background-color: #ffffff; border-bottom: 1px solid #ccc;">
                            <div style="flex: 1; padding: 16px; font-weight: bold; display: flex; align-items: center;">{{ __('exhibit.booth_img') }}</div>
                                <div style="flex: 1; padding: 16px; text-align: center;">
                                    <img src="images/space_booth.png" alt="Space Only" style="max-width: 100%; height: auto;">
                                </div>
                                
                                <div style="flex: 1; padding: 16px; text-align: center;">
                                    <img src="images/standard_booth.png" alt="Standard" style="max-width: 100%; height: auto;">
                                </div>

                                <div style="flex: 1; padding: 16px; text-align: center;">
                                    <img src="images/premium_booth.png" alt="Premium Booth" style="max-width: 100%; height: auto;">
                                </div>
                        </div>

                        <!-- early access -->
                        <div style="display: flex; background-color: #ffffff; border-bottom: 1px solid #ccc;">
                            <div style="flex: 1; padding: 16px; font-weight: bold; display: flex; align-items: center;">{{ __('exhibit.early_access') }}</div>

                            <!-- Space Only -->
                            <div style="flex: 1; padding: 16px; font-size: 0.95rem;">
                                <div class="generic_price_tag clearfix">
                                    <span class="price">
                                        <span class="sign">USD</span>
                                        <span class="currency">2</span>
                                        <span class="cent">.900</span>
                                    </span>
                                </div>
                            </div>

                            <!-- Standard -->
                            <div style="flex: 1; padding: 16px; font-size: 0.95rem;">
                                <div class="generic_price_tag clearfix">
                                    <span class="price">
                                        <span class="sign">USD</span>
                                        <span class="currency">3</span>
                                        <span class="cent">.200</span>
                                    </span>
                                </div>
                            </div>

                            <!-- Premium -->
                            <div style="flex: 1; padding: 16px; font-size: 0.95rem;">
                                <div class="generic_price_tag clearfix">
                                    <span class="price">
                                            <span class="sign">USD</span>
                                            <span class="currency">4</span>
                                            <span class="cent">.400</span>
                                        </span>
                                </div>
                            </div>
                        </div>

                        <!-- general -->
                        <div style="display: flex; background-color: #ffffff; border-bottom: 1px solid #ccc;">
                            <div style="flex: 1; padding: 16px; font-weight: bold; display: flex; align-items: center;">Genaral</div>

                            <!-- Space Only -->
                            <div style="flex: 1; padding: 16px; font-size: 0.95rem;">
                                <div class="generic_price_tag clearfix">
                                    <span class="price">
                                        <span class="sign">USD</span>
                                        <span class="currency">3</span>
                                        <span class="cent">.200</span>
                                    </span>
                                </div>
                            </div>

                            <!-- Standard -->
                            <div style="flex: 1; padding: 16px; font-size: 0.95rem;">
                                <div class="generic_price_tag clearfix">
                                    <span class="price">
                                        <span class="sign">USD</span>
                                        <span class="currency">3</span>
                                        <span class="cent">.500</span>
                                    </span>
                                </div>
                            </div>

                            <!-- Premium -->
                            <div style="flex: 1; padding: 16px; font-size: 0.95rem;">
                                <div class="generic_price_tag clearfix">
                                    <span class="price">
                                        <span class="sign">USD</span>
                                        <span class="currency">4</span>
                                        <span class="cent">.700</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Specifications Row -->
                        <div style="display: flex; background-color: #ffffff; border-bottom: 1px solid #ccc;">
                            <div style="flex: 1; padding: 16px; font-weight: bold; display: flex; align-items: center;">{{ __('exhibit.spec') }}</div>
                            
                            <!-- Space Only -->
                            <div style="flex: 1; padding: 16px; font-size: 0.95rem;">
                                <div>
                                    <ul style="list-style: none;">
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.space_spec_1') }}</span></li>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.space_spec_2') }}</span></li>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.space_spec_3') }}</span></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Standard -->
                            <div style="flex: 1; padding: 16px; font-size: 0.95rem;">
                                <div>
                                    <ul style="list-style: none;">
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.standar_spek_1') }}</span></li>
                                        <span><b>• {{ __('exhibit.equipment') }} •</b></span>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.standar_spek_2') }} </span></li>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.standar_spek_3') }} </span></li>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.standar_spek_4') }} </span></li>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.standar_spek_5') }} </span></li>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.standar_spek_6') }} </span></li>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.standar_spek_7') }} </span></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Premium -->
                            <div style="flex: 1; padding: 16px; font-size: 0.95rem;">
                                <div>
                                    <ul style="list-style: none;">
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.premium_spek_1') }} </span></li>
                                        <span><b>• {{ __('exhibit.equipment') }} •</b></span>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.premium_spek_2') }} </span></li>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.premium_spek_3') }} </span></li>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.premium_spek_4') }} </span></li>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.premium_spek_5') }} </span></li>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.premium_spek_6') }}  </span></li>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.premium_spek_7') }} </span></li>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.premium_spek_8') }} </span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    
    {{-- mobile --}}
    <div class="d-block d-lg-none" id="generic_price_table">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 d-block d-lg-none">
                        <div class="text-black" style="text-align: left; margin-top: 20px;">
                            <h4 style="font-size: 1.64rem; font-weight: 900;">{{ __('exhibit.booth_fee') }}</h4>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 1px solid black">
            </div>
            <div class="container" style="padding-bottom: 20px;">
                <div class="row">
                    <div class="col-md-4">
                        <div class="generic_content active clearfix" style="margin-bottom: 20px;">
                            <div class="generic_head_price clearfix" style="margin: 0px;">
                                <div class="generic_head_content clearfix" style="margin: 0px;">
                                    <div class="head_bg"></div>
                                    <div class="head">
                                        <span>{{ __('exhibit.space_only') }}</span><br>
                                        <span style="font-size: 15px;">( Min. 2 Booths )</span>
                                    </div>
                                </div>

                                <div style="flex: 1; padding: 16px; text-align: center; background-color: #ffffff">
                                    <img src="images/space_booth.png" alt="Space Only" style="max-width: 100%; height: auto;">
                                </div>

                                <table class="table" style="background-color: #ffffff;">
                                    <tr>
                                        <th style="border-left: none;"><h5 style="font-weight: 900;">{{ __('exhibit.early_access') }}</h5></th>
                                        <th class="merged-cell"><h5 style="font-weight: 900;">General</h5></th>
                                    </tr>
                                    <tr>
                                        <td style="border-left: none"><h5>$2,800 USD</h5></td>
                                        <td class="merged-cell"><h5>$3,100 USD</h5></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="generic_feature_list" style="text-align: left;">
                                <ul style="height: 596px; padding: 0px 8px;">
                                    <li>-<span> {{ __('exhibit.space_spec_1') }}</span></li>
                                    <li>-<span> {{ __('exhibit.space_spec_2') }}</span></li>
                                    <li>-<span> {{ __('exhibit.space_spec_3') }}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="generic_content active clearfix" style="margin-bottom: 20px;">
                            <div class="generic_head_price clearfix" style="margin: 0px;">
                                <div class="generic_head_content clearfix" style="margin: 0px;">
                                    <div class="head_bg"></div>
                                    <div class="head">
                                        <span>Standard</span>
                                    </div>
                                </div>
                                
                                <div style="flex: 1; padding: 16px; text-align: center; background-color: #ffffff;">
                                    <img src="images/standard_booth.png" alt="Standard" style="max-width: 100%; height: auto;">
                                </div>

                                <table class="table" style="margin-top: 20px; background-color: #ffffff;">
                                    <tr>
                                        <th style="border-left: none;"><h5 style="font-weight: 900;">{{ __('exhibit.early_access') }}</h5></th>
                                        <th class="merged-cell"><h5 style="font-weight: 900;">General</h5></th>
                                    </tr>
                                    <tr>
                                        <td style="border-left: none"><h5>$3,100 USD</h5></td>
                                        <td class="merged-cell"><h5>$3,400 USD</h5></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="generic_feature_list" style="text-align: left;">
                                <ul style="height: 596px; padding: 0px 8px;">
                                    <li>-<span> {{ __('exhibit.standar_spek_1') }}</span></li>
                                    <span><b>• {{ __('exhibit.equipment') }} •</b></span>
                                    <li>-<span> {{ __('exhibit.standar_spek_2') }} </span></li>
                                    <li>-<span> {{ __('exhibit.standar_spek_3') }} </span></li>
                                    <li>-<span> {{ __('exhibit.standar_spek_4') }} </span></li>
                                    <li>-<span> {{ __('exhibit.standar_spek_5') }} </span></li>
                                    <li>-<span> {{ __('exhibit.standar_spek_6') }} </span></li>
                                    <li>-<span> {{ __('exhibit.standar_spek_7') }} </span></li>
                                </ul>
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-4">
                        <div class="generic_content active clearfix" style="margin-bottom: 20px;">
                            <div class="generic_head_price clearfix" style="margin: 0px;">
                                <div class="generic_head_content clearfix" style="margin: 0px;">
                                    <div class="head_bg"></div>
                                    <div class="head">
                                        <span>Premium</span><br>
                                        <span style="font-size: 15px;">( Min. 6 Booths )</span>
                                    </div>
                                </div>

                                <div style="flex: 1; padding: 16px; text-align: center; background-color: #ffffff;">
                                    <img src="images/premium_booth.png" alt="Premium Booth" style="max-width: 100%; height: auto;">
                                </div>

                                <table class="table" style="background-color: #ffffff;">
                                    <tr>
                                        <th style="border-left: none;"><h5 style="font-weight: 900;">{{ __('exhibit.early_access') }}</h5></th>
                                        <th class="merged-cell"><h5 style="font-weight: 900;">General</h5></th>
                                    </tr>
                                    <tr>
                                        <td style="border-left: none"><h5>$4,300 USD</h5></td>
                                        <td class="merged-cell"><h5>$4,600 USD</h5></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="generic_feature_list" style="text-align: left;">
                                <ul style="list-style: none; padding: 0px 8px;">
                                    <li>-<span> {{ __('exhibit.premium_spek_1') }} </span></li>
                                    <span><b>• {{ __('exhibit.equipment') }} •</b></span>
                                    <li>-<span> {{ __('exhibit.premium_spek_2') }} </span></li>
                                    <li>-<span> {{ __('exhibit.premium_spek_3') }} </span></li>
                                    <li>-<span> {{ __('exhibit.premium_spek_4') }} </span></li>
                                    <li>-<span> {{ __('exhibit.premium_spek_5') }} </span></li>
                                    <li>-<span> {{ __('exhibit.premium_spek_6') }}  </span></li>
                                    <li>-<span> {{ __('exhibit.premium_spek_7') }} </span></li>
                                    <li>-<span> {{ __('exhibit.premium_spek_8') }} </span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- end section 3 pricing -->

    <!-- end section 4 -->
        
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
            <!-- desktop -->
            <div class="col-12 d-none d-lg-block">
                <div class="text-black" style="text-align: left;">
                    <ul>
                        <li><h4 style="font-size: 1.2rem">{{ __('exhibit.booth_desc1') }}</h4><br></li>
                        <li><h4 style="font-size: 1.2rem">{{ __('exhibit.booth_desc2') }}</h4></li>
                    </ul>
                </div>
            </div>
            <!-- mobile -->
            <div class="col-12 d-block d-lg-none">
                <div class="text-black" style="text-align: left;">
                    <ul>
                        <li><h4 style="font-size: 1rem">{{ __('exhibit.booth_desc1') }}</h4><br></li>
                        <li><h4 style="font-size: 1rem">{{ __('exhibit.booth_desc2') }}</h4></li>
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
@else
    <!-- start section 1 desktop -->
    <div class="container d-none d-lg-block">
        <div class="row">
            <div class="col-sm-12 text-center">
                <img src="images/exhibit.jpg" alt="Image" style="margin-bottom:10px; margin-top:100px;" class="img-fluid">
            </div>
        </div>
    </div>
    <!-- end section 1 -->

    <!-- start section 1 mobile -->
    <div class="d-block d-lg-none">        
        <img src="images/exhibit.jpg" alt="Image" style="margin-bottom:10px; margin-top:100px;" class="img-fluid">
    </div>
    <!-- end section 1 -->

    <!-- start section 2 desktop -->
    <div class="text-center bg-image rounded-3 d-none d-lg-block" style="background-color: white;">
        <div class="d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <div class="text-black" style="text-align: left;">
                        <h4 style="font-size: 2.4rem">{{ __('exhibit.book_booth') }}</h4>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 1px solid black">
                <div class="row">
                    <div class="col-12">
                        <div class="text-black" style="text-align: left;">
                        <h4 style="font-size: 1.4rem">{{ __('exhibit.book_desc') }}</h4><br>
                        </div>
                    </div>
                </div>

                <div style="display: flex ; 
                            flex-wrap: nowrap; 
                            text-align: center; 
                            flex-direction: row; 
                            align-items: 
                            flex-start;
                            gap: 20px;
                            overflow-x: auto;
                            margin: 20px 0px;
                            justify-content: center;">

                    <!-- Step 01 -->
                    <div style="display: flex; flex-direction: column; align-items: center; min-width: 150px; max-width: 200px;">
                        <img src="images/procedur_step_(1).png" style="height: 100px;" alt="Step 1 Icon">
                        <div style="font-size: 2rem; font-weight: bold; color: #00B7FF;">01</div>
                        <div style="height: 60px;">
                            <div style="font-size: 0.9rem; font-weight: bold; margin: 10px 0;">{{ __('exhibit.step1_title') }}</div>
                        </div>
                        <div style="font-size: 0.7rem; color: gray; margin-top: 4px;">{{ __('exhibit.step1_desc') }}</div>
                        <div style="font-size: 0.7rem; color: gray; margin-top: 10px;"><b>Email</b></div>
                        <div style="font-size: 0.7rem; color: gray;">coexoverseas@gmail.com</div>
                        <div style="font-size: 0.7rem; color: gray; margin-top: 10px;"><b>{{ __('exhibit.note') }}</b></div>
                        <div style="font-size: 0.7rem; color: gray;">{{ __('exhibit.note_desc') }}</div>
                    </div>

                    <!-- Arrow -->
                    <div style="font-size: 2rem; font-weight: bold; color: #00B7FF; align-self: center;">&#8250;</div>

                    <!-- Step 02 -->
                    <div style="display: flex; flex-direction: column; align-items: center; min-width: 150px; max-width: 200px;">
                        <img src="images/procedur_step_(2).png" style="height: 100px;" alt="Step 2 Icon">
                        <div style="font-size: 2rem; font-weight: bold; color: #00B7FF;">02</div>
                        <div style="height: 60px;">
                            <div style="font-size: 0.9rem; font-weight: bold; margin: 10px 0;">{{ __('exhibit.step2_title') }}</div>
                        </div>
                        <div style="font-size: 0.7rem; color: gray; margin-top: 4px;"><b>DEPOSIT</b></div>
                        <div style="font-size: 0.7rem; color: gray;">{{ __('exhibit.step2_desc') }}</div>
                        <div style="font-size: 0.7rem; color: gray; margin-top: 10px;"><b>{{ __('exhibit.balance') }}</b></div>
                        <div style="font-size: 0.7rem; color: gray;">{{ __('exhibit.balance_desc') }}</div>
                    </div>

                    <!-- Arrow -->
                    <div style="font-size: 2rem; cfont-weight: bold; color: #00B7FF; align-self: center;">&#8250;</div>

                    <!-- Step 03 -->
                    <div style="display: flex; flex-direction: column; align-items: center; min-width: 150px; max-width: 200px;">
                        <img src="images/procedur_step_(3).png" style="height: 100px;" alt="Step 3 Icon">
                        <div style="font-size: 2rem; font-weight: bold; color: #00B7FF;">03</div>
                        <div style="height: 60px;">
                            <div style="font-size: 0.9rem; font-weight: bold; margin: 10px 0;">{{ __('exhibit.step3_title') }}</div>
                        </div>
                        <div style="font-size: 0.7rem; color: gray; margin-top: 4px;">{{ __('exhibit.step3_desc') }}</div>
                    </div>

                    <!-- Arrow -->
                    <div style="font-size: 2rem; font-weight: bold; color: #00B7FF; align-self: center;">&#8250;</div>

                    <!-- Step 04 -->
                    <div style="display: flex; flex-direction: column; align-items: center; min-width: 150px; max-width: 200px;">
                        <img src="images/procedur_step_(6).png" style="height: 100px;" alt="Step 4 Icon">
                        <div style="font-size: 2rem; font-weight: bold; color: #00B7FF;">04</div>
                        <div style="height: 60px;">
                            <div style="font-size: 0.9rem; font-weight: bold; margin: 10px 0;">{{ __('exhibit.step4_title') }}</div>
                        </div>
                    </div>
                </div>

                <a href="download/jipremium_2025_application_form.docx" style="display: inline-block; padding: 6px 12px; background-color: #e6595f; color: #fff; text-decoration: none; border: 1px solid #e6595f; border-radius: 4px;" download>{{ __('exhibit.download_form') }}</a>
            </div>
        </div>
    </div>
    <!-- end section 2 desktop -->

    <!-- start section 2 mobile -->
    <div class="text-center bg-image rounded-3 d-block d-lg-none" style="background-color: white;">
        <div class="d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="text-black" style="text-align: left;">
                            <h4 style="font-size: 1.2rem; font-weight: 900">{{ __('exhibit.book_booth') }}</h4>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 1px solid black">
                <div class="row">
                    <div class="col-12">
                        <div class="text-black" style="text-align: left;">
                            <h4 style="font-size: 0.8rem">{{ __('exhibit.book_desc') }}</h4><br>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin: 20px 0px; display: contents;">
                    <div style="display: flex ; 
                            flex-wrap: nowrap; 
                            text-align: center; 
                            flex-direction: column; 
                            align-items: center;
                            flex-start;
                            overflow-x: auto;
                            scroll-behavior: smooth;
                            gap: 2rem; ">

                        <!-- Step 01 -->
                        <div style="display: flex; flex-direction: column; align-items: center; min-width: 150px; max-width: 200px;">
                            <img src="images/procedur_step_(1).png" style="height: 100px;" alt="Step 1 Icon">
                            <div style="font-size: 2rem; font-weight: bold; color: #00B7FF;">01</div>
                            <div style="height: 60px;">
                                <div style="font-size: 0.9rem; font-weight: bold; margin: 10px 0;">{{ __('exhibit.step1_title') }}</div>
                            </div>
                            <div style="font-size: 0.7rem; color: gray; margin-top: 4px;">{{ __('exhibit.step1_desc') }}</div>
                            <div style="font-size: 0.7rem; color: gray; margin-top: 10px;"><b>Email</b></div>
                            <div style="font-size: 0.7rem; color: gray;">coexoverseas@gmail.com</div>
                            <div style="font-size: 0.7rem; color: gray; margin-top: 10px;"><b>{{ __('exhibit.note') }}</b></div>
                            <div style="font-size: 0.7rem; color: gray;">{{ __('exhibit.note_desc') }}</div>
                        </div>

                        <!-- Step 02 -->
                        <div style="display: flex; flex-direction: column; align-items: center; min-width: 150px; max-width: 200px;">
                            <img src="images/procedur_step_(2).png" style="height: 100px;" alt="Step 2 Icon">
                            <div style="font-size: 2rem; font-weight: bold; color: #00B7FF;">02</div>
                            <div style="height: 60px;">
                                <div style="font-size: 0.9rem; font-weight: bold; margin: 10px 0;">{{ __('exhibit.step2_title') }}</div>
                            </div>
                            <div style="font-size: 0.7rem; color: gray; margin-top: 4px;"><b>DEPOSIT</b></div>
                            <div style="font-size: 0.7rem; color: gray;">{{ __('exhibit.step2_desc') }}</div>
                            <div style="font-size: 0.7rem; color: gray; margin-top: 10px;"><b>{{ __('exhibit.balance') }}</b></div>
                            <div style="font-size: 0.7rem; color: gray;">{{ __('exhibit.balance_desc') }}</div>
                        </div>
                        
                        <!-- Step 03 -->
                        <div style="display: flex; flex-direction: column; align-items: center; min-width: 150px; max-width: 200px;">
                            <img src="images/procedur_step_(3).png" style="height: 100px;" alt="Step 3 Icon">
                            <div style="font-size: 2rem; font-weight: bold; color: #00B7FF;">03</div>
                            <div style="height: 60px;">
                                <div style="font-size: 0.9rem; font-weight: bold; margin: 10px 0;">{{ __('exhibit.step3_title') }}</div>
                            </div>
                            <div style="font-size: 0.7rem; color: gray; margin-top: 4px;">{{ __('exhibit.step3_desc') }}</div>
                        </div>
                        
                        <!-- Step 04 -->
                        <div style="display: flex; flex-direction: column; align-items: center; min-width: 150px; max-width: 200px;">
                            <img src="images/procedur_step_(6).png" style="height: 100px;" alt="Step 4 Icon">
                            <div style="font-size: 2rem; font-weight: bold; color: #00B7FF;">04</div>
                            <div style="height: 60px;">
                                <div style="font-size: 0.9rem; font-weight: bold; margin: 10px 0;">{{ __('exhibit.step4_title') }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <a href="download/jipremium_2025_application_form.docx" style="display: inline-block; padding: 6px 12px; background-color: #e6595f; color: #fff; text-decoration: none; border: 1px solid #e6595f; border-radius: 4px;" download><small style="font-size: 10px;">{{ __('exhibit.download_form') }}</small></a>
            </div>
        </div>   
    </div>
    <!-- end section 2 mobile -->

    <!-- start section Important date -->
    <div class="container">
        <!-- title dekstop -->
        <div class="row">
            <div class="col-8 d-none d-lg-block">
                <div class="text-black" style="text-align: left; margin-top: 20px;">
                    <h4 style="font-size: 2.4rem">{{ __('exhibit.important_date') }}</h4>
                </div>
            </div>
        </div>

        <!-- title mobile -->
        <div class="row">
            <div class="col-12 col-sm-12 d-block d-lg-none">
                <div class="text-black" style="text-align: center; margin-top: 20px;">
                    <h4 style="font-size: 1.2rem">{{ __('exhibit.important_date') }}</h4>
                </div>
            </div>
        </div>

        <!-- card desktop -->        
        <div class="col-12 d-none d-lg-block" style="padding: 0px;">
            <div style="display: flex; flex-direction: column; gap: 8px; width:100%;">
    
                <div style="display: flex; justify-content: space-between;">
                    <h5>{{ __('exhibit.early_access_reg') }}</h5>
                    <h5 style="text-align: left; width: 30%;"><b>{{ __('exhibit.early_access_reg_tgl') }}</b></h5>
                </div>

                <div style="display: flex; justify-content: space-between;">
                    <h5>{{ __('exhibit.general_reg') }}</h5>
                    <h5 style="text-align: left; width: 30%;"><b>{{ __('exhibit.general_reg_tgl') }}</b></h5>
                </div>

                <div style="display: flex; justify-content: space-between;">
                    <h5>{{ __('exhibit.final_payment') }}</h5>
                    <h5 style="text-align: left; width: 30%;"><b>{{ __('exhibit.final_payment_tgl') }}</b></h5>
                </div>

                <div style="display: flex; justify-content: space-between;">
                    <h5>{{ __('exhibit.utiliti') }}</h5>
                    <h5 style="text-align: left; width: 30%;"><b>{{ __('exhibit.util_tgl') }}</b></h5>
                </div>

                <div style="display: flex; justify-content: space-between;">
                    <h5>{{ __('exhibit.exhibit') }}</h5>
                    <h5 style="text-align: left; width: 30%;"><b>{{ __('event_info.event_date') }}</b></h5>
                </div>

            </div>
        </div>
        
        <!-- card mobile -->
        <div class="row">
            <div class="col-sm-12 d-block d-lg-none">
                <div style="display: flex; flex-direction: column; gap: 8px; width:100%;">
        
                    <div style="display: flex; justify-content: space-between;">
                        <h4 style="font-size: 0.8rem">{{ __('exhibit.early_access_reg') }}</h4>
                        <h4 style="font-size: 0.8rem; text-align: left;"><b>{{ __('exhibit.general_reg_tgl') }}</b></h4>
                    </div>

                    <div style="display: flex; justify-content: space-between;">
                        <h4 style="font-size: 0.8rem">{{ __('exhibit.general_reg') }}</h4>
                        <h4 style="font-size: 0.8rem; text-align: left;"><b>{{ __('exhibit.general_reg_tgl') }}</b></h4>
                    </div>

                    <div style="display: flex; justify-content: space-between;">
                        <h4 style="font-size: 0.8rem">{{ __('exhibit.final_payment') }}</h4>
                        <h4 style="font-size: 0.8rem; text-align: left;"><b>{{ __('exhibit.final_payment_tgl') }}</b></h4>
                    </div>

                    <div style="display: flex; justify-content: space-between;">
                        <h4 style="font-size: 0.8rem">{{ __('exhibit.utiliti') }}</h4>
                        <h4 style="font-size: 0.8rem; text-align: left;"><b>{{ __('exhibit.util_tgl') }}</b></h4>
                    </div>

                    <div style="display: flex; justify-content: space-between;">
                        <h4 style="font-size: 0.8rem">{{ __('exhibit.exhibit') }}</h4>
                        <h4 style="font-size: 0.8rem; text-align: left;"><b>{{ __('event_info.event_date') }}</b></h4>
                    </div>

                </div>
            </div>
        </div>
        <br><br>
    </div>
    <!-- end section Important date -->

    <!-- start section 3 pricing -->
    {{-- desktop --}}
    <div class="d-none d-lg-block" id="generic_price_table">
        <section>
            <div class="container">
                <!-- title dekstop -->
                <div class="row">
                    <div class="col-8 d-none d-lg-block">
                        <div class="text-black" style="text-align: left;">
                            <h4 style="font-size: 2.4rem">{{ __('exhibit.booth_fee') }}</h4>
                        </div>
                    </div>
                </div>

                <!-- title mobile -->
                <div class="row">
                    <div class="col-12 col-sm-12 d-block d-lg-none">
                        <div class="text-black" style="text-align: center; margin-top: 20px;">
                            <h4 style="font-size: 1.64rem">{{ __('exhibit.booth_fee') }}</h4>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 1px solid black">
            </div>
            <div class="container" style="padding-bottom: 20px;">
                <div class="row">

                    <div style="font-family: Century Gothic, sans-serif; border: 1px solid #ddd;">
                        <!-- Header Row -->
                        <div style="display: flex; background-color: #ffffff; border-bottom: 1px solid #ccc;">
                            <div style="flex: 1; padding: 16px; font-weight: bold;"> </div>
                            <div style="flex: 1; padding: 16px; font-weight: bold; text-align: center;">{{ __('exhibit.space_only') }}<br>( Min. 2 Booths )</div>
                            <div style="flex: 1; padding: 16px; font-weight: bold; text-align: center;">Standard</div>
                            <div style="flex: 1; padding: 16px; font-weight: bold; text-align: center;">Premium<br>( Min. 6 Booths )</div>
                        </div>

                        <!-- Booth Image Row -->
                        <div style="display: flex; background-color: #ffffff; border-bottom: 1px solid #ccc;">
                            <div style="flex: 1; padding: 16px; font-weight: bold; display: flex; align-items: center;">{{ __('exhibit.booth_img') }}</div>
                                <div style="flex: 1; padding: 16px; text-align: center;">
                                    <img src="images/space_booth.png" alt="Space Only" style="max-width: 100%; height: auto;">
                                </div>
                                
                                <div style="flex: 1; padding: 16px; text-align: center;">
                                    <img src="images/standard_booth.png" alt="Standard" style="max-width: 100%; height: auto;">
                                </div>

                                <div style="flex: 1; padding: 16px; text-align: center;">
                                    <img src="images/premium_booth.png" alt="Premium Booth" style="max-width: 100%; height: auto;">
                                </div>
                        </div>

                        <!-- early access -->
                        <div style="display: flex; background-color: #ffffff; border-bottom: 1px solid #ccc;">
                            <div style="flex: 1; padding: 16px; font-weight: bold; display: flex; align-items: center;">{{ __('exhibit.early_access') }}</div>

                            <!-- Space Only -->
                            <div style="flex: 1; padding: 16px; font-size: 0.95rem;">
                                <div class="generic_price_tag clearfix">
                                    <span class="price">
                                        <span class="sign">USD</span>
                                        <span class="currency">2</span>
                                        <span class="cent">.800</span>
                                    </span>
                                </div>
                            </div>

                            <!-- Standard -->
                            <div style="flex: 1; padding: 16px; font-size: 0.95rem;">
                                <div class="generic_price_tag clearfix">
                                    <span class="price">
                                        <span class="sign">USD</span>
                                        <span class="currency">3</span>
                                        <span class="cent">.100</span>
                                    </span>
                                </div>
                            </div>

                            <!-- Premium -->
                            <div style="flex: 1; padding: 16px; font-size: 0.95rem;">
                                <div class="generic_price_tag clearfix">
                                    <span class="price">
                                            <span class="sign">USD</span>
                                            <span class="currency">4</span>
                                            <span class="cent">.300</span>
                                        </span>
                                </div>
                            </div>
                        </div>

                        <!-- general -->
                        <div style="display: flex; background-color: #ffffff; border-bottom: 1px solid #ccc;">
                            <div style="flex: 1; padding: 16px; font-weight: bold; display: flex; align-items: center;">Genaral</div>

                            <!-- Space Only -->
                            <div style="flex: 1; padding: 16px; font-size: 0.95rem;">
                                <div class="generic_price_tag clearfix">
                                    <span class="price">
                                        <span class="sign">USD</span>
                                        <span class="currency">3</span>
                                        <span class="cent">.100</span>
                                    </span>
                                </div>
                            </div>

                            <!-- Standard -->
                            <div style="flex: 1; padding: 16px; font-size: 0.95rem;">
                                <div class="generic_price_tag clearfix">
                                    <span class="price">
                                        <span class="sign">USD</span>
                                        <span class="currency">3</span>
                                        <span class="cent">.400</span>
                                    </span>
                                </div>
                            </div>

                            <!-- Premium -->
                            <div style="flex: 1; padding: 16px; font-size: 0.95rem;">
                                <div class="generic_price_tag clearfix">
                                    <span class="price">
                                        <span class="sign">USD</span>
                                        <span class="currency">4</span>
                                        <span class="cent">.600</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Specifications Row -->
                        <div style="display: flex; background-color: #ffffff; border-bottom: 1px solid #ccc;">
                            <div style="flex: 1; padding: 16px; font-weight: bold; display: flex; align-items: center;">{{ __('exhibit.spec') }}</div>
                            
                            <!-- Space Only -->
                            <div style="flex: 1; padding: 16px; font-size: 0.95rem;">
                                <div>
                                    <ul style="list-style: none;">
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.space_spec_1') }}</span></li>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.space_spec_2') }}</span></li>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.space_spec_3') }}</span></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Standard -->
                            <div style="flex: 1; padding: 16px; font-size: 0.95rem;">
                                <div>
                                    <ul style="list-style: none;">
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.standar_spek_1') }}</span></li>
                                        <span><b>• {{ __('exhibit.equipment') }} •</b></span>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.standar_spek_2') }} </span></li>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.standar_spek_3') }} </span></li>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.standar_spek_4') }} </span></li>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.standar_spek_5') }} </span></li>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.standar_spek_6') }} </span></li>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.standar_spek_7') }} </span></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Premium -->
                            <div style="flex: 1; padding: 16px; font-size: 0.95rem;">
                                <div>
                                    <ul style="list-style: none;">
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.premium_spek_1') }} </span></li>
                                        <span><b>• {{ __('exhibit.equipment') }} •</b></span>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.premium_spek_2') }} </span></li>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.premium_spek_3') }} </span></li>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.premium_spek_4') }} </span></li>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.premium_spek_5') }} </span></li>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.premium_spek_6') }}  </span></li>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.premium_spek_7') }} </span></li>
                                        <li style="text-indent: -0.7em;">-<span> {{ __('exhibit.premium_spek_8') }} </span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    
    {{-- mobile --}}
    <div class="d-block d-lg-none" id="generic_price_table">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 d-block d-lg-none">
                        <div class="text-black" style="text-align: left; margin-top: 20px;">
                            <h4 style="font-size: 1.64rem; font-weight: 900;">{{ __('exhibit.booth_fee') }}</h4>
                        </div>
                    </div>
                </div>
                <hr style="border-top: 1px solid black">
            </div>
            <div class="container" style="padding-bottom: 20px;">
                <div class="row">
                    <div class="col-md-4">
                        <div class="generic_content active clearfix" style="margin-bottom: 20px;">
                            <div class="generic_head_price clearfix" style="margin: 0px;">
                                <div class="generic_head_content clearfix" style="margin: 0px;">
                                    <div class="head_bg"></div>
                                    <div class="head">
                                        <span>{{ __('exhibit.space_only') }}</span><br>
                                        <span style="font-size: 15px;">( Min. 2 Booths )</span>
                                    </div>
                                </div>

                                <div style="flex: 1; padding: 16px; text-align: center; background-color: #ffffff">
                                    <img src="images/space_booth.png" alt="Space Only" style="max-width: 100%; height: auto;">
                                </div>

                                <table class="table" style="background-color: #ffffff;">
                                    <tr>
                                        <th style="border-left: none;"><h5 style="font-weight: 900;">{{ __('exhibit.early_access') }}</h5></th>
                                        <th class="merged-cell"><h5 style="font-weight: 900;">General</h5></th>
                                    </tr>
                                    <tr>
                                        <td style="border-left: none"><h5>$2,800 USD</h5></td>
                                        <td class="merged-cell"><h5>$3,100 USD</h5></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="generic_feature_list" style="text-align: left;">
                                <ul style="height: 596px; padding: 0px 8px;">
                                    <li>-<span> {{ __('exhibit.space_spec_1') }}</span></li>
                                    <li>-<span> {{ __('exhibit.space_spec_2') }}</span></li>
                                    <li>-<span> {{ __('exhibit.space_spec_3') }}</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="generic_content active clearfix" style="margin-bottom: 20px;">
                            <div class="generic_head_price clearfix" style="margin: 0px;">
                                <div class="generic_head_content clearfix" style="margin: 0px;">
                                    <div class="head_bg"></div>
                                    <div class="head">
                                        <span>Standard</span>
                                    </div>
                                </div>
                                
                                <div style="flex: 1; padding: 16px; text-align: center; background-color: #ffffff;">
                                    <img src="images/standard_booth.png" alt="Standard" style="max-width: 100%; height: auto;">
                                </div>

                                <table class="table" style="margin-top: 20px; background-color: #ffffff;">
                                    <tr>
                                        <th style="border-left: none;"><h5 style="font-weight: 900;">{{ __('exhibit.early_access') }}</h5></th>
                                        <th class="merged-cell"><h5 style="font-weight: 900;">General</h5></th>
                                    </tr>
                                    <tr>
                                        <td style="border-left: none"><h5>$3,100 USD</h5></td>
                                        <td class="merged-cell"><h5>$3,400 USD</h5></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="generic_feature_list" style="text-align: left;">
                                <ul style="height: 596px; padding: 0px 8px;">
                                    <li>-<span> {{ __('exhibit.standar_spek_1') }}</span></li>
                                    <span><b>• {{ __('exhibit.equipment') }} •</b></span>
                                    <li>-<span> {{ __('exhibit.standar_spek_2') }} </span></li>
                                    <li>-<span> {{ __('exhibit.standar_spek_3') }} </span></li>
                                    <li>-<span> {{ __('exhibit.standar_spek_4') }} </span></li>
                                    <li>-<span> {{ __('exhibit.standar_spek_5') }} </span></li>
                                    <li>-<span> {{ __('exhibit.standar_spek_6') }} </span></li>
                                    <li>-<span> {{ __('exhibit.standar_spek_7') }} </span></li>
                                </ul>
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-4">
                        <div class="generic_content active clearfix" style="margin-bottom: 20px;">
                            <div class="generic_head_price clearfix" style="margin: 0px;">
                                <div class="generic_head_content clearfix" style="margin: 0px;">
                                    <div class="head_bg"></div>
                                    <div class="head">
                                        <span>Premium</span><br>
                                        <span style="font-size: 15px;">( Min. 6 Booths )</span>
                                    </div>
                                </div>

                                <div style="flex: 1; padding: 16px; text-align: center; background-color: #ffffff;">
                                    <img src="images/premium_booth.png" alt="Premium Booth" style="max-width: 100%; height: auto;">
                                </div>

                                <table class="table" style="background-color: #ffffff;">
                                    <tr>
                                        <th style="border-left: none;"><h5 style="font-weight: 900;">{{ __('exhibit.early_access') }}</h5></th>
                                        <th class="merged-cell"><h5 style="font-weight: 900;">General</h5></th>
                                    </tr>
                                    <tr>
                                        <td style="border-left: none"><h5>$4,300 USD</h5></td>
                                        <td class="merged-cell"><h5>$4,600 USD</h5></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="generic_feature_list" style="text-align: left;">
                                <ul style="list-style: none; padding: 0px 8px;">
                                    <li>-<span> {{ __('exhibit.premium_spek_1') }} </span></li>
                                    <span><b>• {{ __('exhibit.equipment') }} •</b></span>
                                    <li>-<span> {{ __('exhibit.premium_spek_2') }} </span></li>
                                    <li>-<span> {{ __('exhibit.premium_spek_3') }} </span></li>
                                    <li>-<span> {{ __('exhibit.premium_spek_4') }} </span></li>
                                    <li>-<span> {{ __('exhibit.premium_spek_5') }} </span></li>
                                    <li>-<span> {{ __('exhibit.premium_spek_6') }}  </span></li>
                                    <li>-<span> {{ __('exhibit.premium_spek_7') }} </span></li>
                                    <li>-<span> {{ __('exhibit.premium_spek_8') }} </span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- end section 3 pricing -->

    <!-- end section 4 -->
        
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
            <!-- desktop -->
            <div class="col-12 d-none d-lg-block">
                <div class="text-black" style="text-align: left;">
                    <ul>
                        <li><h4 style="font-size: 1.2rem">{{ __('exhibit.booth_desc1') }}</h4><br></li>
                        <li><h4 style="font-size: 1.2rem">{{ __('exhibit.booth_desc2') }}</h4></li>
                    </ul>
                </div>
            </div>
            <!-- mobile -->
            <div class="col-12 d-block d-lg-none">
                <div class="text-black" style="text-align: left;">
                    <ul>
                        <li><h4 style="font-size: 1rem">{{ __('exhibit.booth_desc1') }}</h4><br></li>
                        <li><h4 style="font-size: 1rem">{{ __('exhibit.booth_desc2') }}</h4></li>
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
@endif
@endsection
