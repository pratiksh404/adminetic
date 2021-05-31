@extends('adminetic::admin.layouts.app')

@section('content')
    <x-adminetic-edit-page name="role" route="role" :model="$role">
        <x-slot name="content">
            {{-- ================================Form================================ --}}
            @include('adminetic::admin.layouts.modules.role.edit_add')
            {{-- =================================================================== --}}
        </x-slot>
    </x-adminetic-edit-page>
@endsection

@section('custom_js')
    @include('adminetic::admin.layouts.modules.role.scripts')
@endsection
