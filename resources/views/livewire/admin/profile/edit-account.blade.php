<div>
    <form wire:submit.prevent="submit">
        <div class="row mt-2">
            <div class="col-lg-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" wire:model="name" id="name"
                    class="form-control @error('name') shake animated @enderror" value="{{ $name ?? old('name') }}"
                    placeholder="Name">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="col-lg-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" wire:model="email" id="email"
                    class="form-control @error('email') shake animated @enderror" value="{{ $email ?? old('email') }}"
                    placeholder="Email">
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password"
                        class="form-control @error('password') shake animated @enderror" placeholder="Password"
                        wire:model="password">
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-12 mt-2">
                <div class="form-group">
                    <label for="password">Confirm Password</label>
                    <input type="password" id="confirm_password"
                        class="form-control @error('password') shake animated @enderror" placeholder="Confirm Password"
                        wire:model="password_confirmation">
                </div>
            </div>
        </div>
        <hr>
        <button type="submit" class="btn btn-warning batn-air-warning">Edit Account</button>
    </form>
    @push('livewire_third_party')
        <script>
            $(function() {
                Livewire.on('account_updated', function() {
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
                        message: "Account Information Updated !"
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
