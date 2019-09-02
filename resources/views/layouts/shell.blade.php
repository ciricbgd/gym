<!DOCTYPE html>
<html lang="en">
<!--Language in which the website is written in (en for english, sr for serbian). For more info visit https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
    <meta name="description" content="">
    <!--Describe your website. This will be displayed as description under your website name when searched on google.-->
    <meta name="keywords" content="">
    <!--Put keywords for your website. This will make your website more discoverable.-->
    <link rel="canonical" href="" />
    <!--This page's url.-->
    <meta name="author" content="https://plus.google.com/111116356739335627675">
    <!--This is my google plus page. Not necessary.-->
    <!--Facebook meta tags-->
    <meta property="fb:app_id" content="" />
    <!--Facebook page id.-->
    <meta property="og:url" content="">
    <!--This page's url.-->
    <meta property="og:image" content="">
    <!--Image url. 1200 x 630 minimum-->
    <meta property="og:description" content="">
    <!--Description-->
    <meta property="og:title" content="">
    <!--Title of this page.-->
    <meta property="og:site_name" content="">
    <!--If this isn't the site's main page. Put the name of the main page here.-->
    <!--Twitter meta tags-->
    <meta name="twitter:card" content="">
    <!--Explains what the card is. You will mostly use an image so put "summary_large_image"-->
    <meta name="twitter:url" content="">
    <!--This page's url.-->
    <meta name="twitter:title" content="">
    <!--Title.-->
    <meta name="twitter:description" content="">
    <!--Description.-->
    <meta name="twitter:image" content="">
    <!--Put the same image as for facebook.-->
    <!--Google plus meta tags-->
    <meta itemprop="name" content="">
    <!--Title.-->
    <meta itemprop="description" content="">
    <!--Description.-->
    <meta itemprop="image" content="">
    <!--Put the same image as for facebook.-->
    <!--Css-->
    <link rel="stylesheet" href="{{url('/')}}/css/main.css">
    @yield('css')
</head>

<body>
    @include('components.nav')
    <div class="container-fluid">
        @yield('content')
    </div>
    <!--Scripts-->
    <script src="{{url('/')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{url('/')}}/js/popper.min.js"></script>
    <script src="{{url('/')}}/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/js/main.js"></script>
    @yield('js')
    <script>
        const thisUrl = "{{Request::url()}}";
        const baseUrl = "{{url('/')}}";
        @if(session()->has('user'))
        const userID = "{{session()->get('user')[0]->id}}";
        @endif
    </script>
    @if (session()->has('alert'))
        <div class="alert" style="width:0px;height:0px;display:none;">{{session()->get('alert')[0]}}</div>
    @endif
</body>

</html>
