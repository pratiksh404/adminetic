<div>
@if (!is_null($permission))
        <div class="row text-center mb-2">
        <div class="col-5">{{ $permission->model ?? '' }}</div>
        <div class="custom-control custom-checkbox col-1"><input type="checkbox" wire:model="browse"
                value="1">
        </div>
        <div class="custom-control custom-checkbox col-1"><input type="checkbox" wire:model="read"
                value="1">
        </div>
        <div class="custom-control custom-checkbox col-1"><input type="checkbox" wire:model="edit"
                value="1">
        </div>
        <div class="custom-control custom-checkbox col-1"><input type="checkbox" wire:model="add"
                value="1">
        </div>
        <div class="custom-control custom-checkbox col-1"><input type="checkbox" wire:model="delete"
                value="1">
        </div>
        <div class="col-2">
            <button
                class="btn btn-danger btn-air-danger btn-sm"><i class="fa fa-trash" wire:click="delete"></i></button>
        </div>
    </div>
@endif
</div>