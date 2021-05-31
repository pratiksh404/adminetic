<div class="row">
    <div class="col-lg-8">
        <div class="mb-3" style="position: static;">
            <label for="setting_name">Setting Name</label>
            <input name="setting_name" class="form-control btn-square" id="setting_name" type="text"
                placeholder="Enter Setting Name" value="{{ $setting->setting_name ?? old('setting_name') }}">
        </div>
    </div>
    <div class="col-lg-4">
        <div class="mb-3" style="position: static;">
            <label for="setting_type">Setting Type</label>
            <select name="setting_type" class="form-control btn-square" id="setting_type">
                <option selected disabled>Select Setting Type ... </option>
                <option value="1"
                    {{ isset($setting->setting_type) ? ($setting->getRawOriginal('setting_type') == 1 ? 'selected' : '') : '' }}>
                    String
                </option>
                <option value="2"
                    {{ isset($setting->setting_type) ? ($setting->getRawOriginal('setting_type') == 2 ? 'selected' : '') : '' }}>
                    Integer
                </option>
                <option value="3"
                    {{ isset($setting->setting_type) ? ($setting->getRawOriginal('setting_type') == 3 ? 'selected' : '') : '' }}>
                    Text
                </option>
                <option value="4"
                    {{ isset($setting->setting_type) ? ($setting->getRawOriginal('setting_type') == 4 ? 'selected' : '') : '' }}>
                    Rich Text
                </option>
                <option value="5"
                    {{ isset($setting->setting_type) ? ($setting->getRawOriginal('setting_type') == 5 ? 'selected' : '') : '' }}>
                    Switch
                </option>
                <option value="6"
                    {{ isset($setting->setting_type) ? ($setting->getRawOriginal('setting_type') == 6 ? 'selected' : '') : '' }}>
                    Check Box
                </option>
                <option value="7"
                    {{ isset($setting->setting_type) ? ($setting->getRawOriginal('setting_type') == 7 ? 'selected' : '') : '' }}>
                    Select
                </option>
                <option value="8"
                    {{ isset($setting->setting_type) ? ($setting->getRawOriginal('setting_type') == 8 ? 'selected' : '') : '' }}>
                    Multiple
                </option>
                <option value="9"
                    {{ isset($setting->setting_type) ? ($setting->getRawOriginal('setting_type') == 9 ? 'selected' : '') : '' }}>
                    Tag
                </option>
                <option value="10"
                    {{ isset($setting->setting_type) ? ($setting->getRawOriginal('setting_type') == 10 ? 'selected' : '') : '' }}>
                    Image
                </option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="mb-3" style="position: static;">
            <label for="setting_group">Setting Group</label>
            <select name="setting_group" class="form-control btn-square" id="setting_group">
                <option selected disabled>Select Setting Group ... </option>
                @isset($setting_groups)
                    @foreach (array_unique($setting_groups) as $group)
                        <option value="{{ $group }}">{{ $group }}</option>
                    @endforeach
                @endisset
            </select>
        </div>
    </div>
    <div class="col-lg-2">
        <h2><b>OR</b></h2>
    </div>
    <div class="col-lg-4">
        <div class="mb-3" style="position: static;">
            <label for="new_setting_group">New Setting Group</label>
            <input name="new_setting_group" class="form-control btn-square" id="new_setting_group" type="text"
                placeholder="Enter New Setting Group"
                value="{{ $setting->setting_group ?? old('new_setting_group') }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="mb-3" style="position: static;">
            <label for="setting_custom">Customization</label>
            <input type="hidden" name="setting_custom" data-setting_custom="{{ $setting->setting_custom ?? '' }}"
                id="setting_custom">
            <div class="ace-editor" id="editor">

            </div>
        </div>
    </div>
</div>
<hr>
<input type="submit"
    class="btn btn-{{ isset($setting) ? 'warning' : 'primary' }} btn-air-{{ isset($role) ? 'warning' : 'primary' }}"
    value="{{ isset($setting) ? 'Edit Setting' : 'Add Setting' }}">
