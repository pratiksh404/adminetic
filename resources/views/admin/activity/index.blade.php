@extends(request()->header('layout') ?? 'adminetic::admin.layouts.app')

@section('content')
@livewire('admin.activity.activity-table')
@endsection

@section('custom_js')
@include('adminetic::admin.layouts.modules.activity.scripts')
@endsection