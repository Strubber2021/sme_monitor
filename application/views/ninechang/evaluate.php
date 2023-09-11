<!--**********************************
  Content body start
***********************************-->
<div class="content-body">
  <div class="container-fluid">
  <!-- row -->
		<div class="row">
			<div class="col-xl-12">
				<div class="clearfix mb-3 text-end">
					<a href="index2.html" class="btn btn-primary px-3 my-1 light me-2"><i class="fa fa-reply"></i> </a>
				</div>
			</div>
			<div class="col-xl-12 col-lg-12">
				<div class="card">
					<div class="card-header">
							<h4 class="card-title">ค้นหารายการความคิดเห็นทั้งหมด: โปรแกรมซ่อมบำรุง</h4>
					</div>
					<div class="card-body">
							<div class="basic-form">
							<form action="<?php echo base_url('Ninechang/evaluate/');?>" method="POST">
                <div class="row text-black">
									
									<div class="mb-3 col-md-4">
										<label class="form-label">องค์กร</label><span class="text-danger">*</span>
										<select class="multi-select" id="company_id_require" name="company_id[]" multiple="multiple" required="required">
											<option value="ALL" selected>- เลือกทั้งหมด -</option>
											<?php foreach($list_company as $row){?>
													<option value="<?php echo $row['company_id']; ?>"><?php echo $row['company_name']; ?></option>
											<?php } ?>
										</select>
										<div class="text-danger" id="result"></div>
									</div>

									<div class="mb-3 col-md-3">
										<label class="form-label">ประเภทผู้ใช้งาน</label>
										<select id="inputState" name="user_type" class="default-select form-control wide">
											<option value="ALL" selected>- เลือกทั้งหมด -</option>
											<option value="1">แอดมิน</option>
											<option value="2">ผู้แจ้งซ่อม</option>
											<option value="3">นายช่าง</option>
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

