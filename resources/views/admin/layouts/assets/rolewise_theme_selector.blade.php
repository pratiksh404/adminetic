<script>
    $(document).ready(function() {
        var theme = '{{ role_theme() }}';
        setTheme(theme ?? 'compact-sidebar');

    function setTheme(type) {
        var boxed = "";
        if ($(".page-wrapper").hasClass("box-layout")) {
            boxed = "box-layout";
        }
        switch (type) {
            case 'compact-sidebar': {
                $(".page-wrapper").attr("class", "page-wrapper compact-wrapper " + boxed);
                $(this).addClass("active");
                localStorage.setItem('page-wrapper', 'compact-wrapper');
                break;
            }
            case 'normal-sidebar': {
                $(".page-wrapper").attr("class", "page-wrapper horizontal-wrapper " + boxed);

                localStorage.setItem('page-wrapper', 'horizontal-wrapper');
                break;
            }
            case 'default-body': {
                $(".page-wrapper").attr("class", "page-wrapper  only-body" + boxed);
                localStorage.setItem('page-wrapper', 'only-body');
                break;
            }
            case 'dark-sidebar': {
                $(".page-wrapper").attr("class", "page-wrapper compact-wrapper dark-sidebar" +
                    boxed);
                localStorage.setItem('page-wrapper', 'compact-wrapper dark-sidebar');
                break;
            }
            case 'compact-wrap': {
                $(".page-wrapper").attr("class", "page-wrapper compact-sidebar" + boxed);
                localStorage.setItem('page-wrapper', 'compact-sidebar');
                break;
            }
            case 'color-sidebar': {
                $(".page-wrapper").attr("class", "page-wrapper compact-wrapper color-sidebar" +
                    boxed);
                localStorage.setItem('page-wrapper', 'compact-wrapper color-sidebar');
                break;
            }
            case 'compact-small': {
                $(".page-wrapper").attr("class", "page-wrapper compact-sidebar compact-small" +
                    boxed);
                localStorage.setItem('page-wrapper', 'compact-sidebar compact-small');
                break;
            }
            case 'box-layout': {
                $(".page-wrapper").attr("class", "page-wrapper compact-wrapper box-layout " +
                    boxed);
                localStorage.setItem('page-wrapper', 'compact-wrapper box-layout');
                break;
            }
            case 'enterprice-type': {
                $(".page-wrapper").attr("class", "page-wrapper horizontal-wrapper enterprice-type" +
                    boxed);
                localStorage.setItem('page-wrapper', 'horizontal-wrapper enterprice-type');
                break;
            }
            case 'modern-layout': {
                $(".page-wrapper").attr("class", "page-wrapper compact-wrapper modern-type" +
                    boxed);
                localStorage.setItem('page-wrapper', 'compact-wrapper modern-type');
                break;
            }
            case 'material-layout': {
                $(".page-wrapper").attr("class", "page-wrapper horizontal-wrapper material-type" +
                    boxed);
                localStorage.setItem('page-wrapper', 'horizontal-wrapper material-type');

                break;
            }
            case 'material-icon': {
                $(".page-wrapper").attr("class",
                    "page-wrapper compact-sidebar compact-small material-icon" + boxed);
                localStorage.setItem('page-wrapper', 'compact-sidebar compact-small material-icon');

                break;
            }
            case 'advance-type': {
                $(".page-wrapper").attr("class",
                    "page-wrapper horizontal-wrapper enterprice-type advance-layout" + boxed);
                localStorage.setItem('page-wrapper',
                    'horizontal-wrapper enterprice-type advance-layout');

                break;
            }
            default: {
                $(".page-wrapper").attr("class", "page-wrapper compact-wrapper " + boxed);
                localStorage.setItem('page-wrapper', 'compact-wrapper');
                break;
            }
        }
    }
    });
</script>
