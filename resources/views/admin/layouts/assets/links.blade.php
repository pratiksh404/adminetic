<!-- Google font-->
<link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
    rel="stylesheet">
{{-- Plugin Injection --}}
@include('adminetic::admin.layouts.assets.plugin_links')
{{-- End Plugin Injection --}}
<!-- Bootstrap css-->
<link rel="stylesheet" type="text/css" href="{{ asset('adminetic/assets/css/vendors/bootstrap.css') }}">
<!-- App css-->
<link rel="stylesheet" type="text/css" href="{{ asset('adminetic/assets/css/style.css') }}">
<link id="color" rel="stylesheet" href="{{ asset('adminetic/assets/css/color-1.css') }}" media="screen">
<!-- Responsive css-->
<link rel="stylesheet" type="text/css" href="{{ asset('adminetic/assets/css/responsive.css') }}">
{{-- Livewire --}}
@livewireStyles