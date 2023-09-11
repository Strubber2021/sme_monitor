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
					<h4 class="card-title">กรองข้อมูลผู้ใช้ในระบบ: งานไทย.net</h4>
				</div>
				<div class="card-body text-black">
					<div class="basic-form">
						<form action="<?php echo base_url('jobth/user/');?>" method="POST">
							<div class="row text-black">
							<div class="mb-3 col-md-4">
								<label class="form-label">ประเภทผู้ใช้งาน</label><span class="text-danger">*</span>
								<select id="inputState" class="default-select form-control wide" name="user_type" required="required">
									<option value="employer" selected>องค์กร/บริษัท</option>
									<option value="user">บุคคลหางาน</option>
								</select>
							</div>

							<div class="mb-3 col-md-4">
								<label class="form-label">สิทธิในระบบ</label>
								<select id="inputState" class="default-select form-control wide" name="is_member">
									<!-- <option value="ALL" selected>- เลือกทั้งหมด -</option> -->
									<option value="y" selected>เป็นสมาชิก</option>
									<option value="n">ไม่เป็นสมาชิก</option>
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
											<p class="mb-1">องค์กร/บริษัท</p>
											<h4 class="text-white"><?php echo $total_company; ?> องค์กร</h4>
											<div class="progress mb-2 bg-secondary">
												<div class="progress-bar progress-animated bg-light" style="width: 20%"></div>
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
											<p class="mb-1">บุคคลหางาน</p>
											<h4 class="text-white"><?php echo $total_user; ?> คน</h4>
											<div class="progress mb-2 bg-secondary">
												<div class="progress-bar progress-animated bg-light" style="width: 20%"></div>
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
											<h4 class="text-white"><?php echo $total_member; ?> คน</h4>
											<div class="progress mb-2 bg-secondary">
												<div class="progress-bar progress-animated bg-light" style="width: 15%"></div>
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
		
		if($user_type == "employer"){ //องค์กร/บริษัท

		if($is_member == "y"){?>
			<div class="row">
				<div class="col-xl-12 col-sm-12">
					<div class="table-responsive">
						<table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
							<thead>
								<tr>
									<th class="text-center">#</th>
									<th class="text-center">วันที่เริ่มใช้งาน</th>
									<th style="min-width: 200px">ชื่อองค์กร/บริษัท</th>
									<th style="min-width: 100px">เบอร์โทรศัพท์</th>
									<th style="min-width: 100px">อีเมล</th>
									<th>จำนวนประกาศงาน</th>
									<th>ประเภทผู้ใช้งาน</th>
									<th>สิทธิในระบบ</th>
									<th>รายละเอียด</th>
								</tr>
							</thead>
							<tbody>

							<?php if(!empty($result)){
									foreach($result as $key => $row){ ?>
								<tr class="text-black">
									<td class="text-center"><?php echo $key+1; ?></td>
									<td class="text-center"><?php echo date('d/m/Y',strtotime($row["created_at"])) ?></td>
									<td><?php echo $row['name']; ?></td>
									<td><?php echo $row['tel']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td class="text-center"><?php echo $row['total']; ?></td>
									<td>
										<span class="badge light badge-primary">
											<i class="fa fa-circle text-primary me-1"></i><span class="text-black">องค์กร/บริษัท</span>
										</span>
									</td>
									<td>เป็นสมาชิก</td>
									<td>
										<center><button type="button" class="btn btn-primary light sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg<?php echo $row['profile_id']; ?>">
											<i class="flaticon-381-search-1"></i>
										</button></center>
										<!-- Large modal -->
										<div class="modal fade bd-example-modal-lg<?php echo $row['profile_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<div class="modal-body">
														<div class="row mt-3">
															<div class="col-xl-3">
																<div>
																	<span class="badge light badge-success mb-3 fs-16">
																		<i class="fa fa-circle text-success me-1"></i>เป็นสมาชิก 
																	</span>
																</div>
																<!-- <img alt="image" width="50" src="<?php echo base_url();?>assets/images/avatar/1.png"> -->
															</div>
															<div class="col-xl-9">
																<h4 class="card-title mb-4"><strong>ข้อมูลผู้ใช้งาน</strong></h4>
																<div class="row">
																	<div class="col-xl-6">
																		<ul class="user-info-list">
																			<li class="mb-2">
																				<i class="fas fa-user-circle" title="ชื่อบริษัท"></i>
																				<span>ชื่อบริษัท: <?php echo $row['name']; ?></span>
																			</li>
																			<li class="mb-2">
																				<i class="flaticon-381-id-card-1" title="ชื่อผู้ติดต่อ"></i>
																				<span>ชื่อผู้ติดต่อ: <?php echo $row['contact_name']; ?></span>
																			</li>
																			<li class="mb-2">
																				<i class="fas fa-phone-volume" title="เบอร์โทรศัพท์"></i>
																				<span>เบอร์โทรศัพท์: <?php echo $row['tel']; ?></span>
																			</li>
																			<li class="mb-2">
																				<i class="far fa-envelope" title="อีเมล"></i>
																				<span class="overflow-hidden">อีเมล: <?php echo $row['email']; ?></span>
																			</li>
																			<li>
																				<i class="fas fa-map-marker-alt" title="ที่อยู่บริษัท"></i>
																				<span>ที่อยู่บริษัท: <?php echo $row['address']." ".$row['district_name']." ".$row['amphur_name']." ".$row['province_name']." ".$row['zip_code']; ?></span>
																			</li>
																		</ul>
																	</div>
																	<div class="col-xl-6">
																		<ul class="user-info-list">
																			<li class="mb-2">
																				<i class="flaticon-381-funnel" title="ประเภทผู้ใช้งาน"></i>
																				<span>ประเภทผู้ใช้งาน: องค์กร/บริษัท</span>
																			</li>
																			<li class="mb-2">
																				<i class="las la-toolbox" title="กลุ่มอุตสาหกรรม"></i>
																				<span>กลุ่มอุตสาหกรรม: <?php if(!empty($row['industry_name_th'])){echo $row['industry_name_th'];}else{echo "ไม่ระบุ"; }?></span>
																			</li>
																			<li class="mb-2">
																				<i class="flaticon-381-search-3" title="หมวดธุรกิจ"></i>
																				<span>หมวดธุรกิจ: <?php if(!empty($row['business_name_th'])){echo $row['business_name_th'];}else{echo "ไม่ระบุ"; }?></span>
																			</li>
																			<li class="mb-2">
																				<i class="flaticon-381-map-2" title="ชื่อนิคมอุตสาหกรรม"></i>
																				<span class="overflow-hidden">ชื่อนิคมอุตสาหกรรม: <?php if(!empty($row['industrial_estate_name_th'])){echo $row['industrial_estate_name_th'];}else{echo "ไม่ระบุ"; }?></span>
																			</li>
																			<li>
																				<i class="las la-tools" title="เขตอุตสาหกรรม"></i>
																				<span>เขตอุตสาหกรรม: ไม่ระบุ</span>
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

								<?php } }else{
										echo '
										<tr>
												<td colspan="9"><center><br><h3 class="text-danger">ไม่พบข้อมูล!</h3></center></td>
										</tr>';
								} ?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		<?php }else{ ?>
			
		<div class="row">
			<div class="col-xl-12 col-sm-12">
				<div class="table-responsive">
					<table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
						<thead>
							<tr>
								<th class="text-center">#</th>
								<th class="text-center">วันที่เริ่มใช้งาน</th>
								<th style="min-width: 200px">ชื่อองค์กร/บริษัท</th>
								<th style="min-width: 100px">เบอร์โทรศัพท์</th>
								<th style="min-width: 100px">อีเมล</th>
								<th>จำนวนประกาศงาน</th>
								<th>ประเภทผู้ใช้งาน</th>
								<th>สิทธิในระบบ</th>
								<th>รายละเอียด</th>
							</tr>
						</thead>
						<tbody>

						<?php if(!empty($result)){
							foreach($result as $key => $row){ ?>
							<tr class="text-black">
									<td class="text-center"><?php echo $key+1; ?></td>
									<td class="text-center"><?php echo date('d/m/Y',strtotime($row["created_at"])) ?></td>
									<td><?php echo $row['job_workplace_name']; ?></td>
									<td><?php echo $row['job_workplace_tel']; ?></td>
									<td><?php echo $row['job_workplace_email']; ?></td>
									<td class="text-center"><?php echo $row['total']; ?></td>
									<td>
										<span class="badge light badge-primary">
											<i class="fa fa-circle text-primary me-1"></i><span class="text-black">องค์กร/บริษัท</span>
										</span>
									</td>
									<td>ไม่เป็นสมาชิก</td>
									<td>
										<center><button type="button" class="btn btn-primary light sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg<?php echo $row['job_id']; ?>">
											<i class="flaticon-381-search-1"></i>
										</button></center>
										  <!-- Large modal -->
											<div class="modal fade bd-example-modal-lg<?php echo $row['job_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
																						<!-- <img alt="image" width="50" src="<?php echo base_url();?>assets/images/avatar/1.png"> -->
																				</div>
																				<div class="col-xl-9">
																						<h4 class="card-title mb-4"><strong>ข้อมูลผู้ใช้งาน</strong></h4>
																						<div class="row">
																								<div class="col-xl-6">
																										<ul class="user-info-list">
																												<li class="mb-2">
																														<i class="fas fa-user-circle" title="ชื่อบริษัท"></i>
																														<span>ชื่อบริษัท: <?php echo $row['job_workplace_name']; ?></span>
																												</li>
																												<li class="mb-2">
																														<i class="flaticon-381-id-card-1" title="ชื่องาน'"></i>
																														<span>ชื่องาน: <?php echo $row['job_name']; ?></span>
																												</li>
																												<li class="mb-2">
																														<i class="fas fa-phone-volume" title="เบอร์โทรศัพท์"></i>
																														<span>เบอร์โทรศัพท์: <?php echo $row['job_workplace_tel']; ?></span>
																												</li>
																												<li class="mb-2">
																														<i class="far fa-envelope" title="อีเมล"></i>
																														<span class="overflow-hidden">อีเมล: <?php echo $row['job_workplace_email']; ?></span>
																												</li>
																												<li>
																														<i class="fas fa-map-marker-alt" title="ที่อยู่บริษัท"></i>
																														<span>ที่อยู่บริษัท: <?php echo $row['job_workplace_address']." ".$row['amphur_name']." ".$row['province_name']; ?></span>
																												</li>
																										</ul>
																								</div>
																								<div class="col-xl-6">
																										<ul class="user-info-list">
																												<li class="mb-2">
																														<i class="flaticon-381-funnel" title="ประเภทผู้ใช้งาน"></i>
																														<span>ประเภทผู้ใช้งาน: องค์กร/บริษัท</span>
																												</li>
																												<li>
																														<i class="las la-blog" title="เว็บไซต์"></i> 
																														<span>เว็บไซต์: <?php echo $row['job_workplace_website']; ?></span>
																												</li>
																												<li class="mb-2">
																														<i class="las la-toolbox" title="ประเภทงาน"></i>
																														<span>ประเภทงาน: <?php if(!empty($row['job_type_work_name'])){echo $row['job_type_work_name'];}else{echo "ไม่ระบุ"; }?></span>
																												</li>
																												<li class="mb-2">
																														<i class="flaticon-381-search-3" title="หมวดธุรกิจ"></i>
																														<span>หมวดธุรกิจ: <?php if(!empty($row['job_type_name'])){echo $row['job_type_name'];}else{echo "ไม่ระบุ"; }?></span>
																												</li>
																												<li class="mb-2">
																														<i class="las la-graduation-cap" title="ระดับการศึกษา"></i>
																														<span class="overflow-hidden">ระดับการศึกษา: <?php if(!empty($row['education_name'])){echo $row['education_name'];}else{echo "ไม่ระบุ"; }?></span>
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
							<?php } }else{
								echo '
								<tr>
									<td colspan="9"><center><br><h3 class="text-danger">ไม่พบข้อมูล!</h3></center></td>
								</tr>';
							} ?>

					</table>
				</div>
			</div>
		</div>

		<?php	} }else{ 
			
				if($is_member == "y"){ ?><!-- users -->
					<div class="row">
						<div class="col-xl-12 col-sm-12">
							<div class="table-responsive">
								<table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
									<thead>
										<tr>
											<th class="text-center">#</th>
											<th class="text-center">วันที่แก้ไขข้อมูลล่าสุด</th>
											<th>ชื่อผู้ใช้งาน</th>
											<th>เบอร์โทรศัพท์</th>
											<th>อีเมล</th>
											<th>จำนวนประกาศงาน</th>
											<th>ประเภทผู้ใช้งาน</th>
											<th>สิทธิในระบบ</th>
											<th>รายละเอียด</th>
										</tr>
									</thead>
									<tbody>

									<?php if(!empty($result)){
											foreach($result as $key => $row){ ?>
										<tr class="text-black">
											<td class="text-center"><?php echo $key+1; ?></td>
											<td class="text-center"><?php echo date('d/m/Y',strtotime($row["section_profile_updated"])) ?></td>
											<td><?php echo $row['name']." ".$row['lastname']; ?></td>
											<td><?php echo $row['contact_tel']; ?></td>
											<td><?php echo $row['email']; ?></td>
											<td class="text-center"><?php echo $row['total']; ?></td>
											<td class="text-center">
												<span class="badge light badge-danger">
													<i class="fa fa-circle text-danger me-1"></i><span class="text-black">บุคคลหางาน</span>
												</span>
											</td>
											<td class="text-center">เป็นสมาชิก</td>
											<td>
												<center><button type="button" class="btn btn-danger light sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg<?php echo $row['id']; ?>">
													<i class="flaticon-381-search-1"></i>
												</button></center>
												<!-- Large modal -->
												<div class="modal fade bd-example-modal-lg<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-body">
																<div class="row mt-3">
																	<div class="col-xl-3">
																		<div>
																			<span class="badge light badge-success mb-3 fs-16">
																				<i class="fa fa-circle text-success me-1"></i>เป็นสมาชิก 
																			</span>
																		</div>
																		<!-- <img alt="image" width="50" src="<?php echo base_url();?>assets/images/avatar/1.png"> -->
																	</div>
																	<div class="col-xl-9">
																		<h4 class="card-title mb-4"><strong>ข้อมูลผู้ใช้งาน</strong></h4>
																		
																		<div class="row">
																			<div class="col-xl-12">
																				<ul class="user-info-list">
																					<li class="mb-2">
																						<i class="fas fa-user-circle" title="ชื่อ-นามสกุล"></i>
																						<span>ชื่อ-นามสกุล: <?php echo $row['name']." ".$row['lastname']; ?></span>
																					</li>
																					<li class="mb-2">
																						<i class="flaticon-381-funnel" title="ประเภทผู้ใช้งาน"></i>
																						<span>ประเภทผู้ใช้งาน: บุคคลหางาน</span>
																					</li>
																					<li class="mb-2">
																						<i class="fas fa-phone-volume" title="เบอร์โทรศัพท์"></i>
																						<span>เบอร์โทรศัพท์: <?php echo $row['contact_tel']; ?></span>
																					</li>
																					<li class="mb-2">
																						<i class="far fa-envelope" title="อีเมล"></i>
																						<span class="overflow-hidden">อีเมล: <?php echo $row['email']; ?></span>
																					</li>																								
																					<li>
																						<i class="fas fa-map-marker-alt" title="ที่อยู่"></i>
																						<span>ที่อยู่: <?php echo $row['address']." ".$row['district_name']." ".$row['amphur_name']." ".$row['province_name']; ?></span>
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

										<?php } }else{
												echo '
												<tr>
														<td colspan="9"><center><br><h3 class="text-danger">ไม่พบข้อมูล!</h3></center></td>
												</tr>';
										} ?>

									</tbody>
								</table>
							</div>
						</div>
					</div>

			<?php }else{ ?>

				<div class="row">
						<div class="col-xl-12 col-sm-12">
							<div class="table-responsive">
								<table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
									<thead>
										<tr>
											<th class="text-center">#</th>
											<th class="text-center">วันที่แก้ไขข้อมูลล่าสุด</th>
											<th>ชื่อผู้ใช้งาน</th>
											<th>เบอร์โทรศัพท์</th>
											<th>อีเมล</th>
											<th>จำนวนประกาศงาน</th>
											<th>ประเภทผู้ใช้งาน</th>
											<th>สิทธิในระบบ</th>
											<th>รายละเอียด</th>
										</tr>
									</thead>
									<tbody>

									<?php if(!empty($result)){
										foreach($result as $key => $row){ ?>
										<tr class="text-black">
											<td class="text-center"><?php echo $key+1; ?></td>
											<td class="text-center"><?php echo date('d/m/Y',strtotime($row["created_at"])) ?></td>
											<td><?php echo $row['resume_name']." ".$row['resume_lastname']; ?></td>
											<td><?php echo $row['resume_tel_contact']; ?></td>
											<td><?php echo $row['resume_email_contact']; ?></td>
											<td class="text-center"><?php echo $row['total']; ?></td>
											<td class="text-center">
												<span class="badge light badge-danger">
													<i class="fa fa-circle text-danger me-1"></i><span class="text-black">บุคคลหางาน</span>
												</span>
											</td>
											<td>ไม่เป็นสมาชิก</td>
											<td>
												<center><button type="button" class="btn btn-danger light sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg<?php echo $row['resume_id']; ?>">
													<i class="flaticon-381-search-1"></i>
												</button></center>
												<!-- Large modal -->
												<div class="modal fade bd-example-modal-lg<?php echo $row['resume_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-body">
																<div class="row mt-3">
																	<div class="col-xl-3">
																		<div>
																			<span class="badge light badge-danger mb-3 fs-16">
																				<i class="fa fa-circle text-danger me-1"></i>ไม่เป็นสมาชิก 
																			</span>
																		</div>
																		<!-- <img alt="image" width="50" src="<?php echo base_url();?>assets/images/avatar/1.png"> -->
																	</div>
																	<div class="col-xl-9">
																		<h4 class="card-title mb-4"><strong>ข้อมูลผู้ใช้งาน</strong></h4>
																		
																		<div class="row">
																			<div class="col-xl-12">
																				<ul class="user-info-list">
																					<li class="mb-2">
																						<i class="fas fa-user-circle" title="ชื่อ-นามสกุล"></i>
																						<span>ชื่อ-นามสกุล: <?php echo $row['resume_name']." ".$row['resume_lastname']; ?></span>
																					</li>
																					<li class="mb-2">
																						<i class="flaticon-381-funnel" title="ประเภทผู้ใช้งาน"></i>
																						<span>ประเภทผู้ใช้งาน: บุคคลหางาน</span>
																					</li>
																					<li class="mb-2">
																						<i class="fas fa-phone-volume" title="เบอร์โทรศัพท์"></i>
																						<span>เบอร์โทรศัพท์: <?php echo $row['resume_tel_contact']; ?></span>
																					</li>
																					<li class="mb-2">
																						<i class="far fa-envelope" title="อีเมล"></i>
																						<span class="overflow-hidden">อีเมล: <?php echo $row['resume_email_contact']; ?></span>
																					</li>																								
																					<li>
																						<i class="fas fa-map-marker-alt" title="ที่อยู่"></i>
																						<span>ที่อยู่: <?php echo $row['resume_address']." ".$row['district_name']." ".$row['amphur_name']." ".$row['province_name']." ".$row['resume_zip_code']; ?></span>
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

										<?php } }else{
												echo '
												<tr>
														<td colspan="9"><center><br><h3 class="text-danger">ไม่พบข้อมูล!</h3></center></td>
												</tr>';
										} ?>

									</tbody>
								</table>
							</div>
						</div>
					</div>


		<?php }  }	

 		endif; ?>

        </div>
    </div>
  </div>
</div>

  </div>
</div>
<!--**********************************
  Content body end
***********************************-->