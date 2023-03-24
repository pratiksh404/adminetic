<div>
    @if (isset($preference) && isset($user))
        <label for="my_preference{{ $preference->id }}">{{ $preference->preference }}</label>
        <div class="media mb-2">
            <div class="media-body icon-state">
                <label class="switch">
                    <input type="checkbox"
                        wire:click="$emitUp('preference_changed',{{ $user }}, {{ $preference }})"
                        id="my_preference{{ $preference->id }}" {{ $enabled ? 'checked' : '' }}>
                    <span class="switch-state"></span>

            </div>
        </div>
    @endif
</div>
