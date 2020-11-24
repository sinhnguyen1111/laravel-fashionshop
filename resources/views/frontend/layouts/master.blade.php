<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>ThewayShop - Ecommerce Bootstrap 4 HTML Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="/frontend/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="/frontend/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/frontend/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="/frontend/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="/frontend/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/frontend/css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Start Main Top -->
    <div class="main-top">
        @include('frontend.includes.main_top')
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        @include('frontend.includes.main_header')
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start Slider -->
    @yield('content')
    <!-- End Instagram Feed  -->


    <!-- Start Footer  -->
    @include('frontend.includes.footer')

    <!-- ALL JS FILES -->
    <script src="/frontend/js/jquery-3.2.1.min.js"></script>
    <script src="/frontend/js/popper.min.js"></script>
    <script src="/frontend/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="/frontend/js/jquery.superslides.min.js"></script>
    <script src="/frontend/js/bootstrap-select.js"></script>
    <script src="/frontend/js/inewsticker.js"></script>
    <script src="/frontend/js/bootsnav.js."></script>
    <script src="/frontend/js/images-loded.min.js"></script>
    <script src="/frontend/js/isotope.min.js"></script>
    <script src="/frontend/js/owl.carousel.min.js"></script>
    <script src="/frontend/js/baguetteBox.min.js"></script>
    <script src="/frontend/js/form-validator.min.js"></script>
    <script src="/frontend/js/contact-form-script.js"></script>
    <script src="/frontend/js/custom.js"></script>
</body>

</html>