@extends(request()->header('layout') ?? 'adminetic::admin.layouts.app')

@section('content')
<x-adminetic-index-page name="user" route="user">
    <x-slot name="content">
        @livewire('admin.user.user-table')
    </x-slot>
</x-adminetic-index-page>
@endsection

@section('custom_js')

@endsection