@extends(request()->header('layout') ?? 'adminetic::admin.layouts.app')

@section('content')
<x-adminetic-edit-page name="permission" route="permission" :model="$permission">
    <x-slot name="content">
        {{-- ================================Form================================ --}}
        @include('adminetic::admin.layouts.modules.permission.form')
        {{-- =================================================================== --}}
    </x-slot>
</x-adminetic-edit-page>
@endsection

@section('custom_js')
@include('adminetic::admin.layouts.modules.permission.scripts')
@endsection