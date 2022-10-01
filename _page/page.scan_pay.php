<section class="download pb-0">
    <?php
    function getIPAddress()
    {
        //whether ip is from the share internet  
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from the remote address  
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    $ip = getIPAddress();
    ?>
    <!-- <div style="background-image: url('assets/upload/bg-main-calendar.jpg');"></div> -->
    <div class="container" style="margin-top: 1px;">
        <div class="row">
            <div class="col-8" style="margin-top: 1px;">

                <div class="card" style="padding: 10px; background: rgba(0,0,0,0.1);  border-radius: 5px;">
                    <div class="card" style="padding: 10px; border-radius: 9px;">
                        <h2 style="color: #000;">สนับสนุนเซิร์ฟเวอร์ <span class="text-danger">DONATE SERVER</span></h2>
                        <legend style="color: #000;" class="text-center">เติมเงินด้วยการสแกนจ่าย Prompt Pay</legend>

                        <img src="fileupload/forweb/ppy.jpg" alt="TrueMoney-logo" width="100%">

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr align="center">
                                        <th colspan="2"><i class="fa fa-money"></i> ยอดเงินที่ต้องการเติม</th>
                                    </tr>
                                    <tr align="center">
                                        <th><i class="fas fa-money-bill-alt"></i> จำนวนเงิน</th>
                                        <th><i class="fas fa-dollar-sign"></i> Cash ที่ได้รับ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr align="center">
                                        <td>50</td>
                                        <td>250 *(2 bonus) = 500</td>
                                    </tr>
                                    <tr align="center">
                                        <td>90</td>
                                        <td>450 *(2 bonus) = 900</td>
                                    </tr>
                                    <tr align="center">
                                        <td>150</td>
                                        <td>750 *(2 bonus) = 1,500</td>
                                    </tr>
                                    <tr align="center">
                                        <td>300</td>
                                        <td>1,500 *(2 bonus) = 3,000</td>
                                    </tr>
                                    <tr align="center">
                                        <td>500</td>
                                        <td>2,500 *(2 bonus) = 5,000</td>
                                    </tr>
                                    <tr align="center">
                                        <td>1,000</td>
                                        <td>5,000 *(2 bonus) = 10,000</td>
                                    </tr>
                                </tbody>
                            </table>


                            <?php
                            if (isset($_SESSION['username'])) {
                            ?>
                                <form id="gbprimepay" action="https://api.gbprimepay.com/gbp/gateway/qrcode/" method="POST" class="login100-form validate-form" style="width:100%;" target="Popup_Window">

                                    <input type="hidden" name="detail" value="DonatePoint">
                                    <input type="hidden" name="customerName" value="<?php echo $_SESSION['username'] ?>">
                                    <input type="hidden" name="token" value="XchHQFtXs9M9FIQcxmrlpDCmi6ANAniFu+eX5wDSKkXY2ZDNIEMTlzCsYc8toASQIXwBzxaTcSTA8geNC8qnJhxNS54quxdiJr873y0zul8VejNjRc09ZOotK+4FAUswG0DqcNAjqCu6YK85M4eSHypCpyB9A0Bv4iRFH+L8Evyvq4wC">
                                    <input type="hidden" name="referenceNo" value="<?php echo time() ?>">
                                    <input type="hidden" name="backgroundUrl" value="http://ro-yak.online/gb_check.php">
                                    <input type="hidden" name="customerAddress" value="<?php echo $ip ?>">

                                    <div class="text-center">
                                        กรุณาเลือกจำนวนเงินที่ต้องการจะเติมเงิน
                                    </div>

                                    <select class="custom-select mb-5 text-center" id="amount" name="amount" maxlength="13" required>
                                        <option value="50"> จำนวนเงิน 50 บาท</option>
                                        <option value="90"> จำนวนเงิน 90 บาท</option>
                                        <option value="150"> จำนวนเงิน 150 บาท</option>
                                        <option value="300"> จำนวนเงิน 300 บาท</option>
                                        <option value="500"> จำนวนเงิน 500 บาท</option>
                                        <option value="1000"> จำนวนเงิน 1,000 บาท</option>
                                    </select>

                                    <div class="text-center text-danger mb-5" >
                                        เมื่อกดปุ่มเติมเงินจะปรากฏหน้า QR CODE ให้สแกนชำระเงินได้เลยจากนั้น *รีเฟรชหน้านี้อีกรอบเพื่อครวจสอบสถานะ
                                    </div>

                                    <div class="input-group mb-5">
                                        <button type="submit" class="btn btn-success" style="width: 100%;"><i class="fa fa-money"></i> เติมเงิน</button>
                                    </div>

                                </form>


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
                                                    <div align="center"><i class="fas fa-credit-card"></i> เลขที่อ้างอิง</div>
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
                                                    <td style="color: #000;"><?php echo $row_tmt['transaction_id']; ?></td>
                                                    <td style="color: #000;"><?php echo $row_tmt['point']; ?></td>
                                                    <td style="color: #000;"><?php echo th($row_tmt['time']); ?></td>
                                                    <td>
                                                        <?php
                                                        if ($row_tmt['status'] == 1) {
                                                            echo "<font color='#00e600'><b>เติมสำเร็จ</b></font>";
                                                        } elseif ($row_tmt['status'] == 11) {
                                                            echo "<font color='#ff0000'><b>การอ้างอิงไม่ถูกต้อง</b></font>";
                                                        } elseif ($row_tmt['status'] == 12) {
                                                            echo "<font color='#ff0000'><b>gbpReferenceNo . ไม่ถูกต้อง</b></font>";
                                                        } elseif ($row_tmt['status'] == 14) {
                                                            echo "<font color='#ff0000'><b>จำนวนเงินที่ไม่ถูกต้อง</b></font>";
                                                        } elseif ($row_tmt['status'] == 99) {
                                                            echo "<font color='#ff0000'><b>ระบบผิดพลาด</b></font>";
                                                        } elseif ($row_tmt['status'] == 23) {
                                                            echo "<font color='#ff0000'><b>ไม่พบผู้ใช้งานนี้</b></font>";
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


<div class="modal fade" tabindex="-1" role="dialog" id="myModalAlt" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">แจ้งเตือนก่อนเติมเงิน!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>ก่อนเติมเงินกรุณาปิดเกมก่อนเพื่อให้ยอดเงินที่เติมเข้า.</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>


<script>
    var myForm = document.getElementById('gbprimepay');
    myForm.onsubmit = function() {
        var myWidth = 397;
        var myHeight = 600;
        var left = (screen.width - myWidth) / 2;
        var top = (screen.height - myHeight) / 4;
        var w = window.open('about:blank', 'Popup_Window', 'toolbar=no, location=0, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + myWidth + ', height=' + myHeight + ', top=' + top + ', left=' + left);
        this.target = 'Popup_Window';

    };
</script>