<?php if(!empty($company_id)): ?>
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
										<p class="mb-1">ความคิดเห็นทั้งหมด</p>
										<h4 class="text-white">
										<?php 
                      if(!empty($total_evaluate)): echo $total_evaluate;
                      else : echo "0";
                      endif;
                    ?> รายการ</h4>
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
										<i class="las la-tasks text-white" style="font-size: 50px;"></i>
									</span>
									<div class="media-body text-white">
										<p class="mb-1">แอดมิน</p>
										<h4 class="text-white">
										<?php 
                      if(!empty($total_admin)): echo $total_admin;
                      else : echo "0";
                      endif;
                    ?> รายการ</h4>
										<div class="progress mb-2 bg-secondary">
											<div class="progress-bar progress-animated bg-light" style="width: 20%"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6">
						<div class="widget-stat card gradient-6">
							<div class="card-body  p-4">
								<div class="media">
									<span class="me-3">
										<i class="la la-tools text-white" style="font-size: 50px;"></i>
									</span>
									<div class="media-body text-white">
										<p class="mb-1">นายช่าง</p>
										<h4 class="text-white">
										<?php 
                      if(!empty($total_employee2)): echo $total_employee2;
                      else : echo "0";
                      endif;
                    ?> รายการ</h4>
										<div class="progress mb-2 bg-secondary">
											<div class="progress-bar progress-animated bg-light" style="width: 15%"></div>
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
										<i class="las la-users-cog text-white" style="font-size: 50px;"></i>
									</span>
									<div class="media-body text-white">
										<p class="mb-1">ผู้แจ้งซ่อม</p>
										<h4 class="text-white">
										<?php 
                      if(!empty($total_employee1)): echo $total_employee1;
                      else : echo "0";
                      endif;
                    ?> รายการ</h4>
										<div class="progress mb-2 bg-secondary">
											<div class="progress-bar progress-animated bg-light" style="width: 5%"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xl-12 col-sm-12">
						<div class="table-responsive">
						<div class="table-responsive">
							<table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
								<thead>
									<tr>
										<th>#</th>
										<th>วันที่ประเมิน</th>
										<th style="min-width: 200px">องค์กร</th>
										<th style="min-width: 200px">ความคิดเห็น</th>
										<th>ประเภทผู้ใช้งาน</th>
										<th>รายละเอียด</th>
										<th>สถานะความคิดเห็น</th>
									</tr>
								</thead>
								<tbody>

									<?php 
                  if(!empty($comment)){
                  foreach($comment as $key => $row){ ?>

									<tr class="text-black">
										<td><?php echo $key+1; ?></td>
										<td><?php echo date('d/m/Y',strtotime($row["created_at"])) ?></td>
										<td><?php echo $row['company_name']; ?></td>
										<td><?php echo $row['detail']; ?></td>
										<td>
											<?php if(!empty($row['oauth_provider'])){
												echo '<span class="badge light badge-primary fs-12">
												<i class="fa fa-circle text-primary	me-1"></i> <span class="text-black">แอดมิน </span></span>';
											}else{
												if($row['employees_type'] == 1){
													echo '<span class="badge light badge-warning fs-12">
													<i class="fa fa-circle text-warning	me-1"></i>  <span class="text-black">ผู้แจ้งซ่อม</span></span>';
												}else{
													echo '<span class="badge light badge-success fs-12">
													<i class="fa fa-circle text-success	me-1"></i>  <span class="text-black">นายช่าง</span></span>';
												}
											} ?>
										</td>
										<td>
											<center><button type="button" class="btn btn-warning light sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg<?php echo $row['evaluate_id'];?>">
												<i class="flaticon-381-search-1"></i>
											</button></center>
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
																	<h3 class="card-title mb-3"><strong>รายละเอียดการประเมิน</strong></h3>
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
																			<ul class="user-info-list text-center">
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
																				<h5 class="mb-2" >
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
															<button type="button" class="btn btn-warning light" data-bs-dismiss="modal">ปิด</button>
														</div>
													</div>
												</div>
											</div>
										</td>

										<td class="text-center">
											<?php if($row['status'] == 0){?>
											<button type="button" class="btn btn-success light sharp" data-bs-toggle="modal" data-bs-target=".status<?php echo $row['evaluate_id'];?>">
												<span class="badge light badge-success fs-12">
												<i class="fa fa-check text-success	me-1"></i>  
												<span class="text-black">เปิดใช้งาน</span>
												</span>
											</button>
											<?php }else{ ?>
											<button type="button" class="btn btn-danger light sharp" data-bs-toggle="modal" data-bs-target=".status<?php echo $row['evaluate_id'];?>">
												<span class="badge light badge-danger fs-12">
												<i class="fa fa-times text-danger	me-1"></i>  
												<span class="text-black">ปิดใช้งาน</span>
												</span>
											</button>
											<?php } ?>

											<div class="modal fade status<?php echo $row['evaluate_id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog modal-md">
													<div class="modal-content">
														<form action="<?php echo base_url('Ninechang/evaluate/');?>" method="post">
															<div class="modal-header">
																<h3 class="modal-title">แจ้งเตือน !! </h3>												 
															</div>
															<div class="modal-body">
																<i class="fa fa-exclamation-circle fa-5x text-danger"></i>
																<br><br>
																<h4>ยืนยันแก้ไขสถานะความคิดเห็นหรือไม่ ?</h4>
																<?php 
																	$value = '';
																	foreach($company_id as $val){
																			$value .= $val.",";
																	}
																	$all_values = rtrim($value, ',');
																?>
																<input type="hidden" name="evaluate_id" value="<?php echo $row['evaluate_id'];?>">
																<input type="hidden" name="status" value="<?php echo $row['status'];?>">
																<!-- <input type="text" name="company_id[]" value="ALL"> -->
																<input type="hidden" name="company_id[]" value="<?php echo $all_values;?>">
																<input type="hidden" name="user_type" value="<?php echo $user_type;?>">
																<input type="hidden" name="daterange" value="<?php echo $date_range;?>">
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">ยกเลิก</button>
																<button type="submit" class="btn btn-primary">ยืนยัน</button>
															</div>
											    		</form>
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
                    </div>
                </div>
	</div>
</div>

<?php endif; ?>
  <script>
    function search() {
      var company_id_require = $('#company_id_require').val();
      if(company_id_require == ""){
      $("#result").text('กรุณาเลือกองค์กร');
          event.preventDefault();
          return false;
      }else{
      form.submit();
      return true;
      }
    }
  </script>

  </div>
</div>
<!--**********************************
    Content body end
***********************************-->