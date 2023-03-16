@extends(request()->header('layout') ?? 'adminetic::admin.layouts.app')

@section('content')
<x-adminetic-index-page name="permission" route="permission">
    <x-slot name="content">
        {{-- ================================Card================================ --}}
        <table class="table table-striped table-bordered datatable">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Browse</th>
                    <th>Read</th>
                    <th>Edit</th>
                    <th>Add</th>
                    <th>Delete</th>
                    <th>Role</th>
                    <th>Model</th>
                    <th>Name</th>
                    <th>Can</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>
                        <i data-feather="user-{{ $permission->browse ? 'check' : 'x' }}"
                            class="text-{{ $permission->browse ? 'success' : 'danger' }}"></i>
                    </td>
                    <td>
                        <i data-feather="user-{{ $permission->read ? 'check' : 'x' }}"
                            class="text-{{ $permission->read ? 'success' : 'danger' }}"></i>
                    </td>
                    <td>
                        <i data-feather="user-{{ $permission->edit ? 'check' : 'x' }}"
                            class="text-{{ $permission->edit ? 'success' : 'danger' }}"></i>
                    </td>
                    <td>
                        <i data-feather="user-{{ $permission->add ? 'check' : 'x' }}"
                            class="text-{{ $permission->add ? 'success' : 'danger' }}"></i>
                    </td>
                    <td>
                        <i data-feather="user-{{ $permission->delete ? 'check' : 'x' }}"
                            class="text-{{ $permission->delete ? 'success' : 'danger' }}"></i>
                    </td>
                    <td>
                        {{ $permission->role->name ?? '' }}
                    </td>
                    <td>
                        {{ $permission->model }}
                    </td>
                    <td>{{ $permission->name ?? 'N/A' }}</td>
                    <td><span
                            class="badge badge-{{ isset($permission->can) ? ($permission->can ? 'success' : 'danger') : 'primary' }}">{{
                            isset($permission->can) ? ($permission->can ? 'Can' : 'Cannot') : 'N/A' }}</span>
                    </td>
                    <td>
                        <x-adminetic-action :model="$permission" route="permission" show="0" />
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>id</th>
                    <th>Browse</th>
                    <th>Read</th>
                    <th>Edit</th>
                    <th>Add</th>
                    <th>Delete</th>
                    <th>Role</th>
                    <th>Model</th>
                    <th>Name</th>
                    <th>Can</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
        {{-- =================================================================== --}}
    </x-slot>
</x-adminetic-index-page>
@endsection

@section('custom_js')
@include('adminetic::admin.layouts.modules.permission.scripts')
@endsection