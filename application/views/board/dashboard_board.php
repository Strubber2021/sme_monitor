<!--**********************************
Content body start
***********************************-->
<div class="content-body">
	<div class="container-fluid">

		<!-- row -->
		<div class="row">
		<div class="col-lg-12">
				
			<form action="<?php echo base_url('board/');?>" method="POST">
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
						<div class="col-xl-5 col-lg-5">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title"><strong>ประกาศหาช่างและหางานที่เพิ่มมาสัปดาห์ที่ผ่านมา</strong></h4>
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
									<div id="chart-week" class="ct-chart ct-golden-section chartlist-chart"></div>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title"><strong>เปอร์เซ็นหางานและหาช่างในระบบ</strong></h4>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-xl-6 d-flex align-items-center col-sm-6 mb-sm-0 mb-3 mt-5">
											<div class="me-2">
												<span class="donut" data-peity='{ "fill": ["#37D159", "rgba(246, 246, 246)"],   "innerRadius": 45, "radius": 10}'><?php echo $part_job;?>/8</span>
											</div>
											<div>
												<h2><?php echo round($percent_job).'%';?></h2>
												<span class="fs-18">หาช่าง</span>
											</div>
										</div>
										<div class="col-xl-6 d-flex align-items-center col-sm-6 mt-5">
											<div class="me-2">
												<span class="donut" data-peity='{ "fill": ["var(--primary)", "rgba(246, 246, 246)"],   "innerRadius": 45, "radius": 10}'><?php echo $part_techn;?>/8</span>
											</div>
											<div>
												<h2><?php echo round($percent_techn).'%';?></h2>
												<span class="fs-18">หางาน</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-xxl-3 col-lg-3 col-sm-6">
							<div class="widget-stat card text-center"><br>
								<div class="card-body">
									<div class="s-icon">
										<span class="text-primary">
											<svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
												<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
												<circle cx="12" cy="7" r="4"></circle>
											</svg>
										</span>
									</div><br>
									<div class="media-body">
										<h4 class="mb-1 mt-4"><strong>ประกาศงานและช่างในระบบ</strong></h4><br>
										<div class="row">
											<div class="col-3"></div>
											<div class="col-6">
												<div class="bgl-primary rounded p-2">
													<strong><h1 class="mb-0 text-primary"><?php echo $result_total1; ?> </h1></strong>
												</div>
											</div>
											<div class="col-3"></div>
										</div>
										<h4 class="mb-1 mt-4"><strong>งาน</strong></h4>
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
															<!-- <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
																หมวดหมู่งานซ่อม
															</button> -->
															<!-- <div class="dropdown-menu">
																<?php foreach ($type_repair as $value) {
																	echo '<a class="dropdown-item" href="1">'.$value['type_name'].'</a>';
																} ?>
															</div> -->
														</div>
													</div>
													
													<div class="card-body">
														<div id="jobpostChart"></div>
														<h2><?php echo $job_all['total'];?></h2>
														<span class="fs-16 text-black">รายการงาน <strong>ทั้งหมด</strong> ในระบบ</span>
													</div>
												</div>
											</div>

											<div class="col-xl-4">
												<div class="card text-center" style="height: 420px;">
													<div class="card-header  border-0 pb-0">
														<h4 class="card-title"><strong>จำนวนช่างที่เพิ่มเข้ามา</strong> ทั้งหมด</h4>
														<div class="btn-group dropend mb-1">
															<!-- <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
																ประเภทช่างซ่อม
															</button> -->
															<!-- <div class="dropdown-menu">
																<?php foreach ($type_repair as $row) {
																	echo '<a class="dropdown-item" href="'.base_url('Welcome/').$row['type_id'].'" >'.$row['type_name'].'</a>';
																} ?>
															</div> -->
														</div>
													</div>
													
													<div class="card-body">
														<div id="technpostChart"></div>
														<h2><?php echo $techn_all['total'];?></h2>
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
															
																<?php foreach($contact as $value) { ?>
																	<li>
																	<div class="timeline-panel">
																		<div class="media me-2">
																			<img alt="image" width="50" src="<?php echo base_url('assets/images/avatar/1.png')?>">
																		</div>
																		<div class="media-body">
																			<h5 class="mb-1"><span class="badge light badge-primary fs-12">บุคคลทั่วไป</span></h5>
																			<p class="text-black op8 mb-sm-0 mb-1 me-4"><?php echo $value['contact_desc']; ?></p>
																			<small class="d-block">วันที่ส่งข้อความ <?php echo date('d/m/Y H:i',strtotime($value["created_at"])) ?> น.</small>
																		</div>
																	</div>
																</li>
																<?php }  ?>

															</ul>
														</div>
													</div>
												</div>
											</div>

											<div class="col-xl-4 col-lg-4 col-sm-12">
												<div class="card">
													<div class="card-header">
														<h4 class="card-title"><strong>จำนวนการส่งคำแนะนำ/ติชมแต่ละเดือน</strong></h4>
													</div>
													<div class="card-body">
														<canvas id="barChartContactMonth"></canvas>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="tab-pane" id="search">
										<div class="row">
											<div class="col-xl-3 col-sm-12">
												<a href="<?php echo base_url('board/user')?>">
													<div class="card gradient-14 card-bx">
														<div class="card-body d-flex align-items-center">
															<div class="me-auto text-white">
																<h2 class="text-white"><?php echo $techn_all['total']+$job_all['total'];?></h2>
																<h2 class="text-white">ผู้ใช้งานระบบ</h2>
															</div>
														<i class="flaticon-381-id-card-5 text-white" style="font-size:60px;"></i>
														</div>
													</div>	
												</a>
											</div>
											<div class="col-xl-3 col-sm-12">
												<a href="<?php echo base_url('board/job')?>">
													<div class="card gradient-9 card-bx">
														<div class="card-body d-flex align-items-center">
															<div class="me-auto text-white">
																<h2 class="text-white"><?php echo $job_all['total'];?></h2>
																<h2 class="text-white">งานในระบบ</h2>
															</div>
														<i class="flaticon-381-search-3 text-white" style="font-size:60px;"></i>
														</div>
													</div>	
												</a>
											</div>
											<div class="col-xl-3 col-sm-12">
												<a href="<?php echo base_url('board/review')?>">	
													<div class="card gradient-13 card-bx">
														<div class="card-body d-flex align-items-center">
															<div class="me-auto text-white">
																<h2 class="text-white"><?php echo $contact_count_all['count_all'];?></h2>
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