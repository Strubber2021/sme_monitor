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
                        <h4 class="card-title">กรองข้อมูลผู้ใช้ในระบบ: โปรแกรมซ่อมบำรุง</h4>
                    </div>
                    <div class="card-body text-black">
                        <div class="basic-form">
                        <form action="<?php echo base_url('ninechang/user/');?>" method="POST">
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">องค์กร</label><span class="text-danger">*</span>
                                    <select class="multi-select" id="company_id" name="company_id[]" multiple="multiple" required="required">
                                        <option value="ALL" selected>- เลือกทั้งหมด -</option>
                                        <?php foreach($list_company as $row){?>
                                            <option value="<?php echo $row['company_id']; ?>"><?php echo $row['company_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="text-danger" id="result"></div>
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">ช่วงระยะวันที่ต้องการหา</label>
                                    <input class="form-control input-daterange-datepicker" type="text" name="daterange" value="<?php echo $thisyear; ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" style="float: right;" onclick="search()">ค้นหา</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <!-- ***End search -->

<?php if(!empty($company_id)): ?>
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
                                      <h4 class="text-white">
                                      <?php 
                                        if(!empty($total_company)): echo $total_company;
                                        else : echo "0";
                                        endif;
                                      ?> องค์กร</h4>
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
                                      <i class="las la-tasks text-white" style="font-size: 50px;"></i>
                                  </span>
                                  <div class="media-body text-white">
                                      <p class="mb-1">แอดมิน</p>
                                      <h4 class="text-white">
                                      <?php 
                                        if(!empty($total_company)): echo $total_company;
                                        else : echo "0";
                                        endif;
                                      ?> คน</h4>
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
                                      <i class="la la-tools text-white" style="font-size: 50px;"></i>
                                  </span>
                                  <div class="media-body text-white">
                                      <p class="mb-1">นายช่าง</p>
                                      <h4 class="text-white">
                                      <?php 
                                        if(!empty($total_employee2)): echo $total_employee2;
                                        else : echo "0";
                                        endif;
                                      ?> คน</h4>
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
                                      <p class="mb-1">ผู้แจ้งซ่อม</p>
                                      <h4 class="text-white">
                                        <?php 
                                        if(!empty($total_employee1)): echo $total_employee1;
                                        else : echo "0";
                                        endif;
                                      ?> คน</h4>
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
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ตารางแสดงข้อมูลนายช่าง</h4>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>เริ่มใช้งาน</th>
                                <th class="text-center">Logo</th>
                                <th style="min-width: 200px">ชื่อองค์กร</th>
                                <th style="min-width: 100px">Email</th>
                                <th style="min-width: 150px">ชื่อผู้ใช้งาน</th>
                                <th>เบอร์โทร</th>
                                <th class="text-center">นายช่าง</th>
                                <th class="text-center">ผู้แจ้งซ่อม</th>
                                <th class="text-center">เครื่องจักร/อุปกรณ์</th>
                                <th>วันที่ก่อนหน้า (MA)</th>
                                <th>งานแจ้งซ่อม (MA)</th>
                                <th>วันที่ก่อนหน้า (PM)</th>
                                <th>งานบำรุงรักษา (PM)</th>
                            </tr>
                        </thead>
                        <tbody>

                          <?php 
                          if(!empty($result_search)){
                          foreach($result_search as $key => $row){ ?>
                          <tr class="text-black">
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo date('d/m/Y',strtotime($row["created_at"])) ?></td>
                            <td>
                                <?php 
                                    $url = 'https://www.ninechang.net/';
                                    if(!empty($row['pic_url'])){
                                        echo '<img src="'.$url.('/uploads/companyLogo/').$row['pic_url'].'" alt="image" class="me-2 rounded" width="75">';
                                    }
                                ?>
                            </td>
                            <td><?php echo $row['company_name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                            <td><?php echo $row['company_tel']; ?></td>
                            <td class="text-center"><?php echo $row['total_employee2']; ?></td>
                            <td class="text-center"><?php echo $row['total_employee1']; ?></td>
                            <td class="text-center">
                                <?php 
                                $is_equipment = ($row['count_equipment'] == '0') ? "-" : $row['count_equipment'];
                                echo $is_equipment;
                                ?>
                            </td>
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
                            <td class="text-center">
                                <?php if(!empty($row['pre_created_pm'])){
                                    echo '<h4><span class="badge light badge-warning text-black">'.date('d/m/Y',strtotime($row["pre_created_pm"])).'</span></h4>';
                                }?> 
                            </td>
                            <td class="text-center">
                                <?php if(!empty($row['created_pm'])){
                                    echo '<h4><span class="badge light badge-primary text-black">'.date('d/m/Y',strtotime($row["created_pm"])).'</span></h4>';
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
</div>
</div>
<?php endif; ?>

  <script>
      function search() {
          var company_id = $('#company_id').val();
          if(company_id == ""){
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
***********************************