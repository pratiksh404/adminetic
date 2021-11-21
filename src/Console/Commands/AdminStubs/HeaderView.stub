<div class="page-header">
    <div class="header-wrapper row m-0">
        @if (config('adminetic.search', false))
            <form class="form-inline search-full col" action="#" method="get">
                <div class="form-group w-100">
                    <div class="Typeahead Typeahead--twitterUsers">
                        <div class="u-posRelative">
                            <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                                placeholder="Search {{ $setting->title ?? config('adminetic.name', 'Adminetic') }} .."
                                name="q" title="" autofocus>
                            <div class="spinner-border Typeahead-spinner" role="status"><span
                                    class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                        </div>
                        <div class="Typeahead-menu"></div>
                    </div>
                </div>
            </form>
        @endif
        <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper">
                <a href="{{ route('dashboard') }}">
                    <img class="img-fluid"
                        src="{{ asset(setting('logo') ? 'storage/' . setting('logo') : 'adminetic/static/logo.png') }}"
                        alt="Logo">
                </a>
            </div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
            </div>
        </div>
        <div class="left-header col horizontal-wrapper ps-0">
            <ul class="horizontal-menu">
                @if (config('adminetic.mega_menu', false))
                    <li class="mega-menu outside"><a class="nav-link" href="#!"><i data-feather="layers"></i><span>Mega
                                Menu</span></a>
                        <div class="mega-menu-container nav-submenu menu-to-be-close header-mega">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col mega-box">
                                        <div class="mobile-title d-none">
                                            <h5>Mega menu</h5><i data-feather="x"></i>
                                        </div>
                                        <div class="link-section icon">
                                            <div>
                                                <h6>Error Page</h6>
                                            </div>
                                            <ul>
                                                <li><a href="error-400.html">Error page 400</a></li>
                                                <li><a href="error-401.html">Error page 401</a></li>
                                                <li><a href="error-403.html">Error page 403</a></li>
                                                <li><a href="error-404.html">Error page 404</a></li>
                                                <li><a href="error-500.html">Error page 500</a></li>
                                                <li><a href="error-503.html">Error page 503</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col mega-box">
                                        <div class="link-section doted">
                                            <div>
                                                <h6> Authentication</h6>
                                            </div>
                                            <ul>
                                                <li><a href="login.html">Login</a></li>
                                                <li><a href="login_one.html">Login with image</a></li>
                                                <li><a href="login-bs-validation.html">Login with validation</a>
                                                </li>
                                                <li><a href="sign-up.html">Sign Up</a></li>
                                                <li><a href="sign-up-one.html">SignUp with image</a></li>
                                                <li><a href="sign-up-two.html">SignUp with image</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col mega-box">
                                        <div class="link-section dashed-links">
                                            <div>
                                                <h6>Usefull Pages</h6>
                                            </div>
                                            <ul>
                                                <li><a href="search.html">Search Website</a></li>
                                                <li><a href="unlock.html">Unlock User</a></li>
                                                <li><a href="forget-password.html">Forget Password</a></li>
                                                <li><a href="reset-password.html">Reset Password</a></li>
                                                <li><a href="maintenance.html">Maintenance</a></li>
                                                <li><a href="login-sa-validation">Login validation</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col mega-box">
                                        <div class="link-section">
                                            <div>
                                                <h6>Email templates</h6>
                                            </div>
                                            <ul>
                                                <li class="ps-0"><a href="basic-template.html">Basic Email</a></li>
                                                <li class="ps-0"><a href="email-header.html">Basic With Header</a>
                                                </li>
                                                <li class="ps-0"><a href="template-email.html">Ecomerce Template</a>
                                                </li>
                                                <li class="ps-0"><a href="template-email-2.html">Email Template
                                                        2</a></li>
                                                <li class="ps-0"><a href="ecommerce-templates.html">Ecommerce
                                                        Email</a></li>
                                                <li class="ps-0"><a href="email-order-success.html">Order
                                                        Success</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col mega-box">
                                        <div class="link-section">
                                            <div>
                                                <h6>Coming Soon</h6>
                                            </div>
                                            <ul class="svg-icon">
                                                <li><a href="comingsoon.html"> <i data-feather="file">
                                                        </i>Coming-soon</a></li>
                                                <li><a href="comingsoon-bg-video.html"> <i data-feather="film">
                                                        </i>Coming-video</a></li>
                                                <li><a href="comingsoon-bg-img.html"><i data-feather="image">
                                                        </i>Coming-Image</a></li>
                                            </ul>
                                            <div>
                                                <h6>Other Soon</h6>
                                            </div>
                                            <ul class="svg-icon">
                                                <li><a class="txt-primary" href="landing-page.html"> <i
                                                            data-feather="cast"></i>Landing Page</a></li>
                                                <li><a class="txt-secondary" href="sample-page.html"> <i
                                                            data-feather="airplay"></i>Sample Page</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endif
                @if (config('adminetic.level_menu', false))
                    <li class="level-menu outside"><a class="nav-link" href="#!"><i data-feather="inbox"></i><span>Level
                                Menu</span></a>
                        <ul class="header-level-menu menu-to-be-close">
                            <li><a href="file-manager.html" data-original-title="" title=""> <i
                                        data-feather="git-pull-request"></i><span>File manager </span></a></li>
                            <li><a href="#!" data-original-title="" title=""> <i
                                        data-feather="users"></i><span>Users</span></a>
                                <ul class="header-level-sub-menu">
                                    <li><a href="file-manager.html" data-original-title="" title=""> <i
                                                data-feather="user"></i><span>User Profile</span></a></li>
                                    <li><a href="file-manager.html" data-original-title="" title=""> <i
                                                data-feather="user-minus"></i><span>User Edit</span></a></li>
                                    <li><a href="file-manager.html" data-original-title="" title=""> <i
                                                data-feather="user-check"></i><span>Users Cards</span></a></li>
                                </ul>
                            </li>
                            <li><a href="kanban.html" data-original-title="" title=""> <i
                                        data-feather="airplay"></i><span>Kanban Board</span></a></li>
                            <li><a href="bookmark.html" data-original-title="" title=""> <i
                                        data-feather="heart"></i><span>Bookmark</span></a></li>
                            <li><a href="social-app.html" data-original-title="" title=""> <i
                                        data-feather="zap"></i><span>Social App </span></a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
        <div class="nav-right col-8 pull-right right-header p-0">
            <ul class="nav-menus">
                @if (config('adminetic.language_drawer', false))
                    <li class="language-nav">
                        <div class="translate_wrapper">
                            <div class="current_lang">
                                <div class="lang"><i class="flag-icon flag-icon-us"></i><span class="lang-txt">EN
                                    </span></div>
                            </div>
                            <div class="more_lang">
                                <div class="lang selected" data-value="en"><i class="flag-icon flag-icon-us"></i><span
                                        class="lang-txt">English<span>
                                            (US)</span></span></div>
                                <div class="lang" data-value="np"><i class="flag-icon flag-icon-np"></i><span
                                        class="lang-txt">Nepali</span></div>
                            </div>
                        </div>
                    </li>
                @endif
                @if (config('adminetic.language_drawer', false))
                    <li> <span class="header-search"><i data-feather="search"></i></span></li>
                @endif
                @if (config('adminetic.notification', false))
                    <li class="onhover-dropdown">
                        <div class="notification-box"><i data-feather="bell"> </i><span
                                class="badge rounded-pill badge-secondary">4 </span></div>
                        <ul class="notification-dropdown onhover-show-div">
                            <li><i data-feather="bell"></i>
                                <h6 class="f-18 mb-0">Notitications</h6>
                            </li>
                            <li>
                                <p><i class="fa fa-circle-o me-3 font-primary"> </i>Delivery processing <span
                                        class="pull-right">10 min.</span></p>
                            </li>
                            <li>
                                <p><i class="fa fa-circle-o me-3 font-success"></i>Order Complete<span
                                        class="pull-right">1
                                        hr</span></p>
                            </li>
                            <li>
                                <p><i class="fa fa-circle-o me-3 font-info"></i>Tickets Generated<span
                                        class="pull-right">3
                                        hr</span></p>
                            </li>
                            <li>
                                <p><i class="fa fa-circle-o me-3 font-danger"></i>Delivery Complete<span
                                        class="pull-right">6 hr</span></p>
                            </li>
                            <li><a class="btn btn-primary" href="#">Check all notification</a></li>
                        </ul>
                    </li>
                @endif
                @if (config('adminetic.quick_menu', false))
                    <li class="onhover-dropdown">
                        <div class="notification-box"><i data-feather="star"></i></div>
                        <div class="onhover-show-div bookmark-flip">
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="front">
                                        <ul class="droplet-dropdown bookmark-dropdown">
                                            <li class="gradient-primary"><i data-feather="star"></i>
                                                <h6 class="f-18 mb-0">Bookmark</h6>
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-4 text-center"><i data-feather="file-text"></i>
                                                    </div>
                                                    <div class="col-4 text-center"><i data-feather="activity"></i>
                                                    </div>
                                                    <div class="col-4 text-center"><i data-feather="users"></i>
                                                    </div>
                                                    <div class="col-4 text-center"><i data-feather="clipboard"></i>
                                                    </div>
                                                    <div class="col-4 text-center"><i data-feather="anchor"></i>
                                                    </div>
                                                    <div class="col-4 text-center"><i data-feather="settings"></i>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="text-center">
                                                <button class="flip-btn" id="flip-btn">Add New Bookmark</button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="back">
                                        <ul>
                                            <li>
                                                <div class="droplet-dropdown bookmark-dropdown flip-back-content">
                                                    <input type="text" placeholder="search...">
                                                </div>
                                            </li>
                                            <li>
                                                <button class="d-block flip-back" id="flip-back">Back</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endif
                @if (config('adminetic.dark_light_toggle', true))
                    <li>
                        <div class="mode"><i class="fa fa-moon-o"></i></div>
                    </li>
                @endif
                @if (config('adminetic.fullscreen_expander', true))
                    <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                                data-feather="maximize"></i></a></li>
                @endif
                @if (config('adminetic.profile', true))
                    <li class="profile-nav onhover-dropdown p-0 me-0">
                        <div class="media profile-media">
                            <img class="b-r-10 img-fluid" src="{{ getProfilePlaceholder() }}"
                                alt="{{ auth()->user()->name }}" height="37" width="37">
                            <div class="media-body"><span>{{ Auth::user()->name }}</span>
                                <p class="mb-0 font-roboto">
                                    {{ isset(auth()->user()->roles)
    ? auth()->user()->roles->first()->name
    : 'N/A' }}
                                    <i class="middle fa fa-angle-down"></i>
                                </p>
                            </div>
                        </div>
                        <ul class="profile-dropdown onhover-show-div">
                            <li data-bs-original-title><a
                                    href="{{ adminShowRoute('profile', auth()->user()->profile->id) }}">My Profile</a>
                            </li>
                            <li data-bs-original-title><a
                                    href="{{ adminEditRoute('profile', auth()->user()->profile->id) }}">Edit
                                    Profile</a></li>
                            <li data-bs-original-title>
                                {{-- =================================LOGOUT================================= --}}
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i data-feather="log-out"></i>{{ __('Logout') }}
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </a>
                                {{-- =================================END LOGOUT================================= --}}
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>