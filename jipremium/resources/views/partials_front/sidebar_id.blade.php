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
<!-- start sidebar desktop -->
<div id="mySidenav" class="sidenav d-none d-lg-block">
    <h5 style="color:white; margin-left: 14px; margin-top: 25px; font-weight: 550; font-size: 1.1rem">JAKARTA INTERNATIONAL PREMIUM PRODUCTS FAIR <div style="border-bottom: 2px solid white; width: 100px; margin-top: 10px;"></div></h5>
    <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/id">HOME</a>
    <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/id/event_info">INFOMARSI EVENT</a>
    <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/pdf/web_leaflet.pdf" target="_blank">WEB LEAFLET</a>
    <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/brands">BRANDS</a>
    <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/mom-and-kids">IMKIDS</a>
    <!-- <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/id/exhibit">PAMERAN</a> -->
    <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/id/visit">PENGUNJUNG</a>
    <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/id/notice">NOTIFIKASI</a>
    <a style="margin-left: 14px; font-weight: 100; font-size: 18px;" href="/id/inquiries">PERTANYAAN</a>
</div>

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
            <a href="/">
                <img src="{{ asset('images/en.png') }}" style="margin-left: 10px; max-width: 75%;height: auto;" alt="Image" class="img-fluid">
            </a>

            {{-- <a href="/kor">
                <img src="{{ asset('images/kor.png') }}" style="margin-left:10px;" alt="Image" class="img-fluid">
            </a> --}}
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
            {{-- <a href="/kor">
                <img src="{{ asset('images/kor.png') }}" alt="Image" class="img-fluid">
            </a> --}}
            <br>
            <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/id">HOME</a><br><br>
            <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/id/event_info">INFORMASI EVENT</a><br><br>
            <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/mom-and-kids">IMKIDS</a><br><br>
            <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/pdf/web_leaflet.pdf" target="_blank">WEB LEAFLET</a><br><br>
            <!-- <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/id/exhibit">PAMERAN</a><br><br> -->
            <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/id/visit">PENGUNJUNG</a><br><br>
            <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/id/notice">NOTIFIKASI</a><br><br>
            <a style="color:white; margin-left: 14px; font-weight: 100; font-size: 18px;" href="/id/inquiries">PERTANYAAN</a>
        </div>
    </nav>
</div>
<script>
    function toggleSidebar() {
    const sidebar = document.getElementById('mySidenav');
    sidebar.classList.toggle('sidebar-open');
}
</script>
