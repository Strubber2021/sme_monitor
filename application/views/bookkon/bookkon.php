<!--**********************************
	Content body start
***********************************-->
<div class="content-body">
	<div class="container-fluid">
		<!-- row -->
		<div class="row">
			<div class="col-lg-12">
			<form action="<?php echo base_url('bookkon/');?>" method="POST">
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

                    <div class="col-xl-6">
                       <div class="card">

						<div class="card-header">
							<div class="me-auto mb-sm-0 mb-3">
								<h4 class="card-title mb-2"><strong>จำนวนเข้าสู่ระบบ </strong><span class="text-danger">(ปี <?php echo $yearNow; ?>)</span></h4>
								<span>รวมจำนวนเข้าสู่ระบบของผู้ใช้งานทั้งหมดผ่าน Website & Application</span>
							</div>
							<div class="d-flex justify-content-between">
								<span class="badge light badge-primary mb-2" style="font-size: 10px;">
									<i class="fa fa-circle text-primary me-1"></i>ผู้เข้าสู่ระบบ
								</span>
							</div>
						</div>

                        <div class="card-body">
                            <!-- Nav tabs -->
                            <div class="custom-tab-1">
                              <ul class="nav nav-tabs">
			                          <li class="nav-item">
			                            <a class="nav-link active" data-bs-toggle="tab" href="#login1">
			                            <i class="la la-bar-chart me-2"></i> สัปดาห์นี้</a>
			                          </li>
			                          <li class="nav-item">
			                            <a class="nav-link" data-bs-toggle="tab" href="#login2">
			                            <i class="la la-bar-chart me-2"></i> 1 สัปดาห์ที่ผ่านมา</a>
			                          </li>
			                          <li class="nav-item">
			                            <a class="nav-link" data-bs-toggle="tab" href="#login3">
			                              <i class="la la-bar-chart me-2"></i> 2 สัปดาห์ที่ผ่านมา</a>
			                          </li>
			                        </ul>
                              <div class="tab-content">
                                <div class="tab-pane fade show active" id="login1" role="tabpanel">
                                    <div class="pt-4">                                        
                                      <canvas id="BookkonLoginWeek"></canvas>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="login2">
                                    <div class="pt-4">
                                      <canvas id="BookkonLoginWeekPrevious"></canvas>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="login3">
                                    <div class="pt-4">
                                      <canvas id="BookkonLoginWeekPrevious2"></canvas>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        </div>
                    </div>


					<div class="col-xl-6">
                    <div class="card">
						<div class="card-header">
							<div class="me-auto mb-sm-0 mb-3">
								<h4 class="card-title mb-2"><strong>จำนวนลงทะเบียนใหม่ </strong><span class="text-danger">(ปี <?php echo $yearNow; ?>)</span></h4>
								<span>รวมจำนวนผู้ลงทะเบียนใหม่ ผ่านทาง Email & Google</span>
							</div>
							<div class="d-flex justify-content-between">
								<span class="badge light mb-2" style="background-color: #FFEAED;">
									<span class="badge light" style="color: #FE798C; font-size: 10px;">
										<i class="fa fa-circle me-1"></i>Email & Google
									</span>
								</span>
							</div>
						</div>

                        <div class="card-body">
                        <!-- Nav tabs -->
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
		                          <li class="nav-item">
		                            <a class="nav-link active" data-bs-toggle="tab" href="#regis1">
		                            <i class="la la-bar-chart me-2"></i> สัปดาห์นี้</a>
		                          </li>
		                          <li class="nav-item">
		                            <a class="nav-link" data-bs-toggle="tab" href="#regis2">
		                            <i class="la la-bar-chart me-2"></i> 1 สัปดาห์ที่ผ่านมา</a>
		                          </li>
		                          <li class="nav-item">
		                            <a class="nav-link" data-bs-toggle="tab" href="#regis3">
		                              <i class="la la-bar-chart me-2"></i> 2 สัปดาห์ที่ผ่านมา</a>
		                          </li>
		                        </ul>
                            <div class="tab-content">
                              <div class="tab-pane fade show active" id="regis1" role="tabpanel">
                                <div class="pt-4">
                                  <canvas id="RegisterWeekChart"></canvas>
                                </div>
                              </div>
                              <div class="tab-pane fade" id="regis2">
                                  <div class="pt-4">
                                    <canvas id="RegisterWeekPrevious"></canvas>
                                  </div>
                              </div>
                              <div class="tab-pane fade" id="regis3">
                                  <div class="pt-4">
                                    <canvas id="RegisterWeekPrevious2"></canvas>
                                 </div>
                              </div>    
                            </div>
                        	</div>
                    		</div>
                			</div>
            				</div>


							<div class="col-xl-6 col-lg-6 col-sm-12">
								<div class="card">

									<div class="card-header">
										<div class="me-auto mb-sm-0 mb-3">
											<h4 class="card-title mb-2"><strong>จำนวนลงทะเบียนใหม่แต่ละเดือน </strong><span class="text-danger">(ปี <?php echo $yearNow; ?>)</span></h4>
											<span>รวมจำนวนผู้ลงทะเบียนใหม่ในแต่ละเดือน ผ่านทาง Email & Google</span>
										</div>
										<div class="d-flex justify-content-between">
											<span class="badge light mb-2" style="background-color: #C0D5FE;">
												<span class="badge light" style="color: #1B4597; font-size: 10px;">
													<i class="fa fa-circle me-1"></i>ลงทะเบียนใหม่
												</span>
											</span>
										</div>
									</div>

									<div class="card-body">
										
										<div class="row">
											<div class="col-xl-1 col-lg-1"></div>
											<div class="col-xl-10 col-lg-10">
												<canvas id="barAccountMonth"></canvas>
											</div>
											<div class="col-xl-1 col-lg-1"></div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-xl-6 col-lg-6 col-sm-12">
								<div class="card">
									
									<div class="card-header">
										<div class="me-auto mb-sm-0 mb-3">
											<h4 class="card-title mb-2"><strong>จำนวนลงทะเบียนทบรวม </strong><span class="text-danger">(ปี <?php echo $yearNow; ?>)</span></h4>
											<span>รวมจำนวนผู้ลงทะเบียนใหม่และเก่าของทุกเดือนที่ผ่านมา ผ่านทาง Email & Google</span>
										</div>
										<div class="d-flex justify-content-between">
											<span class="badge light mb-2" style="background-color: #C7F2D0;">
												<span class="badge light" style="color: #226A32; font-size: 10px;">
													<i class="fa fa-circle me-1"></i>ลงทะเบียนรวม
												</span>
											</span>
										</div>
									</div>

									<div class="card-body">
										<div class="row">
											<div class="col-xl-1 col-lg-1"></div>
											<div class="col-xl-10 col-lg-10">
												<canvas id="barAccountMonth1"></canvas>
											</div>
											<div class="col-xl-1 col-lg-1"></div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-xl-6 col-lg-6 col-sm-12">
								<div class="card">
									<div class="card-header">
										<div class="me-auto mb-sm-0 mb-3">
											<h4 class="card-title mb-2"><strong>ผู้ใช้งานใหม่ทั้งหมดแต่ละเดือน </strong><span class="text-danger">(ปี <?php echo $yearNow; ?>)</span></h4>
											<span>รวมจำนวนผู้ใช้งานใหม่ (แอดมิน & พนักงาน) ทั้งหมดในแต่ละเดือน</span>
										</div>
										<div class="d-flex justify-content-between">
											<span class="badge light mb-2" style="background-color: #FEECD9;">
												<span class="badge light" style="color: #FEA042; font-size: 10px;">
													<i class="fa fa-circle me-1"></i>ผู้ใช้งาน
												</span>
											</span>
										</div>
									</div>

									<div class="card-body">
										<div class="row">
											<div class="col-xl-1 col-lg-1"></div>
											<div class="col-xl-10 col-lg-10">
												<br>
												<canvas id="barUsersMonth"></canvas>
											</div>
											<div class="col-xl-1 col-lg-1"></div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-xl-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"><strong>เปอร์เซ็นจำนวนผู้ใช้งานในระบบ</strong></h4>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <span class="badge light mb-2" style="background-color: #F5D8D9;">
													<span style="color:#D13D45;"><i class="fa fa-circle me-1"></i>
                                                    แอดมิน </span>
                                                </span>
                                                <span class="badge light mb-2" style="background-color: #DEE9F3;">
													<span style="color:#5D95C5;"><i class="fa fa-circle me-1"></i>
                                                    พนักงาน </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                      <div class="row">
										<div class="col-xl-2"></div>
                                        <div class="col-xl-5 col-6 d-flex align-items-center col-sm-6 mb-sm-0 mb-2">
                                          <div class="me-4 mt-5">
                                            <span class="donut" data-peity='{ "fill": ["#D13D45", "rgba(246, 246, 246)"],   "innerRadius": 45, "radius": 10}'><?php echo $part_admin; ?>/8</span>
                                            <br><br>
                                            <center><h2><?php echo round($percent_admin) . '%';?></h2>
                                            <span class="fs-18">แอดมิน</span></center>
                                          </div>
                                        </div>

                                        <div class="col-xl-4 col-6 d-flex align-items-center col-sm-6 mb-sm-0 mb-2">
                                          <div class="me-4 mt-5">
                                            <span class="donut" data-peity='{ "fill": ["#5D95C5", "rgba(246, 246, 246)"], "innerRadius": 45, "radius": 10}'><?php echo $part_emp; ?>/8</span>
                                            <br><br>
                                            <center><h2><?php echo round($percent_emp) . '%'; ?></h2>
                                            <span class="fs-18">พนักงาน</span></center>
                                          </div>
                                        </div>
										<div class="col-xl-1"></div>
                                      </div>
                                  </div>
                              </div>
                          </div>


							<div class="col-xl-3 col-sm-12">
                                <div class="card">
                                    <div class="card-header border-0 pb-0">
                                        <h4 class="mb-0 card-title"><strong>จำนวนผู้สมัครทั้งหมด</strong></h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="progress mb-4" style="height:13px;">
                                            <div class="progress-bar gradient-6 progress-animated"
                                                style="width: <?php echo round($percent_register_all) . '%'; ?>; height:13px;"
                                                role="progressbar">
                                                <span class="sr-only"><?php echo round($percent_register_all) . '%'; ?>
                                                    เปอร์เซ็น</span>
                                            </div>
                                        </div>
                                        <div class="d-flex mt-4 progress-bar-legend align-items-center justify-content-between">
                                            <div class="d-flex">
                                                <span class="marker gradient-6"></span>
                                                <div>
                                                    <p class="status">ผู้สมัคร</p>
                                                    <span class="result"><?php echo $register_all;?></span>
                                                </div>
                                            </div>
                                        </div>
										<br><br>

                                        <div class="card-body">
                                            <div class="text-center">
                                                <div class="profile-photo">
                                                    <span class="text-primary">
                                                        <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg"
                                                            width="40" height="40" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-user">
                                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="12" cy="7" r="4"></circle>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <h4 class="mt-4 mb-1">จำนวนผู้สมัครทั้งหมด</h4>
                                                <br><br>
                                                <div class="row">
                                                    <div class="col-2"></div>
                                                    <div class="col-8">
                                                        <div class="bgl-primary rounded p-2">
                                                            <strong>
                                                                <h3><span data-toggle="tooltip" data-placement="left"
                                                                        title="ผู้สมัครวันก่อนหน้า"
                                                                        style="cursor: context-menu;"><?php echo $register_yesterday; ?>
                                                                        /</span> <b><?php echo $register_all;?></b>
                                                                </h3>
                                                            </strong>
                                                        </div>
                                                    </div>
                                                    <div class="col-2"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

							<div class="col-xl-3 col-sm-12">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="mb-0 card-title"><strong>จำนวนผู้ใช้งานระบบทั้งหมด</strong></h4>
									</div>
									<div class="card-body">
										<div class="progress mb-4" style="height:13px;">
											<div class="progress-bar gradient-12 progress-animated" style="width: <?php echo round($percent_admin).'%';?>; height:13px;" role="progressbar">
												<span class="sr-only"><?php echo round($percent_admin);?></span>
											</div>
										</div>
										<div class="progress mb-4" style="height:13px;">
											<div class="progress-bar gradient-3 progress-animated" style="width: <?php echo round($percent_emp).'%';?>; height:13px;" role="progressbar">
												<span class="sr-only"><?php echo round($percent_emp);?></span>
											</div>
										</div>
										
										<div class="d-flex mt-4 progress-bar-legend align-items-center justify-content-between">
											<div class="d-flex">
												<span class="marker gradient-6"></span>
												<div>
													<p class="status">แอดมิน</p>
													<span class="result"><?php echo $admin_all?></span>
												</div>
											</div>
											<div class="d-flex">
												<span class="marker gradient-3"></span>
												<div>
													<p class="status">พนักงาน</p>
													<span class="result"><?php echo $emp_all;?></span>
												</div>
											</div>
											
										</div>

										<div class="card-body">
											<div class="text-center">
												<div class="profile-photo">
													<span class="text-success">
														<svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
															<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
															<circle cx="12" cy="7" r="4"></circle>
														</svg>
													</span>
												</div>
												<h4 class="mt-4 mb-1"><center>จำนวนผู้ใช้งานระบบทั้งหมด</center></h4>	
												<br>													
												<div class="row">
												<div class="col-1"></div>
												<div class="col-10"><br>
													<div class="bgl-success rounded p-2">
														<strong><h3><span data-toggle="tooltip" data-placement="left" title="ผู้ใช้งานระบบวันก่อนหน้า" style="cursor: context-menu;"><?php echo $user_yesterday; ?> /</span> <b><?php echo $user_total;?></b></h3></strong>
													</div>
												</div>
												<div class="col-1"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>


						

						<div class="col-xl-6 col-lg-6">
							<div class="card" style="height: 470px;">
								<div class="card-header  border-0 pb-0">
									<h4 class="card-title"><strong>5 บัญชี</strong> ที่เพิ่มเข้ามาใหม่ล่าสุด</h4>

									<a href="<?php echo base_url('bookkon/company');?>" class="btn btn-sm light btn-secondary" target="_blank">
									<i class="fas fa-user-check" style="font-size: 12px;">
										ดูทั้งหมด</i></a>
								</div>
								<div class="card-body"> 
									<div id="DZ_W_Todo11" class="widget-media dz-scroll height370">
										<ul class="timeline">
											<?php foreach($company_recent as $key => $row){?>
											<li>
												<div class="timeline-panel">
													<div class="media me-2 media-primary">
														<h5 class="mt-2"><?php echo $key+1; ?>.</h5>
													</div>
													<div class="media-body">
														<h5 class="mb-1"><?php echo $row['username']; ?></h5>
														<p class="text-black op8 mb-sm-0 mb-3 me-4">ชื่อองค์กร: <?php echo $row['name']; ?></p>
														<small class="d-block">สมัครเมื่อ <?php echo date('d/m/Y H:i',strtotime($row["created_at"])); ?> น.</small>
													</div>
												</div>
											</li>
											<?php } ?>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-6 col-lg-6">
			                <div class="card" style="height: 420px;">
			                    <div class="card-header border-0">
			                        <h4 class="card-title"><strong>คำแนะนำและติชมจากหน้า PR bukkhon.com</strong></h4>
			                        <div class="btn-group dropend mb-1">
			                        </div>
			                    </div>
			                    <div class="card-body">
			                    <div id="DZ_W_Todo3" class="widget-media dz-scroll height370">
			                      <ul class="timeline">
			                        <?php foreach ($comment_pr as $key => $row) { ?>
			                        <li>
			                          <div class="timeline-panel">
			                            <div class="media me-2 media-success">
			                              <h5 class="mt-2"><?php echo $key + 1; ?>.</h5>
			                            </div>
			                            <div class="media-body">
			                             	<h5 class="text-black op8 mb-sm-0 mb-1 mt-1 me-4"><?php echo $row['remark']; ?></h5>
											<small class="d-block">วันที่ส่งข้อความ <?php echo date('d/m/Y H:i',strtotime($row["created_at"])); ?> น.</small>
			                            </div>
			                          </div>
			                        </li>
			                      <?php  }?>
			                      </ul>
			                    </div>
			                  </div>

			                </div>
			              </div>



						<div class="col-xl-6 col-lg-6">
							<div class="card" style="height: 420px;">
								<div class="card-header border-0 pb-0">
									<h4 class="card-title"><strong>คำแนะนำและติชมจากผู้ใช้</strong></h4>
									<div class="btn-group dropend mb-1">
									</div>
								</div>
								<div class="card-body"> 
									<div id="DZ_W_Todo2" class="widget-media dz-scroll height370">
										<ul class="timeline">

										<?php if(!empty($review_program)){
											foreach($review_program as $row){
												if($row['company_id'] > 0){	
												?>
											<li>
												<div class="timeline-panel">
													<div class="media me-2">
														<img alt="image" width="50" src="<?php echo base_url();?>assets/images/avatar/1.png">
													</div>
													<div class="media-body">
														<h5 class="mb-1"><?php echo $row['username'];?> 
														<span class="badge light badge-primary fs-12">แอดมิน</span>
														</h5>
													<ul class="star-review">
														<?php 
														$percent_review = ($row['total_score']/$row['max_score'])*100;
														$raet = $percent_review/20;
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

													<p class="text-black op8 mb-sm-0 mb-1 mt-1 me-4"><?php echo $row['remark']; ?></p>
													<small class="d-block">วันที่ส่งข้อความ <?php echo date('d/m/Y H:i',strtotime($row["created_at"])); ?> น.</small>
													</div>
													<button type="button" class="btn btn-primary light sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg<?php echo $row['id']; ?>">
														<i class="flaticon-381-search-1"></i>
													</button>
													<!-- Large modal -->
													<div class="modal fade bd-example-modal-lg<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
														<div class="modal-dialog modal-lg">
															<div class="modal-content">
																<div class="modal-body">
																	<div class="row mt-3">
																		<div class="col-xl-3 text-center">
																			<img class="dz-media me-4" src="<?php echo base_url();?>assets/images/avatar/1.png">
																		</div>
																		<div class="col-xl-9">
																			<h3 class="card-title mb-3"><strong>รายละเอียดการประเมิน</strong></h3>
																			<?php 
																				$result_topic = json_decode($row['data'], true);
																			?>
																			<div class="row">
																				<div class="col-xl-6 col-xxl-6">	
																					<ul class="user-info-list">
																						<li>
																							<h5 class="mb-2"><strong>หัวข้อการประเมิน</strong></h5>
																						</li>
																						<?php foreach($result_topic as $value){ ?>
																							<li>
																								<h5 class="mb-2"><?php echo $value['topic_id'].'. '.$value['topic']; ?></h5>
																							</li>
																						<?php } ?>
																					</ul>
																				</div>
											
																				<div class="col-xl-6 col-xxl-6">	
																					<ul class="user-info-list text-center">
																						<li>
																							<h5 class="mb-2"><strong>ผลการประเมิน</strong></h5>
																						</li>
																						<?php foreach($result_topic as $value){ ?>
																							<li>
																								<h5 class="mb-2"><?php echo $value['score']; ?> คะแนน</h5>
																							</li>
																						<?php } ?>
																					</ul>
																				</div>	
																			</div>

																			<div class="row mb-3">
																				<div class="col-xl-12 col-xxl-12">	
																						<h5 class="mb-2 mt-3"><strong>ให้คำแนะนำ/ติชมเพิ่มเติม</strong></h5>
																						<h6 class="mb-1"><?php echo $row['remark']; ?></h6>
																				</div>
																			</div>
																			<?php 	
																				if($percent_review > 87.5){
																					$part = 8;
																				}else if($percent_review > 75){
																					$part = 7;
																				}else if($percent_review > 62.5){
																					$part = 6;
																				}else if($percent_review > 50){
																					$part = 5;
																				}else if($percent_review > 37.5){
																					$part = 4;
																				}else if($percent_review > 25){
																					$part = 3;
																				}else if($percent_review > 12.5){
																					$part = 2;
																				}else if($percent_review > 0){
																					$part = 1;
																				}else{
																					$part = 0;
																				}
																			?>

																			<div class="row mt-5 align-items-center">
																				<div class="col-xl-6 d-flex align-items-center col-sm-6 mb-sm-0 mb-3">
																					<div class="me-4">
																						<span class="donut" data-peity='{ "fill": ["#e83e8c", "rgba(246, 246, 246)"],   "innerRadius": 45, "radius": 10}'><?php echo $part; ?>/8</span>
																					</div>
																					<div>
																						<h2><?php echo round($percent_review).'%';?></h2>
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

										<?php }else{?>
											<li>
												<div class="timeline-panel">
													<div class="media me-2">
														<img alt="image" width="50" src="<?php echo base_url();?>assets/images/avatar/1.jpg">
													</div>
													<div class="media-body">
														<span class="badge light badge-info fs-12">บุคคลภายนอก</span>
													<p class="text-black op8 mb-sm-0 mb-1 mt-1 me-4"><?php echo $row['remark']; ?></p>
													<small class="d-block">วันที่ส่งข้อความ <?php echo date('d/m/Y H:i',strtotime($row["created_at"])); ?> น.</small>
													</div>

												</div>
											</li>
											<?php }  
										} //foreach
										} // if?>	

										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-6 col-lg-6">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title"><strong>จำนวนการประเมินโปรแกรมทั้งหมด</strong></h4>
									<div class="row">
										<div class="col-xl-12">
											<span class="badge light badge-primary mb-2">
												<i class="fa fa-circle text-primary me-1"></i>
												แอดมิน
											</span>	
											<span class="badge light badge-warning mb-2">
												<i class="fa fa-circle text-warning me-1"></i>
												พนักงาน
											</span>
											<span class="badge light badge-success mb-2">
												<i class="fa fa-circle text-success me-1"></i>
												บุคคลภายนอก
											</span>
										</div>	
									</div>
								</div>
								<div class="card-body">
									<br>
									<div id="reviewMonthChart" class="ct-chart ct-golden-section chartlist-chart"></div>	
								</div>
							</div>
						</div>

						<div class="col-xl-6 col-lg-6 col-sm-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title"><strong>จำนวนการส่งคำแนะนำ/ติชมแต่ละเดือน</strong></h4>
									<div class="row">
										<div class="col-xl-12">
											<span class="badge light mb-2" style="background-color: #E7EFFE;">
												<span style="color:#1F6AFD;"><i class="fa fa-circle me-1"></i>
												คำแนะนำ/ติชม</span>
											</span>
										</div>
									</div>
								</div>
								<div class="card-body">
									<canvas id="reviewMonthALL"></canvas>
								</div>
							</div>
						</div>

						<div class="col-xl-6 col-sm-12">
							<div class="card text-center">
								<div class="card-header">
									<h4 class="card-title"><strong>เปอร์เซ็นผลการประเมินโปรแกรม</strong></h4>	
									<p>&nbsp;</p>
								</div>
								<div class="card-body">
									<div id="overallChart"></div>
									<br>
									<h2><?php echo round($percent_program).'%'; ?></h2>
									<br>
									<span class="fs-16 text-black">ความพึงพอใจในโปรแกรม : <strong><?php echo $level_program; ?></strong></span>
								</div>
							</div>
						</div>

					</div>
				</div>
				
					<div class="tab-pane" id="search">
						<div class="row">
							<div class="col-xl-3 col-sm-12">
								<a href="<?php echo base_url('bookkon/user')?>">
									<div class="card gradient-14 card-bx">
										<div class="card-body d-flex align-items-center">
											<div class="me-auto text-white">
												<!-- <h2 class="text-white"><?php echo $emp_all; ?></h2> -->
												<h2 class="text-white"><?php echo $user_total; ?></h2>
												<h2 class="text-white">ผู้ใช้งานระบบ</h2>
											</div>
										<i class="flaticon-381-id-card-5 text-white" style="font-size:60px;"></i>
										</div>
									</div>	
								</a>
							</div>
							<div class="col-xl-3 col-sm-12">
								<a href="<?php echo base_url('bookkon/review')?>">
									<div class="card gradient-13 card-bx">
										<div class="card-body d-flex align-items-center">
											<div class="me-auto text-white">
												<h2 class="text-white"><?php echo $review_comment; ?></h2>
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