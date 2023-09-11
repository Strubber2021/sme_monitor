<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
        <div class="container-fluid">
            
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <span class="badge light badge-xl light badge-primary" style="font-size: 16px;">
                            <i class="fas fa-calendar-check"></i>
                            &nbsp; ตารางแสดงข้อมูลหอพักทั้งหมด</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>วันที่เริ่มใช้งาน</th>
                                            <th style="min-width: 200px">ชื่อหอพัก</th>
                                            <th style="min-width: 150px">อีเมล/Username</th>
                                            <th style="min-width: 100px">ชื่อผู้ใช้</th>
                                            <th>สถานะ</th>
                                            <th>งานแจ้งซ่อม (MA)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        if(!empty($result)){
                                        foreach($result as $key => $row){ ?>
                                        <tr class="text-black">
                                            <td class="text-center"><?php echo $key+1; ?></td>
                                            <td class="text-center"><?php echo date('d/m/Y',strtotime($row["created_at"])) ?></td>
                                            <td><?php echo $row['company_name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                                            <td class="text-center">ผู้ดูแล/เจ้าของ</td>
                                            <td class="text-center">
                                                <?php if(!empty($row['created_ma'])){
                                                    echo '<h4><span class="badge light badge-primary text-black">'.date('d/m/Y',strtotime($row["created_ma"])).'</span></h4>';
                                                }else{
                                                    echo '-';
                                                } ?> 
                                            </td>
                                        </tr>
                                        <?php } }else{
                                            echo '
                                            <tr>
                                            <td colspan="7"><center><br><h3 class="text-danger">ไม่พบข้อมูล!</h3></center></td>
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
<!--**********************************
    Content body end
***********************************-->