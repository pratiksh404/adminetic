@isset($setting)
    <div class="row">
        <div class="col-md-12">
            <div class="mb-3" style="position: static;">
                <label
                    for="{{ $setting->custom->id ?? $setting->getRawOriginal('setting_name') }}">{{ $setting->setting_name }}</label>
                <textarea name="{{ $setting->getRawOriginal('setting_name') }}"
                    class="form-control btn-square {{ $setting->custom->class ?? $setting->getRawOriginal('setting_name') }}"
                    id="{{ $setting->custom->id ?? $setting->getRawOriginal('setting_name') }}" type="text">
                        @if (isset($setting->text_value))
                            {!! $setting->text_value !!}
                    @else
                            {{ $setting->custom->value ?? '' }}
                        @endif
                    </textarea>
                <p class="help-block">Blade directive : <b>
                        @<code>setting('{{ $setting->getRawOriginal('setting_name') }}')</code> </b></p>
            </div>
        </div>
    </div>
@endisset
