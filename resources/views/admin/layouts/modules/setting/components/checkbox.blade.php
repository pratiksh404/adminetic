@isset($setting)
    @isset($setting->custom->options)
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-3" style="position: static;">
                    <label
                        for="{{ $setting->custom->id ?? $setting->getRawOriginal('setting_name') }}">{{ $setting->setting_name }}</label>
                    <div class="col">
                        <div class="m-checkbox-inline">
                            @foreach ($setting->custom->options as $index => $option)
                                <div class="radio radio-theme">
                                    <input id="option{{ $index }}" type="radio"
                                        name="{{ $setting->getRawOriginal('setting_name') }}" value="{{ $index }}"
                                        checked="{{ isset($setting->integer_value) ? ($setting->integer_value == $index ? 'true' : '') : (isset($setting->custom->checked) ? ($setting->custom->checked == $index ? 'true' : '') : '') }}">
                                    <label for="option{{ $index }}">{{ $option }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <p class="help-block">Blade directive : <b>
                            @<code>setting('{{ $setting->getRawOriginal('setting_name') }}')</code> </b></p>
                </div>
            </div>
        </div>
    @endisset
@endisset
