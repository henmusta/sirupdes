<!DOCTYPE html>
<!--[if IE 9]> <html class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html> <!--<![endif]-->

<!-- Mirrored from eonythemes.com/themes/wb/boss/main/index9.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 May 2023 05:20:43 GMT -->
<head>
        <meta charset="utf-8">
        <title>Boss - Multipurpose Premium Html5 Template</title>
        <meta name="description" content="Multipurpose, premium, bootstrap based bussiness, corporate, portfolio, blog, onepage, creative, magazine, personal, landing, coming soon html5 css3 template">

        <!--[if IE]> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        @include('frontend.layouts.headercss')

        <!-- Favicon and Apple Icons -->
        <link rel="icon" type="image/png" href="{{asset('assets/frontend/images/icons/favicon.png')}}">
        <link rel="apple-touch-icon" sizes="57x57" href="{{asset('assets/frontend/images/icons/faviconx57.png')}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/frontend/images/icons/faviconx72.png')}}">



    </head>
    <body>
    <div class="boss-loader-overlay"></div><!-- End .boss-loader-overlay -->
    <!-- Preview Panel -->
    @include('frontend.layouts.setting')
    <!-- End Preview Panel -->
    <div id="wrapper">

        @include('frontend.layouts.header')
        @yield('content')

        @include('frontend.layouts.footer')

    </div><!-- End #wrapper -->
    <a href="#top" id="scroll-top" title="Back to Top"><i class="fa fa-angle-up"></i></a>
	<!-- END -->

    <!-- Smoothscroll -->


    @include('frontend.layouts.footerjs')


    </body>

<!-- Mirrored from eonythemes.com/themes/wb/boss/main/index9.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 May 2023 05:22:07 GMT -->
</html>
