@extends('adminetic::admin.layouts.app')

@section('content')
    <x-adminetic-index-page name="user" route="user">
        <x-slot name="content">
            <div class="table-responsive">
                <table class="table table-striped table-bordered datatable">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>username</th>
                            <th>name</th>
                            <th>email</th>
                            <th>role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->profile->username ?? 'N/A' }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->roles->first()->name ?? 'N/A' }}</td>

                                <td>
                                    <x-adminetic-action :model="$user" route="user" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-slot>
    </x-adminetic-index-page>
@endsection

@section('custom_js')
    @include('adminetic::admin.layouts.modules.user.scripts')
@endsection
