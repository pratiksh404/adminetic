@isset($setting)
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3" style="position: static;">
                <label
                    for="{{ $setting->custom->id ?? $setting->getRawOriginal('setting_name') }}">{{ $setting->setting_name }}</label>
                <select name="{{ $setting->getRawOriginal('setting_name') }}[]"
                    class="form-control btn-square select2 {{ $setting->custom->class ?? $setting->getRawOriginal('setting_name') }}"
                    id="{{ $setting->custom->id ?? $setting->getRawOriginal('setting_name') }}" multiple>
                    @foreach ($setting->custom->options as $index => $option)
                        <option value="{{ $index }}"
                            {{ isset($setting->setting_json) ? (in_array($index, $setting->setting_json) ? 'selected' : '') : '' }}>
                            {{ $option }}</option>
                    @endforeach
                </select>
                <p class="help-block">Blade directive : <b>
                        @<code>setting('{{ $setting->getRawOriginal('setting_name') }}')</code> </b></p>
            </div>
        </div>
    </div>
@endisset
