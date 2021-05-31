<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
    integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
    crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
    integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
    crossorigin="anonymous"></script>
<script>
    $(function() {

        $('.tagging').select2({
            dropdownAutoWidth: true,
            tags: true,
            tokenSeparators: [',', ' ']
        });

        // Select Year
        $('.birthday').datepicker({
            endDate: '-18y'
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
