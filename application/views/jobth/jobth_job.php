<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
			<div class="col-xl-12">
				<div class="clearfix mb-3 text-end">
					<a href="<?php echo base_url('jobth/')?>" class="btn btn-primary px-3 my-1 light me-2"><i class="fa fa-reply"></i> </a>
				</div>
			</div>
			<div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">กรองข้อมูลงานในระบบ: งานไทย.net</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="<?php echo base_url('jobth/job/');?>" method="POST">
                                <div class="row text-black">
									<div class="mb-3 col-md-3">
                                        <label class="form-label">ประเภทผู้ใช้งาน</label><span class="text-danger">*</span>
                                        <select id="inputState" class="default-select form-control wide" name="user_type" required="required">
                                            <option value="employer" selected>องค์กร/บริษัท</option>
											<option value="user">บุคคลหางาน</option>
                                        </select>
                                    </div>
									<div class="mb-3 col-md-3">
										<label class="form-label">ประเภท/อาชีพ/สาขางาน</label>
										<select class="multi-select" name="job_type_id[]" multiple="multiple" required="required">
											<option value="ALL" selected>- เลือกทั้งหมด -</option>
											<?php foreach($list_jobs as $row){?>
												<option value="<?php echo $row['job_type_id'] ?>"><?php  echo $row['job_type_name'] ?></option>
											<?php } ?>
										</select>
									</div>
                                    <div class="mb-3 col-md-3">
										<label class="form-label">สิทธิในระบบ</label>
										<select id="inputState" class="default-select form-control wide" name="is_member">
											<option value="y" selected>เป็นสมาชิก</option>
											<option value="n">ไม่เป็นสมาชิก</option>
										</select>
									</div>
									<div class="mb-3 col-md-3">
                                        <label class="form-label">ช่วงระยะวันที่ต้องการหา</label>
                                        <input class="form-control input-daterange-datepicker" type="text" name="daterange" value="<?php echo $thisyear; ?>">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" style="float: right;">ค้นหา</button>
                            </form>
                        </div>
                    </div>
                </div>
			</div>
		</div>

		<div class="row">
			<div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="row">
							<div class="col-xl-2 col-sm-6">
								<div class="widget-stat card gradient-6">
									<div class="card-body p-4 text-center">
										<div class="media-body text-white">
											<p class="mb-3 mt-2">องค์กร/บริษัท</p>
											<h4 class="text-white mb-3"><?php echo $total_company; ?> องค์กร</h4>
											<div class="progress mt-3 bg-secondary">
												<div class="progress-bar progress-animated bg-light" style="width: 5%"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-2 col-sm-6">
								<div class="widget-stat card gradient-4">
									<div class="card-body p-4 text-center">
										<div class="media-body text-white">
											<p class="mb-3 mt-2">บุคคลหางาน</p>
											<h4 class="text-white mb-3"><?php echo $total_user; ?> คน</h4>
											<div class="progress mt-3 bg-secondary">
												<div class="progress-bar progress-animated bg-light" style="width: 5%"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-2 col-sm-6">
								<div class="widget-stat card gradient-7">
									<div class="card-body  p-4">
										<div class="media">
											<span class="me-1">
												<i class="las la-tasks text-white" style="font-size: 50px;"></i>
											</span>
											<div class="media-body text-white">
												<p class="mb-1">รวมหาคนทั้งหมด</p>
												<h4 class="text-white"><?php echo $total_job_all; ?> รายการ</h4>
												<div class="progress mb-2 bg-secondary">
													<div class="progress-bar progress-animated bg-light" style="width: 20%"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-2 col-sm-6">
								<div class="widget-stat card gradient-8">
									<div class="card-body p-4">
										<div class="media">
											<span class="me-1">
												<i class="las la-tasks text-white" style="font-size: 50px;"></i>
											</span>
											<div class="media-body text-white">
												<p class="mb-1">รวมหางานทั้งหมด</p>
												<h4 class="text-white"><?php echo $total_resume_all; ?> รายการ</h4>
												<div class="progress mb-2 bg-secondary">
													<div class="progress-bar progress-animated bg-light" style="width: 20%"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-2 col-sm-6">
								<div class="widget-stat card gradient-2">
									<div class="card-body p-4">
										<div class="media">
											<span class="me-1">
												<i class="la la-tools text-white" style="font-size: 50px;"></i>
											</span>
											<div class="media-body text-white">
												<p class="mb-1">เป็นสมาชิก</p>
												<h4 class="text-white"><?php echo $total_member; ?> คน</h4>
												<div class="progress mb-2 bg-secondary">
													<div class="progress-bar progress-animated bg-light" style="width: 15%"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-2 col-sm-6">
								<div class="widget-stat card gradient-1">
									<div class="card-body p-4">
										<div class="media">
											<span class="me-1">
												<i class="las la-users-cog text-white" style="font-size: 50px;"></i>
											</span>
											<div class="media-body text-white">
												<p class="mb-1">ไม่เป็นสมาชิก</p>
												<h4 class="text-white"><?php echo $total_nomember; ?> คน</h4>
												<div class="progress mb-2 bg-secondary">
													<div class="progress-bar progress-animated bg-light" style="width: 5%"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						</div>

