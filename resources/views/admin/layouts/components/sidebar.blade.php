<div class="sidebar-wrapper {{config('adminetic.default_menu_collapse',false) ? 'close_icon' : ''}}"
    sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper">
            <a href="{{ route('dashboard') }}">
                <img class="for-light" style="width: 80%" src="{{ logo() }}" alt="Light Logo">
                <img class="for-dark" style="width: 80%" src="{{ dark_logo() }}" alt="Dark Logo">
            </a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid">
                </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{ route('dashboard') }}"><img class="img-fluid" src="{{ favicon() }}"
                    width="50"></a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    {{-- Menu Search Bar --}}
                    <li class="back-btn"><a href="{{ route('dashboard') }}"><img class="img-fluid" src="{{ favicon() }}"
                                width="50"></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <hr>
                    <li style="margin-left:8px;position: sticky;top: 0;background: white;z-index: 10;"
                        id="menu-search-bar">
                        <a class="sidebar-link sidebar-title link-nav" href="#">
                            <i class="fa fa-search">
                            </i>
                            <span><input type="text" id="menu-search" class="form-control" placeholder="Search"></span>
                        </a>
                    </li>
                    <li class="pin-title sidebar-main-title">
                    </li>
                    {{-- Menus --}}
                    <x-adminetic-sidebar />
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>