<div>
    <hr>
    @if ($confirm)
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target=".edit-add-button">{{
        isset($model) ? 'Edit ' . $name : 'Add ' . $name }}</button>
    <div class="modal fade edit-add-button" tabindex="-1" role="dialog" aria-labelledby="editAddButtonLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editAddButtonLabel">Confirmation ?</h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to {{ (isset($model) ? 'edit '
                    : 'create ') . $name }}
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-bs-dismiss="modal" data-bs-original-title=""
                        title="">Close</button>
                    <button
                        class="btn btn-{{ isset($model) ? 'warning' : 'primary' }} btn-air-{{ isset($model) ? 'warning' : 'primary' }}"
                        type="submit">{{ isset($model) ? 'Edit ' . $name : 'Add ' . $name }}</button>
                </div>
            </div>
        </div>
    </div>
    @else
    <input type="submit" id="{{config('adminetic.double_click_protection',true) ? 'admin-submit' : ''}}"
        class="btn btn-{{ isset($model) ? 'warning' : 'primary' }} btn-air-{{ isset($model) ? 'warning' : 'primary' }}"
        value="{{ isset($model) ? 'Edit ' . $name : 'Add ' . $name }}">
    @endif
</div>