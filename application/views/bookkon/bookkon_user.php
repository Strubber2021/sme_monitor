<!--**********************************
	Content body start
***********************************-->
<div class="content-body">
	<div class="container-fluid">
		<!-- row -->
		<div class="row">
			<div class="col-xl-12">
				<div class="clearfix mb-3 text-end">
					<a href="<?php echo base_url('bookkon/')?>" class="btn btn-primary px-3 my-1 light me-2"><i class="fa fa-reply"></i> </a>
				</div>
			</div>
			<div class="col-xl-12 col-lg-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">กรองข้อมูลผู้ใช้ในระบบ: บุคคล.com</h4>
					</div>
					<div class="card-body">
						<div class="basic-form">
							<form action="<?php echo base_url('bookkon/user/');?>" method="POST">
								<div class="row text-black">
									<div class="mb-3 col-md-3">
										<label class="form-label">องค์กร</label><span class="text-danger">*</span>
										<select class="multi-select" id="company_require" name="sys_customer_code[]" multiple="multiple" required="required">
											<option value="ALL" selected>- เลือกทั้งหมด -</option>
											<?php foreach($list_company as $row){?>
												<option value="<?php echo $row['sys_customer_code']; ?>"><?php echo $row['name']; ?></option>
											<?php } ?>
										</select>
										<div class="text-danger" id="result"></div>
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

<?php if(!empty($sys_customer_code)): ?>
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
										<h4 class="text-white"><?php echo $total_company;?> องค์กร</h4>
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
										<p class="mb-1">ผู้ใช้ทั้งหมด</p>
										<h4 class="text-white"><?php echo $total_user;?> คน</h4>
										<div class="progress mb-2 bg-secondary">
											<div class="progress-bar progress-animated bg-light" style="width: 20%"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6">
						<div class="widget-stat card gradient-8">
							<div class="card-body  p-4">
								<div class="media">
									<span class="me-3">
										<i class="la la-tools text-white" style="font-size: 50px;"></i>
									</span>
									<div class="media-body text-white">
										<p class="mb-1">เพศชาย</p>
										<h4 class="text-white"><?php echo $total_male;?> คน</h4>
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
										<p class="mb-1">เพศหญิง</p>
										<h4 class="text-white"><?php echo $total_female;?> คน</h4>
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
							<table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
								<thead>
									<tr class="text-center">
										<th>#</th>
										<th>วันที่เริ่มใช้งาน</th>
										<th class="text-center">Logo</th>
										<th style="min-width: 240px">ชื่อองค์กร</th>
										<th style="min-width: 100px">อีเมล</th>
										<th style="min-width: 150px">ชื่อผู้ใช้</th>
										<th>เบอร์โทร</th>
										<th>HR</th>
										<th>พนักงาน</th>
										<th>รายการก่อนหน้า</th>
										<th>ลงเวลาเข้างาน</th>
										<th>รายการก่อนหน้า</th>
                                        <th>ประมวลผลเงินเดือน</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										if(!empty($result_search)){
										foreach($result_search as $key => $row){ ?>
									<tr class="text-black">
										<td class="text-center"><?php echo $key+1; ?></td>
										<td class="text-center"><?php echo date('d/m/Y',strtotime($row["created_at"])) ?></td>
										<td>
											<?php 
												$url = 'https://bukkhon.com/';
												if(!empty($row['company_img'])){
													echo '<img src="'.$url.'company/'.$row["sys_customer_code"].'/images/'.$row['company_img'].'" alt="image" class="me-2 rounded" width="75">';
												}else{
													echo '<img src="'.base_url('/assets/images/nologo.png').'" alt="image" class="me-2 rounded" width="75">';
												}
											?>
										</td>
										<td><?php echo $row['name']; ?></td>
										<td><?php echo $row['username']; ?></td>
										<td><?php echo $row['person_name']; ?></td>
										<td><?php echo $row['company_tel']; ?></td>
										<td class="text-center"><?php echo $row['total_hr']; ?></td>
										<td class="text-center"><?php echo $row['total']; ?></td>
										<td class="text-center">
											<?php if(!empty($row['pre_company_time'])){
												echo '<h4><span class="badge light badge-warning text-black">'.date('d/m/Y',strtotime($row["pre_company_time"])).'</span></h4>';
											}?> 
										</td>
										<td class="text-center">
											<?php if(!empty($row['company_time'])){
												echo '<h4><span class="badge light badge-success text-black">'.date('d/m/Y',strtotime($row["company_time"])).'</span></h4>';
											}?> 
										</td>
										<td class="text-center">
											<?php if(!empty($row['pre_company_slip'])){
												echo '<h4><span class="badge light badge-warning text-black">'.date('d/m/Y',strtotime($row["pre_company_slip"])).'</span></h4>';
											}?> 
										</td>
										<td class="text-center">
											<?php if(!empty($row['company_slip'])){
												echo '<h4><span class="badge light badge-primary text-black">'.date('d/m/Y',strtotime($row["company_slip"])).'</span></h4>';
											}?> 
										</td>
									</tr>
									<?php } }else{
										echo '
										<tr>
											<td colspan="11"><center><br><h3 class="text-danger">ไม่พบข้อมูล!</h3></center></td>
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
<?php endif; ?>
<script>
	function search() {
		var company_require = $('#company_require').val();
		if(company_require == ""){
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
