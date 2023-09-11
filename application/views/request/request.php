<!--**********************************
  Content body start
***********************************-->
<div class="content-body">
  <div class="container-fluid">
    <div class="row">
    <!-- row -->

      <div class="col-lg-12">
        <form action="<?php echo base_url('ninechang/'); ?>" method="POST">
          <div class="d-flex mb-4 justify-content-between align-items-center flex-wrap">
            
            <div class="card-tabs mt-3 mt-sm-0">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-bs-toggle="tab" href="#ninechang" role="tab">
                  <i class="flaticon-381-settings-7"></i> โปรแกรมซ่อมบำรุง <strong>(ninechang.net)</strong></a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" data-bs-toggle="tab" href="#bukkhon" role="tab">
                  <i class="flaticon-381-user-3"></i> โปรแกรมบุคคล <strong>(bukkhon.com)</strong></a>
                </li>
              </ul>
            </div>
           
           

          </div>
        </form>
      </div>
      

      <br><br>
      <!-- ======================= -->
        <div class="tab-content">
          <div class="tab-pane active show" id="ninechang">
            <div class="row">
              
              <div class="col-xl-12">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title"><strong>ตารางแสดงรายการยื่นคำร้อง <span class="text-warning">(โปรแกรมซ่อมบำรุง)</span></strong></h5>
                  </div>
                  <div class="card-body">

                    <div class="table-responsive">
                    <table id="example1" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
                      <thead>
                         <tr class="text-center">
                              <th>#</th>
                              <th>วันที่ยื่นคำร้อง</th>
                              <th style="min-width: 200px">ชื่อองค์กร</th>
                              <th style="min-width: 180px">หัวข้อยื่นคำร้อง</th>
                              <th style="min-width: 200px">รายละเอียด</th>
                              <th>ประเภทผู้ใช้บริการ</th>
                              <th>หนังสือคำร้อง</th>
                              <th>หนังสือรับรองบริษัท</th>
                              <th style="min-width: 150px">ดำเนินการ</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php if(!empty($result_ninechang)){
                          foreach ($result_ninechang as $key => $row):
                         ?>
                         <tr>
                        <td class="text-center"> <?php echo $key+1; ?></td>
                        <td> <?php echo date('d/m/Y',strtotime($row["created_at"])) ?></td>
                        <td> <?php echo $row['company_name']; ?></td>
                        <td> <?php echo $row['request_name']; ?></td>
                        <td> <?php echo $row['request_detail']; ?></td>
                        <td> <?php echo $row['type_name']; ?></td>
                        <td class="text-center"> 
                          <?php if(!empty($row['request_file'])): ?>
                          <a href="<?php echo 'https://ninechang.net/uploads/companyRequest/'.$row['request_file']; ?>" target="_blank"><i class="flaticon-381-file-1 text-primary" style="font-size:22px;"></i></a> 
                          <?php else: echo "-"; endif; ?>
                        </td>
                        <td class="text-center">
                          <?php if(!empty($row['company_certificate'])): ?>
                          <a href="<?php echo 'https://ninechang.net/uploads/companyRequest/'.$row['company_certificate']; ?>" target="_blank"><i class="flaticon-381-file-1 text-warning" style="font-size:22px;"></i></a> 
                          <?php else: echo "-"; endif; ?>
                        </td>
                        <td class="text-center">
                          
                          <?php if($row['request_status'] == 0): ?>
                            <button type="button" class="btn btn-danger btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#Modal<?php echo $row['id'];?>">รอดำเนินการ</button>
                          <?php else :  ?>
                            <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#Modal<?php echo $row['id'];?>">เรียบร้อย</button>
                          <?php endif; ?>

                              <!-- Modal -->
                              <div class="modal fade" id="Modal<?php echo $row['id'];?>">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <form action="<?php echo base_url().'request/update_ninechang/' ?>" method="POST">
                                      <div class="modal-body"><br>
                                        <h3><i class="flaticon-381-success text-primary" style="font-size:30px;"></i> ยืนยัน</h3><br>
                                        <h4>ดำเนินการตามหนังสือคำร้องเรียบร้อย</h4>
                                      </div>
                                      <input type="hidden" name="request_id" value="<?php echo $row['id']; ?>">
                                      <input type="hidden" name="request_status" value="<?php echo $row['request_status']; ?>">
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">ปิด</button>
                                          <button type="submit" class="btn btn-primary">ยืนยัน</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>

                            </td>
                          </tr>
                      <?php  endforeach; } ?>
                      </tbody>
                    </table>
                  </div> <!-- table responsive -->

                  </div>
                </div>
              </div>
             
          </div><!-- end-row -->
        </div> <!-- end tab1 -->

          <!-- tab 2 -->
          <div class="tab-pane show" id="bukkhon">
              <div class="row">


              <div class="col-xl-12">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title"><strong>ตารางแสดงรายการยื่นคำร้อง <span class="text-primary">(โปรแกรมบุคคล)</span></strong></h5>
                  </div>
                  <div class="card-body">

                  <div class="table-responsive">
                    <table id="example2" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
                      <thead>
                         <tr class="text-center">
                              <th>#</th>
                              <th>วันที่ยื่นคำร้อง</th>
                              <th style="min-width: 200px">ชื่อองค์กร</th>
                              <th style="min-width: 180px">หัวข้อยื่นคำร้อง</th>
                              <th style="min-width: 200px">รายละเอียด</th>
                              <th>ประเภทผู้ใช้บริการ</th>
                              <th>หนังสือคำร้อง</th>
                              <th>หนังสือรับรองบริษัท</th>
                              <th style="min-width: 150px">ดำเนินการ</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php if(!empty($request_bukkhon)){
                          foreach ($request_bukkhon as $key => $row):
                         ?>
                         <tr>
                        <td class="text-center"> <?php echo $key+1; ?></td>
                        <td> <?php echo date('d/m/Y',strtotime($row["created_at"])) ?></td>
                        <td> <?php echo $row['name']; ?></td>
                        <td>
                          <?php 
                            if($row['petition_topics'] == 1): echo "ขอเปลี่ยน E-mail ผู้ดูแลระบบ";
                            elseif($row['petition_topics'] == 2) : echo "ขอยกเลิกใช้บริการ";
                            else :echo "อื่นๆ";
                            endif;
                          ?> 
                        </td>
                        <td> <?php echo $row['pettition_details']; ?></td>
                        <td> 
                          <?php 
                            if($row['person_type'] == 1): echo "บุคคลธรรมดา";
                            else : echo "นิติบุคคล";
                            endif;
                          ?>
                        </td>

                        <td class="text-center"> 
                          <?php if(!empty($row['petition_book']) && $row['petition_book'] != "null"): ?>
                          <a href="<?php echo 'https://bukkhon.com/company/'.$row['sys_customer_code'].'/file/'.$row['petition_book'];?>" target="_blank"><i class="flaticon-381-file-1 text-primary" style="font-size:22px;"></i></a> 
                          <?php else: echo "-"; endif; ?>
                        </td>

                        <td class="text-center">
                          <?php if(!empty($row['company_certificate']) && $row['company_certificate'] != "null"): ?>
                          <a href="<?php echo 'https://bukkhon.com/company/'.$row['sys_customer_code'].'/file/'.$row['company_certificate']; ?>" target="_blank"><i class="flaticon-381-file-1 text-warning" style="font-size:22px;"></i></a> 
                          <?php else: echo "-"; endif; ?>
                        </td>

                        <td class="text-center">
                          <?php if($row['petition_status'] == 0): ?>
                            <button type="button" class="btn btn-danger btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#Modalbukkhon<?php echo $row['petition_id'];?>">รอดำเนินการ</button>
                          <?php else :  ?>
                            <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#Modalbukkhon<?php echo $row['petition_id'];?>">เรียบร้อย</button>
                          <?php endif; ?>

                              <!-- Modal -->
                              <div class="modal fade" id="Modalbukkhon<?php echo $row['petition_id'];?>">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <form action="<?php echo base_url().'request/update_bukkhon/' ?>" method="POST">
                                      <div class="modal-body"><br>
                                        <h3><i class="flaticon-381-success text-primary" style="font-size:30px;"></i> ยืนยัน</h3><br>
                                        <h4>ดำเนินการตามหนังสือคำร้องเรียบร้อย</h4>
                                      </div>
                                      <input type="hidden" name="petition_id" value="<?php echo $row['petition_id']; ?>">
                                      <input type="hidden" name="petition_status" value="<?php echo $row['petition_status']; ?>">
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">ปิด</button>
                                          <button type="submit" class="btn btn-primary">ยืนยัน</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>

                            </td>
                          </tr>
                      <?php  endforeach; } ?>
                      </tbody>
                    </table>
                  </div> <!-- table responsive -->

                  </div>
                </div>
              </div>


              </div> <!-- end row -->
          </div> <!-- end tab2 -->

          </div> <!-- row -->
        </div> <!-- teb-pane -->
      </div> <!-- tab-content -->

    </div>
  </div>
</div>
<!--**********************************
Content body end
***********************************