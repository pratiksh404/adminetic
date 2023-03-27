<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8" />

<title>{{ $title ?? title() }}</title>

{{-- Meta Tags --}}
<meta name="description"
    content="{{ setting('descrption', config('adminetic.description', 'Laravel Adminetic Admin Panel Upgrade.'))}}">
<meta name="author" content="Pratik Shrestha">
<meta name="keywords" content="{{$keywords ?? keywords() ?? 'adminetic admin panel, adminetic, pratik shrestha, doctype innovations'}}">

    {{-- Open Graph Tags --}}
<meta property="og:title" content="{{$title ?? title() ?? config('adminetic.title','Event Management')}}" />
<meta property="og:description" content="{{$description ?? title() ?? 'Event Management'}}" />
<meta property="og:image" content="{{url($image ?? logoBanner())}}" />

<link rel="icon" href="{{ favicon() }}" type="image/x-icon">
<link rel="shortcut icon" href="{{ favicon() }}" type="image/x-icon">
<link rel="shortcut icon" type="image/x-icon" href="{{favicon()}}">