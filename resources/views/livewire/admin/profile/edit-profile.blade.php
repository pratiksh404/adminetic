<div>
    <form wire:submit.prevent="submit">
        @if (!empty($errors))
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            @endif
        @endif
        <div class="row">
            <div class="col-lg-4">
                <div class="row" wire:ignore>
                    <div class="col-lg-12">
                        <div class="avatar"><img class="img-100 rounded-circle" id="profile_pic_placeholder"
                                src="{{ getProfilePlaceholder($profile) }}" alt="Profile Picture"></div>
                        <br>
                        <input type="file" wire:model.defer="profile_pic" id="profile_pic" onchange="readURL(this)">
                        @error('profile_pic') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <br>
                <div class="row">
                    <h4>Social Links</h4>
                    <div class="col-lg-12">
                        <label class="form-label" for="facebook">Facebook</label>
                        <input type="text" wire:model.defer="facebook" id="facebook" class="form-control"
                            value="{{ $facebook ?? old('facebook') }}">
                        @error('facebook') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label" for="instagram">Instagram</label>
                        <input type="text" wire:model.defer="instagram" id="instagram" class="form-control"
                            value="{{ $instagram ?? old('instagram') }}">
                        @error('instagram') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label" for="twitter">Twitter</label>
                        <input type="text" wire:model.defer="twitter" id="twitter" class="form-control"
                            value="{{ $twitter ?? old('twitter') }}">
                        @error('twitter') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label" for="linkedin">Linkedin</label>
                        <input type="text" wire:model.defer="linkedin" id="linkedin" class="form-control"
                            value="{{ $linkedin ?? old('linkedin') }}">
                        @error('linkedin') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" wire:model.defer="address" id="address" class="form-control"
                            value="{{ $address ?? old('address') }}">
                        @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-lg-12" wire:ignore>
                        <label for="phone_no" class="form-label">Phone</label>
                        <select wire:model.defer="phone_no" name="phone_no[]" class="form-control" id="phone_no"
                            multiple="">
                            @if (isset($phone_no))
                                @foreach ($phone_no as $phone)
                                    <option value="{{ $phone }}" selected>{{ $phone }}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" wire:model.defer="username" id="username" class="form-control"
                            value="{{ $username ?? old('username') }}">
                        @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="gender" class="form-label">Gender</label>
                        <div class="m-t-15 m-checkbox-inline custom-radio-ml">
                            <div class="form-check form-check-inline radio radio-primary">
                                <input class="form-check-input" id="radioinline1" type="radio" wire:model.defer="gender"
                                    value="1" data-bs-original-title="" title=""
                                    {{ isset($gender) ? ($gender == 1 ? 'checked' : '') : '' }}>
                                <label class="form-check-label mb-0" for="radioinline1">Male</label>
                            </div>
                            <div class="form-check form-check-inline radio radio-primary">
                                <input class="form-check-input" id="radioinline2" type="radio" wire:model.defer="gender"
                                    value="2" data-bs-original-title="" title=""
                                    {{ isset($gender) ? ($gender == 2 ? 'checked' : '') : '' }}>
                                <label class="form-check-label mb-0" for="radioinline2">Female</label>
                            </div>
                            <div class="form-check form-check-inline radio radio-primary">
                                <input class="form-check-input" id="radioinline3" type="radio" wire:model.defer="gender"
                                    value="3" data-bs-original-title="" title=""
                                    {{ isset($gender) ? ($gender == 3 ? 'checked' : '') : '' }}>
                                <label class="form-check-label mb-0" for="radioinline3">Other</label>
                            </div>
                        </div>
                        @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <br>
                <div class="row" wire:ignore>
                    <div class="col-lg-12">
                        <label for="birthday" class="form-label">Birthday</label>
                        <input type="text" wire:model.defer="birthday" id="birthday" class="form-control"
                            placeholder="Select Year" value="{{ $birthday ?? old('birthday') }}">
                        @error('birthday') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <label class="form-label" for="country">Country</label>
                        <select class="form-control select2" wire:model.defer="country" id="country" style="width:100%">
                            @if (isset($countries))
                                @foreach ($countries as $country)
                                    <option value="{{ $country->name }}"
                                        {{ isset($country) ? ($country->name == $country ? 'selected' : '') : ($country->name == 'Nepal' ? 'selected' : '') }}>
                                        {{ $country->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-6">
                        <label class="form-label" for="martial_status">Martial Status</label> <br>
                        <select class="form-control" wire:model.defer="martial_status">
                            <option selected disabled>Select Martial Status..</option>
                            <option value="1"
                                {{ isset($martial_status) ? ($martial_status == 1 ? 'selected' : '') : '' }}>
                                Married
                            </option>
                            <option value="2"
                                {{ isset($martial_status) ? ($martial_status == 2 ? 'selected' : '') : '' }}>
                                Unmarried</option>
                            <option value="3"
                                {{ isset($martial_status) ? ($martial_status == 3 ? 'selected' : '') : '' }}>
                                Divorced</option>
                            <option value="4"
                                {{ isset($martial_status) ? ($martial_status == 4 ? 'selected' : '') : '' }}>
                                Widowed
                            </option>
                        </select>
                        @error('martial_status') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label" for="blood_group">Blood Group</label>
                        <select class="form-control" wire:model.defer="blood_group" style="width:100%">
                            <option selected disabled>Select Blood Group..</option>
                            <option value="1" {{ isset($blood_group) ? ($blood_group == 1 ? 'selected' : '') : '' }}>
                                A
                            </option>
                            <option value="2" {{ isset($blood_group) ? ($blood_group == 2 ? 'selected' : '') : '' }}>
                                B
                            </option>
                            <option value="3" {{ isset($blood_group) ? ($blood_group == 3 ? 'selected' : '') : '' }}>
                                A+
                            </option>
                            <option value="4" {{ isset($blood_group) ? ($blood_group == 4 ? 'selected' : '') : '' }}>
                                B+
                            </option>
                            <option value="5" {{ isset($blood_group) ? ($blood_group == 5 ? 'selected' : '') : '' }}>
                                AB
                            </option>
                            <option value="6" {{ isset($blood_group) ? ($blood_group == 6 ? 'selected' : '') : '' }}>
                                AB+
                            </option>
                            <option value="7" {{ isset($blood_group) ? ($blood_group == 7 ? 'selected' : '') : '' }}>
                                O+
                            </option>
                            <option value="8" {{ isset($blood_group) ? ($blood_group == 8 ? 'selected' : '') : '' }}>
                                O-
                            </option>
                        </select>
                        @error('blood_group') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="com-lg-12">
                        <label>Father Name</label>
                        <input type="text" wire:model.defer="father_name" class="form-control"
                            value="{{ $father_name ?? old('father_name') }}">
                        @error('father_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="com-lg-12">
                        <label>Mother Name</label>
                        <input type="text" wire:model.defer="mother_name" class="form-control"
                            value="{{ $mother_name ?? old('mother_name') }}">
                        @error('mother_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <br>
                <div wire:loading="submit">
                    <div class="loader-box">
                        <div class="loader-15"></div>
                    </div>
                </div>
                <div wire:loading.remove="submit">
                    <button type="submit" class="btn btn-warning btn-air-warning">
                        Edit Profile
                    </button>
                </div>
            </div>
        </div>
    </form>
    @push('livewire_third_party')
        <script>
            $(function() {
                initializeProfile();
                Livewire.on('initializeProfile', function() {
                    initializeProfile();
                });
                Livewire.on('profile_updated', function() {
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
                        message: "Profile Information Updated !"
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

                function initializeProfile() {
                    $('#phone_no').select2({
                        dropdownAutoWidth: true,
                        width: '100%',
                        tags: true,
                        tokenSeparators: [',', ' ']
                    });
                    // Select Year
                    $('#birthday').datepicker({
                        language: 'en',
                        maxDate: new Date(getMinDate()),
                        format: "yyyy-mm-dd",
                        onSelect: function(birthday) {
                            @this.set('birthday', birthday);
                        }
                    });
                    $("#birthday").datepicker("setDate", "{{ $birthday }}");
                    $('#country').on('change', function() {
                        var data = $('#country').select2("val");
                        @this.set('country', data);
                    });
                    $('#phone_no').on('change', function() {
                        var data = $('#phone_no').select2("val");
                        @this.set('phone_no', data);
                    });
                }

                function getMinDate() {
                    var date = new Date();
                    date.setFullYear(date.getFullYear() - 18);
                    return date
                }

                function getMaxDate() {
                    var maxDate = getMinDate();
                    maxDate.setFullYear(maxDate.getFullYear() - 80);
                    return maxDate;
                }
            });

        </script>

        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#profile_pic_placeholder')
                            .attr('src', e.target.result)
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

        </script>
    @endpush
</div>
