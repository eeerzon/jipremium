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

    .sidenav {
        width: 0;
        transition: width 0.3s;
         z-index: 9999;
    }

    .sidenav.sidebar-open {
        width: 250px;
    }

    .content-push {
        margin-left: 250px;
        transition: margin-left 0.3s;
    }

    .content-push.sidebar-open {
        margin-left: 0;
    }
</style>

<!-- Start Sidebar Desktop -->
<div id="mySidenav" class="sidenav d-none d-lg-block">
    <h5 style="color:white; margin-left: 14px; margin-top: 25px; font-weight: 550">JAKARTA INTERNATIONAL PREMIUM PRODUCTS FAIR</h5>
    <div style="color:white; margin-left: 14px; font-weight: 550">{{ __('event_info.event_date') }}</div>
    <div style="color:white; margin-left: 14px; font-weight: 550">JICC, Jakarta, Indonesia</div>
    <div style="border-bottom: 2px solid white; width: 100px; margin-top: 10px;"></div>
    @if(app()->getLocale() == 'en')
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/">HOME</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/event_info">EVENT INFO</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/brands">BRANDS</a>
        <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/mom-and-kids">IMKIDS</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/pdf/web_leaflet.pdf" target="_blank">WEB LEAFLET</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/exhibit">EXHIBIT</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/visit">VISIT</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/notice">NOTICE</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/inquiries">INQUIRIES</a>
    @else
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/">BERANDA</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/event_info">INFORMASI EVENT</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/brands">PRODUK</a>
        <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/mom-and-kids">IMKIDS</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/pdf/web_leaflet.pdf" target="_blank">WEB LEAFLET</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/exhibit">PAMERAN</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/visit">PENGUNJUNG</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/notice">NOTIFIKASI</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/inquiries">PERTANYAAN</a>
    @endif
</div>



<!-- update sidebar berdasarkan ppt -->
<!-- start sidebar desktop -->
<!-- <div id="mySidenav" class="sidenav d-none d-lg-block">
    <h5 style="color:white; margin-left: 14px; margin-top: 25px; font-weight: 550">JAKARTA INTERNATIONAL PREMIUM PRODUCTS FAIR</h5>
    <div style="color:white; margin-left: 14px; font-weight: 550">{{ __('event_info.event_date') }}</div>
    <div style="color:white; margin-left: 14px; font-weight: 550">JCC, Jakarta, Indonesia</div>
    <div style="border-bottom: 2px solid white; width: 100px; margin-top: 10px;"></div>
    @if(app()->getLocale() == 'en')
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/">HOME</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/exhibit">SIGN UP</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/exhibition_overview">EXHIBITION OVERVIEW</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/partner">PARTNERS</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/subscription">SUBSCRIPTION</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/concurrent_show">CONCURRENT SHOW</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/exhibitor_item">EXHIBITOR ITEM</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/mom-and-kids">FAMILY EXHIBITION</a>
    @else
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/">BERANDA</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/exhibit">DAFTAR</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/exhibition_overview">GAMBARAN PAMERAN</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/partner">PARTNERS</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/subscription">BERLANGGANAN</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/concurrent_show">ACARA BERSAMAAN</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/exhibitor_item">ITEM PAMERAN</a>
        <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/mom-and-kids">PAMERAN KELUARGA</a>
    @endif
</div> -->



<aside class="sidebar d-none d-lg-block" style="background-color: #e6595f; border-right: 3px solid white;">
    <div class="toggle" style="color:white;">
    </div>
    <div class="side-inner">
        <div class="logo-wrap" style="margin-bottom:15px;">
            <a href="#" class="burger js-toggle" data-toggle="collapse" style="right:20px;" onclick="toggleSidebar()">
                <span></span>
            </a>
        </div>
        <div class="nav-menu">
            @if(app()->getLocale() == 'en')
                <a href="{{ route('language.switch', 'en') }}">
                    <img src="{{ asset('images/en.png') }}" style="margin-left:10px; max-width: 75%; border: 2px solid white;" alt="English" class="img-fluid">
                </a>
                <a href="{{ route('language.switch', 'id') }}">
                    <img src="{{ asset('images/ind.png') }}" style="margin-left:10px; max-width: 75%;" alt="Bahasa Indonesia" class="img-fluid">
                </a>
            @else
                <a href="{{ route('language.switch', 'en') }}">
                    <img src="{{ asset('images/en.png') }}" style="margin-left:10px; max-width: 75%;" alt="English" class="img-fluid">
                </a>
                <a href="{{ route('language.switch', 'id') }}">
                    <img src="{{ asset('images/ind.png') }}" style="margin-left:10px; border: 2px solid white; max-width: 75%;" alt="Bahasa Indonesia" class="img-fluid">
                </a>
            @endif
        </div>
    </div>
</aside>
<!-- End Sidebar Desktop -->

