@yield('custom_css')
@yield('content')
<div id="yield_js">
    @yield('custom_js')
    @stack('livewire_third_party')
</div>