@extends(request()->header('layout') ?? 'adminetic::admin.layouts.app')

@section('content')
   @livewire('admin.role.acl-panel',['role' => $role])
@endsection

@section('custom_js')
@include('adminetic::admin.layouts.modules.role.scripts')
@endsection