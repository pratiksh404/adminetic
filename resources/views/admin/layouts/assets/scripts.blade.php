<!-- latest jquery-->
<script src="{{ asset('adminetic/assets/js/jquery-3.5.1.min.js') }}"></script>
<!-- Bootstrap js-->
<script src="{{ asset('adminetic/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<!-- feather icon js-->
<script src="{{ asset('adminetic/assets/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('adminetic/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
<!-- Sidebar jquery-->
<script src="{{ asset('adminetic/assets/js/config.js') }}"></script>
{{-- Plugin Injection --}}
@include('adminetic::admin.layouts.assets.plugin_scripts')
<script src="{{ asset('adminetic/assets/js/sidebar-menu.js') }}"></script>
<script src="{{ asset('adminetic/assets/js/scrollbar/simplebar.js') }}"></script>
{{-- End Plugin Injection --}}
{{-- Notifiable --}}
@include('adminetic::admin.layouts.components.notify')
{{-- Notifications --}}
@include('adminetic::admin.layouts.assets.notification')
{{-- CKEditor --}}
@include('adminetic::admin.layouts.assets.ckeditor')
{{-- Inline Custom --}}
@yield('custom_js')
<!-- Theme js-->
<script src="{{ asset('adminetic/assets/js/script.js') }}"></script>
@if (Route::is('dashboard'))
    @if (auth()->user()->hasRole('admin') ||
            auth()->user()->hasRole('superadmin'))
        @include('adminetic::admin.layouts.assets.customizer')
    @endif
@endif
@include('adminetic::admin.layouts.assets.rolewise_theme_selector')
@include('adminetic::admin.layouts.assets.router')
{{-- Livewire --}}
@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
@stack('livewire_third_party')
{{-- Alpine --}}
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.1/dist/cdn.min.js"></script>
<style>
    [x-cloak] {
        display: none !important;
    }
</style>

{{-- CUSTOM --}}
<script src="{{ asset('adminetic/assets/custom/custom.js') }}"></script>
@include('adminetic::admin.layouts.assets.custom')
