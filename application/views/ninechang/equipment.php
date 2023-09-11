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
                    <h4 class="card-title">เครื่องจักร/อุปกรณ์ : โปรแกรมซ่อมบำรุง</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="<?php echo base_url('ninechang/equipment/');?>" method="POST">
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
                            </div>
                            <button type="submit" class="btn btn-primary" style="float: right;">ค้นหา</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-3 col-sm-6">
                        <div class="widget-stat card gradient-4">
                            <div class="card-body p-4">
                                <div class="media">
                                    <span class="me-3">
                                        <i class="la la-tools text-white" style="font-size: 50px;"></i>
                                    </span>
                                    <div class="media-body text-white">
                                        <p class="mb-1">จำนวน</p>
                                        <h4 class="text-white"><?php echo number_format($total_equipment);?> เครื่องจักร</h4>
                                        <div class="progress mb-2 bg-secondary">
                                            <div class="progress-bar progress-animated bg-light" style="width: 15%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div> -->

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
                                        <th>รหัสเครื่องจักร/อุปกรณ์</th> 
                                        <th>ชื่อเครื่องจักร/อุปกรณ์</th> 
                                        <th class="text-center">วันที่เพิ่มเข้าระบบ</th> 
                                    </tr>
                                </thead>
                                <tbody>                         
                                    <?php if(!empty($result_equipment)){
                                    foreach($result_equipment as $key => $row){ ?>
                                    <tr class="text-black">
                                        <td class="text-center"><?php echo $key+1; ?></td>
                                        <td><?php echo $row['company_name'] ?></td>
                                        <td><?php echo $row['equipment_code'] ?></td>
                                        <td><?php echo $row['equipment_name'] ?></td>
                                        <td class="text-center"><?php echo date('d/m/Y',strtotime($row["created_at"])) ?></td>
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
    <?php endif; ?>
    </div>
</div>
<!--**********************************
    Content body end
***********************************-->