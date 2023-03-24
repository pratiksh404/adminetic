<div class="row">
    <div class="col-lg-9">
        <label for="role">Role Name</label>
        <input type="text" name="name" class="form-control" id="role" value="{{ $role->name ?? old('role') }}"
            placeholder="Role Name">
    </div>
    <div class="col-lg-3">
        <label for="level">Level</label>
        <input type="text" name="level" class="touchspin" value="50" data-bts-min="0" data-bts-max="5"
            value="{{ $role->level ?? old('level') }}" />
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <label for="description">Description</label>
        <textarea name="description" class="form-control texteditor" cols="30" rows="10"></textarea>
    </div>
</div>
<hr>
<input type="submit"
    class="btn btn-{{ isset($role) ? 'warning' : 'primary' }} btn-air-{{ isset($role) ? 'warning' : 'primary' }}"
    value="{{ isset($role) ? 'Edit Role' : 'Add Role' }}">
