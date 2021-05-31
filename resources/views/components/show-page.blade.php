<div>
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>{{ $name }}</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ adminRedirectRoute($route) }}">{{ $name }}</a>
                        </li>
                        <li class="breadcrumb-item active">Show {{ $name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card {{ config('adminetic.card', '') }}">
        <div class="card-header {{ config('adminetic.card_header', 'b-l-info border-3') }}">
            <h5>@isset($icon) <i class="{{ $icon }} me-2"></i> @endisset Show {{ $name ?? 'N/A' }}</h5>
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

                {{ $description ?? 'List of all ' . $plural_name . ' in the system' }}
                <div class="d-flex justify-content-end">
                    <a href="{{ adminRedirectRoute($route) }}"
                        class="btn btn-primary btn-sm btn-air-primary">Back</a>
                    <a href="{{ adminEditRoute($route, $model->id) }}"
                        class="btn btn-info btn-sm btn-air-info">Edit</a>
                    <a href="{{ adminCreateRoute($route) }}"
                        class="btn btn-success btn-sm btn-air-success">Create</a>
                    @isset($buttons)
                        {{ $buttons }}
                    @endisset
                </div>
            </div>
        </div>
        <div class="card-body {{ config('adminetic.card_body', '') . ' ' . ($bg_color ?? '') }}">
            {{ $content ?? '' }}
        </div>
    </div>
</div>
