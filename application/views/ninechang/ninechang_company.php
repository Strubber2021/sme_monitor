<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
        <div class="container-fluid">
            
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- <h4 class="card-title">ตารางแสดงข้อมูลบริษัททั้งหมด</h4> -->
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
                                            <th>เริ่มใช้งาน</th>
                                            <th class="text-center">Logo</th>
                                            <th style="min-width: 200px">ชื่อองค์กร</th>
                                            <th style="min-width: 100px">Email</th>
                                            <th style="min-width: 150px">ชื่อผู้ใช้งาน</th>
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
                                            if(!empty($result)){
                                            foreach($result as $key => $row){ ?>
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
                                                    }?> 
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
<!--**********************************
    Content body end
***********************************-->