@extends(request()->header('layout') ?? 'adminetic::admin.layouts.app')

@section('content')
<x-adminetic-index-page name="role" route="role">
    <x-slot name="content">
        {{-- ================================Card================================ --}}
        <table class="table table-striped table-bordered datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Role</th>
                    <th>Level</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                @if ($role->name != 'superadmin')
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->level }}</td>
                    <td>
                        <x-adminetic-action :model="$role" route="role">
                            <x-slot name="buttons">
                                <a href="{{ adminShowRoute('role', $role->id) }}"
                                    class="btn btn-info btn-air-info btn-sm p-2 router" data-toggle="tooltip"
                                    placement="top" title="Role's Permissions"><i class="feather icon-unlock"></i></a>
                            </x-slot>
                        </x-adminetic-action>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Role</th>
                    <th>Level</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
        {{-- =================================================================== --}}
    </x-slot>
</x-adminetic-index-page>
@endsection

@section('custom_js')
@include('adminetic::admin.layouts.modules.role.scripts')
@endsection