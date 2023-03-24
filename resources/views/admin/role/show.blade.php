@extends(request()->header('layout') ?? 'adminetic::admin.layouts.app')

@section('content')
<x-adminetic-show-page name="role" route="role" :model="$role">
    <x-slot name="description">All Permissions of {{ $role->name }}</x-slot>
    <x-slot name="buttons">
        <button class="btn btn-secondary btn-air-secondary" type="button" data-bs-toggle="modal"
            data-original-title="test" data-bs-target="#create_module_permission">Create Module Permission</button>
    </x-slot>
    <x-slot name="content">
        {{-- ================================Form================================ --}}

        <div style="overflow-x:auto">
            <div class="row text-center mb-2">
                <div class="col-5">Module</div>
                <div class="col-1">Browse</div>
                <div class="col-1">Read</div>
                <div class="col-1">Edit</div>
                <div class="col-1">Add</div>
                <div class="col-1">Delete</div>
                <div class="col-2"><i class="fa fa-trash"></i></div>
            </div>
            <hr>
            @foreach ($role->permissions as $permission)
            <div class="row text-center mb-2">
                <div class="col-5">{{ $permission->model ?? '' }}</div>
                <div class="custom-control custom-checkbox col-1"><input type="checkbox" name="browse"
                        value="{{ $permission->browse }}" {{ $permission->browse ? 'checked' : '' }}
                    id="browse"
                    data-role="{{ $role->id }}" data-permission="{{ $permission->id }}">
                </div>
                <div class="custom-control custom-checkbox col-1"><input type="checkbox" name="read"
                        value="{{ $permission->read }}" {{ $permission->read ? 'checked' : '' }}
                    id="read" data-role="{{ $role->id }}"
                    data-permission="{{ $permission->id }}">
                </div>
                <div class="custom-control custom-checkbox col-1"><input type="checkbox" name="edit"
                        value="{{ $permission->edit }}" {{ $permission->edit ? 'checked' : '' }}
                    id="edit"
                    data-role="{{ $role->id }}" data-permission="{{ $permission->id }}">
                </div>
                <div class="custom-control custom-checkbox col-1"><input type="checkbox" name="add"
                        value="{{ $permission->add }}" {{ $permission->add ? 'checked' : '' }}
                    id="add" data-role="{{ $role->id }}"
                    data-permission="{{ $permission->id }}">
                </div>

                <div class="custom-control custom-checkbox col-1"><input type="checkbox" name="delete"
                        value="{{ $permission->delete }}" {{ $permission->delete ? 'checked' : '' }}
                    id="delete"
                    data-role="{{ $role->id }}" data-permission="{{ $permission->id }}">
                </div>
                <div class="col-2">
                    <a href="{{ adminUpdateRoute('detach_role_module_permission', $role->id . '/' . $permission->id) }}"
                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </div>
            </div>
            @endforeach
        </div>
        {{-- =================================================================== --}}

        <!-- Modal -->
        <div class="modal fade" id="create_module_permission" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-secondary">
                        <h5 class="modal-title" id="exampleModalLabel">Create Role Permission</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Select Module for making BREAD Permission.
                        <br>
                        <form action="{{ adminUpdateRoute('make_role_module_permission', $role->id) }}" method="POST">
                            @csrf
                            <select name="model" id="model" class="form-control modules" style="width:100%">
                                <option selected disabled>Select Module..</option>
                                @foreach ($remaining_models as $model)
                                <option value="{{ $model }}">{{ $model }}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-danger btn-air-danger"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-secondary btn-air-secondary">Make
                            Permission</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </x-slot>
</x-adminetic-show-page>

@endsection

@section('custom_js')
@include('adminetic::admin.layouts.modules.role.scripts')
@endsection