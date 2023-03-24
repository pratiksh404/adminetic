@extends(request()->header('layout') ?? 'adminetic::admin.layouts.app')

@section('content')
<x-adminetic-edit-page name="preference" route="preference" :model="$preference">
    <x-slot name="content">
        {{-- ================================Form================================ --}}
        @include('adminetic::admin.layouts.modules.preference.form')
        {{-- =================================================================== --}}
    </x-slot>
</x-adminetic-edit-page>
@endsection

@section('custom_js')
@include('adminetic::admin.layouts.modules.preference.scripts')
@endsection