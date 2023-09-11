<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Innap : Hotel Admin Template" />
    <meta property="og:title" content="Innap : Hotel Admin Template" />
    <meta property="og:description" content="Innap : Hotel Admin Template" />
    <meta property="og:image" content="<?php echo base_url();?>assets/images/favicon.png" />
    <meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
	<title>Program Monitor</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>assets/images/favicon.png" />
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200;300&display=swap" rel="stylesheet">

</head>

<body class="vh-100" style="font-family: 'Kanit', sans-serif;">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
                                        <img class="navbar-brand-img" src="<?php echo base_url();?>assets/images/LOGO_COMPANY_black.png" alt="logo" width="150px">
									</div>
                                    <h3 class="text-center mb-4">เข้าสู่ระบบ Monitor</h3>

                                    <?php print_r($this->session->flashdata('error_message')); ?>
                                    
                                    <form method="post" role="form" id="loginform" action="<?php echo base_url();?>login/check_login">
                                        <div class="mb-3">
                                            <label class="mb-1" style="color:#666;"><strong>Username</strong></label>
                                            <input type="text" name="username" class="form-control" >
                                        </div>
                                        <div class="mb-3" style="color:#666;">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        
                                        <br>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">เข้าสู่ระบบ</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?php echo base_url();?>assets/vendor/global/global.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/custom.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/deznav-init.js"></script>

</body>
</html>