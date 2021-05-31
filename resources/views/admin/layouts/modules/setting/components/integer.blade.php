   <div class="row">
       <div class="col-md-12">
           <div class="mb-3" style="position: static;">
               <label
                   for="{{ $setting->custom->id ?? $setting->getRawOriginal('setting_name') }}">{{ $setting->setting_name }}</label>
               <input type="number" name="{{ $setting->getRawOriginal('setting_name') }}"
                   class="touchspin {{ $setting->custom->class ?? $setting->getRawOriginal('setting_name') }}"
                   id="{{ $setting->custom->id ?? $setting->getRawOriginal('setting_name') }}"
                   value="{{ $setting->integer_value ?? ($setting->custom->value ?? 0) }}"
                   data-bts-min="{{ $setting->custom->min ?? 0 }}" data-bts-max="{{ $setting->custom->max ?? 10 }}"
                   placeholder="{{ $setting->custom->placeholder ?? '' }}" />
               <p class="help-block">Blade directive : <b>
                       @<code>setting('{{ $setting->getRawOriginal('setting_name') }}')</code> </b></p>
           </div>
       </div>
   </div>
