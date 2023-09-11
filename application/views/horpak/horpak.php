<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
	<div class="container-fluid">
		<!-- row -->
		<div class="row">
		<div class="col-lg-12">
            <form action="<?php echo base_url('horpak/');?>" method="POST">
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
					<div class="mb-3 col-md-5"></div>
					<div class="mb-3 col-md-2">
						<label >ช่วงวันที่ดู</label>
						<input class="form-control input-daterange-datepicker" type="text" name="daterange" value="<?php echo $thisyear; ?>">
					</div>
					<div class="mb-3 col-md-1" align="right">
						<br>
						&nbsp;<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-search"></i>&nbsp; ค้นหา</button>
					</div>					
				</div>
			</form>
			
			<div class="tab-content">	
				<div class="tab-pane active show" id="graph">
					<div class="row">
						<div class="col-xl-6 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title"><strong>จำนวนผู้สมัครสัปดาห์ที่ผ่านมา</strong></h4>
									<div class="row">
										<div class="col-xl-12">
											<span class="badge light badge-primary mb-2">
												<i class="fa fa-circle text-primary me-1"></i>
												Facebook
											</span>	
											<span class="badge light badge-success mb-2">
												<i class="fa fa-circle text-success me-1"></i>
												Google
											</span>
											<span class="badge light badge-warning mb-2">
												<i class="fa fa-circle text-warning me-1"></i>
												Email
											</span>	
										</div>	
									</div>
								</div>
								<div class="card-body">
									<div id="RegisterChart" class="ct-chart ct-golden-section chartlist-chart"></div>
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title"><strong>เปอร์เซ็นการสมัครบัญชีเข้าใช้งาน</strong></h4>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-xl-4 d-flex align-items-center col-sm-6 mb-sm-0 mb-3">
											<div class="me-4 mt-5">
												<span class="donut" data-peity='{ "fill": ["#17a2b8", "rgba(246, 246, 246)"],   "innerRadius": 45, "radius": 10}'><?php echo $part_facebook;?>/8</span>
											</div>
											<div>
												<h2><?php echo round($percent_facebook).'%';?></h2>
												<span class="fs-18">Facebook</span>
											</div>
										</div>
										<div class="col-xl-4 d-flex align-items-center col-sm-6">
											<div class="me-4 mt-5">
												<span class="donut" data-peity='{ "fill": ["#37D159", "rgba(246, 246, 246)"],   "innerRadius": 45, "radius": 10}'><?php echo $part_google;?>/8</span>
											</div>
											<div>
												<h2><?php echo round($percent_google).'%';?></h2>
												<span class="fs-18">Google</span>
											</div>
										</div>
										<div class="col-xl-4 d-flex align-items-center col-sm-6">
											<div class="me-4 mt-5">
												<span class="donut" data-peity='{ "fill": ["#FF6746", "rgba(246, 246, 246)"],   "innerRadius": 45, "radius": 10}'><?php echo $part_email;?>/8</span>
											</div>
											<div>
												<h2><?php echo round($percent_email).'%';?></h2>
												<span class="fs-18">Email</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-12">
							<div class="card">
								<div class="card-header border-0 pb-0">
									<h4 class="card-title"><strong>จำนวนผู้สมัครทั้งหมด</strong></h4>
								</div>
								<div class="card-body">
									<div class="progress mb-4" style="height:13px;">
										<div class="progress-bar gradient-6 progress-animated" style="width: <?php echo round($percent_facebook).'%';?>; height:13px;" role="progressbar">
											<span class="sr-only"><?php echo round($percent_facebook).'%';?> เปอร์เซ็น</span>
										</div>
									</div>
									<div class="progress mb-4" style="height:13px;">
										<div class="progress-bar gradient-2 progress-animated" style="width: <?php echo round($percent_google).'%';?>; height:13px;" role="progressbar">
											<span class="sr-only"><?php echo round($percent_google).'%';?> เปอร์เซ็น</span>
										</div>
									</div>
									<div class="progress default-progress" style="height:13px;">
										<div class="progress-bar gradient-8 progress-animated" style="width: <?php echo round($percent_email).'%';?>; height:13px;" role="progressbar">
											<span class="sr-only"><?php echo round($percent_email).'%';?> เปอร์เซ็น</span>
										</div>
									</div>
									<div class="d-flex mt-4 progress-bar-legend align-items-center justify-content-between">
										<div class="d-flex">
											<span class="marker gradient-6"></span>
											<div>
												<p class="status">Facebook</p>
												<span class="result"><?php echo $regis_facebook_all['total']; ?></span>
											</div>
										</div>
										<div class="d-flex">
											<span class="marker gradient-2"></span>
											<div>
												<p class="status">Google</p>
												<span class="result"><?php echo $regis_google_all['total']; ?></span>
											</div>
										</div>
										<div class="d-flex">
											<span class="marker gradient-8"></span>
											<div>
												<p class="status">Email</p>
												<span class="result"><?php echo $regis_email_all['total']; ?></span>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="text-center">
											<div class="profile-photo">
												<span class="text-primary">
													<svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
														<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
														<circle cx="12" cy="7" r="4"></circle>
													</svg>
												</span>
											</div>
											<h4 class="mt-4 mb-1"><center>จำนวนผู้สมัครทั้งหมด</center></h4>														
											<br>
											<div class="row">
											<div class="col-3"></div>
											<div class="col-6">
												<div class="bgl-primary rounded p-2">
													<strong><h3 class="mb-0"><?php echo $result_total1; ?> </h3></strong>
												</div>
											</div>
											<div class="col-3"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-6 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title"><strong>ผู้ใช้งานระบบที่เพิ่มเข้ามาสัปดาห์ที่ผ่านมา</strong></h4>
									<div class="row">
										<div class="col-xl-12">
											<span class="badge light badge-primary mb-2">
												<i class="fa fa-circle text-primary me-1"></i>
												เจ้าของ(AD)
											</span>	
											<span class="badge light badge-warning mb-2">
												<i class="fa fa-circle text-warning me-1"></i>
												นิติ
											</span>
											<span class="badge light badge-success mb-2">
												<i class="fa fa-circle text-success me-1"></i>
												นายช่าง
											</span>
											<span class="badge light badge-danger mb-2">
												<i class="fa fa-circle text-danger me-1"></i>
												ผู้เช่า
											</span>
										</div>	
									</div>
								</div>
								<div class="card-body"><br>
									<div id="RegisterWeekChart" class="ct-chart ct-golden-section chartlist-chart"></div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-12">
							<div class="card">
								<div class="card-header border-0 pb-0">
									<h4 class="card-title"><strong>จำนวนผู้ใช้งานระบบทั้งหมด</strong></h4>
								</div>
								<div class="card-body">
									<div class="progress mb-4" style="height:13px;">
										<div class="progress-bar gradient-12 progress-animated" style="width: <?php echo round($percent_admin).'%';?>; height:13px;" role="progressbar">
											<span class="sr-only"><?php echo round($percent_admin).'%';?> เปอร์เซ็น</span>
										</div>
									</div>
									<div class="progress mb-4" style="height:13px;">
										<div class="progress-bar gradient-3 progress-animated" style="width: <?php echo round($percent_employee1).'%';?>; height:13px;" role="progressbar">
											<span class="sr-only"><?php echo round($percent_employee1).'%';?> เปอร์เซ็น</span>
										</div>
									</div>
									<div class="progress mb-4" style="height:13px;">
										<div class="progress-bar gradient-2 progress-animated" style="width: <?php echo round($percent_employee2).'%';?>; height:13px;" role="progressbar">
											<span class="sr-only"><?php echo round($percent_employee2).'%';?> เปอร์เซ็น</span>
										</div>
									</div>
									<div class="progress default-progress" style="height:13px;">
										<div class="progress-bar gradient-9 progress-animated" style="width: <?php echo round($percent_employee3).'%';?>; height:13px;" role="progressbar">
											<span class="sr-only"><?php echo round($percent_employee3).'%';?> เปอร์เซ็น</span>
										</div>
									</div>
									<div class="d-flex mt-4 progress-bar-legend align-items-center justify-content-between">
										<div class="d-flex">
											<span class="marker gradient-6"></span>
											<div>
												<p class="status">เจ้าของ(AD)</p>
												<span class="result"><?php echo $admin_all['total']; ?></span>
											</div>
										</div>
										<div class="d-flex">
											<span class="marker gradient-3"></span>
											<div>
												<p class="status">นิติ</p>
												<span class="result"><?php echo $employee1_all['total']; ?></span>
											</div>
										</div>
										<div class="d-flex">
											<span class="marker gradient-2"></span>
											<div>
												<p class="status">นายช่าง</p>
												<span class="result"><?php echo $employee2_all['total']; ?></span>
											</div>
										</div>
										<div class="d-flex">
											<span class="marker gradient-9"></span>
											<div>
												<p class="status">ผู้เช่า</p>
												<span class="result"><?php echo $employee3_all['total']; ?></span>
											</div>
										</div>
									</div>

									<div class="card-body">
										<div class="text-center">
											<div class="profile-photo">
												<span class="text-success">
													<svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
														<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
														<circle cx="12" cy="7" r="4"></circle>
													</svg>
												</span>
											</div>
											<h4 class="mt-4 mb-1"><center>จำนวนผู้สมัครทั้งหมด</center></h4>														
											<br>
											<div class="row">
											<div class="col-3"></div>
											<div class="col-6">
												<div class="bgl-success rounded p-2">
													<strong><h3 class="mb-0"><?php echo $user_total1; ?> </h3></strong>
												</div>
											</div>
											<div class="col-3"></div>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xl-5 col-sm-12">
							<div class="card text-center">
								<div class="card-header">
									<h4 class="card-title"><strong>เปอร์เซ็นจำนวนผู้ใช้งานในระบบ</strong></h4>
								</div>
								<div class="card-body">
									<br>
									<div class="row">
										<div class="col-xl-3 col-sm-12">
											<div id="percentAdmin"></div>
										<h2><?php echo round($percent_admin); ?>%</h2>
										<span class="fs-16 text-black"><strong>เจ้าของ(AD)</strong></span>
										</div>
										<div class="col-xl-3 col-sm-12">
											<div id="percentEmployee1"></div>
										<h2><?php echo round($percent_employee1); ?>%</h2>
										<span class="fs-16 text-black"><strong>นิติ</strong></span>
										</div>
										<div class="col-xl-3 col-sm-12">
											<div id="percentEmployee2"></div>
										<h2><?php echo round($percent_employee2); ?>%</h2>
										<span class="fs-16 text-black"><strong>นายช่าง</strong></span>
										</div>
										<div class="col-xl-3 col-sm-12">
											<div id="percentEmployee3"></div>
										<h2><?php echo round($percent_employee3); ?>%</h2>
										<span class="fs-16 text-black"><strong>ผู้เช่า</strong></span>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-4">
							<div class="card" style="height: 420px;">
								<div class="card-header  border-0 pb-0">
									<h4 class="card-title"><strong>5 บัญชี</strong> ที่เพิ่มเข้ามาใหม่ล่าสุด</h4>
									<a href="<?php echo base_url('horpak/company');?>" class="btn btn-sm light btn-secondary" target="_blank">
										<i class="fas fa-user-check" style="font-size: 12px;">
									ดูทั้งหมด</i></a>
								</div>
								<div class="card-body"> 
									<div id="DZ_W_Todo1" class="widget-media dz-scroll height370">
										
										<ul class="timeline">
											<?php foreach($company_recent as $key => $row){ ?>
											<li>
												<div class="timeline-panel">
													<div class="media me-2 media-primary">
														<h5 class="mt-2"><?php echo $key+1; ?>.</h5>
													</div>
													<div class="media-body">
														<h5 class="mb-1"><?php echo $row['email']; ?></h5>
														<h5 class="text-black op8 mb-sm-0 mb-3 me-4">ชื่อองค์กร: <?php echo $row['company_name']; ?></h5>
														<small class="d-block">สมัครเมื่อ <?php echo date('d/m/Y H:i',strtotime($row["created"])); ?> น.</small>
													</div>
												</div>
											</li>
											<?php } ?>
										</ul>

									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-3">
							<div class="card" style="height: 420px;">
								<div class="card-header border-0">
									<h4 class="card-title"><strong>คำแนะนำและติชมจากผู้ใช้</strong></h4>
									<div class="btn-group dropend mb-1">
									</div>
								</div>
								<div class="card-body"> 
									<div id="DZ_W_Todo2" class="widget-media dz-scroll height370">
										<ul class="timeline">
												<?php foreach($comment as $key => $row){ ?>
												<li>
													<div class="timeline-panel">
														<div class="media me-2">
															<img alt="image" width="50" src="<?php echo base_url();?>assets/images/avatar/1.png">
														</div>
														<div class="media-body">
															<h5 class="mb-1"> <?php echo $row['first_name']." ".$row['last_name']; ?>
																<?php if(!empty($row['oauth_provider'])){
																	echo '<span class="badge light badge-primary fs-12">เจ้าของ(AD)</span>';
																}else{
																	if($row['employees_type'] == 1){
																		echo '<span class="badge light badge-warning fs-12">นิติ</span>';
																	}else if($row['employees_type'] == 2){
																		echo '<span class="badge light badge-success fs-12">นายช่าง</span>';
																	}
																	else{
																		echo '<span class="badge light badge-danger fs-12">ผู้เช่า</span>';
																	}
																} ?>
															</h5>
															<ul class="star-review">
															<?php 
																//$score_max = 20;
																$percent_comment = ($row['sum_evaluate']/20)*100;
																$raet = $percent_comment/20;
																
																if ($raet >= 4.5) {
																	echo '
																	<li><i class="fas fa-star orange"></i></li>
																	<li><i class="fas fa-star orange"></i></li>
																	<li><i class="fas fa-star orange"></i></li>
																	<li><i class="fas fa-star orange"></i></li>
																	<li><i class="fas fa-star orange"></i></li>';
																}elseif ($raet >= 3.5) {
																	echo '
																	<li><i class="fas fa-star orange"></i></li>
																	<li><i class="fas fa-star orange"></i></li>
																	<li><i class="fas fa-star orange"></i></li>
																	<li><i class="fas fa-star orange"></i></li>
																	<li><i class="fas fa-star"></i></li>';
																}elseif ($raet >= 2.5) {
																	echo '
																	<li><i class="fas fa-star orange"></i></li>
																	<li><i class="fas fa-star orange"></i></li>
																	<li><i class="fas fa-star orange"></i></li>
																	<li><i class="fas fa-star"></i></li>
																	<li><i class="fas fa-star"></i></li>';
																}elseif ($raet >= 1.5) {
																	echo '
																	<li><i class="fas fa-star orange"></i></li>
																	<li><i class="fas fa-star orange"></i></li>
																	<li><i class="fas fa-star"></i></li>
																	<li><i class="fas fa-star"></i></li>
																	<li><i class="fas fa-star"></i></li>';
																}elseif ($raet >= 1) {
																	echo '
																	<li><i class="fas fa-star orange"></i></li>
																	<li><i class="fas fa-star"></i></li>
																	<li><i class="fas fa-star"></i></li>
																	<li><i class="fas fa-star"></i></li>
																	<li><i class="fas fa-star"></i></li>';
																}else {
																	echo '
																	<li><i class="fas fa-star"></i></li>
																	<li><i class="fas fa-star"></i></li>
																	<li><i class="fas fa-star"></i></li>
																	<li><i class="fas fa-star"></i></li>
																	<li><i class="fas fa-star"></i></li>';
																} 
															?>
															</ul>
															<p class="text-black op8 mb-sm-0 mb-1 mt-1 me-4"><?php echo $row['detail']; ?></p>
															<small class="d-block">วันที่ส่งข้อความ <?php echo date('d/m/Y H:i',strtotime($row["created_at"])); ?> น.</small>
														</div>
														

														<?php if(!empty($row['oauth_provider'])){
																echo '<button type="button" class="btn btn-primary light sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg'.$row['evaluate_id'].'">
																<i class="flaticon-381-search-1"></i>
															</button>';
															}else{
																if($row['employees_type'] == 1){
																	echo '<button type="button" class="btn btn-warning light sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg'.$row['evaluate_id'].'">
																		<i class="flaticon-381-search-1"></i>
																	</button>';
																}else if($row['employees_type'] == 2) {
																	echo '<button type="button" class="btn btn-success light sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg'.$row['evaluate_id'].'">
																		<i class="flaticon-381-search-1"></i>
																	</button>';
																}
																else{
																	echo '<button type="button" class="btn btn-danger light sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg'.$row['evaluate_id'].'">
																		<i class="flaticon-381-search-1"></i>
																	</button>';
																}
														} ?>

														<!-- Large modal -->
														<div class="modal fade bd-example-modal-lg<?php echo $row['evaluate_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
															<div class="modal-dialog modal-lg">
																<div class="modal-content">
																	<div class="modal-body">
																		<div class="row mt-3">
																			<div class="col-xl-3">
																				<center><img class="dz-media me-4" src="<?php echo base_url('assets/images/avatar/1.png')?>"></center>
																			</div>
																			<div class="col-xl-9">
																				<h3 class="card-title mb-3"><strong>รายละเอียดการประเมิน</strong></h3>
																				<div class="row">
																					<div class="col-xl-6 col-xxl-6">	
																						<ul class="user-info-list">
																							<li>
																								<h5 class="mb-2"><strong>หัวข้อการประเมิน</strong></h5>
																							</li>
																							<?php foreach($comment_topic as $key => $value){	
																								echo '<li>
																									<h5 class="mb-2">'.($key+1).'. '.$value['evaluate_topic'].'</h5>
																								</li>';
																							} ?>
																						</ul>
																					</div>
																					<div class="col-xl-6 col-xxl-6">	
																						<ul class="user-info-list text-center">
																							<li>
																								<h5 class="mb-2"><strong>ผลการประเมิน</strong></h5>
																							</li>
																							<li>
																								<h5 class="mb-2">
																									<?php if($row['evaluate_topic_1'] == '4'){echo "ดีมาก";}
																											else if($row['evaluate_topic_1'] == '3'){echo "ดี";}
																											else if($row['evaluate_topic_1'] == '2'){echo "พอใช้";}
																											else{echo "ปรับปรุง";} 
																									?>
																								</h5>
																							</li>
																							<li>
																								<h5 class="mb-2">
																									<?php if($row['evaluate_topic_2'] == 4){echo 'ดีมาก';}
																											else if($row['evaluate_topic_2'] == 3){echo 'ดี';}
																											else if($row['evaluate_topic_2'] == 2){echo 'พอใช้';}
																											else{echo 'ปรับปรุง';} 
																									?>
																								</h5>
																							</li>
																							<li>
																								<h5 class="mb-2">
																									<?php if($row['evaluate_topic_3'] == 4){echo 'ดีมาก';}
																											else if($row['evaluate_topic_3'] == 3){echo 'ดี';}
																											else if($row['evaluate_topic_3'] == 2){echo 'พอใช้';}
																											else{echo 'ปรับปรุง';} 
																									?>
																								</h5>
																							</li>
																							<li>
																								<h5 class="mb-2">
																									<?php if($row['evaluate_topic_4'] == 4){echo 'ดีมาก';}
																											else if($row['evaluate_topic_4'] == 3){echo 'ดี';}
																											else if($row['evaluate_topic_4'] == 2){echo 'พอใช้';}
																											else{echo 'ปรับปรุง';} 
																									?>
																								</h5>
																							</li>
																							<li>
																								<h5 class="mb-2">
																									<?php if($row['evaluate_topic_5'] == 4){echo 'ดีมาก';}
																											else if($row['evaluate_topic_5'] == 3){echo 'ดี';}
																											else if($row['evaluate_topic_5'] == 2){echo 'พอใช้';}
																											else{echo 'ปรับปรุง';} 
																									?>
																								</h5>
																							</li>
																						</ul>
																					</div>	
																				</div>
																				
																				<?php 	
																					if($row['sum_evaluate'] > 17.5){
																						$part = 8;
																					}else if($row['sum_evaluate'] > 15){
																						$part = 7;
																					}else if($row['sum_evaluate'] > 12.5){
																						$part = 6;
																					}else if($row['sum_evaluate'] > 10){
																						$part = 5;
																					}else if($row['sum_evaluate'] > 7.5){
																						$part = 4;
																					}else if($row['sum_evaluate'] > 5){
																						$part = 3;
																					}else if($row['sum_evaluate'] > 2.5){
																						$part = 2;
																					}else if($row['sum_evaluate'] > 1){
																						$part = 1;
																					}
																				?>

																				<div class="row mb-3">
																					<div class="col-xl-12 col-xxl-12">	
																							<h5 class="mb-2 mt-3"><strong>ให้คำแนะนำ/ติชมเพิ่มเติม</strong></h5>
																							<h6 class="mb-1"><?php echo $row['detail']; ?></h6>
																					</div>
																				</div>
																				<div class="row mt-5 align-items-center">
																					<div class="col-xl-6 d-flex align-items-center col-sm-6 mb-sm-0 mb-3">
																						<div class="me-4">
																							<span class="donut" data-peity='{ "fill": ["#e83e8c", "rgba(246, 246, 246)"],   "innerRadius": 45, "radius": 10}'><?php echo $part;?>/8</span>
																						</div>
																						<div>
																							<h2><?php echo round($percent_comment).'%';?></h2>
																							<span class="fs-18">คะแนนประเมิน</span>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																		
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">ปิด</button>
																	</div>
																</div>
															</div>
														</div>

													</div>
												</li>
												<?php } ?>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-5 col-lg-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title"><strong>จำนวนการประเมินโปรแกรมทั้งหมด</strong></h4>
									<div class="row">
										<div class="col-xl-12">
											<span class="badge light badge-primary mb-2">
												<i class="fa fa-circle text-primary me-1"></i>
												เจ้าของ(AD)
											</span>	
											<span class="badge light badge-warning mb-2">
												<i class="fa fa-circle text-warning me-1"></i>
												นิติ
											</span>
											<span class="badge light badge-success mb-2">
												<i class="fa fa-circle text-success me-1"></i>
												นายช่าง
											</span>
											<span class="badge light badge-danger mb-2">
												<i class="fa fa-circle text-danger me-1"></i>
												ผู้เช่า
											</span>
										</div>	
									</div>
								</div>
								<div class="card-body">
									<div id="CommentAllChart" class="ct-chart ct-golden-section chartlist-chart"></div>
								</div>
							</div>
						</div>

						<div class="col-xl-3 col-sm-12">
							<div class="card text-center">
								<div class="card-header">
									<h4 class="card-title"><strong>เปอร์เซ็นผลการประเมินโปรแกรม</strong></h4>
								</div>
								<div class="card-body">
									<div id="overallProgram"></div>
									<h2><?php echo round($percent_program).'%'; ?></h2>
									<span class="fs-16 text-black">ความ<strong>พึงพอใจ</strong>ในโปรแกรม: <?php echo $level_program; ?></span>
								</div>
							</div>
						</div>

						<div class="col-xl-4 col-lg-4 col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title"><strong>จำนวนการส่งคำแนะนำ/ติชมแต่ละเดือน</strong></h4>
								</div>
								<div class="card-body">
									<canvas id="barChartMonth"></canvas>
								</div>
							</div>
						</div>
					</div>
				</div>
							
				<div class="tab-pane" id="search">
					<div class="row">
						<div class="col-xl-3 col-sm-12">
							<a href="<?php echo base_url('horpak/user')?>">
								<div class="card gradient-14 card-bx">
									<div class="card-body d-flex align-items-center">
										<div class="me-auto text-white">
											<h2 class="text-white"><?php echo $user_total; ?></h2>
											<h2 class="text-white">ผู้ใช้งานระบบ</h2>
										</div>
									<i class="flaticon-381-id-card-5 text-white" style="font-size:60px;"></i>
									</div>
								</div>	
							</a>
						</div>
						<!-- <div class="col-xl-3 col-sm-12">
							<a href="index3-search3.html">
								<div class="card gradient-9 card-bx">
									<div class="card-body d-flex align-items-center">
										<div class="me-auto text-white">
											<h2 class="text-white">213</h2>
											<h2 class="text-white">สัญญาเช่า</h2>
										</div>
									<i class="flaticon-381-search-3 text-white" style="font-size:60px;"></i>
									</div>
								</div>	
							</a>
						</div> -->
						<div class="col-xl-3 col-sm-12">
							<a href="<?php echo base_url('horpak/job')?>">
								<div class="card gradient-1 card-bx">
									<div class="card-body d-flex align-items-center">
										<div class="me-auto text-white">
											<h2 class="text-white"><?php echo $result_ma['total']; ?></h2>
											<h2 class="text-white">งานแจ้งซ่อม</h2>
										</div>
									<i class="flaticon-381-settings-7 text-white" style="font-size:60px;"></i>
									</div>
								</div>	
							</a>
						</div>
						<div class="col-xl-3 col-sm-12">
							<a href="<?php echo base_url('horpak/review')?>">
								<div class="card gradient-13 card-bx">
									<div class="card-body d-flex align-items-center">
										<div class="me-auto text-white">
											<h2 class="text-white"><?php echo $result_comment['total']; ?></h2>
											<h2 class="text-white">ความคิดเห็น</h2>
										</div>
									<i class="flaticon-381-smartphone text-white" style="font-size:60px;"></i>
									</div>
								</div>	
							</a>
						</div>

						<div class="col-xl-3 col-sm-12">
							<a href="<?php echo base_url('horpak/parts')?>">
								<div class="card gradient-17 card-bx">
									<div class="card-body d-flex align-items-center">
										<div class="me-auto text-white">
											<h2 class="text-white"><?php echo $result_parts; ?></h2>
											<h2 class="text-white">อะไหล่</h2>
										</div>
									<i class="flaticon-381-smartphone-7 text-white" style="font-size:60px;"></i>
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