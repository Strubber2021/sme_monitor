<!--**********************************
  Content body start
***********************************-->
<div class="content-body">
  <div class="container-fluid">
    <div class="row">
    <!-- row -->

      <div class="col-lg-12">
        <form action="<?php echo base_url('jobth/'); ?>" method="POST">
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
							<span>รวมจำนวนเข้าสู่ระบบของผู้ใช้งานทั้งหมด ผ่าน Website</span>
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
							<h4 class="card-title mb-2"><strong>จำนวนลงทะเบียนใหม่ </strong><span class="text-danger">(ปี <?php echo $yearNow; ?>)</span></h4>
							<span>รวมจำนวนผู้ลงทะเบียนใหม่ องค์กร & บุคคลหางาน</span>
						</div>
						<div class="d-flex justify-content-between">
							<span class="badge light badge-primary mb-2" style="font-size: 10px;">
								<i class="fa fa-circle text-primary me-1"></i>
								องค์กร
							</span>
							<span class="badge light badge-warning mb-2" style="font-size: 10px;">
								<i class="fa fa-circle text-warning me-1"></i>
								บุคคลหางาน
							</span>
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
							<h4 class="card-title mb-2"><strong>จำนวนลงทะเบียนใหม่แต่ละเดือน </strong><span class="text-danger">(ปี <?php echo $yearNow; ?>)</span></h4>
							<span>รวมจำนวนผู้ลงทะเบียนใหม่ในแต่ละเดือน ผ่านทาง Email</span>
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
							<h4 class="card-title mb-2"><strong>จำนวนลงทะเบียนทบรวม </strong><span class="text-danger">(ปี <?php echo $yearNow; ?>)</span></h4>
							<span>รวมจำนวนผู้ลงทะเบียนใหม่และเก่าของทุกเดือนที่ผ่านมา ผ่านทาง Email</span>
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
                
			  <!-- <div class="card-header">
                  <h4 class="card-title">
                  <strong>จำนวนองค์กรและบุคคลหางานทั้งหมดในแต่ละเดือน</strong></h4>
                  <div class="row">
                    <div class="col-xl-12">
                      <span class="badge light mb-2" style="background-color: #FEECD9;">
                        <span style="color: #FEA042;">
                          <i class="fa fa-circle me-1"></i> องค์กร & บุคคลหางาน
                        </span>
                      </span>
                    </div>
                  </div> 
                </div> -->

				<div class="card-header">
					<div class="me-auto mb-sm-0 mb-3">
						<h4 class="card-title mb-2"><strong>ผู้ใช้งานใหม่ทั้งหมดแต่ละเดือน </strong><span class="text-danger">(ปี <?php echo $yearNow; ?>)</span></h4>
						<span>รวมจำนวนผู้ใช้งานใหม่ (องค์กร & บุคคลหางาน) ทั้งหมดในแต่ละเดือน</span>
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
                                องค์กร</span>
                            </span>
                            <span class="badge light mb-2" style="background-color: #DEE9F3;">
                                <span style="color:#5D95C5;"><i class="fa fa-circle me-1"></i>
                                บุคคลหางาน</span>
                            </span>
                            
                        </div>
                    </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-5 col-5 d-flex align-items-center col-sm-6 mb-sm-0 mb-2">
                      <div class="me-6 mt-5">
                        <span class="donut" data-peity='{ "fill": ["#D13D45", "rgba(246, 246, 246)"], "innerRadius": 45, "radius": 10}'><?php echo $part_employer; ?>/8</span>
                        <br><br><center><h2><?php echo round($percent_employers). '%'; ?></h2>
                        <span class="fs-18">องค์กร</span></center>
                      </div>
                    </div>
                    <div class="col-xl-4 col-4 d-flex align-items-center col-sm-6 mb-sm-0 mb-2">
                      <div class="me-4 mt-5">
                        <span class="donut" data-peity='{ "fill": ["#5D95C5", "rgba(246, 246, 246)"], "innerRadius": 45, "radius": 10}'><?php echo $part_user; ?>/8</span>
                        <br><br><center><h2><?php echo round($percent_users). '%'; ?></h2>
                        <span class="fs-18"> บุคคลหางาน</span></center>
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
                        style="width: <?php echo $percent_account.'%'; ?>; height:13px;"
                        role="progressbar">
                        <span class="sr-only"><?php echo $percent_account.'%';?>
                            เปอร์เซ็น</span>
                    </div>
                  </div>
                  <div class="d-flex mt-4 progress-bar-legend align-items-center justify-content-between">
                    <div class="d-flex">
                        <span class="marker gradient-6"></span>
                        <div>
                            <p class="status">ผู้สมัคร</p>
                            <span
                                class="result"><?php echo $account_all; ?></span>
                        </div>
                    </div>
                  </div>
                  <br><br>

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
                                                    style="cursor: context-menu;"><?php echo $account_yesterday; ?>
                                                    /</span> <b><?php echo $account_all; ?></b>
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
                          style="width: <?php echo $percent_employers. '%'; ?>; height:13px;"
                          role="progressbar">
                          <span class="sr-only"><?php echo $percent_employers; ?></span>
                      </div>
                  </div>
                  <div class="progress mb-4" style="height:13px;">
                      <div class="progress-bar gradient-3 progress-animated"
                          style="width: <?php echo $percent_users. '%'; ?>; height:13px;"
                          role="progressbar">
                          <span class="sr-only"><?php echo $percent_users; ?></span>
                      </div>
                  </div>
                 
                  <div
                      class="d-flex mt-4 progress-bar-legend align-items-center justify-content-between">
                      <div class="d-flex">
                          <span class="marker gradient-6"></span>
                          <div>
                              <p class="status">องค์กร</p>
                              <span class="result"><?php echo $employers_all; ?></span>
                          </div>
                      </div>
                      <div class="d-flex">
                          <span class="marker gradient-3"></span>
                          <div>
                              <p class="status">บุคคลหางาน</p>
                              <span class="result"><?php echo $users_all; ?></span>
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
                                                  style="cursor: context-menu;"><?php echo $account_yesterday; ?>
                                                  /</span> <b><?php echo $account_all; ?></b> </h3>
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
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title"><strong>5 บัญชี</strong> ที่เพิ่มเข้ามาใหม่ล่าสุด</h4>
                      <!-- <div class="row">
                        <div class="col-xl-12">
                          <a href="<?php echo base_url('jobth/employers'); ?>"
                          class="btn btn-sm light btn-primary" target="_blank">
                          <strong><i class="la la-home me-2" style="font-size: 14px;"></i>องค์กร/บริษัท</strong></a>

                          <a href="<?php echo base_url('jobth/users'); ?>"
                          class="btn btn-sm light btn-success" target="_blank">
                          <strong><i class="la la-user me-2" style="font-size: 14px;"></i>บุคคลหางาน</strong></a>  
                        </div>
                      </div> -->
                    </div>

                    <div class="card-body">
                      <!-- Nav tabs -->
                      <div class="custom-tab-1">
                        <ul class="nav nav-tabs">
                          <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#home1"><i class="la la-home me-2"></i>  องค์กร</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#profile1"><i class="la la-user me-2"></i> บุคคลหางาน</a>
                          </li>              
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane fade show active" id="home1" role="tabpanel">
                            <div class="pt-4">

                                <div id="DZ_W_Todo2" class="widget-media dz-scroll height200">
                                  <ul class="timeline">
                                      <?php foreach ($employers_recent as $key => $row): ?>
                                      <li>
                                        <div class="timeline-panel">
                                          <div class="media me-2 media-primary">
                                            <h5 class="mt-2"><?php echo $key + 1; ?>.</h5>
                                          </div>
                                          <div class="media-body">
                                            <h5 class="mb-1"><?php echo $row['email']; ?></h5>
                                            <h5 class="text-black op8 mb-sm-0 mb-3 me-4">ชื่อองค์กร :
                                                <?php echo $row['name']; ?></h5>
                                            <small class="d-block">สมัครเมื่อ
                                                <?php echo date('d/m/Y H:i',strtotime($row["created_at"])) ?>
                                                น.</small>
                                          </div>
                                        </div>
                                      </li>
                                      <?php endforeach; ?>
                                  </ul>
                                </div>
                                
                            </div>
                          </div>
                          <div class="tab-pane fade" id="profile1">
                            <div class="pt-4">
                                
                                <div id="DZ_W_Todo1" class="widget-media dz-scroll height200">
                                  <ul class="timeline">
                                      <?php foreach ($users_recent as $key => $row): ?>
                                      <li>
                                        <div class="timeline-panel">
                                          <div class="media me-2 media-success">
                                            <h5 class="mt-2"><?php echo $key + 1; ?>.</h5>
                                          </div>
                                          <div class="media-body">
                                            <h5 class="mb-1"><?php echo $row['email']; ?></h5>
                                            <h5 class="text-black op8 mb-sm-0 mb-3 me-4">ชื่อบุคคลหางาน :
                                                <?php echo $row['name']; ?></h5>
                                            <small class="d-block">สมัครเมื่อ
                                                <?php echo date('d/m/Y H:i',strtotime($row["created_at"])) ?>
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
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-xl-6">
                <div class="card" style="height: 420px;">
                  <div class="card-header border-0">
                    <h4 class="card-title"><strong>คำแนะนำและติชมจากผู้ใช้</strong></h4>
                    <div class="btn-group dropend mb-1">
                    </div>
                  </div>
                  <div class="card-body"> 
                    <div id="DZ_W_Todo3" class="widget-media dz-scroll height370">
                      <ul class="timeline">
                        <?php foreach($review_program as $row){ ?>
                        <li>
                          <div class="timeline-panel">
                            <div class="media me-2">
                              <img alt="image" width="50" src="<?php echo base_url();?>assets/images/avatar/1.png">
                            </div>
                            <div class="media-body">
                              <h5 class="mb-1"> 
                                <?php if($row['user_type'] == "user"){
                                  echo'<span class="badge light badge-success fs-12">บุคคลหางาน</span></h5>';
                                }else{
                                  echo'<span class="badge light badge-primary fs-12">องค์กร</span></h5>';
                                } ?>
                              <p class="text-black op8 mb-sm-0 mb-1 me-4"><?php echo $row['text']; ?></p>
                              <small class="d-block">วันที่ส่งข้อความ <?php echo date('d/m/Y H:i',strtotime($row["created_at"])); ?> น.</small>
                            </div>
                          </div>
                        </li>
                        <?php } ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-xl-6">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title"><strong>จำนวนการประเมินโปรแกรมทั้งหมด</strong></h4>
                    <div class="row">
                      <div class="col-xl-12">
                        <span class="badge light badge-primary mb-2">
                            <i class="fa fa-circle text-primary me-1"></i>
                            องค์กร
                        </span>
                        <span class="badge light badge-warning mb-2">
                            <i class="fa fa-circle text-warning me-1"></i>
                            บุคคลหางาน
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
        </div>
      </div> <!-- end tab1 -->

      <!-- tab 2 -->
        <div class="tab-pane" id="search">
          <div class="row">

            <div class="col-xl-3 col-sm-12">
              <a href="<?php echo base_url('jobth/user')?>">
                <div class="card gradient-14 card-bx">
                  <div class="card-body d-flex align-items-center">
                    <div class="me-auto text-white">
                      <h2 class="text-white"><?php echo $account_all;?></h2>
                      <h2 class="text-white">ผู้ใช้งานระบบ</h2>
                    </div>
                    <i class="flaticon-381-id-card-5 text-white" style="font-size:60px;"></i>
                  </div>
                </div>  
              </a>
            </div>

            <div class="col-xl-3 col-sm-12">
              <a href="<?php echo base_url('jobth/job')?>">
                <div class="card gradient-9 card-bx">
                  <div class="card-body d-flex align-items-center">
                    <div class="me-auto text-white">
                      <h2 class="text-white"><?php echo $jobs_all; ?></h2>
                      <h2 class="text-white">งานในระบบ</h2>
                    </div>
                  <i class="flaticon-381-search-3 text-white" style="font-size:60px;"></i>
                  </div>
                </div>  
              </a>
            </div>

            <div class="col-xl-3 col-sm-12">
              <a href="<?php echo base_url('jobth/review')?>">
                <div class="card gradient-13 card-bx">
                  <div class="card-body d-flex align-items-center">
                    <div class="me-auto text-white">
                      <h2 class="text-white"><?php echo $review_program_all; ?></h2>
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
***********************************