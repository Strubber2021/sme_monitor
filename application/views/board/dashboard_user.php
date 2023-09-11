<!--**********************************
	Content body start
***********************************-->
<div class="content-body">
	<div class="container-fluid">

		<!-- row -->
		<div class="row">
			<div class="col-lg-12">
			
			<!-- row -->
			<div class="row">
				<div class="col-xl-12">
					<div class="clearfix mb-3 text-end">
						<a href="<?php echo base_url('board/')?>" class="btn btn-primary px-3 my-1 light me-2"><i class="fa fa-reply"></i> </a>
					</div>
				</div>
				<div class="col-xl-12 col-lg-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">กรองข้อมูลผู้ใช้ในระบบ: หาช่าง หางาน</h4>
						</div>
						<div class="card-body text-black">
							<div class="basic-form">
							<form action="<?php echo base_url('board/user/');?>" method="POST">
								<div class="row">
									<div class="mb-3 col-md-4">
										<label class="form-label">ประเภทผู้ใช้</label><span class="text-danger">*</span>
										<select id="single-select" style="background-color: green;" name="user_type" required="required">
											<option value="1" selected>ผู้แจ้งงาน</option>
											<option value="2">นายช่าง</option>
										</select>
									</div>
									<div class="mb-3 col-md-4">
										<label class="form-label">สิทธิในระบบ</label>
										<select id="inputState" class="default-select form-control wide" name="regis_type">
											<option value="1">ไม่เป็นสมาชิก</option>
											<!-- <option selected>- เลือกทั้งหมด -</option>
											<option>ไม่เป็นสมาชิก</option>
											<option>เป็นสมาชิก</option> -->
										</select>
									</div>
									<div class="mb-3 col-md-4">
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
			<!-- ***End search -->

			
			<div class="row">
				<div class="col-xl-12 col-lg-12">
				<div class="card">
				<div class="card-body">

				<div class="row">
					<div class="col-xl-3 col-sm-6">
						<div class="widget-stat card gradient-6">
							<div class="card-body  p-4">
								<div class="media">
									<span class="me-3">
										<i class="las la-tasks text-white" style="font-size: 50px;"></i>
									</span>
									<div class="media-body text-white">
										<p class="mb-1">นายช่าง</p>
										<h4 class="text-white"><?php echo $count_techn; ?> คน</h4>
										<div class="progress mb-2 bg-secondary">
											<div class="progress-bar progress-animated bg-light" style="width: <?php if(isset($progress_bartech)){echo round($progress_bartech);}?>%"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-3 col-sm-6">
						<div class="widget-stat card gradient-4">
							<div class="card-body  p-4">
								<div class="media">
									<span class="me-3">
										<i class="las la-tasks text-white" style="font-size: 50px;"></i>
									</span>
									<div class="media-body text-white">
										<p class="mb-1">ผู้แจ้งงาน</p>
										<h4 class="text-white"><?php echo $count_job; ?> คน</h4>
										<div class="progress mb-2 bg-secondary">
											<div class="progress-bar progress-animated bg-light" style="width:<?php if(isset($progress_barjob)){echo round($progress_barjob);}?>%"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-3 col-sm-6">
						<div class="widget-stat card gradient-2">
							<div class="card-body  p-4">
								<div class="media">
									<span class="me-3">
										<i class="la la-tools text-white" style="font-size: 50px;"></i>
									</span>
									<div class="media-body text-white">
										<p class="mb-1">เป็นสมาชิก</p>
										<h4 class="text-white"><?php echo $count_member; ?> คน</h4>
										<div class="progress mb-2 bg-secondary">
											<div class="progress-bar progress-animated bg-light" style="width: 0%"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-3 col-sm-6">
						<div class="widget-stat card gradient-1">
							<div class="card-body  p-4">
								<div class="media">
									<span class="me-3">
										<i class="las la-users-cog text-white" style="font-size: 50px;"></i>
									</span>
									<div class="media-body text-white">
										<p class="mb-1">ไม่เป็นสมาชิก</p>
										<h4 class="text-white"><?php echo $count_all; ?> คน</h4>
										<div class="progress mb-2 bg-secondary">
											<div class="progress-bar progress-animated bg-light" style="width:<?php if(isset($progress_barall)){echo $progress_barall;}?>%"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

