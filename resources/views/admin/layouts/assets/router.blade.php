@if (spa())
    <script>
        $(function() {
            $(document).on('submit', '#admin-form', function() {
                event.preventDefault();
                var url = $(this).attr('action');
                var redirect_url = $(this).attr('redirectUrl');
                var request_type = $(this).attr('method') ?? 'POST';
                var token = "{{ csrf_token() }}";
                var $inputs = $(':input', this);
                var data = new FormData(this);
                serverRequest(url, redirect_url, request_type, data);
                /*  $inputs.each(function() {
                    if (this.type == 'file') {
                       var file = this.files;
                       var fd = new FormData();
                      if (file.length > 0) {
                       fd.append(this.name,file, this.name);
                      }
                    } else if(Array.isArray($(this).val())){
                        var multiple = [];
                        $(this).each(function(){
                           multiple.push($(this).val());
                       });
                        data[this.name] = multiple;
                    }else if(this.type == 'checkbox'){
                        var multiple = [];
                        $(this).each(function(){
                          if ($(this).is(':checked')) {
                             multiple.push($(this).val());
                          }
                        });
                        data[this.name] = multiple;
                    } else {
                       data[this.name] = $(this).val();
                    }
                 }); */


            });

            // AJAX Server Request
            function serverRequest(url, redirect_url, request_type, data) {
                $.ajaxSetup({
                    'headers': {
                        'router': true,
                        'layout': 'adminetic::admin.layouts.content'
                    }
                });
                $.ajax({
                    type: request_type ?? 'POST',
                    url: url,
                    container: '#admin-form',
                    file: true,
                    data: data,
                    contentType: false,
                    processData: false,
                    beforeSend: function(xhr) {
                        $('#admin-submit').prop('disabled', true);
                        $('#admin-submit').val('Processing...');
                    },
                    success: function(res, textStatus, jqXHR) {
                        loadContent(res, redirect_url);
                        responseToast();
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        responseToast('Server Error', thrownError, 'danger');
                        $('#admin-submit').prop('disabled', false);
                    }
                });
                $('.modal').modal('hide');
            }

            $(window).on({
                popstate: function(e) {
                    var route = location.href;
                    if (window.history.state !== null) {
                        if (route !== null && route != '' && window.history.state.prevUrl != route) {
                            loadPage(route);
                        }
                    }
                }
            });

            $(document).on('click', '.router', function(event) {
                route = $(this).attr('href');
                $(this).addClass('active');
                loadPage(route);
            });

            function loadPage(route) {
                // Load the content from the link's href attribute
                if (route !== null && route !== '' && route !== '#') {
                    // Avoid the link click from loading a new page
                    event.preventDefault();
                    $.ajaxSetup({
                        'headers': {
                            'router': true,
                            'layout': 'adminetic::admin.layouts.content'
                        }
                    });
                    var loader =
                        '<div style="position: absolute;left: 0;right: 0;top: 40%;bottom: 0;margin: auto;max-width: 100%;max-height: 100%;overflow: auto;"><div class="loader-box" style="margin:auto"><div class="loader-2"></div></div></div>';
                    $.ajax({
                        url: route,
                        type: "GET",
                        beforeSend: function(xhr) {
                            $('#adminetic-content').html(loader);
                        },
                        success: function(res) {
                            loadContent(res, route);
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            window.location.replace(route);
                        }
                    });
                }
            }

            function loadContent(res, route = null) {
                $('#adminetic-content').html(res);
                window.livewire.rescan();
                if (typeof route !== 'undefined' || variable !== null) {
                    window.history.pushState({}, '', route);
                }

                // Reinitiate JS
                var yield_js = $('#yield_js').html();
                $('#yield_js').remove();
                $('#yield_js').html(yield_js);
                // Reinitiate Global JS
                $.getScript('{{ asset('adminetic/assets/custom/custom.js') }}');
                if (document.getElementById("heavytexteditor")) {
                    CKEDITOR.replace('heavytexteditor', {
                        extraPlugins: 'autocorrect,chart,youtube,notification,btgrid,templates',
                        filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                        filebrowserUploadMethod: 'form',
                        embed_provider: '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',
                        width: '100%'
                    });
                }
                if ($('.datepicker-here').length) {
                    $('.datepicker-here').datepicker();
                }
            }
        });

        function responseToast(title = 'Success', message = 'Action Completed', type = 'success') {
            $.notify({
                title: title,
                message: message
            }, {
                type: type,
                allow_dismiss: false,
                newest_on_top: false,
                mouse_over: false,
                showProgressbar: false,
                spacing: 10,
                timer: 2000,
                placement: {
                    from: 'top',
                    align: 'right'
                },
                offset: {
                    x: 30,
                    y: 30
                },
                delay: 1000,
                z_index: 10000,
                animate: {
                    enter: 'animated bounce',
                    exit: 'animated bounce'
                }
            });
        }
    </script>
@endif