<!-- Start Sidebar Mobile -->
<div class="d-block d-lg-none fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="navbar-mobile" style="background-color:  #e6595f; border-bottom: 1px solid white;">
        <div class="col-sm-12">
            <a class="burger js-toggle" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
            </a>
        </div>
        <div class="collapse navbar-collapse" style="background-color:  #e6595f;" id="navbarCollapse">
            <h5 style="color:white; margin-left: 14px; margin-top: 25px; font-weight: 550">JAKARTA INTERNATIONAL PREMIUM PRODUCTS FAIR</h5>
            <div style="color:white; margin-left: 14px; font-weight: 550">{{ __('event_info.event_date') }}</div>
            <div style="color:white; margin-left: 14px; font-weight: 550">JICC, Jakarta, Indonesia</div>
            <div style="border-bottom: 2px solid white; width: 100px; margin-top: 10px; margin-bottom: 10px;"></div>
            @if(app()->getLocale() == 'en')
                <a href="{{ route('language.switch', 'en') }}" style="margin-left: 7px;">
                    <img src="{{ asset('images/en.png') }}" alt="Bahasa Indonesia" class="img-fluid" style="max-width: 54px; border: 2px solid white;">
                </a>
                <a href="{{ route('language.switch', 'id') }}" style="margin-left: 7px;">
                    <img src="{{ asset('images/ind.png') }}" alt="Bahasa Indonesia" class="img-fluid" style="max-width: 54px;">
                </a>
                <br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/">HOME</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/event_info">EVENT INFO</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/brands">BRANDS</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/mom-and-kids">IMKIDS</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/pdf/web_leaflet.pdf" target="_blank">WEB LEAFLET</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/exhibit">EXHIBIT</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/visit">VISIT</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/notice">NOTICE</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/inquiries">INQUIRIES</a>
            @else
                <a href="{{ route('language.switch', 'en') }}" style="margin-left: 7px;">
                    <img src="{{ asset('images/en.png') }}" alt="English" class="img-fluid" style="max-width: 54px;">
                </a>
                <a href="{{ route('language.switch', 'id') }}" style="margin-left: 7px;">
                    <img src="{{ asset('images/ind.png') }}" alt="Bahasa Indonesia" class="img-fluid" style="max-width: 54px; border: 2px solid white;">
                </a>
                <br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/">BERANDA</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/event_info">INFORMASI EVENT</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/brands">PRODUK</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/mom-and-kids">IMKIDS</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/pdf/web_leaflet.pdf" target="_blank">WEB LEAFLET</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/exhibit">PAMERAN</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/visit">PENGUNJUNG</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/notice">NOTIFIKASI</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/inquiries">PERTANYAAN</a>
            @endif
        </div>
    </nav>
</div>
<!-- End Sidebar Mobile -->


<!-- update sidebar berdasarkan ppt -->
<!-- Start Sidebar Mobile -->
<!-- <div class="d-block d-lg-none fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="navbar-mobile" style="background-color:  #e6595f; border-bottom: 1px solid white;">
        <div class="col-sm-12">
            <a class="burger js-toggle" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
            </a>
        </div>
        <div class="collapse navbar-collapse" style="background-color:  #e6595f;" id="navbarCollapse">
            <h5 style="color:white; margin-left: 14px; margin-top: 25px; font-weight: 550">JAKARTA INTERNATIONAL PREMIUM PRODUCTS FAIR</h5>
            <div style="color:white; margin-left: 14px; font-weight: 550">{{ __('event_info.event_date') }}</div>
            <div style="color:white; margin-left: 14px; font-weight: 550">JCC, Jakarta, Indonesia</div>
            <div style="border-bottom: 2px solid white; width: 100px; margin-top: 10px; margin-bottom: 10px;"></div>
            @if(app()->getLocale() == 'en')
                <a href="{{ route('language.switch', 'en') }}" style="margin-left: 7px;">
                    <img src="{{ asset('images/en.png') }}" alt="Bahasa Indonesia" class="img-fluid" style="max-width: 54px; border: 2px solid white;">
                </a>
                <a href="{{ route('language.switch', 'id') }}" style="margin-left: 7px;">
                    <img src="{{ asset('images/ind.png') }}" alt="Bahasa Indonesia" class="img-fluid" style="max-width: 54px;">
                </a>
                <br><br>
                
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/">HOME</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/exhibit">SIGN UP</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/exhibition_overview">EXHIBITION OVERVIEW</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/partner">PARTNERS</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/subscription">SUBSCRIPTION</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/concurrent_show">CONCURRENT SHOW</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/exhibitor_item">EXHIBITOR ITEM</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/mom-and-kids">FAMILY EXHIBITION</a>
            @else
                <a href="{{ route('language.switch', 'en') }}" style="margin-left: 7px;">
                    <img src="{{ asset('images/en.png') }}" alt="English" class="img-fluid" style="max-width: 54px;">
                </a>
                <a href="{{ route('language.switch', 'id') }}" style="margin-left: 7px;">
                    <img src="{{ asset('images/ind.png') }}" alt="Bahasa Indonesia" class="img-fluid" style="max-width: 54px; border: 2px solid white;">
                </a>
                <br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/">BERANDA</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/exhibit">DAFTAR</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/exhibition_overview">GAMBARAN PAMERAN</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/partner">PARTNERS</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/subscription">BERLANGGANAN</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/concurrent_show">ACARA BERSAMAAN</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/exhibitor_item">ITEM PAMERAN</a><br><br>
                <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/mom-and-kids">PAMERAN KELUARGA</a>
            @endif
        </div>
    </nav>
</div> -->



<script>
    function toggleSidebar() {
        var sidenav = document.getElementById("mySidenav");
        var contentPush = document.querySelector(".content-push");

        if (sidenav.classList.contains("sidebar-open")) {
            sidenav.classList.remove("sidebar-open");
            contentPush.classList.remove("sidebar-open");
        } else {
            sidenav.classList.add("sidebar-open");
            contentPush.classList.add("sidebar-open");
        }
    }
</script>
