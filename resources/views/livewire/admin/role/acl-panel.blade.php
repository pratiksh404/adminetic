<div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <b>All Permission For {{$role->name}}</b>
                <button class="btn btn-secondary btn-air-secondary" type="button" data-bs-toggle="modal"
            data-original-title="test" data-bs-target="#create_module_permission">Create Module Permission</button>
            </div>
        </div>
        <div class="card-body shadow-lg p-3">
        <div style="overflow-x:auto">
            <div class="row text-center mb-2">
                <div class="col-5">Module</div>
                <div class="col-1">Browse</div>
                <div class="col-1">Read</div>
                <div class="col-1">Edit</div>
                <div class="col-1">Add</div>
                <div class="col-1">Delete</div>
                <div class="col-2"><i class="fa fa-trash"></i></div>
            </div>
            <hr>
@if (!is_null($permissions))
                @foreach ($permissions as $permission)
                @livewire('admin.role.bread', ['permission' => $permission],key('permission' . $permission->id))
            @endforeach
@endif
        </div>
    </div>
    </div>
    
        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="create_module_permission" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-secondary">
                        <h5 class="modal-title" id="exampleModalLabel">Create Role Permission</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Select Module for making BREAD Permission.
                        <br>
                        <form wire:submit.prevent="makeModuleACL" method="POST">
                            <select wire:model="model_name" class="form-control" style="width:100%">
                                <option >Select Module..</option>
                                @foreach ($remaining_models as $model)
                                <option value="{{ $model }}">{{ $model }}</option>
                                @endforeach
                            </select>
                            @error('model_name')
                                <span class="text-muted">{{$message}}</span>
                            @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-danger btn-air-danger"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-secondary btn-air-secondary">Make
                            Permission</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        @push('livewire_third_party')
            <script>
                $(function(){
                    Livewire.on('make_module_acl_success',function(){
                        $('#create_module_permission').modal('hide');
                    });
                    Livewire.on('make_module_acl_success', message => {
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
                                "Success",
                            message: "Module Permission Created Successfully"
                        }, {
                            type: 'success',
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
                    });
                    Livewire.on('permission_deleted', message => {
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
                                "Success",
                            message: "Module Permission Deleted Successfully"
                        }, {
                            type: 'danger',
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
                    });
                    Livewire.on('bread_updated', message => {
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
                                "Success",
                            message: message
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
                    });
                });
            </script>
        @endpush
</div>
