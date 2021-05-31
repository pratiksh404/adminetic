<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.11/ace.js"></script>
<script>
    $(function() {
        $(".setting_value_table").DataTable({
            "responsive": true,
            "autoWidth": true,
            "order": [],
            "info": true,
        });

        $('.tagging').select2({
            dropdownAutoWidth: true,
            tags: true,
            tokenSeparators: [',', ' ']
        });

        $(document).ready(function() {
            var setting_custom = $('#setting_custom').data('setting_custom');
            var editor = ace.edit("editor");
            editor.session.setValue(JSON.stringify(setting_custom, null, 4))
        });


        var editor = ace.edit("editor");
        editor.getSession().setMode("ace/mode/json");
        editor.setTheme("ace/theme/chrome");
        editor.getSession().setTabSize(2);
        editor.getSession().setUseWrapMode(true);


        var input = $('input[name="setting_custom"]');
        editor.getSession().on("change", function() {
            input.val(editor.getSession().getValue());
        });

        $('#setting_type').on('change', function() {
            var editor = ace.edit("editor");
            var setting_type = $(this).val();
            if (setting_type == 1) {
                var customize_json =
                    '{"class" : "my_class","id" : "my_id","value" : "Adminetic","placeholder" : "Site Title Here!!"}';
            } else if (setting_type == 2) {
                var customize_json =
                    '{"class" : "my_class","id" : "my_id", "value" : 1,"placeholder" : "Integer Field","max" : 10, "min" : 0}';
            } else if (setting_type == 3 || setting_type == 4) {
                var customize_json =
                    '{"class" : "my_class","id" : "my_id", "value" : "Enter some text"}';
            } else if (setting_type == 5) {
                var customize_json =
                    '{"class" : "my_class","id" : "my_id", "placeholder" : "I am switch !"}';
            } else if (setting_type == 6) {
                var customize_json =
                    '{"class" : "my_class","id" : "my_id", "checked" : "1", "options" : { "1" : "Option 1", "2" : "Option 2" }}';
            } else if (setting_type == 7) {
                var customize_json =
                    '{"class" : "my_class","id" : "my_id", "default" : "1", "options" : { "1" : "option 1", "2" : "option 2" }}';
            } else if (setting_type == 8) {
                var customize_json =
                    '{"class" : "my_class","id" : "my_id", "options" : { "1" : "option 1", "2" : "option 2" }}';
            } else if (setting_type == 9) {
                var customize_json =
                    '{"class" : "my_class","id" : "my_id"}';
            } else if (setting_type == 10) {
                var customize_json =
                    '{"class" : "my_class","id" : "my_id","fit" : {"width" : "300","height" : "300"},"quality" : "80"}';
            }
            editor.session.setValue(beautify(customize_json))
        });

        function beautify(json_string) {
            var o = JSON.parse(json_string);
            json_string = JSON.stringify(o, null, 4);
            return json_string;
        }
    });

</script>

@isset($setting_grouped)
    @foreach ($setting_grouped as $group)
        @foreach ($group as $setting)
            @if ($setting->getRawOriginal('setting_type') == 4)
                <script>
                    // Heavy Text Editor
                    CKEDITOR.replace("{{ $setting->setting_name }}", {
                        filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                        filebrowserUploadMethod: 'form',
                        embed_provider: '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',
                        width: '100%'
                    });

                </script>
            @endif
        @endforeach
    @endforeach

@endisset
