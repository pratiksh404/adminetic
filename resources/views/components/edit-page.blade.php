<div>
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>{{ $name }}</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ adminRedirectRoute($route) }}">{{ $name }}</a>
                        </li>
                        <li class="breadcrumb-item active">Edit {{ $name }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="card {{ config('adminetic.card', '') }}">
        <div class="card-header {{ config('adminetic.card_header', 'b-l-warning border-3') }}">
            <h5>@isset($icon) <i class="{{ $icon }} me-2"></i> @endisset Edit {{ $name ?? 'N/A' }}</h5>
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
                {{ $description ?? ''}} <br>
                <span class="text-secondary">The field labels marked with * are required
                    input fields.</span>
                <div class="d-flex justify-content-end">
                    <div class="btn-group" role="group">
                        <button class="btn btn-primary btn-air-primary dropdown-toggle" id="actions" type="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                        <div class="dropdown-menu" aria-labelledby="actions"
                            style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 37px, 0px);"
                            data-popper-placement="bottom-start">
                            <a class="dropdown-item" href="{{ adminRedirectRoute($route) }}" title="All {{$name}}">All
                                {{$name}}</a>
                            <a class="dropdown-item" href="{{ adminCreateRoute($route, $model->id) }}"
                                title="Create new {{$name}}">Create new {{$name}}</a>
                        </div>
                    </div>
                    @isset($buttons)
                    {{ $buttons }}
                    @endisset
                </div>
            </div>
        </div>
        <div class="card-body {{ config('adminetic.card_body', '') . ' ' . ($bg_color ?? '') }}">
            <form id="{{config('adminetic.double_click_protection',true) ? 'adminetic-form' : ''}}"
                action="{{ adminUpdateRoute($route, $model->id) }}" method="post" enctype="multipart/form-data"
                class="{{ $formclass ?? '' }}" id="{{ $formid ?? '' }}">
                @method('PATCH')
                @csrf
                {{ $content ?? '' }}
            </form>
        </div>
    </div>
</div>