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

<section class="download pb-0">

    <style>
        /* Check Box */
        .inputGroup {
            background-color: #fff;
            display: block;
            margin: 10px 0;
            position: relative;
        }


        .inputGroup label {
            padding: 12px 30px;
            width: 100%;
            display: block;
            text-align: left;
            color: #3C454C;
            cursor: pointer;
            position: relative;
            z-index: 2;
            transition: color 200ms ease-in;
            overflow: hidden;
        }

        .inputGroup label:before {
            width: 100%;
            height: 10px;
            border-radius: 50%;
            content: "";
            background-color: #5562eb;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%) scale3d(1, 1, 1);
            transition: all 300ms cubic-bezier(0.4, 0, 0.2, 1);
            opacity: 0;
            z-index: -1;
        }

        .inputGroup label:after {
            width: 32px;
            height: 32px;
            content: "";
            border: 2px solid #D1D7DC;
            background-color: #fff;
            background-image: url("data:image/svg+xml,%3Csvg width='32' height='32' viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M5.414 11L4 12.414l5.414 5.414L20.828 6.414 19.414 5l-10 10z' fill='%23fff' fill-rule='nonzero'/%3E%3C/svg%3E ");
            background-repeat: no-repeat;
            background-position: 2px 3px;
            border-radius: 50%;
            z-index: 2;
            position: absolute;
            right: 30px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            transition: all 200ms ease-in;
        }

        .inputGroup input:checked~label {
            color: #fff;
        }

        .inputGroup input:checked~label:before {
            transform: translate(-50%, -50%) scale3d(56, 56, 1);
            opacity: 1;
        }

        .inputGroup input:checked~label:after {
            background-color: #54E0C7;
            border-color: #54E0C7;
        }

        .inputGroup input {
            width: 32px;
            height: 32px;
            order: 1;
            z-index: 2;
            position: absolute;
            right: 30px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            visibility: hidden;
        }

        .form {
            background: #dadada;
            padding: 16px 16px;
            max-width: 80%;
            margin: 10px auto;
            font-size: 18px;
            font-weight: 600;
            line-height: 36px;
        }

        .form-head {
            color: #3C454C;
            font-size: 2rem;
        }
    </style>

    <!-- <div style="background-image: url('assets/upload/bg-main-calendar.jpg');"></div> -->
    <div class="container" style="margin-top: 1px;">
        <div class="row">
            <div class="col-8" style="margin-top: 1px;">

                <div class="card" style="padding: 10px; background: rgba(0,0,0,0.1);  border-radius: 5px;">
                    <div class="card" style="padding: 10px; border-radius: 9px;">
                        <h2 style="color: #000;">สนับสนุนเซิร์ฟเวอร์ <span class="text-danger">DONATE SERVER</span></h2>
                        <legend style="color: #000;" class="text-center">เติมเงินด้วยการสแกนจ่าย Prompt Pay</legend>

                        <img src="fileupload/forweb/ppy.jpg" alt="TrueMoney-logo" width="100%">
                        <br>
                        <br>

                        <div class="row mt-5 mb-5 ml-0">
                            <h3 style="color: black;">สิ่งที่จะได้รับสำหรับ MEMBER </h3>
                            <a href="http://www.ro-yak.online/fileupload/member-vip.jpg" target="_blank"><img src="fileupload/member-vip.jpg" style="width: 100%;"></a>
                        </div>
                        <br><br>

                        <?php
                        if (!empty($_SESSION['username'])) {
                        ?>
                            <div class="row">


                                <form id="gbprimepay" action="https://api.gbprimepay.com/gbp/gateway/qrcode/" method="POST" class="login100-form validate-form" style="width:100%;" target="Popup_Window">

                                    <div class="form-head">เลือกตัวละคร</div>



                                    <input type="hidden" name="detail" value="DonateVip">
                                    <input type="hidden" name="customerName" value="<?php echo $_SESSION['username'] ?>">
                                    <input type="hidden" name="token" value="XchHQFtXs9M9FIQcxmrlpDCmi6ANAniFu+eX5wDSKkXY2ZDNIEMTlzCsYc8toASQIXwBzxaTcSTA8geNC8qnJhxNS54quxdiJr873y0zul8VejNjRc09ZOotK+4FAUswG0DqcNAjqCu6YK85M4eSHypCpyB9A0Bv4iRFH+L8Evyvq4wC">
                                    <input type="hidden" name="referenceNo" value="<?php echo time() ?>">
                                    <input type="hidden" name="backgroundUrl" value="http://ro-yak.online/gb_check.php">
                                    <input type="hidden" name="customerAddress" value="<?php echo $ip ?>">

                                    <?php
                                    $results_char = $connect->query("SELECT * FROM `char` INNER JOIN login WHERE char.account_id = login.account_id AND login.userid = '{$_SESSION['username']}' ");
                                    while ($row_char = $results_char->fetch_assoc()) {
                                    ?>
                                        <div class="inputGroup">
                                            <?php if ($row_char['online'] == 1) { ?>
                                                <input id="char_id2<?php echo $row_char['name'] ?>" name="customerEmail" type="radio" value="<?php echo $row_char['char_id'] ?>" disabled />
                                                <label for="char_id2<?php echo $row_char['name'] ?>" style='color: red;'><?php echo $row_char['name'] ?> &nbsp;&nbsp; ตัวละครนี้ออนไลน์อยู่ ไม่สามารถเติมได้!</label>
                                            <?php } else { ?>
                                                <input id="char_id2<?php echo $row_char['name'] ?>" name="customerEmail" type="radio" value="<?php echo $row_char['char_id'] ?>" checked required />
                                                <label for="char_id2<?php echo $row_char['name'] ?>"><?php echo $row_char['name'] ?></label>

                                            <?php } ?>

                                        </div>

                                    <?php
                                    }
                                    ?>

                                    <hr>

                                    <div class="form-head">เลือก MEMBER </div>

                                    <div class="inputGroup">
                                        <input id="radio3" name="amount" type="radio" value="150" />
                                        <label for="radio3">MEMBER 15 วัน 150 บาท</label>
                                    </div>
                                    <div class="inputGroup">
                                        <input id="radio4" name="amount" type="radio" value="300" checked />
                                        <label for="radio4">MEMBER 30 วัน 300 บาท</label>
                                    </div>


                                    <br>

                                    <div class="text-center text-danger mb-5">
                                        เมื่อกดปุ่มเติมเงินจะปรากฏหน้า QR CODE ให้สแกนชำระเงินได้เลยจากนั้น *รีเฟรชหน้านี้อีกรอบเพื่อครวจสอบสถานะ
                                    </div>

                                    <div class="input-group mb-5">
                                        <button type="submit" class="btn btn-success" style="width: 100%;"><i class="fa fa-money"></i> เติมเงิน</button>
                                    </div>

                                </form>


                            </div>



                            <br>


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
                                        $results_tmt = $connect->query("SELECT * FROM web_topup WHERE username = '{$_SESSION['username']}' AND vip IS NOT NULL ORDER BY `web_topup`.`id` DESC ;");
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
                                                    } elseif ($row_tmt['status'] == 7) {
                                                        echo "<font color='#ff0000'><b>ตัวละครออนไลน์อยู่ ไม่สามารถเติมได้</b></font>";
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
                    <a href="?yak=home"" data-toggle=" modal" data-target=".bd-example-modal-lg"><img class="d-block w-100 hvr-bubble-float-left" src="assets/upload/menu/menu-2.png" alt="Second slide"></a>
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