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
                        <h4 class="card-title">ค้นหารายการความคิดเห็นทั้งหมด: หาช่าง หางาน</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="<?php echo base_url('board/review/');?>" method="POST">
                                <div class="row">
                                    <!-- <div class="mb-3 col-md-3">
                                        <label class="form-label">ประเภทผู้ใช้งาน</label>
                                        <select id="inputState" class="default-select form-control wide">
                                            <option selected>- เลือกทั้งหมด -</option>
                                            <option>ผู้แจ้งงาน</option>
                                            <option>นายช่าง</option>
                                        </select>
                                    </div> -->
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
                                <div class="widget-stat card gradient-6">
                                    <div class="card-body  p-4">
                                        <div class="media">
                                            <span class="me-3">
                                                <i class="las la-tasks text-white" style="font-size: 50px;"></i>
                                            </span>
                                            <div class="media-body text-white">
                                                <p class="mb-1">ความคิดเห็นทั้งหมด</p>
                                                <h4 class="text-white"><?php echo $total_review;?> รายการ</h4>
                                                <div class="progress mb-2 bg-secondary">
                                                    <div class="progress-bar progress-animated bg-light" style="width: 20%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-xl-3 col-sm-6">
                                <div class="widget-stat card gradient-1">
                                    <div class="card-body  p-4">
                                        <div class="media">
                                            <span class="me-3">
                                                <i class="la la-tools text-white" style="font-size: 50px;"></i>
                                            </span>
                                            <div class="media-body text-white">
                                                <p class="mb-1">นายช่าง</p>
                                                <h4 class="text-white">1 รายการ</h4>
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
                                                <p class="mb-1">ผู้แจ้งงาน</p>
                                                <h4 class="text-white">0 รายการ</h4>
                                                <div class="progress mb-2 bg-secondary">
                                                    <div class="progress-bar progress-animated bg-light" style="width: 5%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>

            <?php if(!empty($date)): ?>

                    <div class="row">
                        <div class="col-xl-12 col-sm-12">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
                                        <thead>
                                            <tr>
                                                <th style="width: 50px" class="text-center">#</th>
                                                <th style="width: 180px" class="text-center">วันที่แสดงความคิดเห็น</th>
                                                <th>ความคิดเห็น</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  if(!empty($result_review)){
                                            foreach($result_review as $key => $row){ ?>
                                            <tr class="text-black">
                                                <td class="text-center"><?php echo $key+1; ?></td>
                                                <td class="text-center"><?php echo date('d/m/Y',strtotime($row["created_at"])) ?></td>
                                                <td><?php echo $row['contact_desc']; ?></td>   
                                            </tr>
                                            <?php } }else{
                                                echo '
                                                <tr>
                                                    <td colspan="3"><center><br><h3 class="text-danger">ไม่พบข้อมูล!</h3></center></td>
                                                </tr>';
                                            } ?>

                                        </tbody>
                                    </table>
                                </div>
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