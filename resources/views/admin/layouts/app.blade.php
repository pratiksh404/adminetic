<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Meta --}}
    @include('adminetic::admin.layouts.components.meta')
    {{-- ASSET LINKS --}}
    @include('adminetic::admin.layouts.assets.links')
</head>

<body id="adminetic-body">
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
    <div id="{{config('adminetic.body_wrapper_id','')}}" class="{{config('adminetic.body_wrapper_class','')}}">
        <!-- page-wrapper Start-->
        <div class="page-wrapper compact-wrapper" id="pageWrapper">
            <!-- Page Header Start-->
            @includeFirst(['admin.layouts.components.header','adminetic::admin.layouts.components.header'],Adminetic::getHeaderData())
            <!-- Page Header Ends -->
            <!-- Page Body Start-->
            <div class="page-body-wrapper">
                <!-- Page Sidebar Start-->
                @include('adminetic::admin.layouts.components.sidebar')
                <!-- Page Sidebar Ends-->
                <div class="page-body" id="adminetic-content">
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