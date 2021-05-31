@foreach (config('adminetic.plugins') as $plugin)
    @if ($plugin['active'])
        @if ($plugin['files'])
            @foreach ($plugin['files'] as $asset)
                @if ($asset['type'] == 'js' || $asset['type'] == 'JS')
                    @if ($asset['active'])
                        <script src="{{ asset($asset['location']) }}"></script>
                    @endif
                @endif
            @endforeach
        @endif
    @endif
@endforeach
