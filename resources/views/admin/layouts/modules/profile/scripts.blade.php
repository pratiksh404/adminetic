<script>
    $(function() {

        $('.tagging').select2({
            dropdownAutoWidth: true,
            tags: true,
            tokenSeparators: [',', ' ']
        });

        function getMinDate() {
            var date = new Date();
            date.setFullYear(date.getFullYear() - 18);
            return date
        }

        function getMaxDate() {
            var maxDate = getMinDate();
            maxDate.setFullYear(maxDate.getFullYear() - 80);
            return maxDate;
        }
    });

</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#avatar')
                    .attr('src', e.target.result)
                    .width(64).height(64)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>