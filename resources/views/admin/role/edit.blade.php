@extends(request()->header('layout') ?? 'adminetic::admin.layouts.app')

@section('content')
<x-adminetic-edit-page name="role" route="role" :model="$role">
    <x-slot name="content">
        {{-- ================================Form================================ --}}
        @include('adminetic::admin.layouts.modules.role.form')
        {{-- =================================================================== --}}
    </x-slot>
</x-adminetic-edit-page>
@endsection

@section('custom_js')
@include('adminetic::admin.layouts.modules.role.scripts')
@endsection