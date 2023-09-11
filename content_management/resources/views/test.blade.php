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

        <!-- Title -->
        <title>Zoben - Job Board & Hiring HTML Template</title>

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
        <style>
            
            @page {
                size: A4;
                margin: 0;
                }
                @media print {
                html, body {
                    width: 210mm;
                    height: 297mm;
                }
            }
            img{
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            .block-img {
                display: block;
                page-break-before: always;
                page-break-inside: avoid;
            }
            .title-header{
                float: left;
                font-size: 30px;
                font-weight: bold;
                /* page-break-before: always; */
            }
            .image-block{
                width: 100%; 
                height: 350px; 
                display: flex;
                margin-bottom: 2rem;
            }
        </style>
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

        
        <!-- User Area -->
        <div class="user-area pb-70">
            <div class="container">                
                <div class="row">
                    @foreach ($img as $item)
                        <div class="col-lg-12 text-center block-img">
                            <div class="d-flex justify-content-between mt-5 mb-5">
                                <div class="title-header">test</div>
                                <div class="title-header">{{ date("d/m/Y h:i") }}</div>
                            </div>
                            @foreach ($item as $item)
                                <div class="image-block">
                                    <img src="{{ asset($item) }}" alt="Blog Images" onerror="this.onerror=null;this.src='{{ asset('assets/images/image_web_1-01.jpg') }}';">
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- User Area End -->



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

        <script>
            

            $(document).ready(function () {

                
                
                $('#frm-login').submit(function (e) {
                    let remember_me = ''
                    if ($('#chb1').is(':checked')) {
                        remember_me = true
                    }else{
                        remember_me = false
                    }

                    $.ajax({
                        url:  APP_BASE_URL+ '/backend/sme/auth/login',
                        type: 'POST',
                        data: {
                            username:$('#username').val(),
                            password:$('#password').val(),
                            remember_me:remember_me
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success:function(response){
                            if (response.success) {
                                window.location.href = '/ninechang';
                            }else{
                                toastr.warning('อีเมล หรือ รหัสผ่านไม่ถูกต้อง');
                            }
                        }
                    }); 
                    e.preventDefault();
                });
            });
        </script>
    </body>
</html>