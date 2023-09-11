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
        <div class="user-area pt-100 pb-70">
            <div class="container">
                
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <div class="user-all-form">
                            <div class="contact-form">
                                <h3>เข้าสู่ระบบ</h3>
                                <div class="bar"></div>
                                <form id="frm-login">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12 ">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="username" id="username" value="" class="form-control" required data-error="Please enter your Username or Email">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control" type="password" name="password" id="password" value="">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 form-condition">
                                            <div class="agree-label">
                                                <input type="checkbox" id="chb1" name="remember_me" value="1">
                                                <label for="chb1">
                                                    Remember Me <a class="forget" href="forgot-password.html"></a>
                                                </label>
                                            </div>
                                        </div>
                                        {{-- 
                                        <div class="col-lg-12 form-condition">
                                            <div class="agree-label">
                                                <input type="checkbox" id="chb1">
                                                <label for="chb1">
                                                    Remember Me <a class="forget" href="forgot-password.html">Forgot My Password?</a>
                                                </label>
                                            </div>
                                        </div>
                                         --}}
        
                                        <div class="col-lg-12 col-md-12 text-center">
                                            <button type="submit" class="default-btn">
                                                ดำเนินการต่อ
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
            </div>
        </div>
        <!-- User Area End -->

        <!-- Employers CV Area -->
        <div class="employers-cv-area">
            <div class="container">
                <div class="employers-cv-bg">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <div class="employers-cv-content">
                                <h2>Content Management</h2>
                                <div class="bar"></div>
                                <p>โปรแกรมบริหารและจัดการข้อมูลประชาสัมพันธ์การตลาด</p>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            {{--
                            <div class="employers-cv-btn">
                                <a href="mailto:contact@zoben.com">Upload Your CV</a>
                            </div>
                            --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Employers CV Area -->

        <!-- Footer Area -->
        <footer class="footer-area">
            <div class="copyright-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-7">
                            <div class="copy-right-text">
                                <p>
                                   © <script>document.write(new Date().getFullYear())</script> Zoben. All Rights Reserved by 
                                    <a href="https://hibootstrap.com/" target="_blank">SME THAI SOFTWARE CO., LTD.</a> 
                                </p>
                            </div>
                        </div>
        
                        <div class="col-lg-6 col-md-5">
                            <div class="copy-right-social-link">
                                <ul class="social-link">
                                    <li>
                                        <i class="ri-facebook-fill"></i>
                                    </li>
                                    <li>
                                        <i class="ri-instagram-fill"></i>
                                    </li>
                                    <li>
                                        <i class="ri-twitter-fill"></i>
                                    </li>
                                    <li>
                                        <i class="ri-linkedin-fill"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Area End -->

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
            
            var APP_BASE_URL = @json(url('/contentmanagement'));
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