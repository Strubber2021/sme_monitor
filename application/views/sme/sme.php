<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
            	<form action="<?php echo base_url('SME/');?>" method="POST">
					<div class="d-flex mb-4 justify-content-between align-items-center flex-wrap">			
						<div class="mb-3 col-md-2">
							<div class="card-tabs mt-3 mt-sm-0">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-bs-toggle="tab" href="#graph" role="tab"><i class="flaticon-041-graph"></i> ข้อมูลวิเคราะห์</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="mb-3 col-md-7"></div>
						<div class="mb-3 col-md-2">
							<label >ช่วงวันที่ดู</label>
							<input class="form-control input-daterange-datepicker" type="text" name="daterange" value="<?php echo $thismonth; ?>">
						</div>
						<div class="mb-3 col-md-1" align="right">
							<br>
							&nbsp;<button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-search"></i>&nbsp; ค้นหา</button>
						</div>					
					</div>
				</form>

				<div class="tab-content">	
					<div class="tab-pane active show" id="graph">	
						<div class="row">
							<div class="col-xl-12">
								<?php if(!empty($contact)): ?>	
								<div class="card">
									<div class="card-header border-0">
										<h4 class="card-title"><strong>คำแนะนำและติชมจากผู้ใช้ที่ติดต่อมา</strong></h4>
										<div class="btn-group dropend mb-1">
										</div>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
												<thead>
													<tr class="text-center">
														<th >#</th>
														<th>รายละเอียด</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach($contact as  $row){
														if(!empty($row['comment'])){ ?>
														<tr>
															<td class="text-center">
																<h6 class="mt-2"><?php $x = $x+1;echo $x; ?>.</h6>
															</td>
															<td>
																<h6 class="mb-1"><?php echo $row['comment']; ?></h6>
																<small class="d-block">เพิ่มเมื่อ <?php echo date('d/m/Y H:i',strtotime($row["ts_create"])) ?> น.</small>	
															</td>													
														</tr>
													<?php } }?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<?php else: ?>
								<div class="card">
									<div class="card-header border-0">
										<h4 class="card-title"><strong>คำแนะนำและติชมจากผู้ใช้ที่ติดต่อมา</strong></h4>
										<div class="btn-group dropend mb-1">
										</div>
									</div>
									<div class="card-body">
										<h3 class="text-danger"><i class="fas fa-exclamation"></i> &nbsp; ไม่พบข้อมูล</h3>	
									</div>
								</div>	
								<?php endif; ?>
							</div>
						</div>
					</div>

					<div class="tab-pane" id="search">
						<div class="row">
							<div class="col-xl-3 col-sm-12">
								<a href="index4-search4.html">
									<div class="card gradient-1 card-bx">
										<div class="card-body d-flex align-items-center">
											<div class="me-auto text-white">
												<h2 class="text-white">6</h2>
												<h2 class="text-white">หน้าถูกเรียกดู</h2>
											</div>
										<i class="flaticon-381-smartphone-7 text-white" style="font-size:60px;"></i>
										</div>
									</div>	
								</a>
							</div>
						</div>
					</div>
				</div>  
            </div>
        </div>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->