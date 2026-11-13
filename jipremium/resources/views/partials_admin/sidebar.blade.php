<style>
    .sidebar-link, a.sidebar-link{
        background-color: #e6595f;
    }
    .sidebar-item.active .sidebar-link:hover, .sidebar-item.active>.sidebar-link {
        background-color: black;
        border-left-color: white;
        color: #e9ecef;
    }
</style>
<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar" style="background-color: #e6595f;">
        <a class="sidebar-brand" href="{{ url('admin/dashboard') }}">
            <span class="align-middle">JIPREMIUM ADMIN</span>
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-item @yield('dashboard')">
                <a class="sidebar-link" href="{{ url('admin/dashboard') }}">
                    <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

			<li class="sidebar-item @yield('brand')">
                <a class="sidebar-link" href="{{ url('admin/data-brand') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Brand</span>
                </a>
            </li>

            <li class="sidebar-item @yield('image')">
                <a class="sidebar-link" href="{{ url('admin/upload-images') }}">
                    <i class="align-middle" data-feather="camera"></i> <span class="align-middle">Image Link</span>
                </a>
            </li>

            <li class="sidebar-item @yield('inquiries')">
                <a class="sidebar-link" href="{{ url('admin/inquiries') }}">
                    <i class="align-middle" data-feather="mail"></i> <span class="align-middle">Inquiry</span>
                </a>
            </li>

            <li class="sidebar-item @yield('news')">
                <a class="sidebar-link" href="{{ url('admin/news') }}">
                    <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">News Subscription</span>
                </a>
            </li>
            <li class="sidebar-item @yield('notice')">
                <a class="sidebar-link" href="{{ url('admin/notice') }}">
                    <i class="align-middle" data-feather="bell"></i> <span class="align-middle">Notice</span>
                </a>
            </li>
            <li class="sidebar-item @yield('dataEvent')">
                <a class="sidebar-link" href="{{ url('admin/data-event') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Data Event</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
