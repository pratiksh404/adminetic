<div>
    <div class="container-fluid mt-3" style="margin-top: 100px;">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>{{ $name }}</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="router" href="{{ route('dashboard') }}"> <i
                                    data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item active">{{ $name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card {{ config('adminetic.card', '') }}">
        <div class="card-header {{ config('adminetic.card_header', 'b-l-primary border-3') }}">
            <h5>@isset($icon) <i class="{{ $icon }} me-2"></i> @endisset All {{ $plural_name ?? 'N/A' }}</h5>
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
                <div class="mb-3">
                    {{ $description ?? 'List of all ' . $plural_name . ' in the system' }}
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ adminCreateRoute($route) }}" class="btn btn-primary router">Create
                        {{ $name ?? '' }}</a>
                    @isset($buttons)
                    {{ $buttons }}
                    @endisset
                </div>
            </div>
        </div>
        <div class="card-body {{ config('adminetic.card_body', '') . ' ' . ($bg_color ?? '') }}"
            style="overflow-x:auto">
            {{ $content ?? '' }}
        </div>
    </div>
</div>