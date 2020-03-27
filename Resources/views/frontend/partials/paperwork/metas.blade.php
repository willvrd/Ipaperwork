<meta name="description" content="{{$paperwork->summary}}">
<!-- Schema.org para Google+ -->
<meta itemprop="name" content="{{$paperwork->title}}">
<meta itemprop="description" content="{{$paperwork->summary}}">
<meta itemprop="image" content=" {{url($paperwork->mainimage->path) }}">
<!-- Open Graph para Facebook-->
<meta property="og:title" content="{{$paperwork->title}}"/>
<meta property="og:type" content="article"/>
<meta property="og:url" content="{{$paperwork->url}}"/>
<meta property="og:image" content="{{url($paperwork->mainimage->path)}}"/>
<meta property="og:description" content="{{$paperwork->summary}}"/>
<meta property="og:site_name" content="{{Setting::get('core::site-name') }}"/>
<meta property="og:locale" content="{{config('asgard.iblog.config.oglocale')}}">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="{{ Setting::get('core::site-name') }}">
<meta name="twitter:title" content="{{$paperwork->title}}">
<meta name="twitter:description" content="{{$paperwork->summary}}">
<meta name="twitter:creator" content="{{Setting::get('iblog::twitter') }}">
<meta name="twitter:image:src" content="{{url($paperwork->mainimage->path)}}">