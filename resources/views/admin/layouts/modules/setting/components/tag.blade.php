@isset($setting)
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3" style="position: static;">
                <label
                    for="{{ $setting->custom->id ?? $setting->getRawOriginal('setting_name') }}">{{ $setting->setting_name }}</label>
                <select name="{{ $setting->getRawOriginal('setting_name') }}[]"
                    class="form-control btn-square tagging {{ $setting->custom->class ?? $setting->getRawOriginal('setting_name') }}"
                    id="{{ $setting->custom->id ?? $setting->getRawOriginal('setting_name') }}" multiple>
                    @isset($setting->setting_json)
                        @foreach ($setting->setting_json as $value)
                            <option value="{{ $value }}" selected>{{ $value }}</option>
                        @endforeach
                    @endisset
                </select>
                <p class="help-block">Blade directive : <b>
                        @<code>setting('{{ $setting->getRawOriginal('setting_name') }}')</code> </b></p>
            </div>
        </div>
    </div>
@endisset
