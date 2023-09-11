<!doctype html>
<html lang="zxx">
    <head>
        <!-- Required Meta Tags -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <!-- Animate Min CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
        <!-- Remixicon CSS -->
        <link rel="stylesheet" href="{{ asset('assets/fonts/remixicon.css') }}">
        <!-- Owl Carousel Min CSS --> 
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
        <!-- Metismenu CSS --> 
        <link rel="stylesheet" href="{{ asset('assets/css/metismenu.min.css') }}">
        <!-- Simplebar CSS --> 
        <link rel="stylesheet" href="{{ asset('assets/css/simplebar.min.css') }}">
        <!-- Dropzone CSS --> 
        <link rel="stylesheet" href="{{ asset('assets/css/dropzone.min.css') }}">
        <!-- Magnific Popup CSS --> 
        <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
        <!-- Odometer CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/odometer.min.css') }}">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.min.css') }}">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
        <!-- Theme Dark CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/theme-dark.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/css/sme.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/css/sweetalert2/sweetalert2.min.css') }}">
        
        <link rel="stylesheet" href="{{ asset('vendors/wysiwyag/richtext.css') }}"/>

        <link rel="stylesheet" href="{{ asset('vendors/fontawesome-free-5.15.2-web/css/all.min.css') }}">

        <!-- Title -->
        <title>{{ $page_name }}</title>

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="assets/images/favicon.png">

        @yield('css-content')
    </head>

    <body>
        <!-- Pre Loader -->
        <div class="preloader">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="spinner"></div>
                </div>
            </div>
        </div>
        <!-- End Pre Loader -->

        <!-- Start Sidemenu Area -->
        @include('inc.sidemenu-area')
        
        <!-- End Sidemenu Area -->

        <!-- Start Main Dashboard Content Wrapper Area -->
        <div class="main-dashboard-content d-flex flex-column">
            <!-- Start Navbar Area -->
            @include('inc.navbar-area')
            <!-- End Navbar Area -->

            <!-- Breadcrumb Area -->

            @include('inc.breadcrumb-area')
            
            <!-- End Breadcrumb Area -->


            @yield('content')  



            <!-- Start Copyright Area -->
            @include('inc.copyrights-area')
            <!-- End Copyright Area -->
        </div>
       

        
        <!-- Jquery Min JS -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <!-- Bootstrap Bundle Min JS -->
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Magnific Popup JS -->
        <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
        <!-- Odometer JS -->
        <script src="{{ asset('assets/js/odometer.min.js') }}"></script>
        <!-- Appear Min JS -->
        <script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>
        <!-- Meanmenu JS -->
        <script src="{{ asset('assets/js/meanmenu.min.js') }}"></script>
        <!-- Metismenu JS -->
        <script src="{{ asset('assets/js/metismenu.min.js') }}"></script>
        <!-- Simplebar JS -->
        <script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
        <!-- Dropzone JS -->
        <script src="{{ asset('assets/js/dropzone.min.js') }}"></script>
        <!-- Sticky Sidebar JS -->
        <script src="{{ asset('assets/js/sticky-sidebar.min.js') }}"></script>
        <!-- TweenMax JS -->
        <script src="{{ asset('assets/js/tweenMax.min.js') }}"></script>
        <!-- Owl Carousel JS -->
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <!-- Wow Min JS -->
        <script src="{{ asset('assets/js/wow.min.js') }}"></script>
        <!-- Ajaxchimp Min JS -->
        <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
        <!-- Form Validator Min JS -->
        <script src="{{ asset('assets/js/form-validator.min.js') }}"></script>
        <!-- Contact Form JS -->
        <script src="{{ asset('assets/js/contact-form-script.js') }}"></script>
        <!-- Custom Form JS -->
        <script src="{{ asset('assets/js/custom.js') }}"></script>
        
        <script src="{{ asset('assets/js/toastr.js') }}"></script>
        
        <script src="{{ asset('assets/js/sweetalert2/sweetalert2.min.js') }}"></script>

        <script src="{{ asset('vendors/wysiwyag/jquery.richtext.js') }}"></script>
        
        <script>
            var APP_BASE_URL = @json(url('/contentmanagement'));

            function handleLogout(e) {
                let url = '/backend/sme/auth/ajax_logout';
                $.ajax({
                        url: url,
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    })
                    .done(function() {
                        console.log("success");
                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        // window.localStorage.setItem(key_logout, Date.now().toString())
                        /*
                        setTimeout(function() {
                            //console.log(userData);
                            if (parseInt(userData.user_level) <= 1) {
                                window.location = APP_BASE_URL + '/login';

                            } else {
                                window.location = APP_BASE_URL + "/emp-login/" + userData.sys_customer_code;
                            }
                        }, 100)
                        */
                        window.location = APP_BASE_URL + '/login'
                    });
            }

            $(document).ready(function () {

            });
        </script>
        @yield('js-content')
    </body>
</html>