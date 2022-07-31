<section class="download pb-0">

    <!-- <div style="background-image: url('assets/upload/bg-main-calendar.jpg');"></div> -->
    <div class="container" style="margin-top: 1px;">
        <div class="row">
            <div class="col-8" style="margin-top: 1px;">

                <div class="card" style="padding: 10px; background: rgba(0,0,0,0.1);  border-radius: 5px;">
                    <div class="card" style="padding: 10px; border-radius: 9px;">
                        <h2 style="color: #000;">สนับสนุนเซิร์ฟเวอร์ <span class="text-danger">DONATE SERVER</span></h2>
                        <legend style="color: #000;">เติมเงินด้วยบัตร Truemoney และบัตร Razergold</legend>

                        <img src="fileupload/TrueMoney-logo.png" alt="TrueMoney-logo" width="35%">

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr align="center">
                                        <th colspan="2"><i class="fa fa-money"></i> Truemoney</th>
                                    </tr>
                                    <tr align="center">
                                        <th><i class="fas fa-money-bill-alt"></i> ราคาบัตร</th>
                                        <th><i class="fas fa-dollar-sign"></i> Cash ที่ได้รับ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr align="center">
                                        <td>50</td>
                                        <td>250</td>
                                    </tr>
                                    <tr align="center">
                                        <td>90</td>
                                        <td>450</td>
                                    </tr>
                                    <tr align="center">
                                        <td>150</td>
                                        <td>750</td>
                                    </tr>
                                    <tr align="center">
                                        <td>300</td>
                                        <td>1,500</td>
                                    </tr>
                                    <tr align="center">
                                        <td>500</td>
                                        <td>2,500</td>
                                    </tr>
                                    <tr align="center">
                                        <td>1,000</td>
                                        <td>5,000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <?php
                        if (isset($_SESSION['username'])) {
                        ?>
                            <div class="text-left mt-1" style="color: #000;"><i class="fa fa-angle-right"></i> กรอกเลขบัตรเติมเงินใช้ได้ทั้ง Truemoney</div>
                            <div class="input-group" style="margin-bottom: 10px;">
                                <input hidden type="text" id="truemoneytype" name="truemoneytype" value="Truemoney">
                                <input style="color: #000;" class="form-control" style="height: 40px;" name="truemoneyid" id="truemoneyid" type="text" maxlength="14" placeholder="เลขบัตรเติมเงิน 14 หลัก" required>
                            </div>
                            <!-- <div class="g-recaptcha d-flex align-items-center justify-content-center" style="margin-top: 15px;" data-sitekey="<?php echo SITE_KEY; ?>"></div> -->

                            <div class="text-left mt-1"></div>
                            <div class="input-group" style="margin-bottom: 10px; text-align: center; margin-top: 2px;">
                                <div id="return"></div>

                            </div>

                            <div class="input-group mb-2 d-flex align-items-center justify-content-center">
                                <button type="button" class="btn btn-success btn-block" onclick="truemoney();">
                                    <i class="fa fa-money"></i> เติมบัตร Truemoney</button>
                            </div>


                            <br>

                            <hr style="color: #000;">
                            <br>




                            <div class="table-responsive mt-2">
                                <table id="tbl_tmt" align="center" cellspacing="1" class="table table-striped table-bordered display">
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                                <div align="center">#</div>
                                            </th>
                                            <th scope="col">
                                                <div align="center"><i class="fas fa-keyboard"></i> ช่องทาง</div>
                                            </th>
                                            <th scope="col">
                                                <div align="center"><i class="fas fa-credit-card"></i> เลขบัตร</div>
                                            </th>
                                            <th scope="col">
                                                <div align="center"><i class="fas fa-dollar-sign"></i> แต้ม</div>
                                            </th>
                                            <th scope="col">
                                                <div align="center"><i class="fas fa-stopwatch"></i> เวลาเติม</div>
                                            </th>
                                            <th scope="col">
                                                <div align="center"><i class="fas fa-battery-three-quarters"></i> สถานะ</div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody align="center">
                                        <?php
                                        $i = 1;
                                        $results_tmt = $connect->query("SELECT * FROM web_topup WHERE username = '{$_SESSION['username']}' AND vip is NULL and char_id is null  ORDER BY `web_topup`.`id` DESC ;");
                                        while ($row_tmt = $results_tmt->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td style="color: #000;"><?php echo $i++; ?></td>
                                                <td style="color: #000;"><?php echo $row_tmt['type']; ?></td>
                                                <td style="color: #000;"><?php echo $row_tmt['truemoney_card']; ?></td>
                                                <td style="color: #000;"><?php echo $row_tmt['point']; ?></td>
                                                <td style="color: #000;"><?php echo th($row_tmt['time']); ?></td>
                                                <td>
                                                    <?php
                                                    if ($row_tmt['status'] == 1) {
                                                        echo "<font color='#00e600'><b>เติมสำเร็จ</b></font>";
                                                    } elseif ($row_tmt['status'] == 3) {
                                                        echo "<font color='#ff0000'><b>ถูกใช้งานแล้ว</b></font>";
                                                    } elseif ($row_tmt['status'] == 4) {
                                                        echo "<font color='#ff0000'><b>เลขบัตรไม่ถูกต้อง</b></font>";
                                                    } elseif ($row_tmt['status'] == 5) {
                                                        echo "<font color='#ff0000'><b>ไม่ใช้บัตรทรูมันนี่</b></font>";
                                                    } else {
                                                        echo "<font color='#ff9900'><b>รอตรวจสอบ</b></font>";
                                                    }
                                                    ?>
                                                </td>

                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <!-- DataTable แบบภาษาไทย -->
                                <script type="text/javascript" charset="utf-8">
                                    $(document).ready(function() {
                                        $('#tbl_tmt').dataTable({
                                            "oLanguage": {
                                                "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
                                                "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
                                                "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
                                                "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
                                                "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
                                                "sSearch": "ค้นหา :",
                                                "aaSorting": [
                                                    [0, 'desc']
                                                ],
                                                "oPaginate": {
                                                    "sFirst": "หน้าแรก",
                                                    "sPrevious": "ก่อนหน้า",
                                                    "sNext": "ถัดไป",
                                                    "sLast": "หน้าสุดท้าย"
                                                },
                                            }
                                        });
                                    });
                                </script>
                            </div>

                        <?php
                        } else {
                        ?>

                            <div class="alert alert-danger" role="alert">
                                <legend style="color: #000;">Please Login!!</legend>
                                <p>กรุณาเข้าสู่ระบบเพื่อทำการเติมเงิน</p>
                            </div>

                        <?php
                        }
                        ?>



                    </div>
                </div>
            </div>

            <div class="col-4" style="margin-top: 5px;">

                <?php
                if (isset($_SESSION['username'])) {
                    require('_page/menu.info.php');
                } else {
                    require('_page/menu.login.php');
                }
                ?>
                <div class="card" style="padding: 10px; background: rgba(0,0,0,0.1); border-radius: 9px; margin-top: 8px;">
                    <a href="?yak=download"><img class="d-block w-100 hvr-bubble-float-left" src="assets/upload/menu/menu-3.png" alt="Second slide"></a>
                    <a href="?yak=home" data-toggle="modal" data-target="#model-register"><img class="d-block w-100 hvr-bubble-float-left" src="assets/upload/menu/menu-2.png" alt="Second slide"></a>
                    <a href="?yak=donate"><img class="d-block w-100 hvr-bubble-float-left" src="assets/upload/menu/menu-1.png" alt="Second slide"></a>
                    <a href="?yak=vip"><img class="d-block w-100 hvr-bubble-float-left" src="assets/upload/menu/menu-4.png" alt="Second slide"></a>
                </div>
            </div>



        </div>
    </div>

    <div style="margin-top: 25px;"></div>
</section>