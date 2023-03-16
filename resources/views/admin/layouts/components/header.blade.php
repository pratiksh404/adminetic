<div class="page-header {{config('adminetic.default_menu_collapse',false) ? 'close_icon' : ''}}">
    <div class="header-wrapper row m-0">
        @if (config('adminetic.search', false))
        @livewire('admin.system.header-search')
        @endif
        <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="{{ route('dashboard') }}"><img class="img-fluid" src="{{favicon()}}"
                        alt="{{title()}}"></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
            </div>
        </div>
        <div class="left-header col-xxl-5 col-xl-6 col-lg-5 col-md-4 col-sm-3 p-0">
            <a href="{{route('dashboard')}}" class="btn btn-primary btn-air-primary router">Dashboard</a>
        </div>

        <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
            <ul class="nav-menus">
                @if (config('adminetic.language_drawer', false))
                <li class="language-nav">
                    <div class="translate_wrapper">
                        <div class="current_lang">
                            <div class="lang"><i class="flag-icon flag-icon-us"></i><span class="lang-txt">EN </span>
                            </div>
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
                @if (config('adminetic.search', false))
                <li> <span class="header-search">
                        <svg>
                            <use href="{{asset('adminetic/assets/svg/icon-sprite.svg#search')}}"></use>
                        </svg></span></li>
                @endif
                @if (config('adminetic.mega_menu', false))

                @endif
                @if (config('adminetic.quick_menu', false))
                <li class="onhover-dropdown">
                    <svg>
                        <use href="{{asset('adminetic/assets/svg/icon-sprite.svg#star')}}"></use>
                    </svg>
                    <div class="onhover-show-div bookmark-flip">
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <div class="front">
                                    <h6 class="f-18 mb-0 dropdown-title">Favorites</h6>
                                    <ul class="bookmark-dropdown">
                                        <li>

                                        </li>
                                        {{-- <li class="text-center"><a class="flip-btn f-w-700" id="flip-btn"
                                                href="javascript:void(0)">Add
                                                New Bookmark</a></li> --}}
                                    </ul>
                                </div>
                                <div class="back">
                                    <ul>
                                        <li>
                                            <div class="bookmark-dropdown flip-back-content">
                                                <input type="text" placeholder="search...">
                                            </div>
                                        </li>
                                        <li><a class="f-w-700 d-block flip-back" id="flip-back"
                                                href="javascript:void(0)">Back</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endif
                @if (config('adminetic.dark_light_toggle', true))
                <li>
                    <div class="mode">
                        <svg>
                            <use href="{{asset('adminetic/assets/svg/icon-sprite.svg#moon')}}"></use>
                        </svg>
                    </div>
                </li>
                @endif
                @if (config('adminetic.notification', false))
                @livewire('admin.notification.notification-bell')
                @endif
                @if (config('adminetic.profile', true))
                <li class="profile-nav onhover-dropdown pe-0 py-0">
                    <div class="media profile-media"><img class="b-r-10" src="{{ getProfilePlaceholder() }}"
                            alt="{{ auth()->user()->name }}" height="37" width="37">
                        <div class="media-body"><span>{{ Auth::user()->name }}</span>
                            <p class="mb-0 font-roboto">{{ isset(auth()->user()->roles)
                                ? auth()->user()->roles->first()->name
                                : 'N/A' }} <i class="middle fa fa-angle-down"></i></p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li data-bs-original-title><a class="router"
                                href="{{ adminShowRoute('profile', auth()->user()->profile->id) }}">My Profile</a>
                        </li>
                        <li data-bs-original-title><a class="router"
                                href="{{ adminEditRoute('profile', auth()->user()->profile->id) }}">Edit
                                Profile</a></li>
                        <li data-bs-original-title>
                            {{-- =================================LOGOUT================================= --}}
                            <a href="{{ route('logout') }}" class="no-router"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i data-feather="log-out"></i>{{ __('Logout') }}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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