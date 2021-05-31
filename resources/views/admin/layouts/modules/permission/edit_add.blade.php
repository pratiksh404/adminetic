<div class="row">
    <div class="col-lg-6">
        <label for="name">Permission Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{$permission->name ?? old('name')}}"
            placeholder="Permission Name" required>
    </div>
    <div class="col-lg-4">
        <label for="role_id">Role</label>
        <div class="input-group">
            <select name="role_id" id="role_id" class="select2" style="width:100%">
                <option selected disabled>Select Role .. </option>
                @isset($roles)
                @foreach ($roles as $role)
                <option value="{{$role->id}}"
                    {{isset($permission) ? ($permission->role->id == $role->id ? "selected" : "") : ""}}>{{$role->name}}
                </option>
                @endforeach
                @endisset
            </select>
        </div>
    </div>
    <div class="col-lg-2">
        <label for="can">Can/Cannot</label> <br>
        <input type="hidden" name="can" value="0">
        <input type="checkbox" class="switch" value="1" name="can"
            {{isset($permission->can) ? ($permission->can ? 'checked' : '') : ''}} />
    </div>
</div>
<br>
<input type="submit" class="btn btn-{{isset($permission) ? 'warning' : 'primary'}}"
    value="{{isset($permission) ? 'Update' : 'Submit'}}">