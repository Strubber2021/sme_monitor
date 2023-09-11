<!--**********************************
    Content body start
***********************************-->
<div class="content-body text-black">
    <div class="container-fluid">
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
                        <h4 class="card-title">กรองข้อมูลงานในระบบ: หาช่าง หางาน</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="<?php echo base_url('board/job/');?>" method="POST">
                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">งานประกาศของ</label><span class="text-danger">*</span>
                                        <select id="inputState" class="default-select form-control wide" name="user_type" required="required">                                            
                                            <option value="1" selected>หาช่าง</option>
                                            <option value="2">หางาน</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label">ประเภทช่างซ่อม/หมวดหมู่งานซ่อม</label>
                                        <select class="multi-select" name="type_id[]" multiple="multiple" required="required">   
                                            <?php foreach($list_typerepair as $row){?>
                                                <option value="<?php echo $row['type_id']; ?>" <?php if($row['type_id'] == $type_id){echo "selected";} ?>><?php echo $row['type_name'];?></option>
                                            <?php } ?>
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
                                <div class="widget-stat card gradient-4">
                                    <div class="card-body p-4">
                                        <div class="media">
                                            <span class="me-1">
                                                <i class="fas fa-chalkboard-teacher text-white" style="font-size: 40px;"></i>
                                            </span>
                                            <div class="media-body text-white">
                                                <p class="mb-1">หาช่าง</p>
                                                <h4 class="text-white"><?php echo $total_job; ?> รายการ</h4>
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
                                    <div class="card-body p-4">
                                        <div class="media">
                                            <span class="me-1">
                                                <i class="fas fa-tasks text-white" style="font-size: 40px;"></i>
                                            </span>
                                            <div class="media-body text-white">
                                                <p class="mb-1">หางาน</p>
                                                <h4 class="text-white"><?php echo $total_techn; ?> รายการ</h4>
                                                <div class="progress mb-2 bg-secondary">
                                                    <div class="progress-bar progress-animated bg-light" style="width: 15%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                       
                            <!-- <div class="col-xl-3 col-sm-6">
                                <div class="widget-stat card gradient-7">
                                    <div class="card-body  p-4">
                                        <div class="media">
                                            <span class="me-1">
                                                <i class="las la-tasks text-white" style="font-size: 50px;"></i>
                                            </span>
                                            <div class="media-body text-white">
                                                <p class="mb-1">รวมหาช่างทั้งหมด</p>
                                                <h4 class="text-white">2 รายการ</h4>
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
                                    <div class="card-body p-4">
                                        <div class="media">
                                            <span class="me-1">
                                                <i class="las la-tasks text-white" style="font-size: 50px;"></i>
                                            </span>
                                            <div class="media-body text-white">
                                                <p class="mb-1">รวมหางานทั้งหมด</p>
                                                <h4 class="text-white">1 รายการ</h4>
                                                <div class="progress mb-2 bg-secondary">
                                                    <div class="progress-bar progress-animated bg-light" style="width: 20%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="col-xl-3 col-sm-6">
                                <div class="widget-stat card gradient-2">
                                    <div class="card-body p-4">
                                        <div class="media">
                                            <span class="me-1">
                                                <i class="la la-tools text-white" style="font-size: 50px;"></i>
                                            </span>
                                            <div class="media-body text-white">
                                                <p class="mb-1">เป็นสมาชิก</p>
                                                <h4 class="text-white"><?php echo $total_member; ?> รายการ</h4>
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
                                    <div class="card-body p-4">
                                        <div class="media">
                                            <span class="me-1">
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
            
            if($user_type == 1){?>
            <div class="row">
                <div class="col-xl-12 col-sm-12">
                    <div class="table-responsive">
                        <table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>ชื่อบริษัท/ชื่อ-นามสกุล</th>
                                    <th>เบอร์โทร</th>
                                    <th>หมวดหมู่งานซ่อม</th>
                                    <th>วันที่ลงประกาศ</th>
                                    <th class="text-center">สถานะ</th>
                                    <th class="text-center">ประเภทผู้ใช้งาน</th>
                                    <th class="text-center">สิทธิในระบบ</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php  if(!empty($result_job)){
                                foreach($result_job as $key => $row){ ?>
                                <tr class="text-black">
                                    <td class="text-center"><?php echo $key+1; ?></td>
                                    <td><?php echo $row['job_username']; ?></td>
                                    <td><?php echo $row['tel']; ?></td>
                                    <td><?php echo $row['type_name']; ?></td>
                                    <td><?php echo date('d/m/Y',strtotime($row["created_at"])) ?></td>
                                    <td class="text-center">
                                        <?php if($row['urgent'] == 1){
                                            echo '<span class="badge badge-pill badge-danger">ด่วน</span>';
                                        }else{
                                            echo '<span class="badge badge-pill badge-primary">ไม่ด่วน</span>';
                                        } ?>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge light badge-secondary">
                                            <i class="fa fa-circle text-secondary me-1"></i>
                                            <span class="text-black">ผู้แจ้งซ่อม</span>
                                        </span>
                                    </td>
                                    <td class="text-center">ไม่เป็นสมาชิก</td>										
                                </tr>
                            <?php } }else{
                                echo '
                                <tr>
                                    <td colspan="8"><center><br><h3 class="text-danger">ไม่พบข้อมูล!</h3></center></td>
                                </tr>';
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        <?php }else if($user_type == 2){ ?>

            <div class="row">
                <div class="col-xl-12 col-sm-12">
                    <div class="table-responsive">
                        <table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>ชื่อบริษัท/ชื่อ-นามสกุล</th>
                                    <th>เบอร์โทร</th>
                                    <th>หมวดหมู่งานซ่อม</th>
                                    <th>วันที่ลงประกาศ</th>
                                    <th class="text-center">ลักษณะช่าง</th>
                                    <th class="text-center">ประเภทผู้ใช้งาน</th>
                                    <th class="text-center">สิทธิในระบบ</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php  if(!empty($result_techn)){
                                foreach($result_techn as $key => $row){ ?>
                                <tr class="text-black">
                                    <td class="text-center"><?php echo $key+1; ?></td>
                                    <td><?php echo $row['user_name']; ?></td>
                                    <td><?php echo $row['tel']; ?></td>
                                    <td>
                                        <?php  foreach($row['type_name'] as $value){
                                            echo $value['type_name']." ";
                                        } ?>
                                    </td>
                                    <td><?php echo date('d/m/Y',strtotime($row["created_at"])) ?></td>
                                    <td class="text-center">
                                        <?php if($row['tech_id'] == 1){
                                            echo '<span class="badge badge-pill badge-danger">'.$row['tech_name'].'</span>';
                                        }else{
                                            echo '<span class="badge badge-pill badge-info">'.$row['tech_name'].'</span>';
                                        } ?>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge light badge-primary">
                                            <i class="fa fa-circle text-primary me-1"></i>
                                            <span class="text-black">นายช่าง</span>
                                        </span>
                                    </td>
                                    <td class="text-center">ไม่เป็นสมาชิก</td>										
                                </tr>
                            <?php } }else{
                                echo '
                                <tr>
                                    <td colspan="8"><center><br><h3 class="text-danger">ไม่พบข้อมูล!</h3></center></td>
                                </tr>';
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        <?php } endif; ?>


                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!--**********************************
    Content body end
***********************************-->