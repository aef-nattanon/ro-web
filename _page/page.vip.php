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
            width: 10px;
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
                        <h2 style="color: #000;">สนับสนุนเซิร์ฟเวอร์ <span class="text-danger"> VIP Card</span></h2>
                        <legend style="color: #000;">เติมเงินด้วยบัตร Truemoney และบัตร Razergold</legend>

                        <img src="fileupload/TrueMoney-logo.png" alt="TrueMoney-logo" width="35%">
                        <br>


                        <div class="row">


                            <form class="form">

                                <div class="form-head">เลือกตัวละคร</div>

                                <?php
                                if (!empty($_SESSION['username'])) {
                                    $results_char = $connect->query("SELECT * FROM `char` INNER JOIN login WHERE char.account_id = login.account_id AND login.userid = '{$_SESSION['username']}' ");
                                    while ($row_char = $results_char->fetch_assoc()) {
                                ?>
                                        <div class="inputGroup">
                                            <?php if ($row_char['online'] == 1) { ?>
                                                <input id="char_id2<?php echo $row_char['name'] ?>" name="char_id" type="radio" value="<?php echo $row_char['char_id'] ?>" disabled />
                                                <label for="char_id2<?php echo $row_char['name'] ?>" style='color: red;'><?php echo $row_char['name'] ?> &nbsp;&nbsp; ตัวละครนี้ออนไลน์อยู่ ไม่สามารถเติมได้!</label>
                                            <?php } else { ?>
                                                <input id="char_id2<?php echo $row_char['name'] ?>" name="char_id" type="radio" value="<?php echo $row_char['char_id'] ?>" />
                                                <label for="char_id2<?php echo $row_char['name'] ?>"><?php echo $row_char['name'] ?></label>

                                            <?php } ?>

                                        </div>

                                <?php }
                                } ?>

                                <hr>
                                <div class="form-head">เลือก VIP </div>
                                <div class="inputGroup">
                                    <input id="radio3" name="vip_type" type="radio" value="15" required />
                                    <label for="radio3">VIP 15 วัน 150 บาท</label>
                                </div>
                                <div class="inputGroup">
                                    <input id="radio4" name="vip_type" type="radio" value="30" />
                                    <label for="radio4">VIP 30 วัน 300 บาท</label>
                                </div>

                            </form>


                        </div>



                        <br>

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
                                <button type="button" class="btn btn-success btn-block" onclick="truemoney_vip();">
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
                                                <div align="center"><i class="fas fa-dollar-sign"></i> เงิน</div>
                                            </th>
                                            <th scope="col">
                                                <div align="center"><i class="fas fa-dollar-sign"></i> VIP</div>
                                            </th>
                                            <th scope="col">
                                                <div align="center"><i class="fas fa-credit-card"></i> ตัวละคร</div>
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
                                        $results_tmt = $connect->query("SELECT * FROM web_topup WHERE username = '{$_SESSION['username']}' AND vip is not NULL and char_id is not null ORDER BY `web_topup`.`id` DESC ;");
                                        while ($row_tmt = $results_tmt->fetch_assoc()) {
                                            $char_query = $connect->query("SELECT * FROM `char` WHERE char_id = {$row_tmt['char_id']};");
                                            $char = $char_query->fetch_assoc();
                                        ?>
                                            <tr>
                                                <td style="color: #000;"><?php echo $i++; ?></td>
                                                <td style="color: #000;"><?php echo $row_tmt['type']; ?></td>
                                                <td style="color: #000;"><?php echo $row_tmt['truemoney_card']; ?></td>
                                                <td style="color: #000;"><?php echo $row_tmt['point']; ?></td>
                                                <td style="color: #000;"><?php echo $row_tmt['vip']; ?> วัน</td>
                                                <td style="color: #000;"><?= $char['name'] ?></td>
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
                                                    } elseif ($row_tmt['status'] == 6) {
                                                        echo "<font color='#078af0'><b>ติดต่อ Admin จำนวนเงินไม่ถูกต้อง</b></font>";
                                                    } elseif ($row_tmt['status'] == 7) {
                                                        echo "<font color='#078af0'><b>ติดต่อ Admin ส่งไม่สำเร็จเนื่องจากตัวละคร Online อยู่</b></font>";
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