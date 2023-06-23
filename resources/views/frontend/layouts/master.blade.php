<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from seo.websitelayout.net/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Jun 2023 11:55:37 GMT -->
<head>

    <!-- metas -->
    <meta charset="utf-8">
    <meta name="author" content="Chitrakoot Web" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="keywords" content="Digital Marketing Agency Template" />
    <meta name="description" content="SEO - Digital Marketing Agency Template" />

    <!-- title  -->
    <title>SIRUPDES - E-PROCUREMENT TANGGAMUS</title>

    @include('frontend.layouts.headercss')

</head>

<body>

    <!-- PAGE LOADING
    ================================================== -->
    <div id="preloader"></div>

    <!-- MAIN WRAPPER
    ================================================== -->
    <div class="main-wrapper">

        <!-- HEADER
        ================================================== -->
        @include('frontend.layouts.header')

        @yield('content')

        <div class="pb-0"></div>

        <!-- FOOTER
        ================================================== -->
        @include('frontend.layouts.footer')

    </div>


    @include('frontend.layouts.footerjs')
    <!-- all js include end -->
</body>


<!-- Mirrored from seo.websitelayout.net/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Jun 2023 11:55:53 GMT -->
</html>
