<section class="download pb-0">

    <!-- <div style="background-image: url('assets/upload/bg-main-calendar.jpg');"></div> -->
    <div class="container" style="margin-top: 1px;">
        <div class="row">
            <div class="col-8" style="margin-top: 1px;">

                <div class="card" style="padding: 10px; background: rgba(0,0,0,0.1);  border-radius: 5px;">
                    <div class="card" style="padding: 10px; border-radius: 9px;">
                        <h2 style="color: #000;">สนับสนุนเซิร์ฟเวอร์ <span class="text-danger">DONATE SERVER</span></h2>
                        <legend style="color: #000;">เติมเงินด้วยบัตร Truemoney และบัตร Razergold</legend>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr align="center">
                                        <th colspan="2"><i class="fafa-money-alt"></i> Truemoney</th>
                                        <th colspan="2"><i class="fafa-money-alt"></i> Razergold</th>
                                    </tr>
                                    <tr align="center">
                                        <th><i class="fafa-money-bill-alt"></i> ราคาบัตร</th>
                                        <th><i class="fafa-dollar-sign"></i> Cash ที่ได้รับ</th>
                                        <th><i class="fafa-money-bill-alt"></i> ราคาบัตร</th>
                                        <th><i class="fafa-dollar-sign"></i> Cash ที่ได้รับ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr align="center">
                                        <td>50</td>
                                        <td>50</td>
                                        <td>50</td>
                                        <td>50</td>
                                    </tr>
                                    <tr align="center">
                                        <td>90</td>
                                        <td>90</td>
                                        <td>100</td>
                                        <td>100</td>
                                    </tr>
                                    <tr align="center">
                                        <td>150</td>
                                        <td>150</td>
                                        <td>300</td>
                                        <td>300</td>
                                    </tr>
                                    <tr align="center">
                                        <td>300</td>
                                        <td>300</td>
                                        <td>500</td>
                                        <td>500</td>
                                    </tr>
                                    <tr align="center">
                                        <td>500</td>
                                        <td>500</td>
                                        <td>1,000</td>
                                        <td>1,000</td>
                                    </tr>
                                    <tr align="center">
                                        <td>1,000</td>
                                        <td>1,000</td>
                                        <td>3,500</td>
                                        <td>3,500</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <?php
                        if (isset($_SESSION['username'])) {
                        ?>
                            <div class="text-left mt-1" style="color: #000;"><i class="fa fa-angle-right"></i> กรอกเลขบัตรเติมเงินใช้ได้ทั้ง Truemoney และ Razergold</div>
                            <div class="input-group" style="margin-bottom: 10px;">
                                <input hidden type="text" id="razertype" name="razertype" value="Razergold">
                                <input class="form-control" style="height: 40px;" name="razergoldpin" id="razergoldpin" type="text" placeholder="เลขบัตรเติมเงิน 14 หลัก" required>
                            </div>
                            <!-- <div class="g-recaptcha d-flex align-items-center justify-content-center" style="margin-top: 15px;" data-sitekey="<?php echo SITE_KEY; ?>"></div> -->

                            <div class="text-left mt-1"></div>
                            <div class="input-group" style="margin-bottom: 10px; text-align: center; margin-top: 2px;">
                                <div id="return"></div>

                            </div>

                            <div class="input-group mb-2 d-flex align-items-center justify-content-center">
                                <button type="button" class="btn btn-success btn-block" data-dismiss="modal" onclick="razergold();">
                                    <i class="fafa-money-alt"></i> เติมบัตร Razer Gold</button>
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