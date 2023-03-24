<div class="row">
    <div class="col-lg-5">
        <div class="mb-3" style="position: static;">
            <label for="preference">Preference</label>
            <input name="preference" class="form-control btn-square" id="preference" type="text"
                placeholder="Enter Preference Name" value="{{ $preference->preference ?? old('preference') }}">
        </div>
    </div>
    <div class="col-lg-5">
        <div class="mb-3" style="position: static;">
            <label for="roles">Preference For ?</label>
            <select class="form-control btn-square select2" id="roles" name="roles[]" multiple>
                @isset($roles)
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}"
                            {{ isset($preference->roles) ? (in_array($role->id, $preference->roles) ? 'selected' : '') : '' }}>
                            {{ $role->name }}</option>
                    @endforeach
                @endisset
            </select>
            <p class="help-block">Leave if preference implemented for all roles</p>
        </div>
    </div>
    <div class="col-lg-2">
        <label for="active">Active</label>
        <div class="media mb-2">
            <div class="media-body icon-state">
                <label class="switch">
                    <input type="hidden" value="0" name="active">
                    <input type="checkbox" name="active" value="1"
                        {{ isset($preference->active) ? ($preference->active ? 'checked' : '') : 'checked' }}
                        class="active" id="active">
                    <span class="switch-state"></span>
                </label>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="mb-3" style="position: static;">
            <label for="descriptiom">Description</label>
            <input name="description" class="form-control btn-square" id="descriptiom" type="text"
                placeholder="Enter Preference Description"
                value="{{ $preference->description ?? old('description') }}">
        </div>
    </div>
</div>
<hr>
<input type="submit"
    class="btn btn-{{ isset($preference) ? 'warning' : 'primary' }} btn-air-{{ isset($permission) ? 'warning' : 'primary' }}"
    value="{{ isset($preference) ? 'Edit Preference' : 'Add Preference' }}">
