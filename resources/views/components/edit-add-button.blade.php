<div>
    <hr>
    <input type="submit"
        class="btn btn-{{ isset($model) ? 'warning' : 'primary' }} btn-air-{{ isset($model) ? 'warning' : 'primary' }}"
        value="{{ isset($model) ? 'Edit ' . $name : 'Add ' . $name }}">
</div>
