@isset($setting)
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3" style="position: static;">
                <label
                    for="{{ $setting->custom->id ?? $setting->getRawOriginal('setting_name') }}">{{ $setting->setting_name }}</label>
                <select name="{{ $setting->getRawOriginal('setting_name') }}"
                    class="form-control btn-square {{ $setting->custom->class ?? $setting->getRawOriginal('setting_name') }}"
                    id="{{ $setting->custom->id ?? $setting->getRawOriginal('setting_name') }}">
                    @isset($setting->custom->placeholder)
                        <option selected disabled>{{ $setting->custom->placeholder }}</option>
                    @endisset
                    @foreach ($setting->custom->options as $index => $option)
                        <option value="{{ $index }}"
                            {{ isset($setting->integer_value) ? ($setting->integer_value == $index ? 'selected' : '') : (isset($setting->custom->default) ? ($setting->custom->default == $index ? 'selected' : '') : '') }}>
                            {{ $option }}</option>
                    @endforeach
                </select>
                <p class="help-block">Blade directive : <b>
                        @<code>setting('{{ $setting->getRawOriginal('setting_name') }}')</code> </b></p>
            </div>
        </div>
    </div>
@endisset
