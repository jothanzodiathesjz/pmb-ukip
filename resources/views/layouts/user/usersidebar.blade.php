<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand"
                    href="../../../html/ltr/vertical-menu-template/index.html"><span class="brand-logo">
                        DF</span>
                    <h2 class="brand-text">UKIP</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            @if(Auth::user()->role['role'] === 'user')
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span><i
                    data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item {{(Request::segment(2) === 'akun') ? 'active' : ''}} "><a
                    class="d-flex align-items-center" href="{{route('dashboard.users',Auth::user()->id,)}}"><i
                        data-feather="user"></i><span class="menu-title text-truncate" data-i18n="user">Data
                        Diri</span></a>
            </li>
            <li class=" nav-item  {{(Request::segment(2) === 'berkas') ? 'active' : ''}}"><a
                    class="d-flex align-items-center" href="{{route('dashboard.berkas',Auth::user()->id,)}}"><i
                        data-feather="upload"></i><span class="menu-title text-truncate" data-i18n="berkas">Upload
                        Berkas</span></a>
            </li>
            <li class=" nav-item  {{(Request::segment(2) === 'pengumuman') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{route('dashboard.pengumuman',Auth::user()->id,)}}"><i
                        data-feather="calendar"></i><span class="menu-title text-truncate"
                        data-i18n="Calendar">Pengumuman</span></a>
            </li>
            @endif
            @if (Auth::user()->role['role'] === 'admin')
            <li class=" nav-item  {{(Request::segment(2) === 'users') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{route('dashboard.users',Auth::user()->id,)}}"><i
                        data-feather="person"></i><span class="menu-title text-truncate"
                        data-i18n="Calendar">Users List</span></a>
            </li>
            <li class=" nav-item  {{(Request::segment(2) === 'peserta') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{route('dashboard.peserta')}}"><i
                        data-feather="person"></i><span class="menu-title text-truncate"
                        data-i18n="Calendar">Data Peserta</span></a>
            </li>
            @endif
            @if (Auth::user()->role['role'] === 'pimpinan')
            <li class=" nav-item  {{(Request::segment(2) === 'peserta') ? 'active' : ''}}"><a class="d-flex align-items-center" href="{{route('dashboard.peserta')}}"><i
                data-feather="person"></i><span class="menu-title text-truncate"
                data-i18n="Calendar">Data Peserta</span></a>
            </li>
            @endif
        </ul>
    </div>
</div>