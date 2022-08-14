@if (config('adminetic.enable_socialite', false))
<h6 class="text-muted mt-4 or">Or Sign in with</h6>
<div class="social mt-4">
    <div class="btn-showcase d-flex justify-content-center">
        @if (config('adminetic.github_socialite', true))
        @if (env('GITHUB_CLIENT_ID') != null && env('GITHUB_CLIENT_SECRET') != null)
        <a class="btn btn-light" href="{{ route('sign_in_github') }}">
            <i class="fa fa-github"></i> Github </a>
        @endif
        @endif
        @if (config('adminetic.facebook_socialite', true))
        @if (env('FACEBOOK_CLIENT_ID') != null && env('FACEBOOK_CLIENT_SECRET') != null)
        <a class="btn btn-light" href="{{ route('sign_in_facebook') }}">
            <i class="fa fa-facebook"></i> Facebook </a>
        @endif
        @endif
        @if (config('adminetic.google_socialite', true))
        @if (env('google_CLIENT_ID') != null && env('google_CLIENT_SECRET') != null)
        <a class="btn btn-light" href="{{ route('sign_in_google') }}">
            <i class="fa fa-google"></i> google </a>
        @endif
        @endif
    </div>
</div>
@endif