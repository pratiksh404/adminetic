<div>
    <div class="card {{ config('adminetic.card', '') }}">
        <div
            class="card-header {{ config('adminetic.card_header', 'b-l-primary border-3') . ' ' . ($bg_color ?? '') }}">
            <h5>@isset($icon) <i class="{{ $icon }} me-2"></i> @endisset {{ $title ?? '' }}</h5>
            @if (config('adminetic.card_action_enabled', true))
                <div class="card-header-right">
                    @if (isset($actions))
                        {{ $actions }}
                    @else
                        <ul class="list-unstyled card-option">
                            <li><i class="fa fa-spin fa-cog"></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                        </ul>
                    @endif
                </div>
            @endif
            <br>
            <div class="row">
                {{ $description ?? '' }}
                <div class="d-flex justify-content-end">
                    @isset($buttons)
                        {{ $buttons }}
                    @endisset
                </div>
            </div>
        </div>
        <div class="card-body {{ config('adminetic.card_body', '') . ' ' . ($bg_color ?? '') }}">
            {{ $content ?? '' }}
        </div>
        @if (($card_footer_enabled ?? false) && config('adminetic.card_footer_enabled', false))
            <div class="card-footer {{ config('adminetic.card_footer', '') . ' ' . ($bg_color ?? '') }}">
                <h6 class="mb-0">
                    {{ $footer_content ?? '' }}
                </h6>
            </div>
        @endif
    </div>
</div>
