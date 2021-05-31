@isset($setting)
    <div class="row">
        <div class="col-lg-12">
            <label
                for="{{ $setting->custom->id ?? $setting->getRawOriginal('setting_name') }}">{{ $setting->setting_name }}</label>
            <div class="media mb-2">
                <div class="media-body icon-state">
                    <label class="switch">
                        <input type="hidden" value="0" name="{{ $setting->getRawOriginal('setting_name') }}">
                        <input type="checkbox" name="{{ $setting->getRawOriginal('setting_name') }}" value="1"
                            {{ $setting->boolean_value ? 'checked' : '' }}
                            class="{{ $setting->custom->class ?? $setting->getRawOriginal('setting_name') }}"
                            id="{{ $setting->custom->id ?? $setting->getRawOriginal('setting_name') }}">
                        <span class="switch-state"></span>
                    </label>
                    <p class="help-block">Blade directive : <b>
                            @<code>setting('{{ $setting->getRawOriginal('setting_name') }}')</code> </b></p>
                </div>
            </div>
        </div>
    </div>
@endisset
