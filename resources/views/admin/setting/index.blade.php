@extends(request()->header('layout') ?? 'adminetic::admin.layouts.app')

@section('content')
<x-adminetic-index-page name="setting" route="setting">
    <x-slot name="content">
        {{-- ================================Card================================ --}}
        <ul class="nav nav-pills" id="pills-icontab" role="tablist">
            <li class="nav-item"><a class="nav-link active" id="pills-iconhome-tab" data-bs-toggle="pill"
                    href="#pills-iconhome" role="tab" aria-controls="pills-iconhome" aria-selected="true"
                    data-bs-original-title="" title=""><i class="fa fa-cog"></i>Setting</a></li>
            <li class="nav-item"><a class="nav-link" id="pills-iconprofile-tab" data-bs-toggle="pill"
                    href="#pills-iconprofile" role="tab" aria-controls="pills-iconprofile" aria-selected="false"
                    data-bs-original-title="" title=""><i class="fa fa-list"></i>Setting List</a></li>

        </ul>
        <br>
        <div class="tab-content" id="pills-icontabContent">
            <div class="tab-pane fade show active" id="pills-iconhome" role="tabpanel"
                aria-labelledby="pills-iconhome-tab">
                @include('adminetic::admin.layouts.modules.setting.tabs.setting_value')
            </div>
            <div class="tab-pane fade" id="pills-iconprofile" role="tabpanel" aria-labelledby="pills-iconprofile-tab">
                @include('adminetic::admin.layouts.modules.setting.tabs.setting_list')
            </div>
        </div>
        {{-- =================================================================== --}}
    </x-slot>
</x-adminetic-index-page>
@endsection

@section('custom_js')
@include('adminetic::admin.layouts.modules.setting.scripts')
@endsection