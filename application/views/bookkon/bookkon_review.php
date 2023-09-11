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
                        <h4 class="card-title">ค้นหารายการความคิดเห็นทั้งหมด: บุคคล.com</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="<?php echo base_url('bookkon/review/');?>" method="POST">
                                <div class="row text-black">
                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">องค์กร</label><span class="text-danger">*</span>
										<select class="multi-select" id="company_require" name="company_id[]" multiple="multiple" required="required">
											<option value="ALL" selected>- เลือกทั้งหมด -</option>
											<?php foreach($list_company as $row){?>
												<option value="<?php echo $row['company_id']; ?>"><?php echo $row['name']; ?></option>
											<?php } ?>
										</select>
										<div class="text-danger" id="result"></div>
                                    </div>
                                    <div class="mb-3 col-md-3">
                                        <label class="form-label">ประเภทผู้ใช้</label>
                                        <select id="inputState" class="default-select form-control wide" name="sys_user_type">
                                            <option value="ALL">- เลือกทั้งหมด -</option>
                                            <option value="ADMIN">แอดมิน</option>
                                            <option value="EMP">ผู้ใช้งานที่เพิ่มโดยแอดมิน</option>
                                            <option value="EMP0">บุคคลภายนอก</option>
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
                                        <p class="mb-1">ความคิดเห็นทั้งหมด</p>
                                        <h4 class="text-white"><?php echo $total_review; ?> รายการ</h4>
                                        <div class="progress mb-2 bg-secondary">
                                            <div class="progress-bar progress-animated bg-light" style="width: <?php echo $total_admin;?>%"></div>
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
                                        <i class="las la-user-plus text-white" style="font-size: 50px;"></i>
                                    </span>
                                    <div class="media-body text-white">
                                        <p class="mb-1">แอดมิน</p>
                                        <h4 class="text-white"><?php echo $total_admin; ?> รายการ</h4>
                                        <div class="progress mb-2 bg-secondary">
                                            <div class="progress-bar progress-animated bg-light" style="width: <?php echo $total_admin;?>%"></div>
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
                                        <p class="mb-1">ผู้ใช้งาน</p>
                                        <h4 class="text-white"><?php echo $total_emp; ?> รายการ</h4>
                                        <div class="progress mb-2 bg-secondary">
                                            <div class="progress-bar progress-animated bg-light" style="width: <?php echo $total_emp;?>%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="widget-stat card gradient-9">
                            <div class="card-body  p-4">
                                <div class="media">
                                    <span class="me-3">
                                        <i class="las la-user-secret text-white" style="font-size: 50px;"></i>
                                    </span>
                                    <div class="media-body text-white">
                                        <p class="mb-1">บุคคลภายนอก</p>
                                        <h4 class="text-white"><?php echo $total_outsider; ?> รายการ</h4>
                                        <div class="progress mb-2 bg-secondary">
                                            <div class="progress-bar progress-animated bg-light" style="width: <?php echo $total_outsider;?>%"></div>
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
                            <table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>วันที่ประเมิน</th>
                                        <th style="min-width: 200px">องค์กร</th>
                                        <th style="min-width: 200px">ความคิดเห็น</th>
                                        <th>ประเภทผู้ใช้งาน</th>
                                        <th>อุปกรณ์</th>
                                        <th>รายละเอียด</th>
                                        <th>สถานะความคิดเห็น</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php                      
                                    if(!empty($review)){
                                    foreach($review as $key => $row){ ?>
                                <tr class="text-black">
                                    <td class="text-center"><?php echo $key+1; ?></td>
                                    <td class="text-center"><?php echo date('d/m/Y',strtotime($row["created_at"])) ?></td>
                                    <!-- <td><?php echo $row['name']; ?></td> -->
                                    <?php if($row['company_id'] == '0'){
                                        echo '<td>'."บุคคลภายนอก".'</td>';
                                    }else{
                                        echo '<td>'.$row['name'].'</td>';
                                    } ?>
                                    <td><?php echo $row['remark']; ?></td>
                                    <td class="text-center">
                                        <?php if($row['sys_user_type'] == 'ADMIN'){ 
                                            echo '<span class="badge light badge-primary">
                                            <i class="fa fa-circle text-primary me-1"></i>
                                            <span class="text-black"> แอดมิน</span>
                                            </span>';
                                        }else if($row['sys_user_type'] == 'EMP'){
                                            echo '<span class="badge light badge-danger">
                                            <i class="fa fa-circle text-danger me-1"></i>
                                            <span class="text-black"> ผู้ใช้งาน</span>
                                            </span>';
                                        }else if($row['company_id'] == '0'){
                                            echo '<span class="badge light badge-warning">
                                            <i class="fa fa-circle text-warning me-1"></i>
                                            <span class="text-black"> บุคคลภายนอก</span>
                                            </span>';
                                        }?>
                                    </td>
                                    <td class="text-center">
                                        <?php if($row['scoring_type'] == '1'){ 
                                            echo'<span class="text-black">Web</span></span>';
                                        }else{
                                            echo'<span class="text-black">App</span></span>';
                                        }?>
                                    </td>

                                    <?php if($row['company_id'] == '0'){
                                        echo "<td></td>";?>

                                        <td class="text-center">
                                            <?php if($row['scoring_show_status'] == 1){?>
                                                <button type="button" class="btn btn-success light sharp" data-bs-toggle="modal" data-bs-target=".status<?php echo $row['id'];?>">
                                                    <span class="badge light badge-success fs-12">
                                                    <i class="fa fa-check text-success  me-1"></i>  
                                                    <span class="text-black">เปิดใช้งาน</span>
                                                    </span>
                                                </button>
                                                <?php }else if($row['scoring_show_status'] == 0){ ?>
                                                <button type="button" class="btn btn-danger light sharp" data-bs-toggle="modal" data-bs-target=".status<?php echo $row['id'];?>">
                                                    <span class="badge light badge-danger fs-12">
                                                    <i class="fa fa-times text-danger   me-1"></i>  
                                                    <span class="text-black">ปิดใช้งาน</span>
                                                    </span>
                                                </button>
                                            <?php } ?>

                                        <!-- Modal -->
                                        <div class="modal fade status<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">

                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <form action="<?php echo base_url('Bookkon/review/');?>" method="post">

                                                    <div class="modal-header">
                                                        <h3 class="modal-title">แจ้งเตือน !! </h3>
                                                    </div>
                                                    <div class="modal-body">
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
                                                            <input type="hidden" name="scoring_id" value="<?php echo $row['id'];?>">
                                                            <input type="hidden" name="scoring_show_status" value="<?php echo $row['scoring_show_status'];?>">
                                                            <!-- <input type="hidden" name="company_id[]" value="ALL"> -->
															<input type="hidden" name="company_id[]" value="<?php echo $all_values;?>">
                                                            <input type="hidden" name="sys_user_type" value="<?php echo $sys_user_type;?>">
                                                            <input type="hidden" name="daterange" value="<?php echo $date_range;?>">
                                                        </div>
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

                                    <?php }else{ ?>

                                    <td>
                                        <center><button type="button" class="btn btn-primary light sharp" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg1<?php echo $row['id']; ?>">
                                            <i class="flaticon-381-search-1"></i>
                                        </button></center>
                                        <!-- Large modal -->
                                        <div class="modal fade bd-example-modal-lg1<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="row mt-3">
                                                            <div class="col-xl-3 text-center">
                                                              <img class="dz-media me-4" src="<?php echo base_url();?>assets/images/avatar/1.png">
                                                            </div>
                                                            <div class="col-xl-9">
                                                                <h3 class="card-title mb-3"><strong>รายละเอียดการประเมิน</strong></h3>
                                                                <?php 
                                                                  $result_topic = json_decode($row['data'], true);
                                                                ?>

                                                                <div class="row">
                                                                    <div class="col-xl-6 col-xxl-6">	
                                                                      <ul class="user-info-list">
                                                                      <li>
                                                                        <h5 class="mb-2"><strong>หัวข้อการประเมิน</strong></h5>
                                                                      </li>
                                                                      <?php foreach($result_topic as $value){ ?>
                                                                        <li>
                                                                          <h5 class="mb-2"><?php echo $value['topic_id'].'. '.$value['topic']; ?></h5>
                                                                        </li>
                                                                      <?php } ?>
                                                                    </ul>
                                                                    </div>
                                
                                                                    <div class="col-xl-6 col-xxl-6">	
                                                                      <ul class="user-info-list text-center">
                                                                        <li>
                                                                          <h5 class="mb-2"><strong>ผลการประเมิน</strong></h5>
                                                                        </li>
                                                                        <?php foreach($result_topic as $value){ ?>
                                                                          <li>
                                                                            <h5 class="mb-2"><?php echo $value['score']; ?> คะแนน</h5>
                                                                          </li>
                                                                        <?php } ?>
                                                                      </ul>
                                                                    </div>	
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <div class="col-xl-12 col-xxl-12">
                                                                      <h5 class="mb-2 mt-3"><strong>ให้คำแนะนำ/ติชมเพิ่มเติม</strong></h5>
                                                                      <h6 class="mb-1"><?php echo $row['remark']; ?></h6>
                                                                    </div>
                                                                </div>

                                                                <?php $percent_review = ($row['total_score']/$row['max_score'])*100;
                                                                  if($percent_review > 87.5){
                                                                      $part = 8;
                                                                    }else if($percent_review > 75){
                                                                      $part = 7;
                                                                    }else if($percent_review > 62.5){
                                                                      $part = 6;
                                                                    }else if($percent_review > 50){
                                                                      $part = 5;
                                                                    }else if($percent_review > 37.5){
                                                                      $part = 4;
                                                                    }else if($percent_review > 25){
                                                                      $part = 3;
                                                                    }else if($percent_review > 12.5){
                                                                      $part = 2;
                                                                    }else if($percent_review > 0){
                                                                      $part = 1;
                                                                    }?>
                                                                <!-- <div class="row mt-5 align-items-center">
                                                                  <div class="col-xl-6 d-flex align-items-center col-sm-6 mb-sm-0 mb-3">
                                                                    <div class="me-4">
                                                                      <span class="donut" data-peity='{ "fill": ["#e83e8c", "rgba(246, 246, 246)"],   "innerRadius": 45, "radius": 10}'><?php echo $part; ?>/8</span>
                                                                    </div>
                                                                    <div>
                                                                      <h2><?php echo round($percent_review).'%';?></h2>
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

                                        <td class="text-center">
                                            <?php if($row['scoring_show_status'] == 1){?>
                                                <button type="button" class="btn btn-success light sharp" data-bs-toggle="modal" data-bs-target=".status<?php echo $row['id'];?>">
                                                    <span class="badge light badge-success fs-12">
                                                    <i class="fa fa-check text-success  me-1"></i>  
                                                    <span class="text-black">เปิดใช้งาน</span>
                                                    </span>
                                                </button>
                                                <?php }else if($row['scoring_show_status'] == 0){ ?>
                                                <button type="button" class="btn btn-danger light sharp" data-bs-toggle="modal" data-bs-target=".status<?php echo $row['id'];?>">
                                                    <span class="badge light badge-danger fs-12">
                                                    <i class="fa fa-times text-danger   me-1"></i>  
                                                    <span class="text-black">ปิดใช้งาน</span>
                                                    </span>
                                                </button>
                                            <?php } ?>

                                        <!-- Modal -->
                                        <div class="modal fade status<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">

                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                <form action="<?php echo base_url('Bookkon/review/');?>" method="post">

                                                    <div class="modal-header">
                                                        <h3 class="modal-title">แจ้งเตือน !! </h3>
                                                    </div>
                                                    <div class="modal-body">
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
                                                            <input type="hidden" name="scoring_id" value="<?php echo $row['id'];?>">
                                                            <input type="hidden" name="scoring_show_status" value="<?php echo $row['scoring_show_status'];?>">
                                                            <!-- <input type="hidden" name="company_id[]" value="ALL"> -->
                                                            <input type="hidden" name="company_id[]" value="<?php echo $all_values;?>">
                                                            <input type="hidden" name="sys_user_type" value="<?php echo $sys_user_type;?>">
                                                            <input type="hidden" name="daterange" value="<?php echo $date_range;?>">
                                                        </div>
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

                                        <?php } ?>

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