<?php if(!empty($user_type)): 
	if($user_type == 1): ?>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">ตารางแสดงข้อมูลผู้ใช้งาน</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
							<thead>
								<tr align="center">
								<th>#</th>
								<th>วันที่เริ่มใช้งาน</th>
								<th style="min-width: 200px">ชื่อผู้ใช้/บริษัท</th>
								<th style="min-width: 100px">เบอร์โทรศัพท์</th>
								<th style="min-width: 100px">อีเมล</th>
								<th>ประเภทผู้ใช้งาน</th>
								<th>สิทธิในระบบ</th>
								<th>รายละเอียด</th>
								</tr>
							</thead>
								<tbody>
								<?php foreach($job_detail as $key => $row){ ?>
								<tr class="text-black">
									<td align="center"><?php echo $key+1;?></td>
									<td align="center"><?php echo date('d/m/Y',strtotime($row["created_at"])) ?></td>
									<td><?php echo $row['job_username'];?></td>
									<td><?php echo $row['tel'];?></td>
									<td><?php echo $row['email'];?></td>
									<td align="center">
										<span class="badge light badge-danger">
											<i class="fa fa-circle text-danger me-1"></i><span class="text-black">ผู้แจ้งงาน</span>
										</span>
									</td>
									<td align="center">ไม่เป็นสมาชิก</td>
									<td>
										<center><button type="button" class="btn btn-danger light sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg<?php echo $row['job_id'];?>">
											<i class="flaticon-381-search-1"></i>
										</button></center>
										<!-- Large modal -->
										<div class="modal fade bd-example-modal-lg<?php echo $row['job_id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-body">
														<div class="row mt-3">
															<div class="col-xl-3">
																<div>
																	<span class="badge light badge-danger mb-3 fs-16">
																		<i class="fa fa-circle text-danger me-1"></i>
																		ไม่เป็นสมาชิก
																	</span>
																</div>
															</div>
															<div class="col-xl-9">
																<h4 class="card-title mb-4"><strong>ข้อมูลผู้ใช้งาน</strong></h4>
																<div class="row">
																	<div class="col-xl-12 col-xxl-12">	
																		<ul class="user-info-list">
																			<li>
																				<h5 class="mb-2"><i class="lar la-user-circle" title="ผู้แจ้งงาน"></i> ผู้แจ้งงาน: <?php echo $row['job_username']; ?></h5>
																			</li>
																			<li>
																				<h5 class="mb-2"><i class="lar la-user-circle" title="ปชช"></i> เลขประจำตัวประชาชน/ผู้เสียภาษี: -</h5>
																			</li>
																			<li>
																				<h5 class="mb-2"><i class="lar la-user-circle" title="ประเภทธุรกิจ"></i> ประเภทธุรกิจ: <?php echo $row['type_name']; ?></h5>
																			</li>
																			<li>
																				<h5 class="mb-2"><i class="fas fa-phone-volume" title="เบอร์โทรศัพท์"></i> เบอร์โทรศัพท์: <?php echo $row['tel']; ?></h5>
																			</li>
																			<li>
																				<h5 class="mb-2"><i class="las la-mail-bulk" title="อีเมล"></i> อีเมล: <?php echo $row['email']; ?></h5>
																			</li>
																			<li>
																				<h5 class="mb-2"><i class="las la-map-marker" title="ที่อยู่"></i> ที่อยู่: <?php echo $row['amphures_name_th']." ".$row['provinces_name_th']; ?></h5>
																			</li>
																			<li>
																				<h5 class="mb-2"><i class="las la-map-marker" title="fb"></i> Facebook: <?php echo $row['facebook_url']; ?></h5>
																			</li>
																			<li>
																				<h5 class="mb-2"><i class="las la-map-marker" title="line"></i> Line: -</h5>
																			</li>
																			<li>
																				<h5 class="mb-2"><i class="lar la-calendar" title="วันและเวลาที่แจ้ง"></i> วันและเวลาที่เริ่มใช้: <?php echo date('d/m/Y H:i',strtotime($row["created_at"])) ?> น.</h5>
																			</li>
																		</ul>
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
									</td>
								</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php elseif($user_type == 2): ?>
		
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">ตารางแสดงข้อมูลนายช่าง</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
							<thead>
								<tr align="center">
								<th>#</th>
								<th>วันที่เริ่มใช้งาน</th>
								<th style="min-width: 200px">ชื่อผู้ใช้/บริษัท</th>
								<th style="min-width: 100px">เบอร์โทรศัพท์</th>
								<th style="min-width: 100px">อีเมล</th>
								<th>ประเภทผู้ใช้งาน</th>
								<th>สิทธิในระบบ</th>
								<th>รายละเอียด</th>
								</tr>
							</thead>
								<tbody>
								<?php foreach($techn_detail as $key => $row){ ?>
								<tr class="text-black">
									<td align="center"><?php echo $key+1;?></td>
									<td align="center"><?php echo date('d/m/Y',strtotime($row["created_at"])) ?></td>
									<td><?php echo $row['user_name'];?></td>
									<td><?php echo $row['tel'];?></td>
									<td><?php echo $row['user_email'];?></td>
									<td align="center">
										<span class="badge light badge-primary">
											<i class="fa fa-circle text-primary me-1"></i> <span class="text-black">นายช่าง</span>
										</span>
									</td>
									<td align="center">ไม่เป็นสมาชิก</td>
									<td>
										<center><button type="button" class="btn btn-danger light sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg<?php echo $row['user_id'] ?>">
											<i class="flaticon-381-search-1"></i>
										</button></center>
										<!-- Large modal -->
										<div class="modal fade bd-example-modal-lg<?php echo $row['user_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-body">
														<div class="row mt-3">
															<div class="col-xl-3">
																<div>
																	<span class="badge light badge-danger mb-3 fs-16">
																		<i class="fa fa-circle text-danger me-1"></i>
																		ไม่เป็นสมาชิก
																	</span>
																</div>
																<img class="dz-media me-4" src="images/avatar/1.jpg" alt="">
															</div>
															<div class="col-xl-9">
																<h4 class="card-title mb-4"><strong>ข้อมูลผู้ใช้งาน</strong></h4>
																<div class="row">
																	<div class="col-xl-12 col-xxl-12">	
																		<ul class="user-info-list">
																			<li>
																				<h5 class="mb-2"><i class="lar la-user-circle" title="ผู้แจ้งงาน"></i> ผู้แจ้งงาน: <?php echo $row['user_name'];?></h5>
																			</li>
																			<li>
																				<h5 class="mb-2"><i class="lar la-user-circle" title="ปชช"></i> เลขประจำตัวประชาชน/ผู้เสียภาษี: -</h5>
																			</li>
																			<li>
																				<h5 class="mb-2"><i class="lar la-user-circle" title="ประเภทธุรกิจ"></i> ประเภทธุรกิจ: <?php foreach($row['type_name'] as $value){ echo $value['type_name']." "; } ?></h5>
																			</li>
																			<li>
																				<h5 class="mb-2"><i class="fas fa-phone-volume" title="เบอร์โทรศัพท์"></i> เบอร์โทรศัพท์: <?php echo $row['tel'];?></h5>
																			</li>
																			<li>
																				<h5 class="mb-2"><i class="las la-mail-bulk" title="อีเมล"></i> อีเมล: <?php echo $row['user_email'];?></h5>
																			</li>
																			<li>
																				<h5 class="mb-2"><i class="las la-map-marker" title="ที่อยู่"></i> ที่อยู่: <?php foreach($row['provinces_name_th'] as $value){ echo $value['provinces_name_th']." "; } ?>
																				</h5>
																			</li>
																			<li>
																				<h5 class="mb-2"><i class="las la-map-marker" title="fb"></i> Facebook: <?php echo $row['facebook_url'];?></h5>
																			</li>
																			<li>
																				<h5 class="mb-2"><i class="las la-map-marker" title="line"></i> Line: <?php echo $row['line_id'];?></h5>
																			</li>
																			<li>
																				<h5 class="mb-2"><i class="lar la-calendar" title="วันและเวลาที่แจ้ง"></i> วันและเวลาที่เริ่มใช้: <?php echo date('d/m/Y H:i',strtotime($row["created_at"])) ?> น.</h5>
																			</li>
																		</ul>
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
									</td>
								</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

			<?php endif; ?>

			</div> <!-- end row -->
		</div> <!-- end card body-->
		</div> <!-- end card-->
		</div> <!-- end col-lg-12 -->
	</div> <!-- end row -->
	<?php endif; ?>

	</div> <!-- end col-lg-12 -->
	</div> <!-- end row -->

	</div>
</div>
<!--**********************************
	Content body end
***********************************-->