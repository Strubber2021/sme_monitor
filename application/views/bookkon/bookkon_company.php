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
                            &nbsp; ตารางแสดงข้อมูลบริษัททั้งหมด</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example4" class="happyTable display table table-hover table-responsive-sm" style="min-width: 1105px">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>วันที่เริ่มใช้งาน</th>
                                            <th class="text-center">Logo</th>
                                            <th style="min-width: 240px">ชื่อองค์กร</th>
                                            <th style="min-width: 100px">อีเมลบัญชีใช้งาน</th>
                                            <th style="min-width: 150px">ชื่อผู้ใช้</th>
                                            <th>เบอร์โทร</th>
                                            <th>พนักงานในองค์กร</th>
                                            <th>รายการก่อนหน้า</th>
                                            <th>ลงเวลาเข้างาน</th>
                                            <th>รายการก่อนหน้า</th>
                                            <th>ประมวลผลเงินเดือน</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            if(!empty($result)){
                                            foreach($result as $key => $row){ ?>
                                            <tr class="text-black">
                                                <td><?php echo $key+1; ?></td>
                                                <td><?php echo date('d/m/Y',strtotime($row["created_at"])) ?></td>
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
                                                <td class="text-center"><?php echo $row['total']; ?></td>
                                                <td class="text-center">
                                                    <?php if(!empty($row['pre_company_time'])){
                                                        echo '<h4><span class="badge light badge-warning text-black">'.date('d/m/Y',strtotime($row["pre_company_time"])).'</span></h4>';
                                                    }else{
                                                        echo '-';
                                                    } ?> 
                                                </td>
                                                <td class="text-center">
                                                    <?php if(!empty($row['company_time'])){
                                                        echo '<h4><span class="badge light badge-success text-black">'.date('d/m/Y',strtotime($row["company_time"])).'</span></h4>';
                                                    }else{
                                                        echo '-';
                                                    } ?> 
                                                </td>
                                                <td class="text-center">
                                                    <?php if(!empty($row['pre_company_slip'])){
                                                        echo '<h4><span class="badge light badge-warning text-black">'.date('d/m/Y',strtotime($row["pre_company_slip"])).'</span></h4>';
                                                    }else{
                                                        echo '-';
                                                    } ?> 
                                                </td>
                                                <td class="text-center">
                                                    <?php if(!empty($row['company_slip'])){
                                                        echo '<h4><span class="badge light badge-primary text-black">'.date('d/m/Y',strtotime($row["company_slip"])).'</span></h4>';
                                                    }else{
                                                        echo '-';
                                                    } ?> 
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
<!--**********************************
    Content body end
***********************************-->