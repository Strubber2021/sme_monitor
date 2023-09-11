<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
      <!-- row -->
      <div class="row">
				<div class="col-xl-12">
					<div class="clearfix mb-3 text-end">
						<a href="<?php echo base_url('Ninechang/')?>" class="btn btn-primary px-3 my-1 light me-2"><i class="fa fa-reply"></i> </a>
					</div>
				</div>

				<div class="col-xl-12 col-lg-12">
          <div class="card">
            <div class="card-header">
                <h4 class="card-title">กรองข้อมูลงานในระบบ: โปรแกรมซ่อมบำรุง</h4>
            </div>
            <div class="card-body">
              <div class="basic-form">
              	<form action="<?php echo base_url('ninechang/job/');?>" method="POST">
                  <div class="row text-black">
                  	
                  	<div class="mb-3 col-md-4">
                      <label class="form-label">องค์กร</label><span class="text-danger">*</span>
                      <select class="multi-select" name="company_id[]" multiple="multiple" required="required">
                          <option value="ALL" selected>- เลือกทั้งหมด -</option>
                          <?php foreach($list_company as $row){?>
                            <option value="<?php echo $row['company_id']; ?>"><?php echo $row['company_name']; ?></option>
                          <?php } ?>
                      </select>
                      <div class="text-danger" id="result"></div>
                  	</div>

					<div class="mb-3 col-md-3">
                      <label class="form-label">ประเภทงานแจ้งซ่อม</label>
                      <select id="inputState" name="job_type" class="default-select form-control wide">
                        <!-- <option value="3">- ทั้งหมด -</option> -->
                        <option value="1">MA</option>
                        <option value="2">PM</option>
                      </select>
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
											<p class="mb-1">องค์กร</p>
											<h4 class="text-white"> <?php echo $total_company;?> องค์กร</h4>
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
											<p class="mb-1">งานในระบบทั้งหมด</p>
											<h4 class="text-white"> <?php echo $total_job;?> รายการ</h4>
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
											<p class="mb-1">งานแจ้งซ่อม MA</p>
											<h4 class="text-white"><?php echo $total_ma;?> งาน</h4>
											<div class="progress mb-2 bg-secondary">
												<div class="progress-bar progress-animated bg-light" style="width: 15%"></div>
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
											<i class="las la-users-cog text-white" style="font-size: 50px;"></i>
										</span>
										<div class="media-body text-white">
											<p class="mb-1">งานแจ้งซ่อม PM</p>
											<h4 class="text-white"><?php echo $total_pm;?> งาน</h4>
											<div class="progress mb-2 bg-secondary">
												<div class="progress-bar progress-animated bg-light" style="width: 5%"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

<?php if(!empty($company_id)): 
 	
		if($job_type == 1){ ?>
			<br><h4><strong><u>ตารางแสดงรายการแจ้งซ่อม MA</u></strong></h4><br>
			<div class="row">
				<div class="col-xl-12 col-sm-12">
					<div class="table-responsive">
						<table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
							<thead>
								<tr class="text-center">
									<th>#</th>
									<th style="min-width: 200px">ชื่อองค์กร</th>
									<th>ประเภทงานแจ้งซ่อม</th>
									<th>งานซ่อมเอง</th>
									<th>งานซ่อมภายนอก</th>
									<th>รวมจำนวนงาน</th>
									<th>งานแจ้งซ่อมก่อนหน้า(MA)</th>
									<th>งานแจ้งซ่อม(MA)</th>
								</tr>
							</thead>
							<tbody>
								<?php if(!empty($result_ma)) {
								foreach($result_ma as $key => $row){ ?>
									<tr class="text-black">
										<td class="text-center"><?php echo $key+1; ?></td>
										<td><?php echo $row['company_name']; ?></td>
										<td class="text-center">งานแจ้งซ่อม MA</td>
										<td class="text-center"><?php echo $row['report_type1']; ?></td>
										<td class="text-center"><?php echo $row['report_type2']; ?></td>
										<td class="text-center"><span class="badge badge-rounded badge-info" style="font-size: 11px;"><?php echo $row['total']; ?></span></td>
										<td class="text-center">
											<?php if(!empty($row['pre_created_ma'])){
												echo '<h4><span class="badge light badge-warning text-black">'.date('d/m/Y',strtotime($row["pre_created_ma"])).'</span></h4>';
											} ?> 
										</td>
										<td class="text-center">
											<?php if(!empty($row['created_ma'])){
												echo '<h4><span class="badge light badge-success text-black">'.date('d/m/Y',strtotime($row["created_ma"])).'</span></h4>';
											}?> 
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
		
		<br><h4><strong><u>ตารางแสดงรายการบำรุงรักษา PM</u></strong></h4><br>
		<div class="row">
			<div class="col-xl-12 col-sm-12">
				<div class="table-responsive">
					<table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
						<thead>
							<tr class="text-center">
								<th>#</th>
								<th style="min-width: 200px">ชื่อองค์กร</th>
								<th>ประเภทงานแจ้งซ่อม</th>
								<th>รวมจำนวนงาน</th>
								<th>งานบำรุงรักษาก่อนหน้า (PM)</th>
                                <th>งานบำรุงรักษา (PM)</th>
							</tr>
						</thead>
						<tbody>
							<?php if(!empty($result_pm)) {
							foreach($result_pm as $key => $row){ ?>
								<tr class="text-black">
									<td class="text-center"><?php echo $key+1; ?></td>
									<td><?php echo $row['company_name']; ?></td>
									<td class="text-center">งานบำรุงรักษา PM</td>
									<td class="text-center"><span class="badge badge-rounded badge-info" style="font-size: 11px;"><?php echo $row['total']; ?></span></td>
									<td class="text-center">
										<?php if(!empty($row['pre_created_pm'])){
											echo '<h4><span class="badge light badge-warning text-black">'.date('d/m/Y',strtotime($row["pre_created_pm"])).'</span></h4>';
										}?> 
									</td>
									<td class="text-center">
										<?php if(!empty($row['created_pm'])){
											echo '<h4><span class="badge light badge-success text-black">'.date('d/m/Y',strtotime($row["created_pm"])).'</span></h4>';
										}?> 
									</td>
								</tr>
							<?php } }else{
								echo '
								<tr>
									<td colspan="4"><center><br><h3 class="text-danger">ไม่พบข้อมูล!</h3></center></td>
								</tr>';
								} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<?php } ?>

<?php endif; ?>
					<!-- ******* -->
      	</div>
    	</div>
		</div>
	</div> <!-- end row -->


  </div>
</div>
<!--**********************************
    Content body end
***********************************-->