@isset($setting)
    <div class="row">
        <div class="col-lg-8">
            <div class="mb-3" style="position: static;">
                <label
                    for="{{ $setting->custom->id ?? $setting->getRawOriginal('setting_name') }}">{{ $setting->setting_name }}</label>
                <br>
                <input type="file" name="{{ $setting->getRawOriginal('setting_name') }}"
                    class="{{ $setting->custom->class ?? $setting->getRawOriginal('setting_name') }}"
                    id="{{ $setting->custom->id ?? $setting->getRawOriginal('setting_name') }}">
                <p class="help-block">Blade directive : <b>
                        @<code>setting('{{ $setting->getRawOriginal('setting_name') }}')</code> </b></p>
                <p class="help-block">Max file size 3MB. Supports jpg jpeg png and gif</p>
            </div>
        </div>
        <div class="col-lg-4">
            @isset($setting->string_value)
                <img src="{{ asset('storage/' . $setting->string_value) }}" alt="{{ $setting->setting_name }}"
                    class="img-fluid">
            @endisset
        </div>
    </div>
@endisset
