<script>
    $(function() {
        $(document).ready(function() {
            $('.modules').select2({
                dropdownParent: $('.modal')
            });
            // Browse
            $(document).on('change', '#browse', function() {
                $(this).val() == 1 ? $(this).val(0) : $(this).val(1);
                let permission = parseInt($(this).data('permission'));
                let flag_data = $(this).val();
                updatePermission(permission, flag_data, 1);
            });
            // Read
            $(document).on('change', '#read', function() {
                $(this).val() == 1 ? $(this).val(0) : $(this).val(1);
                let permission = parseInt($(this).data('permission'));
                let flag_data = $(this).val();
                updatePermission(permission, flag_data, 2);
            });
            // Edit
            $(document).on('change', '#edit', function() {
                $(this).val() == 1 ? $(this).val(0) : $(this).val(1);
                let permission = parseInt($(this).data('permission'));
                let flag_data = $(this).val();
                updatePermission(permission, flag_data, 3);
            });
            // Add
            $(document).on('change', '#add', function() {
                $(this).val() == 1 ? $(this).val(0) : $(this).val(1);
                let permission = parseInt($(this).data('permission'));
                let flag_data = $(this).val();
                updatePermission(permission, flag_data, 4);
            });
            // Delete
            $(document).on('change', '#delete', function() {
                $(this).val() == 1 ? $(this).val(0) : $(this).val(1);
                let permission = parseInt($(this).data('permission'));
                let flag_data = $(this).val();
                updatePermission(permission, flag_data, 5);
            });

            // Permission AJAX Function
            function updatePermission(permission, flag_data, permission_type) {
                let url = "{{ route('change_role_module_permission') }}";
                $.ajax({
                    url: url.trim(),
                    type: "PATCH",
                    cache: false,
                    data: {
                        _token: '{{ csrf_token() }}',
                        flag: flag_data,
                        permission: permission,
                        type: permission_type
                    },
                    success: function(dataResult) {
                        dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode) {
                            permissionUpdatedAlert();
                        } else {
                            alert("Internal Server Error");
                        }
                    }
                });
            }

            function permissionUpdatedAlert() {
                var notify_allow_dismiss = Boolean(
                    {{ config('adminetic.notify_allow_dismiss', true) }});
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
                        "Information",
                    message: "Permission Updated !"
                }, {
                    type: 'info',
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
    });

</script>
