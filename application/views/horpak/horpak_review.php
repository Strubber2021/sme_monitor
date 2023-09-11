<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
	<div class="container-fluid">
			<!-- row -->
			<div class="row">
					<div class="col-xl-12">
							<div class="clearfix mb-3 text-end">
									<a href="<?php echo base_url('horpak/')?>" class="btn btn-primary px-3 my-1 light me-2"><i class="fa fa-reply"></i> </a>
							</div>
					</div>
					<div class="col-xl-12 col-lg-12">
							<div class="card">
									<div class="card-header">
											<h4 class="card-title">ค้นหารายการความคิดเห็นทั้งหมด: โปรแกรมหอพัก</h4>
									</div>
									<div class="card-body">
											<div class="basic-form">
												<form action="<?php echo base_url('horpak/review/');?>" method="POST">
													<div class="row text-black">
														<div class="mb-3 col-md-3">
															<label class="form-label">หอพัก</label><span class="text-danger">*</span>
															<select class="multi-select" name="company_id[]" multiple="multiple" required="required">
																<option value="ALL" selected>- เลือกทั้งหมด -</option>
																<?php foreach($list_company as $row){?>
																		<option value="<?php echo $row['company_id']; ?>"><?php echo $row['company_name']; ?></option>
																<?php } ?>
															</select>
														</div>
														<div class="mb-3 col-md-3">
															<label class="form-label">ประเภทผู้ใช้</label>
															<select id="inputState" class="default-select form-control wide" name="employees_type">
																<option value="admin" <?php if($employees_type == 'admin'){echo "selected";} ?>>ผู้ดูแล/เจ้าของ</option>
																<option value="1" <?php if($employees_type == '1'){echo "selected";} ?>>นิติ</option>
																<option value="2" <?php if($employees_type == '2'){echo "selected";} ?>>นายช่าง</option>
																<option value="3" <?php if($employees_type == '3'){echo "selected";} ?>>ผู้เช่า</option>
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
											<div class="col-xl-3 col-sm-6">
												<div class="widget-stat card gradient-1">
													<div class="card-body  p-4">
														<div class="media">
															<span class="me-3">
																<i class="las la-tasks text-white" style="font-size: 50px;"></i>
															</span>
															<div class="media-body text-white">
																<p class="mb-1">ความคิดเห็น</p>
																<h4 class="text-white"><?php echo $total_comment; ?> รายการ</h4>
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
																<p class="mb-1">ผู้ดูแล/เจ้าของ</p>
																<h4 class="text-white"><?php echo $total_admin; ?> รายการ</h4>
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
													<div class="card-body  p-4">
														<div class="media">
															<span class="me-3">
																<i class="la la-tools text-white" style="font-size: 50px;"></i>
															</span>
															<div class="media-body text-white">
																<p class="mb-1">นิติ</p>
																<h4 class="text-white"><?php echo $total_emp1; ?> รายการ</h4>
																<div class="progress mb-2 bg-secondary">
																	<div class="progress-bar progress-animated bg-light" style="width: 15%"></div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-2 col-sm-6">
												<div class="widget-stat card gradient-6">
													<div class="card-body  p-4">
														<div class="media">
															<span class="me-3">
																<i class="las la-users-cog text-white" style="font-size: 50px;"></i>
															</span>
															<div class="media-body text-white">
																<p class="mb-1">นายช่าง</p>
																<h4 class="text-white"><?php echo $total_emp2; ?> รายการ</h4>
																<div class="progress mb-2 bg-secondary">
																	<div class="progress-bar progress-animated bg-light" style="width: 5%"></div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xl-2 col-sm-6">
												<div class="widget-stat card gradient-11">
													<div class="card-body  p-4">
														<div class="media">
															<span class="me-3">
																<i class="las la-users-cog text-white" style="font-size: 50px;"></i>
															</span>
															<div class="media-body text-white">
																<p class="mb-1">ผู้เช่า</p>
																<h4 class="text-white"><?php echo $total_emp3; ?> รายการ</h4>
																<div class="progress mb-2 bg-secondary">
																	<div class="progress-bar progress-animated bg-light" style="width: 5%"></div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

