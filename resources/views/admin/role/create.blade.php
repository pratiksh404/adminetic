@extends(request()->header('layout') ?? 'adminetic::admin.layouts.app')

@section('content')
<x-adminetic-create-page name="role" route="role">
    <x-slot name="content">
        {{-- ================================Form================================ --}}
        @include('adminetic::admin.layouts.modules.role.form')
        {{-- =================================================================== --}}
    </x-slot>
</x-adminetic-create-page>
@endsection

@section('custom_js')
@include('adminetic::admin.layouts.modules.role.scripts')
@endsection