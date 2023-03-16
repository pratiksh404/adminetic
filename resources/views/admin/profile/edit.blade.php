@extends(request()->header('layout') ?? 'adminetic::admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit My Account</h5>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="icon-tab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="icon-home-tab" data-bs-toggle="tab"
                            href="#icon-home" role="tab" aria-controls="icon-home" aria-selected="true"
                            data-bs-original-title="" title=""><i class="icofont icofont-ui-home"></i>Account</a></li>
                    <li class="nav-item"><a class="nav-link" id="profile-icon-tab" data-bs-toggle="tab"
                            href="#profile-icon" role="tab" aria-controls="profile-icon" aria-selected="false"
                            data-bs-original-title="" title=""><i class="icofont icofont-man-in-glasses"></i>Profile</a>
                    </li>
                </ul>
                <div class="tab-content" id="icon-tabContent">
                    <div class="tab-pane fade show active" id="icon-home" role="tabpanel"
                        aria-labelledby="icon-home-tab">
                        @livewire('admin.profile.edit-account', ['user' => $profile->user], key($profile->user->id))
                    </div>
                    <div class="tab-pane fade" id="profile-icon" role="tabpanel" aria-labelledby="profile-icon-tab">
                        @livewire('admin.profile.edit-profile', ['profile' => $profile], key($profile->id))
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_js')
@include('adminetic::admin.layouts.modules.profile.scripts')
@endsection