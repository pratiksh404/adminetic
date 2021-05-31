@isset($setting)
    <div class="mb-3 row">
        <label
            for="{{ $setting->custom->id ?? $setting->getRawOriginal('setting_name') }}">{{ $setting->setting_name }}</label>
        <div class="col-lg-12">
            <textarea
                class="form-control btn-square {{ $setting->custom->class ?? $setting->getRawOriginal('setting_name') }}"
                id="{{ $setting->custom->id ?? $setting->getRawOriginal('setting_name') }}"
                name="{{ $setting->getRawOriginal('setting_name') }}">
                          @if (isset($setting->text_value))
                            {!! $setting->text_value !!}
                    @else
                            {{ $setting->custom->value ?? '' }}
                        @endif
                </textarea>
        </div>
    </div>
@endisset
