<div>
    <div class="row" style="margin-top:10vh">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body shadow-lg p-2">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Log Name</th>
                                    <th>Description</th>
                                    <th>Model</th>
                                    <th>Subject ID</th>
                                    <th>Causer ID</th>
                                    <th>Caused At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($activities->count() > 0)
                                    @foreach ($activities as $activity)
                                        <tr>
                                            <td>{{ $activity->id }}</td>
                                            <td>{{ $activity->log_name }}</td>
                                            <td><span
                                                    class="badge badge-{{ $activity->description == 'deleted' ? 'danger' : ($activity->description == 'created' ? 'success' : 'info') }}">{{ $activity->description }}</span>
                                            </td>
                                            <td>{{ $activity->subject_type }}</td>
                                            <td>{{ $activity->subject_id }}</td>
                                            <td><a
                                                    href="{{ url(config('adminetic.prefix', 'admin') . '/' . 'user/' . $activity->causer_id) }}">{{ \App\Models\User::find($activity->causer_id)->name ?? '-' }}</a>
                                            </td>
                                            <td>{{ $activity->created_at->diffForHumans() }}</td>
                                            <td>
                                                <button type="button" wire:click="deleteActivity({{ $activity->id }})"
                                                    class="btn btn-danger btn-air-danger btn-sm p-2"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8"><span class="d-flex justify-content-center">No Activity
                                                Registered
                                                Yet.</span></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        {{ $activities->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body shadow-lg p-3">
                    <h4>Total : </h4>
                    <br>
                    <h6>{{ $activity_count }}</h6>
                </div>
            </div>
            <hr>
            <button class="btn btn-danger btn-air-danger" type="button" style="width: 100%">Reset</button>
            <div class="card">
                <div class="card-body shadow-lg p-2">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <button class="btn btn-danger btn-air-danger" wire:click="deleteAll"
                                style="width: 100%">Delete All</button>
                        </div>
                        <div class="col-12 mb-2">
                            <div class="input-group">
                                <button class="btn btn-danger btn-air-danger" wire:click="deleteWithLimit">Delete All
                                    Except Last </button>
                                <span class="input-group-text"><input type="number" class="form-control"
                                        wire:model.debounce.500ms="delete_limit"> Days Activity</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body shadow-lg p-2">
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa fa-clock"></i></span>
                                <input type="text" id="interval" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="input-group">
                                <span class="input-group-text"><input type="number"
                                        wire:model.debounce.500ms="interval" class="form-control"></span>
                                <span class="input-group-text">
                                    <select wire:model="to_from" class="form-control">
                                        <option value="1">Days From</option>
                                        <option value="1">Days Till</option>
                                    </select>
                                </span>
                                <input type="text" id="date" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-log_names shadow-lg p-2">
                    @if (count($log_names ?? []) > 0)
                        <div class="input-group">
                            <span class="input-group-text">Log</span>
                            <select wire:model="log_name" class="form-control">
                                <option value="">Select Log ..</option>
                                @foreach ($log_names as $log_name)
                                    <option value="{{ $log_name }}">{{ $log_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    @if (count($models ?? []) > 0)
                        <br>
                        <div class="input-group">
                            <span class="input-group-text">Model</span>
                            <select wire:model="model" class="form-control">
                                <option value="">Select Model ..</option>
                                @foreach ($models as $model)
                                    <option value="{{ $model }}">{{ $model }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    @if ($users->count() > 0)
                        <br>
                        <div class="input-group">
                            <span class="input-group-text">User</span>
                            <select wire:model="user_id" class="form-control">
                                <option value="">Select User ..</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    @if (!is_null($descriptions))
                        @if (count($descriptions ?? []) > 0)
                            <br>
                            <div class="input-group">
                                <span class="input-group-text">Description</span>
                                <select wire:model="description" class="form-control">
                                    <option value="">Select ..</option>
                                    @foreach ($descriptions as $description)
                                        <option value="{{ $description }}">{{ $description }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    @push('livewire_third_party')
        <script>
            $(function() {
                initializeActivity();
                Livewire.on('initialize_activity', function() {
                    initializeActivity();
                });
                Livewire.on('initialize_activity', function() {
                    initializeActivity();
                });

                function initializeActivity() {
                    $('#date').daterangepicker({
                        singleDatePicker: true,
                        locale: {
                            cancelLabel: 'Clear'
                        }
                    })

                    $('#date').on('apply.daterangepicker', function(ev, picker) {
                        let date = new Date($('#date').data('daterangepicker')
                            .startDate.format('YYYY-MM-DD'));
                        @this.set('mode', 1);
                        window.livewire.emit('date_filter', date)
                    });

                    $('#date').on('cancel.daterangepicker', function(ev, picker) {
                        $(this).val('');
                    });
                    $('#interval').daterangepicker({
                        locale: {
                            cancelLabel: 'Clear'
                        }
                    });
                    $('#interval').on('apply.daterangepicker', function(ev, picker) {
                        let start_date = new Date($('#interval').data('daterangepicker')
                            .startDate.format('YYYY-MM-DD'));
                        let end_date = new Date($('#interval').data('daterangepicker').endDate
                            .format('YYYY-MM-DD'));
                        window.livewire.emit('date_range_filter', start_date, end_date)
                    });
                    $('#interval').on('cancel.daterangepicker', function(ev, picker) {
                        $(this).val('');
                    });
                }
                Livewire.on('activity_success', message => {
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
            });
        </script>
    @endpush
</div>
