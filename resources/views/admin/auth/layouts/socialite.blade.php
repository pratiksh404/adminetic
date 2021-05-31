@if (config('adminetic.enable_socialite', false))
    <h6 class="text-muted mt-4 or">Or Sign in with</h6>
    <div class="social mt-4">
        <div class="btn-showcase d-flex justify-content-center">
            @if (config('adminetic.github_socialite', true))
                <a class="btn btn-light" href="{{ route('sign_in_github') }}">
                    <i class="fa fa-github"></i> Github </a>
            @endif
            @if (config('adminetic.facebook_socialite', true))
                <a class="btn btn-light" href="{{ route('sign_in_facebook') }}">
                    <i class="fa fa-facebook"></i> Facebook </a>
            @endif
        </div>
    </div>
@endif
