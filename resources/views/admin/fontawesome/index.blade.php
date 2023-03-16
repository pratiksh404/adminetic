@extends(request()->header('layout') ?? 'adminetic::admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3><i class="fa fa-font"></i> Font Awesome</h3>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Font Awesome</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    {{-- Icons --}}
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body shadow-lg">
                    <div class="row icon-lists">
                        @isset($fonts)
                        @if (count($fonts) > 0)
                        @foreach ($fonts as $index => $font)
                        <div class="col-sm-6 col-md-4 col-xl-3"><i class="{{$font ?? 'N/A' }}"></i> {{$font ?? 'N/A' }}
                        </div>
                        @endforeach
                        @endif
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Icon Copy Dialog --}}
    <div class="icon-hover-bottom p-fixed fa-fa-icon-show-div opecity-0">
        <div class="container-fluid">
            <div class="row">
                <div class="icon-popup">
                    <div class="close-icon"><i class="icofont icofont-close"></i></div>
                    <div class="icon-first"><i class="icon-drupal fa-2x" id="icon_main"></i></div>
                    <div class="icon-class">
                        <label class="icon-title">Class</label><span id="fclass1">icon-drupal</span>
                    </div>
                    <div class="icon-last icon-last">
                        <label class="icon-title">Markup</label>
                        <div class="form-inline">
                            <div class="form-group">
                                <input class="inp-val form-control m-r-10" id="input_copy" type="text" value=""
                                    readonly="readonly">
                                <button class="btn btn-primary notification" onclick="myFunction()">Copy text</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_js')
<script>
    $(function(){
    $('.icon-lists div').click( function() {
        $('html, body').animate({
        scrollTop: $("#input_copy").offset().top
        }, 2000);
        $(".icon-lists").addClass('m-b-50');
        $(".fa-fa-icon-show-div").show();
        $(".fa-fa-icon-show-div").removeClass('opecity-0');
        var font_class = ($(this).children().attr('class'));
        var fafaclass= '&lt;i class="'+ font_class + '"&gt';
        var fafaclass1= '<i class="'+ font_class + '"></i>';
        $("#fclass").html(fafaclass);
        $("#fclass1").html(font_class);
        $("#icon_main").removeClass();
        $("#icon_main").addClass(font_class);
        $("#icon_main").addClass("fa-2x");
        $(".inp-val").val(fafaclass1);
        });
        $(".close-icon").click(function(){
        $(".icon-hover-bottom").addClass("opecity-0");
        $(".fa-fa-icon-show-div").hide();
        $(".icon-lists").removeClass('m-b-50');

        });
        
        function myFunction() {
        var copyText = document.getElementById("input_copy");
        copyText.select();
        document.execCommand("Copy");
        };
});
</script>
@endsection