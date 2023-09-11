<!-- **********************************
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
                    <h4 class="card-title">ค้นหารายการความคิดเห็นทั้งหมด: งานไทย.net</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="<?php echo base_url('jobth/review/');?>" method="POST">
                            <div class="row text-black">
								<div class="mb-3 col-md-4">
                                    <label class="form-label">ประเภทผู้ใช้งาน</label><span class="text-danger">*</span>
                                    <select class="default-select form-control wide" name="user_type" required="required">
                                        <!-- <option value="ALL" selected>- เลือกทั้งหมด -</option> -->
                                        <option value="employer">องค์กร/บริษัท</option>
                                        <option value="user">บุคคลหางาน</option>
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
							<div class="widget-stat card gradient-1">
								<div class="card-body  p-4">
									<div class="media">
										<span class="me-3">
											<i class="las la-tasks text-white" style="font-size: 50px;"></i>
										</span>
										<div class="media-body text-white">
											<p class="mb-1">ความคิดเห็นทั้งหมด</p>
											<h4 class="text-white"><?php echo $total_review; ?> รายการ</h4>
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
											<i class="las la-tasks text-white" style="font-size: 50px;"></i>
										</span>
										<div class="media-body text-white">
											<p class="mb-1">องค์กร/บริษัท</p>
											<h4 class="text-white"><?php echo $total_employers; ?> รายการ</h4>
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
											<h4 class="text-white"><?php echo $total_users; ?> รายการ</h4>
											<div class="progress mb-2 bg-secondary">
												<div class="progress-bar progress-animated bg-light" style="width: 20%"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
					
