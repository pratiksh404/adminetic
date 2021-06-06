    @foreach (\Adminetic::assets() as $plugin)
        @if ($plugin['active'])
            @if ($plugin['files'])
                @foreach ($plugin['files'] as $asset)
                    @if ($asset['type'] == 'css' || $asset['type'] == 'CSS')
                        @if ($asset['active'])
                            @if (isset($asset['location']))
                                <link rel="stylesheet" href="{{ asset($asset['location']) }}">
                            @elseif(isset($asset['link']))
                                <link rel="stylesheet" href="{{ $asset['link'] }}">
                            @endif
                        @endif
                    @endif
                @endforeach
            @endif
        @endif
    @endforeach
