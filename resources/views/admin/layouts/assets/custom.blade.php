@if (config('adminetic.double_click_protection',true))
<script>
    // Disable Double Submit Click Event By Disabling the Button Once Clicked
        $('#admin-submit').on('click', function () {
        $(this).prop('disabled', true);
        $(this).val('Processing...');
        $('#admin-form').submit();
        });
</script>
@endif