<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sign in</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/user/img/favicon.ico')}}">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('/user/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/user/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('/user/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('/user/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('/user/css/progressbar_barfiller.css')}}">
    <link rel="stylesheet" href="{{asset('/user/css/gijgo.css')}}">
    <link rel="stylesheet" href="{{asset('/user/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('/user/css/animated-headline.css')}}">
    <link rel="stylesheet" href="{{asset('/user/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('/user/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/user/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('/user/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('/user/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('/user/css/style.css')}}">
</head>
<body>
<!-- ? Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="{{asset('/user/img/logo/loder.png')}}" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start-->


<!-- Register -->

<main class="login-body" data-vide-bg="{{asset('/user/img/login-bg.mp4')}}">
    @yield('content')
</main>


<script src="{{asset('/user/js/vendor/modernizr-3.5.0.min.js')}}"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="{{asset('/user/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('/user/js/popper.min.js')}}"></script>
<script src="{{asset('/user/js/bootstrap.min.js')}}"></script>
<!-- Jquery Mobile Menu -->
<script src="{{asset('/user/js/jquery.slicknav.min.js')}}"></script>
<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="{{asset('/user/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('/user/js/slick.min.js')}}"></script>
<!-- One Page, Animated-HeadLin -->
<script src="{{asset('/user/js/wow.min.js')}}"></script>
<script src="{{asset('/user/js/animated.headline.js')}}"></script>
<script src="{{asset('/user/js/jquery.magnific-popup.js')}}"></script>

<!-- Date Picker -->
<script src="{{asset('/user/js/gijgo.min.js')}}"></script>
<!-- Nice-select, sticky -->
<script src="{{asset('/user/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('/user/js/jquery.sticky.js')}}"></script>
<!-- Progress -->
<script src="{{asset('/user/js/jquery.barfiller.js')}}"></script>
<!-- counter , waypoint,Hover Direction -->
<script src="{{asset('/user/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('/user/js/waypoints.min.js')}}"></script>
<script src="{{asset('/user/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('/user/js/hover-direction-snake.min.js')}}"></script>

<!-- contact js -->
<script src="{{asset('/user/js/contact.js')}}"></script>
<script src="{{asset('/user/js/jquery.form.js')}}"></script>
<script src="{{asset('/user/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('/user/js/mail-script.js')}}"></script>
<script src="{{asset('/user/js/jquery.ajaxchimp.min.js')}}"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="{{asset('/user/js/plugins.js')}}"></script>
<script src="{{asset('/user/js/main.js')}}"></script>

<!-- Video bg -->
<script src="{{asset('/user/js/jquery.vide.js')}}"></script>

</body>
</html>
