<!--**********************************
  Content body start
***********************************-->
<div class="content-body">
	<div class="container-fluid">
		<div class="row">
		<!-- row -->

			<div class="col-lg-12">
				<form action="<?php echo base_url('ninechang/'); ?>" method="POST">
					<div class="d-flex mb-4 justify-content-between align-items-center flex-wrap">
						<div class="card-tabs mt-3 mt-sm-0">
							<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-bs-toggle="tab" href="#graph" role="tab">
								<i class="flaticon-041-graph"></i> ข้อมูลวิเคราะห์</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-bs-toggle="tab" href="#search" role="tab">
								<i class="flaticon-381-search-1"></i> ค้นหาแบบเจาะจง</a>
							</li>
							</ul>
						</div>
						<div class="mb-3 col-md-5"></div>
						<div class="mb-3 col-md-2">
							<label>ช่วงวันที่ดู</label>
							<input class="form-control input-daterange-datepicker" type="text" name="daterange"
								value="<?php echo $thisyear; ?>">
						</div>
						<div class="mb-3 col-md-1" align="right">
							<br>&nbsp;
							<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-search"></i>&nbsp; ค้นหา</button>
						</div>
					</div>
				</form>
			</div>
      
		<!-- ======================= -->
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
									<span class="badge light badge-primary mb-2">
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
												<canvas id="barLoginWeek"></canvas>
											</div>
										</div>
										<div class="tab-pane fade" id="login2">
											<div class="pt-4">
												<canvas id="barLoginPrevious"></canvas>
											</div>
										</div>
										<div class="tab-pane fade" id="login3">
											<div class="pt-4">
												<canvas id="barLoginPrevious2"></canvas>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

              	<div class="col-xl-6 col-lg-6">
					<div class="card">
						<div class="card-header">
							<div class="me-auto mb-sm-0 mb-3">
								<h4 class="card-title mb-2"><strong>จำนวนลงทะเบียนใหม่</strong> <span class="text-danger">(ปี <?php echo $yearNow; ?>)</span></h4>
								<span>รวมจำนวนผู้ลงทะเบียนใหม่ ผ่านทาง Facebook & Google & Email</span>
							</div>
							<div class="d-flex justify-content-between">
								<div class="row">
									<div class="col-xl-12">
										<span class="badge light badge-primary mb-2">
											<i class="fa fa-circle text-primary me-1"></i>
											Facebook
										</span>
										<span class="badge light badge-warning mb-2">
											<i class="fa fa-circle text-warning me-1"></i>
											Google
										</span>
										<span class="badge light mb-2" style="background-color:#FFEAED;">
											<span style="color:#FE798C;"><i class="fa fa-circle me-1"></i>
											Email</span>
										</span>
									</div>
								</div>
							</div>
						</div>

						<div class="card-body">
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
											<canvas id="regis_week"></canvas>
										</div>
									</div>
									<div class="tab-pane fade" id="regis2">
										<div class="pt-4">
											<canvas id="regis_previous"></canvas>
										</div>
									</div>
									<div class="tab-pane fade" id="regis3">
										<div class="pt-4">
											<canvas id="regis_previous2"></canvas>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

              <div class="col-xl-6 col-lg-6">
                <div class="card">
					<div class="card-header">
						<div class="me-auto mb-sm-0 mb-3">
							<h4 class="card-title mb-2"><strong>จำนวนลงทะเบียนใหม่แต่ละเดือน</strong> <span class="text-danger">(ปี <?php echo $yearNow; ?>)</span></h4>
							<span>รวมจำนวนผู้ลงทะเบียนใหม่ในแต่ละเดือน ผ่านทาง Facebook & Google & Email</span>
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
						<div class="col-xl-12 col-lg-12">
							<canvas id="barAccountMonth"></canvas>
						</div>
						</div>
					</div>
					</div>
				</div>

              <div class="col-xl-6 col-lg-6">
                <div class="card">
				  	<div class="card-header">
						<div class="me-auto mb-sm-0 mb-3">
							<h4 class="card-title mb-2"><strong>จำนวนลงทะเบียนทบรวม</strong> <span class="text-danger">(ปี <?php echo $yearNow; ?>)</span></h4>
							<span>รวมจำนวนผู้ลงทะเบียนใหม่และเก่าของทุกเดือนที่ผ่านมา ผ่านทาง Facebook & Google & Email</span>
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
							<div class="col-xl-12 col-lg-12">
								<canvas id="barUsersMonthcount"></canvas>
							</div>
						</div>
					</div>
              </div>
            </div>

            <div class="col-xl-6 col-lg-6">
              <div class="card">

                <div class="card-header">
                  <div class="me-auto mb-sm-0 mb-3">
                    <h4 class="card-title mb-2"><strong>ผู้ใช้งานใหม่ทั้งหมดแต่ละเดือน</strong> <span class="text-danger">(ปี <?php echo $yearNow; ?>)</span></h4>
                    <span>รวมจำนวนผู้ใช้งานใหม่ (แอดมิน & นายช่าง & ผู้แจ้งซ่อม) ทั้งหมดในแต่ละเดือน</span>
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
                    <div class="col-xl-12 col-lg-12">
                      <br>
                        <canvas id="barUsersMonth"></canvas>
                    </div>
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
                                แอดมิน</span>
                            </span>
                            <span class="badge light mb-2" style="background-color: #DEE9F3;">
                                <span style="color:#5D95C5;"><i class="fa fa-circle me-1"></i>
                                ผู้แจ้งซ่อม</span>
                            </span>
                            <span class="badge light mb-2"style="background-color: #D8D2E6;">
                                <span style="color:#6463A3;"><i class="fa fa-circle me-1"></i>
                                นายช่าง</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-xl-4 col-6 d-flex align-items-center col-sm-6 mb-sm-0 mb-2">
                      <div class="me-4 mt-5">
                        <span class="donut" data-peity='{ "fill": ["#D13D45", "rgba(246, 246, 246)"], "innerRadius": 45, "radius": 10}'><?php echo $part_admin; ?>/8</span>
                        <br><br><center><h2><?php echo $percent_admin. '%'; ?></h2>
                        <span class="fs-18">แอดมิน</span></center>
                      </div>
                    </div>
                    <div class="col-xl-4 col-6 d-flex align-items-center col-sm-6 mb-sm-0 mb-2">
                      <div class="me-4 mt-5">
                        <span class="donut" data-peity='{ "fill": ["#5D95C5", "rgba(246, 246, 246)"], "innerRadius": 45, "radius": 10}'><?php echo $part_employee1; ?>/8</span>
                        <br><br><center><h2><?php echo $percent_employee1. '%'; ?></h2>
                        <span class="fs-18">ผู้แจ้งซ่อม</span></center>
                      </div>
                    </div>
                    <div class="col-xl-4 col-6 d-flex align-items-center col-sm-6 mb-sm-0 mb-2">
                      <div class="me-4 mt-5">
                        <span class="donut" data-peity='{ "fill": ["#B1A6CE", "rgba(246, 246, 246)"], "innerRadius": 45, "radius": 10}'><?php echo $part_employee2; ?>/8</span>
                        <br><br><center><h2><?php echo $percent_employee2. '%'; ?></h2>
                        <span class="fs-18">นายช่าง</span></center>
                      </div>
                    </div>
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
                        style="width: <?php echo $percent_facebook. '%'; ?>; height:13px;"
                        role="progressbar">
                        <span class="sr-only"><?php echo $percent_facebook. '%'; ?>
                            เปอร์เซ็น</span>
                    </div>
                  </div>
                  <div class="progress mb-4" style="height:13px;">
                    <div class="progress-bar gradient-2 progress-animated"
                        style="width: <?php echo $percent_google. '%'; ?>; height:13px;"
                        role="progressbar">
                        <span class="sr-only"><?php echo $percent_google. '%'; ?>
                            เปอร์เซ็น</span>
                    </div>
                  </div>
                  <div class="progress default-progress" style="height:13px;">
                    <div class="progress-bar gradient-8 progress-animated"
                        style="width: <?php echo $percent_email. '%'; ?>; height:13px;"
                        role="progressbar">
                        <span class="sr-only"><?php echo $percent_email. '%'; ?>
                            เปอร์เซ็น</span>
                    </div>
                  </div>
                  <div class="d-flex mt-4 progress-bar-legend align-items-center justify-content-between">
                      <div class="d-flex">
                          <span class="marker gradient-6"></span>
                          <div>
                              <p class="status">Facebook</p>
                              <span
                                  class="result"><?php echo $regis_facebook_all; ?></span>
                          </div>
                      </div>
                      <div class="d-flex">
                          <span class="marker gradient-2"></span>
                          <div>
                              <p class="status">Google</p>
                              <span
                                  class="result"><?php echo $regis_google_all; ?></span>
                          </div>
                      </div>
                      <div class="d-flex">
                          <span class="marker gradient-8"></span>
                          <div>
                              <p class="status">Email</p>
                              <span class="result"><?php echo $regis_email_all; ?></span>
                          </div>
                      </div>
                  </div>

                    <div class="card-body">
                        <div class="text-center">
                            <div class="profile-photo">
                                <span class="text-primary">
                                    <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg"
                                        width="30" height="30" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </span>
                            </div>
                            <h4 class="mt-4 mb-1">จำนวนผู้สมัครทั้งหมด</h4>
                            <br>
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-8">
                                    <div class="bgl-primary rounded p-2">
                                        <strong>
                                            <h3><span data-toggle="tooltip" data-placement="left"
                                                    title="ผู้สมัครวันก่อนหน้า"
                                                    style="cursor: context-menu;"><?php echo $total_yesterday; ?>
                                                    /</span> <b><?php echo $result_total1; ?></b>
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
                      <div class="progress-bar gradient-12 progress-animated"
                          style="width: <?php echo $percent_admin. '%'; ?>; height:13px;"
                          role="progressbar">
                          <span class="sr-only"><?php echo $percent_admin; ?></span>
                      </div>
                  </div>
                  <div class="progress mb-4" style="height:13px;">
                      <div class="progress-bar gradient-3 progress-animated"
                          style="width: <?php echo $percent_employee1. '%'; ?>; height:13px;"
                          role="progressbar">
                          <span class="sr-only"><?php echo $percent_employee1; ?></span>
                      </div>
                  </div>
                  <div class="progress default-progress" style="height:13px;">
                      <div class="progress-bar gradient-2 progress-animated"
                          style="width: <?php echo $percent_employee2. '%'; ?>; height:13px;"
                          role="progressbar">
                          <span class="sr-only"><?php echo $percent_employee2; ?></span>
                      </div>
                  </div>
                  <div
                      class="d-flex mt-4 progress-bar-legend align-items-center justify-content-between">
                      <div class="d-flex">
                          <span class="marker gradient-6"></span>
                          <div>
                              <p class="status">แอดมิน</p>
                              <span class="result"><?php echo $admin_all; ?></span>
                          </div>
                      </div>
                      <div class="d-flex">
                          <span class="marker gradient-3"></span>
                          <div>
                              <p class="status">ผู้แจ้งซ่อม</p>
                              <span class="result"><?php echo $employee1_all; ?></span>
                          </div>
                      </div>
                      <div class="d-flex">
                          <span class="marker gradient-2"></span>
                          <div>
                              <p class="status">นายช่าง</p>
                              <span class="result"><?php echo $employee2_all; ?></span>
                          </div>
                      </div>
                  </div>

                  <div class="card-body">
                      <div class="text-center">
                          <div class="profile-photo">
                              <span class="text-success">
                                  <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg"
                                      width="30" height="30" viewBox="0 0 24 24" fill="none"
                                      stroke="currentColor" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round"
                                      class="feather feather-user">
                                      <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                      <circle cx="12" cy="7" r="4"></circle>
                                  </svg>
                              </span>
                          </div>
                          <h4 class="mt-4 mb-1">
                              <center>จำนวนผู้ใช้งานระบบทั้งหมด</center>
                          </h4>
                          <br>
                          <div class="row">
                              <div class="col-2"></div>
                              <div class="col-8">
                                  <div class="bgl-success rounded p-2">
                                      <strong>
                                      <h3><span data-toggle="tooltip" data-placement="left"
                                                  title="ผู้ใช้งานวันก่อนหน้า"
                                                  style="cursor: context-menu;"><?php echo $user_yesterday; ?>
                                                  /</span> <b><?php echo $user_total1; ?></b> </h3>
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


                <div class="col-xl-6">
                  <div class="card" style="height: 470px;">
                      <div class="card-header  border-0 pb-0">
                        <h4 class="card-title"><strong>5 บัญชี</strong> ที่เพิ่มเข้ามาใหม่ล่าสุด</h4>
                        <a href="<?php echo base_url('ninechang/company'); ?>"
                            class="btn btn-sm light btn-secondary" target="_blank">
                        <i class="fas fa-user-check" style="font-size: 12px;"> ดูทั้งหมด</i></a>
                      </div>
                      <div class="card-body">
                        <div id="DZ_W_Todo1" class="widget-media dz-scroll height370">
                          <ul class="timeline">
                              <?php foreach ($company_recent as $key => $row): ?>
                              <li>
                                <div class="timeline-panel">
                                  <div class="media me-2 media-primary">
                                    <h5 class="mt-2"><?php echo $key + 1; ?>.</h5>
                                  </div>
                                  <div class="media-body">
                                    <h5 class="mb-1"><?php echo $row['email']; ?></h5>
                                    <h5 class="text-black op8 mb-sm-0 mb-3 me-4">ชื่อองค์กร:
                                        <?php echo $row['company_name']; ?></h5>
                                    <small class="d-block">สมัครเมื่อ
                                        <?php echo date('d/m/Y H:i',strtotime($row["created"])) ?>
                                        น.</small>
                                  </div>
                                </div>
                              </li>
                              <?php endforeach; ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>

               <div class="col-xl-6 col-lg-6">
                <div class="card" style="height: 420px;">
                    <div class="card-header border-0">
                        <h4 class="card-title"><strong>คำแนะนำและติชมจากหน้า PR ninechang.net</strong></h4>
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
                              <h5 class="mb-1"><?php echo $row['comment']; ?></h5>
                              <small class="text-black op8 mb-sm-0 mb-3 me-4">วันที่:
                                <?php echo date('d/m/Y H:i',strtotime($row["ts_create"])) ?>
                              น.</small>
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
                    <div class="card-header border-0">
                        <h4 class="card-title"><strong>คำแนะนำและติชมจากผู้ใช้โปรแกรม</strong></h4>
                        <div class="btn-group dropend mb-1">
                        </div>
                    </div>
                    <div class="card-body">
                    <div id="DZ_W_Todo2" class="widget-media dz-scroll height370">
                      <ul class="timeline">
                        <?php foreach ($comment as $key => $row) { ?>
                        <li>
                          <div class="timeline-panel">
                            <div class="media me-2">
                              <img alt="image" width="50" src="<?php echo base_url(); ?>assets/images/avatar/1.png">
                            </div>
                            <div class="media-body">
                              <h5 class="mb-1">
                                <?php echo $row['first_name'] . " " . $row['last_name']; 
                                if (!empty($row['oauth_provider'])) {
                                  echo '<span class="badge light badge-primary fs-12">แอดมิน</span>';
                                }else{
                                  if ($row['employees_type'] == 1) {
                                    echo '<span class="badge light badge-warning fs-12">ผู้แจ้งซ่อม</span>';
                                  } else {
                                    echo '<span class="badge light badge-success fs-12">นายช่าง</span>';
                                  }
                                }?>
                              </h5>
                            <ul class="star-review">
                            <?php
                            //$score_max = 20;
                            $percent_comment = ($row['sum_evaluate'] / 20) * 100;
                            $raet = $percent_comment / 20;
                            if ($raet >= 4.5) {
                              echo '
                              <li><i class="fas fa-star orange"></i></li>
                              <li><i class="fas fa-star orange"></i></li>
                              <li><i class="fas fa-star orange"></i></li>
                              <li><i class="fas fa-star orange"></i></li>
                              <li><i class="fas fa-star orange"></i></li>';
                            } elseif ($raet >= 3.5) {
                              echo '
                              <li><i class="fas fa-star orange"></i></li>
                              <li><i class="fas fa-star orange"></i></li>
                              <li><i class="fas fa-star orange"></i></li>
                              <li><i class="fas fa-star orange"></i></li>
                              <li><i class="fas fa-star"></i></li>';
                            } elseif ($raet >= 2.5) {
                              echo '
                              <li><i class="fas fa-star orange"></i></li>
                              <li><i class="fas fa-star orange"></i></li>
                              <li><i class="fas fa-star orange"></i></li>
                              <li><i class="fas fa-star"></i></li>
                              <li><i class="fas fa-star"></i></li>';
                            } elseif ($raet >= 1.5) {
                              echo '
                              <li><i class="fas fa-star orange"></i></li>
                              <li><i class="fas fa-star orange"></i></li>
                              <li><i class="fas fa-star"></i></li>
                              <li><i class="fas fa-star"></i></li>
                              <li><i class="fas fa-star"></i></li>';
                            } elseif ($raet >= 1) {
                              echo '
                              <li><i class="fas fa-star orange"></i></li>
                              <li><i class="fas fa-star"></i></li>
                              <li><i class="fas fa-star"></i></li>
                              <li><i class="fas fa-star"></i></li>
                              <li><i class="fas fa-star"></i></li>';
                            } else {
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
                          <small class="d-block">วันที่ส่งข้อความ <?php echo date('d/m/Y H:i', strtotime($row["created_at"])); ?>
                              น.</small>
                      </div>

                <?php if (!empty($row['oauth_provider'])) {
                echo '<button type="button" class="btn btn-primary light sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg' . $row['evaluate_id'] . '">
                  <i class="flaticon-381-search-1"></i>
                </button>';
              } else {
                if ($row['employees_type'] == 1) {
                  echo '<button type="button" class="btn btn-warning light sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg' . $row['evaluate_id'] . '">
                      <i class="flaticon-381-search-1"></i>
                    </button>';
                } else {
                  echo '<button type="button" class="btn btn-success light sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg' . $row['evaluate_id'] . '">
                      <i class="flaticon-381-search-1"></i>
                    </button>';
                }
              } ?>

              <!-- Large modal -->
              <div class="modal fade bd-example-modal-lg<?php echo $row['evaluate_id']; ?>"
                  tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-body">
                      <div class="row mt-3">
                        <div class="col-xl-3">
                          <center><img class="dz-media me-4" src="<?php echo base_url('assets/images/avatar/1.png') ?>">
                            </center>
                        </div>
                        <div class="col-xl-9">
                          <h3 class="card-title mb-3">
                            <strong>รายละเอียดการประเมิน</strong>
                          </h3>
                          <div class="row">
                            <div class="col-xl-6 col-xxl-6">
                              <ul class="user-info-list">
                                <li> <h5 class="mb-2"><strong>หัวข้อการประเมิน</strong></h5> </li>
                                <?php foreach ($comment_topic as $key => $value) {
                                echo '<li>
                                  <h5 class="mb-2">' . ($key + 1) . '. ' . $value['evaluate_topic'] . '</h5>
                                </li>';
                                } ?>
                              </ul>
                            </div>
                                                                  
                            <div class="col-xl-6 col-xxl-6">
                            <ul class="user-info-list text-center">
                              <li><h5 class="mb-2"> <strong>ผลการประเมิน</strong></h5></li>
                              <li>
                                <h5 class="mb-2">
                                <?php if ($row['evaluate_topic_1'] == '4') {
                                    echo "ดีมาก";
                                  } else if ($row['evaluate_topic_1'] == '3') {
                                    echo "ดี";
                                  } else if ($row['evaluate_topic_1'] == '2') {
                                    echo "พอใช้";
                                  } else {
                                    echo "ปรับปรุง";
                                  }
                                ?>
                                </h5>
                              </li>

                              <li>
                                 <h5 class="mb-2">
                                  <?php if ($row['evaluate_topic_2'] == 4) {
                                    echo 'ดีมาก';
                                  } else if ($row['evaluate_topic_2'] == 3) {
                                    echo 'ดี';
                                  } else if ($row['evaluate_topic_2'] == 2) {
                                    echo 'พอใช้';
                                  } else {
                                    echo 'ปรับปรุง';
                                  }
                                  ?>
                                </h5>
                              </li>

                              <li>
                                <h5 class="mb-2">
                                <?php if ($row['evaluate_topic_3'] == 4) {
                                    echo 'ดีมาก';
                                  } else if ($row['evaluate_topic_3'] == 3) {
                                    echo 'ดี';
                                  } else if ($row['evaluate_topic_3'] == 2) {
                                    echo 'พอใช้';
                                  } else {
                                    echo 'ปรับปรุง';
                                  }
                                  ?>
                                </h5>
                              </li>

                              <li>
                                <h5 class="mb-2">
                                  <?php if ($row['evaluate_topic_4'] == 4) {
                                    echo 'ดีมาก';
                                  } else if ($row['evaluate_topic_4'] == 3) {
                                    echo 'ดี';
                                  } else if ($row['evaluate_topic_4'] == 2) {
                                    echo 'พอใช้';
                                  } else {
                                    echo 'ปรับปรุง';
                                  }
                                  ?>
                                </h5>
                              </li>

                              <li>
                                <h5 class="mb-2">
                                <?php if ($row['evaluate_topic_5'] == 4) {
                                    echo 'ดีมาก';
                                  } else if ($row['evaluate_topic_5'] == 3) {
                                    echo 'ดี';
                                  } else if ($row['evaluate_topic_5'] == 2) {
                                    echo 'พอใช้';
                                  } else {
                                    echo 'ปรับปรุง';
                                  }
                                  ?>
                                </h5>
                              </li>
                            </ul>
                          </div>
                        </div> <!-- row -->

                      <?php
                        if ($row['sum_evaluate'] > 17.5) {
                          $part = 8;
                        } else if ($row['sum_evaluate'] > 15) {
                          $part = 7;
                        } else if ($row['sum_evaluate'] > 12.5) {
                          $part = 6;
                        } else if ($row['sum_evaluate'] > 10) {
                          $part = 5;
                        } else if ($row['sum_evaluate'] > 7.5) {
                          $part = 4;
                        } else if ($row['sum_evaluate'] > 5) {
                          $part = 3;
                        } else if ($row['sum_evaluate'] > 2.5) {
                          $part = 2;
                        } else if ($row['sum_evaluate'] > 1) {
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
                                <span class="donut"
                                      data-peity='{ "fill": ["#e83e8c", "rgba(246, 246, 246)"],   "innerRadius": 45, "radius": 10}'><?php echo $part; ?>/8</span>
                              </div>
                              <div>
                                <h2><?php echo round($percent_comment) . '%'; ?> </h2>
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

                  </div> <!-- modal-content -->

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
                      ผู้แจ้งซ่อม
                  </span>
                  <span class="badge light badge-success mb-2">
                      <i class="fa fa-circle text-success me-1"></i>
                      นายช่าง
                  </span>
                </div>
              </div>
            </div>
            <div class="card-body">
              <canvas id="CommentAllChart"></canvas>
            </div>
          </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"><strong>จำนวนการส่งคำแนะนำ/ติชมแต่ละเดือน</strong></h4>
              <div class="row">
                <div class="col-xl-12">
                  <span class="badge light mb-2" style="background-color: #F5D8D9;">
                    <span style="color:#D13D45;"><i class="fa fa-circle me-1"></i> คำแนะนำ/ติชม</span>
                  </span>
                </div>
              </div>
            </div>
            <div class="card-body">
              <canvas id="barChartMonth"></canvas>
            </div>
          </div>
        </div>


        <div class="col-xl-6 col-sm-12">
            <div class="card text-center">
                <div class="card-header">
                    <h4 class="card-title"><strong>เปอร์เซ็นผลการประเมินโปรแกรม</strong></h4>
                </div>
                <div class="card-body">
                    <div id="overallProgram"></div>
                    <br>
                    <h2><?php echo $percent_program. '%'; ?></h2>
                    <br>
                    <h4><span class="text-black">ความพึงพอใจในโปรแกรม:
                        <strong><?php echo $level_program; ?></strong></span></h4>
                </div>
            </div>
          </div>

        </div>
      </div> <!-- end tab1 -->

      <!-- tab 2 -->
       <div class="tab-pane" id="search">
          <div class="row">
              <div class="col-xl-3 col-sm-12">
                  <a href="<?php echo base_url('ninechang/user') ?>">
                      <div class="card gradient-14 card-bx">
                          <div class="card-body d-flex align-items-center">
                              <div class="me-auto text-white">
                                  <h2 class="text-white"><?php echo $user_total1; ?></h2>
                                  <h2 class="text-white">ผู้ใช้งานระบบ</h2>
                              </div>
                              <i class="flaticon-381-id-card-5 text-white" style="font-size:60px;"></i>
                          </div>
                      </div>
                  </a>
              </div>
                  <div class="col-xl-3 col-sm-12">
                      <a href="<?php echo base_url('ninechang/job') ?>">
                          <div class="card gradient-9 card-bx">
                              <div class="card-body d-flex align-items-center">
                                  <div class="me-auto text-white">
                                      <h2 class="text-white"><?php echo $result_ma; ?></h2>
                                      <h2 class="text-white">งานซ่อมบำรุง</h2> 
                                  </div>
                                  <i class="flaticon-381-search-3 text-white" style="font-size:60px;"></i>
                              </div>
                          </div>
                      </a>
                  </div>
                  <div class="col-xl-3 col-sm-12">
                      <a href="<?php echo base_url('ninechang/parts') ?>">
                          <div class="card gradient-17 card-bx">
                              <div class="card-body d-flex align-items-center">
                                  <div class="me-auto text-white">
                                      <h2 class="text-white"><?php echo $result_parts; ?></h2>
                                      <h2 class="text-white">อะไหล่</h2>
                                  </div>
                                  <i class="flaticon-381-folder-10 text-white" style="font-size:60px;"></i>
                              </div>
                          </div>
                      </a>
                  </div>

                  <div class="col-xl-3 col-sm-12">
                      <a href="<?php echo base_url('ninechang/equipment') ?>">
                          <div class="card gradient-11 card-bx">
                              <div class="card-body d-flex align-items-center">
                                  <div class="me-auto text-white">
                                      <h2 class="text-white"><?php echo $result_equipment; ?></h2>
                                      <h2 class="text-white">เครื่องจักร</h2>
                                  </div>
                                  <i class="flaticon-381-layer-1 text-white" style="font-size:60px;"></i>
                              </div>
                          </div>
                      </a>
                  </div>

                  <div class="col-xl-3 col-sm-12">
                      <a href="<?php echo base_url('ninechang/evaluate') ?>">
                          <div class="card gradient-13 card-bx">
                              <div class="card-body d-flex align-items-center">
                                  <div class="me-auto text-white">
                                      <h2 class="text-white"><?php echo $result_comment; ?></h2>
                                      <h2 class="text-white">ความคิดเห็น</h2>
                                  </div>
                                  <i class="flaticon-381-smartphone text-white" style="font-size:60px;"></i>
                              </div>
                          </div>
                      </a>
                  </div>
              </div>
          </div> <!-- end tab2 -->

          </div> <!-- row -->
        </div> <!-- teb-pane -->
      </div> <!-- tab-content -->

    </div>
  </div>
</div>
<!--**********************************
Content body end
***********************************-->