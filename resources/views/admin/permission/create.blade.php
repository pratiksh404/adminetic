@extends('adminetic::admin.layouts.app')

@section('content')
    <x-adminetic-create-page name="permission" route="permission">
        <x-slot name="content">
            {{-- ================================Form================================ --}}
            @include('adminetic::admin.layouts.modules.permission.edit_add')
            {{-- =================================================================== --}}
        </x-slot>
    </x-adminetic-create-page>
@endsection

@section('custom_js')
    @include('adminetic::admin.layouts.modules.permission.scripts')
@endsection
