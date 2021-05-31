<div>
    <div>
        <div class="form-group text-center">
            <!-- Outline Round Floating button -->
            @if (auth()->user()->can('update', $model) &&
    $edit)
                <a href="{{ adminEditRoute(trim($route), $model->id) }}"
                    class="btn btn-warning btn-air-warning btn-sm p-2" title="Edit" data-toggle="tooltip"
                    placement="top"><i class="fa fa-edit"></i></a>
            @endif
            @if (auth()->user()->can('view', $model) &&
    $show)
                <a href="{{ adminShowRoute(trim($route), $model->id) }}" class="btn btn-info btn-air-info btn-sm p-2"
                    data-toggle="tooltip" placement="top" title="Show"><i class="fa fa-eye"></i></a>
            @endif
            @if (auth()->user()->can('delete', $model) &&
    $delete)
                <button class="btn btn-danger btn-air-danger btn-sm p-2" type="button" data-bs-toggle="modal"
                    data-original-title="Delete" data-bs-target="#delete-{{ $model->id }}"><i
                        class="fa fa-trash"></i></button>
            @endif
            {{ $buttons ?? '' }}
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="delete-{{ $model->id }}" tabindex="-1" role="dialog"
        aria-labelledby="delete-{{ $model->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                @if ($deleteCondition)
                    <div class="modal-header bg-secondary">
                        <h5 class="modal-title" id="exampleModalLabel">This item cannot be deleted !</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>
                            This item cannot be deleted yet, since it may have dependencies on other
                            module
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-air-danger" data-dismiss="modal">Close</button>
                    </div>

                @else
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Item !</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this item.
                        <br>
                        <form action="{{ adminDeleteRoute(trim($route), $model->id) }}" method="POST">
                            @method('DELETE')
                            @csrf

                    </div>
                    <div class="modal-footer">
                        <button class="close btn grey btn-danger btn-air-danger" type="button" data-bs-dismiss="modal"
                            aria-label="Close">Close </button>

                        <button type="submit" class="btn btn-danger btn-air-danger">Yes Delete It !</button>
                    </div>
                    </form>
                @endif

            </div>
        </div>
    </div>

</div>
