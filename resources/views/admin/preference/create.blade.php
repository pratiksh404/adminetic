@extends('adminetic::admin.layouts.app')

@section('content')
    <x-adminetic-create-page name="preference" route="preference">
        <x-slot name="content">
            {{-- ================================Form================================ --}}
            @include('adminetic::admin.layouts.modules.preference.edit_add')
            {{-- =================================================================== --}}
        </x-slot>
    </x-adminetic-create-page>
@endsection

@section('custom_js')
    @include('adminetic::admin.layouts.modules.preference.scripts')
@endsection
