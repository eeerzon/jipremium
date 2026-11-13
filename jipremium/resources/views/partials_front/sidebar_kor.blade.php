<style>
    .burger:before, .burger span, .burger:after {
        width: 100%;
        height: 4px;
        display: block;
        background: white;
        border-radius: 2px;
        position: absolute;
        opacity: 1;
    }
    @media (max-width: 992px) {
        .navbar-collapse {
            position: fixed;
            top: 50px;
            left: 0;
            padding-left: 15px;
            padding-right: 15px;
            padding-bottom: 15px;
            width: 100%;
            height: 100%;
        }

        .navbar-collapse.collapsing {
            left: -75%;
            transition: height 0s ease;
        }

        .navbar-collapse.show {
            left: 0;
            transition: left 300ms ease-in-out;
        }

        .navbar-toggler.collapsed ~ .navbar-collapse {
            transition: left 500ms ease-in-out;
        }
    }
</style>
<!-- start sidebar desktop -->
<div id="mySidenav" class="sidenav d-none d-lg-block">
    <a href="javascript:void(0)" class="closebtn" style="right:5px; top: 10px;" onclick="closeNav()">&times;</a>
    <h5 style="color:white; margin-left: 14px; margin-top: 25px; font-weight: 550">자카르타 국제 프리미엄 제품 박람회 <div style="border-bottom: 2px solid white; width: 100px; margin-top: 10px;"></div></h5>
    <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/kor">집</a>
    <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/kor/event_info">이벤트 정보</a>
    <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/kor/exhibit">전시회</a>
    <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/kor/visit">방문자</a>
    <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/kor/notice">공고</a>
    <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/kor/inquiries">질문</a>
</div>

<aside class="sidebar d-none d-lg-block" style="background-color: #e6595f; border-right: 3px solid white;">
    <div class="toggle" style="color:white;">
    </div>
    <div class="side-inner">
        <div class="logo-wrap" style="margin-bottom:15px;">
            <a href="#" class="burger js-toggle" data-toggle="collapse" style="right:20px;" onclick="openNav()">
                <span></span>
            </a>
        </div>

        <div class="nav-menu">
            <a href="/">
                <img src="{{ asset('images/en.png') }}" alt="Image" style="margin-left: 10px; max-width: 75%;height: auto;">
            </a>

            <a href="/id">
                <img src="{{ asset('images/ind.png') }}" style="margin-left:10px;" alt="Image" class="img-fluid">
            </a>
        </div>
    </div>
</aside>
<!-- end sidebar desktop -->

<!-- start sidebar mobile -->
<div class="d-block d-lg-none fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="navbar-mobile" style="background-color:  #e6595f; border-bottom: 1px solid white;">
        <div class="col-sm-12" >
            <a class="burger js-toggle" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
            </a>
        </div>
        <div class="collapse navbar-collapse" style="background-color:  #e6595f;" id="navbarCollapse">
            <h5 style="color:white; margin-left: 14px; margin-top: 25px; font-weight: 550">JAKARTA INTERNATIONAL PREMIUM PRODUCTS FAIR <div style="border-bottom: 2px solid white; width: 100px; margin-top: 10px;"></div></h5>
            <a href="/" style="margin-left: 7px;">
                <img src="{{ asset('images/en.png') }}" alt="Image" class="img-fluid" style="max-width: 54px;">
            </a>
            <a href="/id">
                <img src="{{ asset('images/ind.png') }}" alt="Image" class="img-fluid">
            </a><br>
            <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/kor">집</a><br><br>
            <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/kor/event_info">이벤트 정보</a><br><br>
            <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/kor/exhibit">전시회</a><br><br>
            <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/kor/visit">방문자</a><br><br>
            <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/kor/notice">공고</a><br><br>
            <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/kor/inquiries">질문</a>
        </div>
    </nav>
</div>
{{-- <div class="d-block d-lg-none fixed-top">
    <div class="pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="p-4" style="background-color: #e6595f; border-bottom: 1px solid white;">
                <a style="color:white; margin-left: 6px; font-weight: 100; font-size: 18px;" href="/kor">집</a>
                <a style="color:white; margin-left: 6px; font-weight: 100; font-size: 18px;" href="/kor/event_info">이벤트 정보</a>
                <a style="color:white; margin-left: 6px; font-weight: 100; font-size: 18px;" href="/kor/exhibit">전시회</a>
                <a style="color:white; margin-left: 6px; font-weight: 100; font-size: 18px;" href="/kor/visit">방문자</a>
                <a style="color:white; margin-left: 6px; font-weight: 100; font-size: 18px;" href="/kor/notice">공고</a>
                <a style="color:white; margin-left: 6px; font-weight: 100; font-size: 18px;" href="/kor/inquiries">질문</a>
                <br>
                <a href="/">
                    <img src="{{ asset('images/en.png') }}" alt="Image" class="img-fluid" style="max-width: 15%;">
                </a>

                <a href="/id">
                    <img src="{{ asset('images/kor.png') }}" alt="Image" class="img-fluid">
                <a href="/">
            </div>
        </div>
        <nav class="navbar navbar-dark" id="navbar-mobile" style="background:transparent !important;">
            <div class="col-sm-12">
                <div class="logo-wrap" style="margin-bottom:15px;">
                    <a class="burger js-toggle" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span></span>
                    </a>
                </div>
            </div>
        </nav>

        <script>
            window.onscroll = function() {scrollFunction()};

            function scrollFunction() {
                if (document.body.scrollTop > 850 || document.documentElement.scrollTop > 850) {
                    document.getElementById("navbar-mobile").style.background = "#e6595f";
                    document.getElementById("navbar-mobile").style.borderBottom = "1px solid white";
                } else {

                    document.getElementById("navbar-mobile").style.background = "none";
                    document.getElementById("navbar-mobile").style.borderBottom = "none";
                }
            }
        </script>
    </div>
</div> --}}
<!-- end sidebar mobile -->
