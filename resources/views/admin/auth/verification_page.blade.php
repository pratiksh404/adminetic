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
    <title>Verfication || {{ $title ?? title() }}</title>
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminetic/assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminetic/assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('adminetic/assets/css/color-1.css" media="screen') }}">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminetic/assets/css/responsive.css') }}">
</head>

<body>
    <div class="container-fluid">
        {{-- Content --}}
        <!-- Unlock page start-->
        <div class="authentication-main mt-0">
            <div class="row">
                <div class="col-12">
                    <div class="login-card">
                        <div>
                            <div>
                                <a class="logo" href="{{ route('dashboard') }}">
                                    <img class="img-fluid for-light" width="80" src="{{ logo() }}" alt="Light Logo">
                                    <img class="img-fluid for-dark" width="80" src="{{ dark_logo() ?? logo() }}"
                                        alt="Dark Logo">
                                </a>
                            </div>
                            <div class="login-main">
                                <form action="{{route('verification')}}" method="POST" class="theme-form">
                                    @csrf
                                    <h4>Unlock </h4>
                                    <div class="form-group">
                                        <label class="col-form-label">Enter your Password</label>
                                        <div class="form-input position-relative">
                                            <input class="form-control" type="password" name="verfication_code"
                                                id="verfication_code" required="" placeholder="*********">
                                            <div class="show-hide"><span class="show"> </span></div>
                                        </div>
                                        @error('verfication_code')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <input type="submit" value="Submit" class="btn btn-primary btn-air-primary">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Unlock page end-->
        {{-- ASSET SCRIPTS --}}
        <!-- latest jquery-->
        <script src="{{ asset('adminetic/assets/js/jquery-3.5.1.min.js') }}"></script>
        <!-- Bootstrap js-->
        <script src="{{ asset('adminetic/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
        <!-- scrollbar js-->
        {{-- Notify --}}
        <script src="{{asset('adminetic/assets/js/notify/bootstrap-notify.min.js')}}"></script>
        {{-- Notification --}}
        <script>
            $(function() {
                            /*----------------------------------------
                         passward show hide
                         ----------------------------------------*/
                            $('.show-hide').show();
                            $('.show-hide span').addClass('show');
                        
                            $('.show-hide span').click(function () {
                                if ($(this).hasClass('show')) {
                                    $('input[name="verfication_code"]').attr('type', 'text');
                                    $(this).removeClass('show');
                                } else {
                                    $('input[name="verfication_code"]').attr('type', 'password');
                                    $(this).addClass('show');
                                }
                            });
                    
                            @if (Session::has('fail'))
                                notifiable('Success',"{{ Session::get('fail') }}",'danger');
                            @endif 
                            
                            $('#verfication_code').focus();
                    
                            function notifiable(title, message, type) {
                                var notify_allow_dismiss = Boolean({{ config('adminetic.notify_allow_dismiss', true) }});
                                var notify_delay = {{ config('adminetic.notify_delay', 2000) }};
                                var notify_showProgressbar = Boolean(
                                    {{ config('adminetic.notify_showProgressbar', true) }});
                                var notify_timer = {{ config('adminetic.notify_timer', 300) }};
                                var notify_newest_on_top = Boolean(
                                    {{ config('adminetic.notify_newest_on_top', true) }});
                                var notify_mouse_over = Boolean(
                                    {{ config('adminetic.notify_mouse_over', true) }});
                                var notify_spacing = {{ config('adminetic.notify_spacing', 1) }};
                                var notify_notify_animate_in =
                                    "{{ config('adminetic.notify_animate_in', 'animated fadeInDown') }}";
                                var notify_notify_animate_out =
                                    "{{ config('adminetic.notify_animate_out', 'animated fadeOutUp') }}";
                                var notify = $.notify({
                                    title: "<i class='{{ config('adminetic.notify_icon', 'fa fa-bell-o') }}'></i> " +
                                        title,
                                    message: message
                                }, {
                                    type: type,
                                    allow_dismiss: notify_allow_dismiss,
                                    delay: notify_delay,
                                    showProgressbar: notify_showProgressbar,
                                    timer: notify_timer,
                                    newest_on_top: notify_newest_on_top,
                                    mouse_over: notify_mouse_over,
                                    spacing: notify_spacing,
                                    animate: {
                                        enter: notify_notify_animate_in,
                                        exit: notify_notify_animate_out
                                    }
                                });
                            }
                        });
                    
        </script>
    </div>
</body>

</html>