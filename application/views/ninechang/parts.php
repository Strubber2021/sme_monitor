<!-- **********************************
    Content body start
***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
        	<div class="col-xl-12">
        		<div class="clearfix mb-3 text-end">
        			<a href="<?php echo base_url('ninechang/')?>" class="btn btn-primary px-3 my-1 light me-2"><i class="fa fa-reply"></i> </a>
        		</div>
        	</div>
          
          <div class="col-xl-12 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">รายการข้อมูลอะไหล่/อุปกรณ์ซ่อม: โปรแกรมซ่อมบำรุง</h4>
              </div>
              <div class="card-body">
                <div class="basic-form">
                  	<form action="<?php echo base_url('ninechang/parts/');?>" method="POST">
						<div class="row text-black">
							<div class="mb-4 col-md-4">
								<label class="form-label">องค์กร</label><span class="text-danger">*</span>
								<select class="multi-select" name="company_id[]" multiple="multiple" required="required">
									<option value="ALL" selected>- เลือกทั้งหมด -</option>
									<?php foreach($list_company as $row){?>
											<option value="<?php echo $row['company_id']; ?>"><?php echo $row['company_name']; ?></option>
									<?php } ?>
								</select>
							</div>
							<!-- <div class="mb-3 col-md-3">
								<label class="form-label">กลุ่มงานซ่อม</label>
								<select id="single-select" style="background-color: green;" name="group_name">
									<option value="ALL" selected>- เลือกทั้งหมด -</option>
										<?php foreach($repair_group as $row){
											if($group_name == $row['group_name']){
											$selected = "selected";
											}else{
											$selected = "";
											}
										?>
										<option value="<?php echo $row['group_name']; ?>" <?php echo $selected; ?>><?php echo $row['group_name']; ?></option>
									<?php } ?>
								</select>
							</div> -->
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="min-width: 150px">ชื่อองค์กร</th>
                                    <th style="min-width: 100px" class="text-center">วันที่เริ่มใช้งาน</th>
                                    <th>อะไหล่/อุปกรณ์ซ่อม</th> 
                                </tr>
                            </thead>
                            <tbody>                         
                                <?php if(!empty($result_parts)){
                                foreach($result_parts as $key => $row){ ?>
                                <tr class="text-black">
                                    <td class="text-center"><?php echo $key+1; ?></td>
                                    <td><?php echo $row['company_name'] ?></td>
                                    <td class="text-center"><?php echo date('d/m/Y',strtotime($row["created_at"])) ?></td>
                                    <td><?php echo $row['parts_name'] ?></td>
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
        </div>
    </div>

<?php endif; ?>

    </div>
</div>
<!--**********************************
    Content body end
***********************************-->