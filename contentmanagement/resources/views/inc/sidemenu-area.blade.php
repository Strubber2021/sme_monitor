<div class="sidemenu-area">
    <div class="sidemenu-header">
        <a href="{{ url('https://templates.hibootstrap.com/zoben/default/dashboard.html') }}" class="navbar-brand d-flex align-items-center">
            <img src="{{ asset('assets/images/logo.png') }}" class="logo-one" alt="Logo">
            <img src="{{ asset('assets/images/logo-2.png') }}" class="logo-two" alt="Logo">
        </a>
        <div class="responsive-burger-menu d-block d-lg-none">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>
    </div>
    <div class="sidemenu-body">
        <ul class="sidemenu-nav metisMenu h-100" id="sidemenu-nav" data-simplebar>
            <li class="nav-item {{ $side_name == 'ninechang' ? 'active' : '' }}">
                <a href="{{ url('/ninechang') }}" class="nav-link">
                    <span class="icon"><i class="ri-home-line"></i></span>
                    <span class="menu-title">Ninechang</span>
                </a>
            </li>
            <li class="nav-item {{ $side_name == 'bukkhon' ? 'active' : '' }}">
                <a href="{{ url('/bukkhon') }}" class="nav-link">
                    <span class="icon"><i class="ri-user-line"></i></span>
                    <span class="menu-title">Bukkhon</span>
                </a>
            </li>
            <li class="nav-item {{ $side_name == 'smethai' ? 'active' : '' }}">
                <a href="{{ url('/smethai') }}" class="nav-link">
                    <span class="icon"><i class="ri-send-plane-fill"></i></span>
                    <span class="menu-title">Smethaisoftware</span>
                </a>
            </li>
            <li class="nav-item {{ $side_name == 'jobth' ? 'active' : '' }}">
                <a href="{{ url('/jobth') }}" class="nav-link">
                    <span class="icon"><i class="ri-briefcase-line"></i></span>
                    <span class="menu-title">งานไทย</span>
                </a>
            </li>
            <li class="nav-item {{ $side_name == 'findchang' ? 'active' : '' }}">
                <a href="{{ url('/findchang') }}" class="nav-link">
                    <span class="icon"><i class="ri-file-search-line"></i></span>
                    <span class="menu-title">หาช่างหางาน</span>
                </a>
            </li>
            <li class="nav-item {{ $side_name == 'article' ? 'active' : '' }}">
                <a href="{{ url('/article') }}" class="nav-link">
                    <span class="icon">
                        <i class="ri-article-line"></i>
                    </span>
                    <span class="menu-title">บทความ</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="#"  onclick="handleLogout(this,1)" class="nav-link">
                    <span class="icon"><i class="ri-logout-circle-r-line"></i></span>
                    <span class="menu-title">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>