<?php if(!empty($user_type)): 
	
	if($user_type == "ALL"){ ?>

    <div class="profile-tab">
      <div class="custom-tab-1">
        
        <ul class="nav nav-tabs">
          <li class="nav-item"><a href="#employers" data-bs-toggle="tab" class="nav-link active show">ความคิดเห็นองค์กร/บริษัท</a>
          </li>
          <li class="nav-item"><a href="#users" data-bs-toggle="tab" class="nav-link">ความคิดเห็นบุคคลหางาน</a>
          </li>
        </ul>

        <div class="tab-content">
			<div id="employers" class="tab-pane fade active show">
				<div class="my-post-content pt-3">

				<h4><code><span style="font-family: 'Kanit', sans-serif;">ตารางแสดงความคิดเห็นองค์กร/บริษัท</span></code></h4><br>

						<div class="row">
							<div class="col-xl-12 col-sm-12">
								<div class="table-responsive">
								
									<table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
										<thead>
											<tr class="text-center">
												<th>#</th>
												<th>วันที่แจ้ง</th>
												<th style="min-width: 150px">องค์กร</th>
												<th style="min-width: 300px">ความคิดเห็น</th>
												<th>โทรศัพท์</th>
												<th>ประเภทผู้ใช้งาน</th>
												<th>สถานะความคิดเห็น</th>
											</tr>
										</thead>
										<tbody>
										<?php if(!empty($review_employer)){
											foreach($review_employer as $key => $row){ ?>
											<tr class="text-black">
												<td class="text-center"><?php echo $key+1; ?></td>
                                				<td><?php echo date('d/m/Y',strtotime($row["created_at"])) ?></td>
												<td><?php echo $row['name']; ?></td>
												<td><?php echo $row['text']; ?></td>
												<td><?php echo $row['tel']; ?></td>
												<td>
													<span class="badge light badge-primary">
													<i class="fa fa-circle text-primary me-1"></i>
													<span class="text-black">องค์กร/บริษัท</span>
													</span>
												</td>
												<td class="text-center">
													<?php if($row['view_status'] == 0){?>
													<button type="button" class="btn btn-success light sharp" data-bs-toggle="modal" data-bs-target=".status<?php echo $row['view_status'];?>">
														<span class="badge light badge-success fs-12">
														<i class="fa fa-check text-success	me-1"></i>  
														<span class="text-black">เปิดใช้งาน</span>
														</span>
													</button>
													<?php }else{ ?>
													<button type="button" class="btn btn-danger light sharp" data-bs-toggle="modal" data-bs-target=".status<?php echo $row['view_status'];?>">
														<span class="badge light badge-danger fs-12">
														<i class="fa fa-times text-danger	me-1"></i>  
														<span class="text-black">ปิดใช้งาน</span>
														</span>
													</button>
													<?php } ?>

													<div class="modal fade status<?php echo $row['view_status'];?>" tabindex="-1" role="dialog" aria-hidden="true">
														<div class="modal-dialog modal-md">
															<div class="modal-content">
																<form action="<?php echo base_url('Jobth/review/');?>" method="post">
																	<div class="modal-header">
																		<h3 class="modal-title">แจ้งเตือน !! </h3>												 
																	</div>
																	<div class="modal-body">
																		<i class="fa fa-exclamation-circle fa-5x text-danger"></i>
																		<br><br>
																		<h4>ยืนยันแก้ไขสถานะความคิดเห็นหรือไม่ ?</h4>
																		<input type="hidden" name="id" value="<?php echo $row['id'];?>">
																		<input type="hidden" name="view_status" value="<?php echo $row['view_status'];?>">
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
                                            <td colspan="5"><center><br><h3 class="text-danger">ไม่พบข้อมูล!</h3></center></td>
                                        </tr>';
                                    } ?>
											


										</tbody>
									</table>
								
							</div>
						</div>
	                </div>

			</div>
		</div>

          <div id="users" class="tab-pane fade">
            <div class="my-post-content pt-3">

     
            	<h4><code><span style="font-family: 'Kanit', sans-serif;">ตารางแสดงความคิดเห็นบุคคลหางาน</span></code></h4><br>

            
             			<div class="row">
							<div class="col-xl-12 col-sm-12">
								<div class="table-responsive">
								<div class="table-responsive">
									<table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
										<thead>
											<tr class="text-center">
												<th>#</th>
												<th>วันที่แจ้ง</th>
												<th style="min-width: 150px">ชื่อ - นามสกุล</th>
												<th style="min-width: 250px">ความคิดเห็น</th>
												<th style="min-width: 100px">โทรศัพท์</th>
												<th>ประเภทผู้ใช้งาน</th>
												<th>สถานะความคิดเห็น</th>
											</tr>
										</thead>
										<tbody>
										<?php if(!empty($review_user)){
											foreach($review_user as $key => $row){ ?>
											<tr class="text-black">
												<td class="text-center"><?php echo $key+1; ?></td>
                                				<td><?php echo date('d/m/Y',strtotime($row["created_at"])) ?></td>
												<td><?php echo $row['name']." ".$row['lastname']; ?></td>
												<td><?php echo $row['text']; ?></td>
												<td><?php echo $row['contact_tel']; ?></td>
												<td>
													<span class="badge light badge-danger">
													<i class="fa fa-circle text-danger me-1"></i>
													<span class="text-black">บุคคลหางาน</span>
													</span>
												</td>
												<td class="text-center">
													<?php if($row['view_status'] == 0){?>
													<button type="button" class="btn btn-success light sharp" data-bs-toggle="modal" data-bs-target=".status<?php echo $row['view_status'];?>">
														<span class="badge light badge-success fs-12">
														<i class="fa fa-check text-success	me-1"></i>  
														<span class="text-black">เปิดใช้งาน</span>
														</span>
													</button>
													<?php }else{ ?>
													<button type="button" class="btn btn-danger light sharp" data-bs-toggle="modal" data-bs-target=".status<?php echo $row['view_status'];?>">
														<span class="badge light badge-danger fs-12">
														<i class="fa fa-times text-danger	me-1"></i>  
														<span class="text-black">ปิดใช้งาน</span>
														</span>
													</button>
													<?php } ?>

													<div class="modal fade status<?php echo $row['view_status'];?>" tabindex="-1" role="dialog" aria-hidden="true">
														<div class="modal-dialog modal-md">
															<div class="modal-content">
																<form action="<?php echo base_url('Jobth/review/');?>" method="post">
																	<div class="modal-header">
																		<h3 class="modal-title">แจ้งเตือน !! </h3>												 
																	</div>
																	<div class="modal-body">
																		<i class="fa fa-exclamation-circle fa-5x text-danger"></i>
																		<br><br>
																		<h4>ยืนยันแก้ไขสถานะความคิดเห็นหรือไม่ ?</h4>
																		<input type="hidden" name="id" value="<?php echo $row['id'];?>">
																		<input type="hidden" name="view_status" value="<?php echo $row['view_status'];?>">
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
                                            <td colspan="5"><center><br><h3 class="text-danger">ไม่พบข้อมูล!</h3></center></td>
                                        </tr>';
                                    } ?>
											


										</tbody>
									</table>
								</div>
							</div>
						</div>
	                </div>
            </div>
          </div>
        </div>

      </div>
    </div>

<?php }else if ($user_type == "employer"){ ?>
<br>
<h3><code><span style="font-family: 'Kanit', sans-serif;">ตารางแสดงความคิดเห็นองค์กร/บริษัท</span></code></h3><br>

						<div class="row">
							<div class="col-xl-12 col-sm-12">
								<div class="table-responsive">
								<div class="table-responsive">
									<table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
										<thead>
											<tr class="text-center">
												<th>#</th>
												<th>วันที่แจ้ง</th>
												<th style="min-width: 150px">องค์กร</th>
												<th style="min-width: 250px">ความคิดเห็น</th>
												<th style="min-width: 100px">โทรศัพท์</th>
												<th>ประเภทผู้ใช้งาน</th>
												<th>สถานะความคิดเห็น</th>
											</tr>
										</thead>
										<tbody>
										<?php if(!empty($review_employer)){
											foreach($review_employer as $key => $row){ ?>
											<tr class="text-black">
												<td class="text-center"><?php echo $key+1; ?></td>
                                				<td><?php echo date('d/m/Y',strtotime($row["created_at"])) ?></td>
												<td><?php echo $row['name']; ?></td>
												<td><?php echo $row['text']; ?></td>
												<td><?php echo $row['tel']; ?></td>
												<td class="text-center">
													<span class="badge light badge-primary">
													<i class="fa fa-circle text-primary me-1"></i>
													<span class="text-black">องค์กร/บริษัท</span>
													</span>
												</td>
												<td class="text-center">
													<?php if($row['view_status'] == 0){?>
													<button type="button" class="btn btn-success light sharp" data-bs-toggle="modal" data-bs-target=".status<?php echo $row['id'];?>">
														<span class="badge light badge-success fs-12">
														<i class="fa fa-check text-success	me-1"></i>  
														<span class="text-black">เปิดใช้งาน</span>
														</span>
													</button>
													<?php }else{ ?>
													<button type="button" class="btn btn-danger light sharp" data-bs-toggle="modal" data-bs-target=".status<?php echo $row['id'];?>">
														<span class="badge light badge-danger fs-12">
														<i class="fa fa-times text-danger	me-1"></i>  
														<span class="text-black">ปิดใช้งาน</span>
														</span>
													</button>
													<?php } ?>

													<div class="modal fade status<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
														<div class="modal-dialog modal-md">
															<div class="modal-content">
																<form action="<?php echo base_url('Jobth/review/');?>" method="post">
																	<div class="modal-header">
																		<h3 class="modal-title">แจ้งเตือน !! </h3>												 
																	</div>
																	<div class="modal-body">
																		<i class="fa fa-exclamation-circle fa-5x text-danger"></i>
																		<br><br>
																		<h4>ยืนยันแก้ไขสถานะความคิดเห็นหรือไม่ ?</h4>
																		<input type="hidden" name="id" value="<?php echo $row['id'];?>">
																		<input type="hidden" name="view_status" value="<?php echo $row['view_status'];?>">
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
                                            <td colspan="5"><center><br><h3 class="text-danger">ไม่พบข้อมูล!</h3></center></td>
                                        </tr>';
                                    } ?>
											


										</tbody>
									</table>
								</div>
							</div>
						</div>
	                </div>



<?php }else if ($user_type == "user"){ ?>
<br>
<h3><code><span style="font-family: 'Kanit', sans-serif;">ตารางแสดงความคิดเห็นบุคคลหางาน</span></code></h3><br>

				<div class="row">
					<div class="col-xl-12 col-sm-12">
						<div class="table-responsive">
						<div class="table-responsive">
							<table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
								<thead>
									<tr class="text-center">
										<th>#</th>
										<th>วันที่แจ้ง</th>
										<th style="min-width: 150px">ชื่อ - นามสกุล</th>
										<th style="min-width: 250px">ความคิดเห็น</th>
										<th style="min-width: 100px">โทรศัพท์</th>
										<th>ประเภทผู้ใช้งาน</th>
										<th>สถานะความคิดเห็น</th>
									</tr>
								</thead>
								<tbody>
								<?php if(!empty($review_user)){
									foreach($review_user as $key => $row){ ?>
									<tr class="text-black">
										<td class="text-center"><?php echo $key+1; ?></td>
                        				<td><?php echo date('d/m/Y',strtotime($row["created_at"])) ?></td>
										<td><?php echo $row['name']." ".$row['lastname']; ?></td>
										<td><?php echo $row['text']; ?></td>
										<td><?php echo $row['contact_tel']; ?></td>
										<td>
											<span class="badge light badge-danger">
											<i class="fa fa-circle text-danger me-1"></i>
											<span class="text-black">บุคคลหางาน</span>
											</span>
										</td>
										<td class="text-center">
											<?php if($row['view_status'] == 0){?>
											<button type="button" class="btn btn-success light sharp" data-bs-toggle="modal" data-bs-target=".status<?php echo $row['id'];?>">
												<span class="badge light badge-success fs-12">
												<i class="fa fa-check text-success	me-1"></i>  
												<span class="text-black">เปิดใช้งาน</span>
												</span>
											</button>
											<?php }else{ ?>
											<button type="button" class="btn btn-danger light sharp" data-bs-toggle="modal" data-bs-target=".status<?php echo $row['id'];?>">
												<span class="badge light badge-danger fs-12">
												<i class="fa fa-times text-danger	me-1"></i>  
												<span class="text-black">ปิดใช้งาน</span>
												</span>
											</button>
											<?php } ?>

											<div class="modal fade status<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog modal-md">
													<div class="modal-content">
														<form action="<?php echo base_url('Jobth/review/');?>" method="post">
															<div class="modal-header">
																<h3 class="modal-title">แจ้งเตือน !! </h3>												 
															</div>
															<div class="modal-body">
																<i class="fa fa-exclamation-circle fa-5x text-danger"></i>
																<br><br>
																<h4>ยืนยันแก้ไขสถานะความคิดเห็นหรือไม่ ?</h4>
																<input type="hidden" name="id" value="<?php echo $row['id'];?>">
																<input type="hidden" name="view_status" value="<?php echo $row['view_status'];?>">
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
                                    <td colspan="5"><center><br><h3 class="text-danger">ไม่พบข้อมูล!</h3></center></td>
                                </tr>';
                            } ?>
									

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


<?php }?>







            </div>
		</div>
	</div>
</div>
<?php endif; ?> 

</div>
</div>
<!--**********************************
Content body end
***********************************