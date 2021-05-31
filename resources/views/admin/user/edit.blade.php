@extends('adminetic::admin.layouts.app')

@section('content')
    <x-adminetic-edit-page name="user" route="user" :model="$user">
        <x-slot name="content">
            {{-- ================================Form================================ --}}
            @include('adminetic::admin.layouts.modules.user.edit_add')
            {{-- =================================================================== --}}
        </x-slot>
    </x-adminetic-edit-page>
@endsection

@section('custom_js')
    @include('adminetic::admin.layouts.modules.user.scripts')
@endsection
