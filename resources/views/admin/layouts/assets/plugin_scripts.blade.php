@foreach (\Adminetic::assets() as $plugin)
    @if ($plugin['active'])
        @if ($plugin['files'])
            @foreach ($plugin['files'] as $asset)
                @if ($asset['type'] == 'js' || $asset['type'] == 'JS')
                    @if ($asset['active'])
                        @if (isset($asset['location']))
                            <script src="{{ asset($asset['location']) }}"></script>
                        @elseif(isset($asset['link']))
                            <script src="{{ $asset['link'] }}"></script>
                        @endif
                    @endif
                @endif
            @endforeach
        @endif
    @endif
@endforeach