<?php if(!empty($company_id)): ?>
				<div class="row">
					<div class="col-xl-12 col-sm-12">
						<div class="table-responsive">
							<table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 845px">
								<thead>
									<tr>
										<th>#</th>
										<th>วันที่ประเมิน</th>
										<th>องค์กร</th>
										<th style="min-width: 260px">ความคิดเห็น</th>
										<th class="text-center">ประเภทผู้ใช้งาน</th>
										<th class="text-center">รายละเอียด</th>
									</tr>
								</thead>
								<tbody>

									<?php 
                  if(!empty($result_comment)){
                  foreach($result_comment as $key => $row){ ?>

									<tr class="text-black">
										<td><?php echo $key+1; ?></td>
										<td><?php echo date('d/m/Y',strtotime($row["created_at"])) ?></td>
										<td><?php echo $row['company_name']; ?></td>
										<td><?php echo $row['detail']; ?></td>
										<td class="text-center">
											<?php if(!empty($row['oauth_provider'])){
												echo '<span class="badge light badge-primary fs-12">
												<i class="fa fa-circle text-primary	me-1"></i> <span class="text-black">ผู้ดูแล/เจ้าของ </span></span>';
											}else{
												if($row['employees_type'] == 1){
													echo '<span class="badge light badge-warning fs-12">
													<i class="fa fa-circle text-warning	me-1"></i><span class="text-black"> นิติ </span></span>';
												}else if($row['employees_type'] == 2){
													echo '<span class="badge light badge-success fs-12">
													<i class="fa fa-circle text-success	me-1"></i><span class="text-black"> นายช่าง </span></span>';
												}else{
													echo '<span class="badge light badge-danger fs-12">
													<i class="fa fa-circle text-danger	me-1"></i><span class="text-black"> ผู้เช่า </span></span>';
												}
											} ?>
										</td>
										<td>

										<?php if(!empty($row['oauth_provider'])){
												echo '<center><button type="button" class="btn btn-primary light sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg'.$row['evaluate_id'].'">
													<i class="flaticon-381-search-1"></i>
												</button></center>';
												}else{
													if($row['employees_type'] == 1){
														echo '<center>
														<button type="button" class="btn btn-warning light sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg'.$row['evaluate_id'].'">
															<i class="flaticon-381-search-1"></i>
														</button></center>';
													}else if($row['employees_type'] == 2) {
														echo '<center>
														<button type="button" class="btn btn-success light sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg'.$row['evaluate_id'].'">
															<i class="flaticon-381-search-1"></i>
														</button></center>';
													}
													else{
														echo '<center>
														<button type="button" class="btn btn-danger light sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg'.$row['evaluate_id'].'">
															<i class="flaticon-381-search-1"></i>
														</button></center>';
													}
											} ?>

											<!-- Large modal -->
											<div class="modal fade bd-example-modal-lg<?php echo $row['evaluate_id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">
														<div class="modal-body">
															<div class="row mt-3">
																<div class="col-xl-3">
																<center><img class="dz-media me-4" src="<?php echo base_url('assets/images/avatar/1.png')?>"></center>
																</div>
																<div class="col-xl-9">
																	<h3 class="card-title mb-3"><strong>รายละเอียดการประเมิน </strong></h3>
																	<div class="row">
																		<div class="col-xl-6 col-xxl-6">	
																			<ul class="user-info-list">
																				<li>
																					<h5 class="mb-2"><strong>หัวข้อการประเมิน</strong></h5>
																				</li>
																				<li>
																					<h5 class="mb-2">1.การใช้คำสั่งต่างๆ ของเมนูมีความสะดวก</h5>
																				</li>
																				<li>
																					<h5 class="mb-2">2.โปรแกรมครอบคลุมกับการใช้งานจริง</h5>
																				</li>
																				<li>
																					<h5 class="mb-2">3.ความเร็วในการทำงานของโปรแกรม</h5>
																				</li>
																				<li>
																					<h5 class="mb-2">4.ความเหมาะสมในการใช้ข้อความอธิบาย</h5>
																				</li>
																				<li>
																					<h5 class="mb-2">5.ความเหมาะสมในการวางตำแหน่งส่วนต่างๆ</h5>
																				</li>
																			</ul>
																		</div>
									
																		<div class="col-xl-6 col-xxl-6">	
																			<ul class="user-info-list">
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

																		$percent_comment = ($row['sum_evaluate']/20)*100;
																			
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
																	<!-- <div class="row mt-5 align-items-center">
																		<div class="col-xl-6 d-flex align-items-center col-sm-6 mb-sm-0 mb-3">
																			<div class="me-4">
																				<span class="donut" data-peity='{ "fill": ["#e83e8c", "rgba(246, 246, 246)"],   "innerRadius": 45, "radius": 10}'><?php echo $part;?>/8</span>
																			</div>
																			<div>
																				<h2><?php echo round($percent_comment).'%';?></h2>
																				<span class="fs-18">คะแนนประเมิน</span>
																			</div>
																		</div>
																	</div> -->
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
                  <td colspan="6"><center><br><h3 class="text-danger">ไม่พบข้อมูล!</h3></center></td>
                  </tr>';
	              }?>

								</tbody>
							</table>
						</div>
					
				</div>
      </div>


	
<?php endif; ?>											
				</div>
			</div>
		</div>
	
	</div>
</div>
<!--**********************************
    Content body end
***********************************-->