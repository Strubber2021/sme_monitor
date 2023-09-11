<!DOCTYPE html>
<html lang="en">
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
	<meta property="og:image" content="https://innap.dexignzone.com/xhtml/social-image.png" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title><?php echo $page_title; ?></title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>assets/images/favicon.png" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/chartist/css/chartist.min.css">
	<link href="<?php echo base_url();?>assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	<!-- Style css -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
	
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="waviy">
			<span style="--i:1">กำ</span>
			<span style="--i:2">ลั</span>
			<span style="--i:3">ง</span>
			<span style="--i:4">โ</span>
			<span style="--i:5">ห</span>
			<span style="--i:6">ล</span>
			<span style="--i:7">ด</span>
			<span style="--i:8">.</span>
			<span style="--i:9">.</span>
			<span style="--i:10">.</span>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
		<div class="nav-header">
            <a href="index.html" class="brand-logo">
				<img class="navbar-brand-img" src="<?php echo base_url();?>assets/images/LOGO_COMPANY_white.png" alt="logo" width="80px">
            </a>
			<div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
						<div class="header-left">
                        </div>
						<ul class="navbar-nav header-right">
							<li class="nav-item dropdown notification_dropdown">
                                <div class="header-left">
								</div>
							</li>
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell-link ai-icon" href="javascript:void(0);">
									<i class="flaticon-041-graph text-white"> Programs Monitor</i>	
                                </a>
							</li>
                        </ul>
                    </div>
				</nav>
			</div>
		</div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">

                    <li <?php if($page_name == 'welcome') echo 'class="mm-active"';?>>
                    	<a href="index.html" class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-id-card-1"></i>
							<span class="nav-text">หาช่าง หางาน</span>
						</a>
					</li>
					<li><a href="index2.html" class="ai-icon" aria-expanded="false">
						<i class="flaticon-381-settings-7"></i>
						<span class="nav-text">โปรแกรมซ่อมบำรุง</span>
						</a>
					</li>
					<li><a href="index3.html" class="ai-icon" aria-expanded="false">
						<i class="flaticon-381-home-1"></i>
						<span class="nav-text">โปรแกรมหอพัก</span>
						</a>
					</li>
					<li><a href="index4.html" class="ai-icon" aria-expanded="false">
						<i class="flaticon-381-internet"></i>
						<span class="nav-text">SME</span>
						</a>
					</li>
					<li><a href="index5.html" class="ai-icon" aria-expanded="false">
						<i class="flaticon-381-user-2"></i>
						<span class="nav-text">บุคคล.com</span>
						</a>
					</li>
					<li><a href="index6.html" class="ai-icon" aria-expanded="false">
						<i class="flaticon-381-search-3"></i>
						<span class="nav-text">งานไทย.net</span>
						</a>
					</li>
                    
                </ul>
				<div class="copyright">
					<p><strong>Program monitor</strong> © 2021 All Rights Reserved</p>
					<p class="fs-12">Made with <span class="heart"></span> by ST</p>
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
						<div class="d-flex mb-4 justify-content-between align-items-center flex-wrap">
							<div class="card-tabs mt-3 mt-sm-0">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-bs-toggle="tab" href="#graph" role="tab"><i class="flaticon-041-graph"></i> ข้อมูลวิเคราะห์</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-bs-toggle="tab" href="#search" role="tab"><i class="flaticon-381-search-1"></i> ค้นหาแบบเจาะจง</a>
									</li>
								</ul>
							</div>
							<div class="col-xl-2 col-sm-2 mt-3">
								<label>ช่วงวันที่ดู</label>
								<input name="date" class="datepicker-default form-control"  value="07 มิถุนายน 2565">
							</div>
						</div>

						<div class="tab-content">	
							<div class="tab-pane active show" id="graph">
								<div class="row">
									<div class="col-xl-6 col-lg-6">
										<div class="card">
											<div class="card-header">
												<h4 class="card-title">ประกาศหาช่างและหางานที่เพิ่มมาสัปดาห์นี้</h4>
												<div class="row">
													<div class="col-xl-12">
														<span class="badge light badge-success mb-2">
															<i class="fa fa-circle text-success me-1"></i>
															หาช่าง
														</span>	
														<span class="badge light badge-primary mb-2">
															<i class="fa fa-circle text-primary me-1"></i>
															หางาน
														</span>	
													</div>	
												</div>
											</div>
											<div class="card-body">
												<div id="label-placement-chart" class="ct-chart ct-golden-section chartlist-chart"></div>
											</div>
										</div>
									</div>
									<div class="col-xxl-4 col-sm-12">
										<div class="card">
											<div class="card-header">
												<h4 class="card-title">เปอร์เซ็นหางานและหาช่างในระบบ</h4>
											</div>
											<div class="card-body">
												<div class="row">
													<div class="col-xl-6 d-flex align-items-center col-sm-6 mb-sm-0 mb-3 mt-5">
														<div class="me-4">
															<span class="donut" data-peity='{ "fill": ["#37D159", "rgba(246, 246, 246)"],   "innerRadius": 45, "radius": 10}'>4/8</span>
														</div>
														<div>
															<h2>50%</h2>
															<span class="fs-18">หาช่าง</span>
														</div>
													</div>
													<div class="col-xl-6 d-flex align-items-center col-sm-6 mt-5">
														<div class="me-4">
															<span class="donut" data-peity='{ "fill": ["var(--primary)", "rgba(246, 246, 246)"],   "innerRadius": 45, "radius": 10}'>4/8</span>
														</div>
														<div>
															<h2>50%</h2>
															<span class="fs-18">หางาน</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-2 col-xxl-2 col-lg-2 col-sm-6">
										<div class="widget-stat card text-center">
											<div class="card-body p-4">
												<div class="s-icon mt-5">
													<span class="text-primary badge light badge-primary">
														<i class="flaticon-381-user-9 fs-1"></i>
													</span>
												</div>
												<div class="media-body">
													<p class="mb-1 mt-4"><strong>ประกาศงานและช่างในระบบ</strong></p>
													<h1 class="mb-0 mt-4">3280</h1>
													<p class="mb-1 mt-4"><strong>งาน</strong></p>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-xl-4">
										<div class="card text-center" style="height: 420px;">
											<div class="card-header  border-0 pb-0">
												<h4 class="card-title"><strong>งานที่เพิ่มเข้ามา</strong> ทั้งหมด</h4>
												<div class="btn-group dropend mb-1">
													<button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
														หมวดหมู่งานซ่อม
													</button>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="#">ไฟฟ้า</a>
														<a class="dropdown-item" href="#">เครื่องปรับอากาศ</a>
														<a class="dropdown-item" href="#">เครื่องใช้ไฟ้า</a>
														<a class="dropdown-item" href="#">อิเล็กทรอนิกส์</a>
														<a class="dropdown-item" href="#">ยานยนต์</a>
														<a class="dropdown-item" href="#">ซ่อมคอม</a>
														<a class="dropdown-item" href="#">ประปา</a>
														<a class="dropdown-item" href="#">เสริมสวย</a>
														<a class="dropdown-item" href="#">ออกแบบ/ตกแต่ง</a>
														<a class="dropdown-item" href="#">การผลิต</a>
														<a class="dropdown-item" href="#">เครื่องจักรกล</a>
														<a class="dropdown-item" href="#">ก่อสร้าง</a>
														<a class="dropdown-item" href="#">เชื่อมโลหะ</a>
														<a class="dropdown-item" href="#">บริการ/รับจ้าง</a>
													</div>
												</div>
											</div>
											
											<div class="card-body">
												<div id="radialChart"></div>
												<h2>1520</h2>
												<span class="fs-16 text-black">รายการงาน <strong>ทั้งหมด</strong> ในระบบ</span>
											</div>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="card text-center" style="height: 420px;">
											<div class="card-header  border-0 pb-0">
												<h4 class="card-title"><strong>จำนวนช่างที่เพิ่มเข้ามา</strong> ทั้งหมด</h4>
												<div class="btn-group dropend mb-1">
													<button class="btn btn-success btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
														ประเภทช่างซ่อม
													</button>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="#">ไฟฟ้า</a>
														<a class="dropdown-item" href="#">เครื่องปรับอากาศ</a>
														<a class="dropdown-item" href="#">เครื่องใช้ไฟ้า</a>
														<a class="dropdown-item" href="#">อิเล็กทรอนิกส์</a>
														<a class="dropdown-item" href="#">ยานยนต์</a>
														<a class="dropdown-item" href="#">ซ่อมคอม</a>
														<a class="dropdown-item" href="#">ประปา</a>
														<a class="dropdown-item" href="#">เสริมสวย</a>
														<a class="dropdown-item" href="#">ออกแบบ/ตกแต่ง</a>
														<a class="dropdown-item" href="#">การผลิต</a>
														<a class="dropdown-item" href="#">เครื่องจักรกล</a>
														<a class="dropdown-item" href="#">ก่อสร้าง</a>
														<a class="dropdown-item" href="#">เชื่อมโลหะ</a>
														<a class="dropdown-item" href="#">บริการ/รับจ้าง</a>
													</div>
												</div>
											</div>
											
											<div class="card-body">
												<div id="radialChart1"></div>
												<h2>1520</h2>
												<span class="fs-16 text-black">รายการช่าง <strong>ทั้งหมด</strong> ในระบบ</span>
											</div>
										</div>
									</div>

									<div class="col-xl-4">
										<div class="card" style="height: 420px;">
											<div class="card-header border-0">
												<h4 class="card-title"><strong>คำแนะนำและติชมจากผู้ใช้</strong></h4>
												<div class="btn-group dropend mb-1">
												</div>
											</div>
											<div class="card-body"> 
												<div id="DZ_W_Todo1" class="widget-media dz-scroll height370">
													<ul class="timeline">
														<li>
															<div class="timeline-panel">
																<div class="media me-2">
																	<img alt="image" width="50" src="images/avatar/1.jpg">
																</div>
																<div class="media-body">
																	<h5 class="mb-1">สมมุติ เทพไทย <span class="badge light badge-primary fs-12">สมาชิก</span></h5>
																	<p class="text-black op8 mb-sm-0 mb-1 me-4">ใช้งานง่ายดี</p>
																	<small class="d-block">วันที่ส่งข้อความ 04/07/2565, 12:42 น.</small>
																</div>
															</div>
														</li>
														<li>
															<div class="timeline-panel">
																<div class="media me-2">
																	NM
																</div>
																<div class="media-body">
																	<h5 class="mb-1">บุคคลทั่วไป</h5>
																	<p class="text-black op8 mb-sm-0 mb-3 me-4">ช่วยหาช่างได้ไวดี</p>
																	<small class="d-block">วันที่ส่งข้อความ 04/07/2565, 12:42 น.</small>
																</div>
															</div>
														</li>
														<li>
															<div class="timeline-panel">
																<div class="media me-2">
																	NM
																</div>
																<div class="media-body">
																	<h5 class="mb-1">บุคคลทั่วไป</h5>
																	<p class="text-black op8 mb-sm-0 mb-3 me-4">ช่วยหาช่างได้ไวดี</p>
																	<small class="d-block">วันที่ส่งข้อความ 04/07/2565, 12:42 น.</small>
																</div>
															</div>
														</li>
														<li>
															<div class="timeline-panel">
																<div class="media me-2">
																	NM
																</div>
																<div class="media-body">
																	<h5 class="mb-1">บุคคลทั่วไป</h5>
																	<p class="text-black op8 mb-sm-0 mb-3 me-4">ช่วยหาช่างได้ไวดี</p>
																	<small class="d-block">วันที่ส่งข้อความ 04/07/2565, 12:42 น.</small>
																</div>
															</div>
														</li>
														<li>
															<div class="timeline-panel">
																<div class="media me-2">
																	NM
																</div>
																<div class="media-body">
																	<h5 class="mb-1">บุคคลทั่วไป</h5>
																	<p class="text-black op8 mb-sm-0 mb-3 me-4">ช่วยหาช่างได้ไวดี</p>
																	<small class="d-block">วันที่ส่งข้อความ 04/07/2565, 12:42 น.</small>
																</div>
															</div>
														</li>
														<li>
															<div class="timeline-panel">
																<div class="media me-2">
																	NM
																</div>
																<div class="media-body">
																	<h5 class="mb-1">บุคคลทั่วไป</h5>
																	<p class="text-black op8 mb-sm-0 mb-3 me-4">ช่วยหาช่างได้ไวดี</p>
																	<small class="d-block">วันที่ส่งข้อความ 04/07/2565, 12:42 น.</small>
																</div>
															</div>
														</li>
														
													</ul>
												</div>
											</div>
										</div>
									</div>

									<div class="col-xl-4 col-lg-4 col-sm-12">
										<div class="card">
											<div class="card-header">
												<h4 class="card-title">จำนวนการส่งคำแนะนำ/ติชมแต่ละเดือน</h4>
											</div>
											<div class="card-body">
												<canvas id="barChart_2"></canvas>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane" id="search">
								<div class="row">
									<div class="col-xl-3 col-sm-12">
										<a href="index-search2.html">
											<div class="card gradient-14 card-bx">
												<div class="card-body d-flex align-items-center">
													<div class="me-auto text-white">
														<h2 class="text-white">150</h2>
														<h2 class="text-white">ผู้ใช้งานระบบ</h2>
													</div>
												<i class="flaticon-381-id-card-5 text-white" style="font-size:60px;"></i>
												</div>
											</div>	
										</a>
									</div>
									<div class="col-xl-3 col-sm-12">
										<a href="index-search3.html">
											<div class="card gradient-9 card-bx">
												<div class="card-body d-flex align-items-center">
													<div class="me-auto text-white">
														<h2 class="text-white">213</h2>
														<h2 class="text-white">งานในระบบ</h2>
													</div>
												<i class="flaticon-381-search-3 text-white" style="font-size:60px;"></i>
												</div>
											</div>	
										</a>
									</div>
									<div class="col-xl-3 col-sm-12">
										<a href="index-search5.html">
											<div class="card gradient-13 card-bx">
												<div class="card-body d-flex align-items-center">
													<div class="me-auto text-white">
														<h2 class="text-white">20</h2>
														<h2 class="text-white">ความคิดเห็น</h2>
													</div>
												<i class="flaticon-381-smartphone text-white" style="font-size:60px;"></i>
												</div>
											</div>	
										</a>
									</div>
								</div>
							</div>
							
						</div>  
                    </div>
                </div>

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
		
		
		
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
		
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="https://dexignzone.com/" target="_blank">DexignZone</a> 2021</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->
		
        <!--**********************************
           Support ticket button end
        ***********************************-->


	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
	
    <!-- Required vendors -->
    <script src="<?php echo base_url();?>assets/vendor/global/global.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/chart.js/Chart.bundle.min.js"></script>
	
	<!-- Chart ChartJS plugin files -->
	<script src="<?php echo base_url();?>assets/js/plugins-init/chartjs-init.js"></script>
	
	<!-- Chart Morris plugin files -->
	<script src="<?php echo base_url();?>assets/vendor/raphael/raphael.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/morris/morris.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/plugins-init/morris-init.js"></script>

	<!-- Chart Chartist plugin files -->
	<script src="<?php echo base_url();?>assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/plugins-init/chartist-init.js"></script>

	<!-- Chart sparkline plugin files -->
	<script src="<?php echo base_url();?>assets/vendor/jquery-sparkline/jquery.sparkline.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/plugins-init/sparkline-init.js"></script>

	<!-- Chart piety plugin files -->
    <script src="<?php echo base_url();?>assets/vendor/peity/jquery.peity.min.js"></script>
	
	<!-- Apex Chart -->
	<script src="<?php echo base_url();?>assets/vendor/apexchart/apexchart.js"></script>
	
	
	<script src="<?php echo base_url();?>assets/vendor/bootstrap-datetimepicker/js/moment.js"></script>
	<script src="<?php echo base_url();?>assets/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	 <!-- Init file -->
	 <script src="<?php echo base_url();?>assets/js/plugins-init/widgets-script-init.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="<?php echo base_url();?>assets/js/dashboard/dashboard-1.js"></script>
    <script src="<?php echo base_url();?>assets/js/custom.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/deznav-init.js"></script>

	 <script src="<?php echo base_url();?>assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
</body>
</html>