<?php if(!empty($user_type)):

	if($user_type == "employer"){  ?>
		<!-- องค์กร/บริษัท -->
			<div class="row">
				<div class="col-xl-12 col-sm-12">
				<h4>ประเภทผู้ใช้งาน : องค์กร/บริษัท</h4><br>
				
					<div class="table-responsive">
						<table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
							<thead>
								<tr>
									<th>#</th>
									<th>ชื่อบริษัท/ชื่อ-นามสกุล</th>
									<th>ประเภท/อาชีพ/สาขางาน</th>
									<th class="text-center">จำนวนประกาศงาน</th>
									<th class="text-center">ประเภทผู้ใช้งาน</th>
									<th class="text-center">สิทธิในระบบ</th>
								</tr>
							</thead>
							<tbody>

							<?php if(!empty($result)){
								foreach($result as $key => $row){ ?>

							<tr class="text-black">
								<td class="text-center"><?php echo $key+1; ?></td>
								<td><?php echo $row['name']; ?></td>
								<td><?php echo $row['job_type_name']; ?></td>
								<td class="text-center"><?php echo $row['total']; ?></td>
								<td class="text-center">
									<span class="badge light badge-primary">
										<i class="fa fa-circle text-primary me-1"></i>
										<span class="text-black">องค์กร/บริษัท</span>
									</span>
								</td>
								<td class="text-center">
									<?php if($is_member == "y"){
										echo'เป็นสมาชิก';
									}else{
										echo'ไม่เป็นสมาชิก';
									} ?>
								</td>										
							</tr>

							<?php } }else{
								echo '
								<tr>
								<td colspan="6"><center><br><h3 class="text-danger">ไม่พบข้อมูล!</h3></center></td>
								</tr>';
							} ?>
								
						</tbody>
					</table>
				</div>
			</div>
		</div>

<?php }else{ ?>

	<!-- บุคคลหางาน -->

			<div class="row">
				<div class="col-xl-12 col-sm-12">
					<h4>ประเภทผู้ใช้งาน : บุคคลหางาน</h4><br>
					<div class="table-responsive">
						<table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
							<thead>
								<tr>
									<th>#</th>
									<th>ชื่อบริษัท/ชื่อ-นามสกุล</th>
									<th>ประเภท/อาชีพ/สาขางาน</th>
									<th class="text-center">จำนวนประกาศงาน</th>
									<th class="text-center">ประเภทผู้ใช้งาน</th>
									<th class="text-center">สิทธิในระบบ</th>
								</tr>
							</thead>
							<tbody>

							<?php if(!empty($result)){
								foreach($result as $key => $row){ ?>

							<tr class="text-black">
								<td class="text-center"><?php echo $key+1; ?></td>
								<td><?php echo $row['name']. " ".$row['lastname']; ?></td>
								<td><?php echo $row['job_type_name']; ?></td>
								<td class="text-center"><?php echo $row['total']; ?></td>
								<td class="text-center">								
									<span class="badge light badge-danger">
										<i class="fa fa-circle text-danger me-1"></i>
										<span class="text-black">บุคคลหางาน</span>
									</span>
								</td>
								<td class="text-center">
									<?php if($is_member == "y"){
										echo'เป็นสมาชิก';
									}else{
										echo'ไม่เป็นสมาชิก';
									} ?>
								</td>										
							</tr>

							<?php } }else{
								echo '
								<tr>
								<td colspan="6"><center><br><h3 class="text-danger">ไม่พบข้อมูล!</h3></center></td>
								</tr>';
							} ?>
								
						</tbody>
					</table>
				</div>
			</div>
		</div>

<?php }endif; ?>

                    </div>
                </div>
			</div>
		</div>

    </div>
</div>
<!--**********************************
    Content body end
        ***********************************