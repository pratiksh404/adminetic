<script>
    $(function() {
        @if (Session::has('success'))
            notifiable('Success',"{{ Session::get('success') }}",'success');
        @endif
        @if (Session::has('fail'))
            notifiable('Success',"{{ Session::get('fail') }}",'danger');
        @endif
        @if (Session::has('info'))
            notifiable('Success',"{{ Session::get('info') }}",'info');
        @endif
        @if (Session::has('message'))
            notifiable('Success',"{{ Session::get('message') }}",'primary');
        @endif

        @if (!empty($errors))
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    notifiable('Error',"{{ $error }}",'danger');
                @endforeach
            @endif
        @endif

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
