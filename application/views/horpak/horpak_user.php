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
            <h4 class="card-title">กรองข้อมูลผู้ใช้ในระบบหอพัก</h4>
          </div>

          <div class="card-body">
            <div class="basic-form">
              <form action="<?php echo base_url('horpak/user/');?>" method="POST">

                <div class="row text-black">
									<div class="mb-3 col-md-4">
                    <label class="form-label">รายการหอพัก</label><span class="text-danger">*</span>
                    <select class="multi-select" id="company_id_require" name="company_id[]" multiple="multiple" required="required">
                      <option value="ALL" selected>- เลือกทั้งหมด -</option>
                      <?php foreach($list_company as $row){?>
                          <option value="<?php echo $row['company_id']; ?>"><?php echo $row['company_name']; ?></option>
                      <?php } ?>
                  	</select>
                  </div>
									<div class="mb-3 col-md-4">
										<label class="form-label">ประเภทผู้ใช้</label>
										<select id="inputState" class="default-select form-control wide" name="employees_type">
											<option value="admin" <?php if($employees_type == 'admin'){echo "selected";} ?>>ผู้ดูแล/เจ้าของ</option>
											<option value="1" <?php if($employees_type == '1'){echo "selected";} ?>>นิติ</option>
											<option value="2" <?php if($employees_type == '2'){echo "selected";} ?>>นายช่าง</option>
											<option value="3" <?php if($employees_type == '3'){echo "selected";} ?>>ผู้เช่า</option>
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
										<p class="mb-1">หอพัก</p>
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
										<p class="mb-1">ผู้ดูแล/เจ้าของ</p>
										<h4 class="text-white"><?php echo $total_admin; ?> คน</h4>
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
										<h4 class="text-white"><?php echo $total_emp1; ?> คน</h4>
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
										<h4 class="text-white"><?php echo $total_emp2; ?> คน</h4>
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
										<h4 class="text-white"><?php echo $total_emp3; ?> คน</h4>
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
							
						<?php if($employees_type == 'admin'){ ?>
							<table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 845px">
								<thead>
									<tr class="text-center">
										<th>#</th>
										<th>วันที่เริ่มใช้งาน</th>
										<th>ชื่อหอพัก</th>
										<th>อีเมล/Username</th>
										<th>ชื่อผู้ใช้</th>
										<th>สถานะ</th>
										<th>งานแจ้งซ่อม (MA)</th>								
									</tr>
								</thead>
								<tbody>
									<?php 
                  if(!empty($result_search)){
                  foreach($result_search as $key => $row){ ?>
									<tr class="text-black">
										<td class="text-center"><?php echo $key+1; ?></td>
										<td class="text-center"><?php echo date('d/m/Y',strtotime($row["created_at"])) ?></td>
										<td><?php echo $row['company_name']; ?></td>
										<td><?php echo $row['email']; ?></td>
										<td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
										<td class="text-center">ผู้ดูแล/เจ้าของ</td>
										<td class="text-center">
											<?php if(!empty($row['created_ma'])){
												echo '<h4><span class="badge light badge-primary text-black">'.date('d/m/Y',strtotime($row["created_ma"])).'</span></h4>';
											}?> 
										</td>
									</tr>
									<?php } }else{
                    echo '
                    <tr>
                    <td colspan="7"><center><br><h3 class="text-danger">ไม่พบข้อมูล!</h3></center></td>
                    </tr>';
                  } ?>
								</tbody>
							</table>

						<?php } 
 						else if($employees_type == 1 || $employees_type == 2 || $employees_type == 3){ ?>

							<table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
								<thead>
									<tr class="text-center">
										<th>#</th>
										<th>วันที่เริ่มใช้งาน</th>
										<th>ชื่อหอพัก</th>
										<th>อีเมล/Username</th>
										<th>ชื่อผู้ใช้</th>
										<th>ฝ่าย</th>
										<th>แผนก</th>
										<th>ประเภทผู้ใช้งาน</th>								
									</tr>
								</thead>
								<tbody>
									<?php 
                  if(!empty($result_emp)){
                  foreach($result_emp as $key => $row){ ?>
									<tr class="text-black">
										<td class="text-center"><?php echo $key+1; ?></td>
										<td class="text-center"><?php echo date('d/m/Y',strtotime($row["created_at"])) ?></td>
										<td><?php echo $row['company_name']; ?></td>
										<td><?php echo $row['username']; ?></td>
										<td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
										<td><?php echo $row['department_name']; ?></td>
										<td><?php echo $row['section_name']; ?></td>
										<td class="text-center">
											<?php if($row['employees_type'] == 1){
												echo '<span class="badge light badge-success">
															<i class="fa fa-circle text-success me-1"></i>
															<span class="text-black">นิติ</span>
														</span>';
											}else if($row['employees_type'] == 2){
												echo '<span class="badge light badge-primary">
															<i class="fa fa-circle text-primary me-1"></i>
															<span class="text-black">นายช่าง</span>
														</span>';
											}else{
												echo'<span class="badge light badge-secondary">
															<i class="fa fa-circle text-secondary me-1"></i>
															<span class="text-black">ผู้เช่า</span>
														</span>';
											}?>
										</td>
									</tr>
									<?php } }else{
                    echo '
                    <tr>
                    <td colspan="8"><center><br><h3 class="text-danger">ไม่พบข้อมูล!</h3></center></td>
                    </tr>';
                  } ?>
								</tbody>
							</table>

						<?php } ?>


					</div>
				</div>
			</div>



<?php endif; ?>

      </div>
    </div>
		</div>
	</div>

  </div>
</div>
<!--**********************************
    Content body end
***********************************-->