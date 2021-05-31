@extends('adminetic::admin.layouts.app')

@section('content')
    <x-adminetic-edit-page name="setting" route="setting" :model="$setting">
        <x-slot name="content">
            {{-- ================================Form================================ --}}
            @include('adminetic::admin.layouts.modules.setting.edit_add')
            {{-- =================================================================== --}}
        </x-slot>
    </x-adminetic-edit-page>
@endsection

@section('custom_js')
    @include('adminetic::admin.layouts.modules.setting.scripts')
@endsection
