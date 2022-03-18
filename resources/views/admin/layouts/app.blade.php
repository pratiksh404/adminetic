<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="{{ setting('descrption', config('adminetic.description', 'Laravel Adminetic Admin Panel Upgrade.'))}}">
    <meta name="author" content="Pratik Shrestha">
    <link rel="icon" href="{{ favicon() }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ favicon() }}" type="image/x-icon">
    <title>{{ $title ?? title() }}</title>
    {{-- ASSET LINKS --}}
    @include('adminetic::admin.layouts.assets.links')
</head>

<body>
    <div id="{{config('adminetic.wrapper_id','app')}}" class="{{config('adminetic.wrapper_class','app')}}">
        {{-- Loading Spinner --}}
        @if (loader_enabled())
        <div class="loader-wrapper">
            <div class="loader-index"><span></span></div>
            <svg>
                <defs></defs>
                <filter id="goo">
                    <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
                    <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo">
                    </fecolormatrix>
                </filter>
            </svg>
        </div>
        @endif
        {{-- Loading Spinner End --}}
        <!-- tap on top starts-->
        <div class="tap-top"><i data-feather="chevrons-up"></i></div>
        <!-- tap on tap ends-->
        <!-- page-wrapper Start-->
        <div class="page-wrapper compact-wrapper" id="pageWrapper">
            <!-- Page Header Start-->
            @includeFirst(['admin.layouts.components.header','adminetic::admin.layouts.components.header'],Adminetic::getHeaderData())
            <!-- Page Header Ends                              -->
            <!-- Page Body Start-->
            <div class="page-body-wrapper">
                <!-- Page Sidebar Start-->
                @include('adminetic::admin.layouts.components.sidebar')
                <!-- Page Sidebar Ends-->
                <div class="page-body">
                    {{-- CONTENT --}}
                    @yield('content')
                </div>
                <!-- footer start-->
                @includeFirst(['admin.layouts.components.footer','adminetic::admin.layouts.components.footer'],Adminetic::getFooterData())
            </div>
        </div>
    </div>
    {{-- ASSET SCRIPTS --}}
    @include('adminetic::admin.layouts.assets.scripts')
</body>

</html>