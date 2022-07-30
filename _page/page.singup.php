<!-- ------------------------------------------------------------ -->

<div class="modal fade bd-example-modal-lg" id="model-register" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="color: #000;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-user-plus"></i> สมัครสมาชิก</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="row">
                <!-- <div class="col-md-4"><img src="assets/upload/obj-middlecontent-left.png" alt=""></div> -->
                <div class="col-md-12 ml-auto" style="margin-bottom: 10px; padding: 50px;">
                    <div class="card" style="padding: 10px; border-radius: 9px;">
                        <div class="text-left mt-1"><i class="fa fa-angle-right"></i> ชื่อผู้ใช้</div>
                        <div class="input-group" style="margin-bottom: 10px;">
                            <input class="form-control" style="height: 40px;color: #000;" name="username" id="username" type="username" placeholder="Username" required>
                        </div>
                        <div class="text-left mt-1"><i class="fa fa-angle-right"></i> อีเมลผู้ใช้</div>
                        <div class="input-group" style="margin-bottom: 10px;">
                            <input class="form-control" style="height: 40px;color: #000;" name="email" id="email" type="email" placeholder="E - mail" required>
                        </div>
                        <div class="text-left mt-1"><i class="fa fa-angle-right"></i> รหัสผ่าน</div>
                        <div class="input-group">
                            <input class="form-control" style="height: 40px;color: #000;" name="password" id="password" type="password" placeholder="Password" required>
                        </div>
                        <div class="text-left mt-1"><i class="fa fa-angle-right"></i> รหัสผ่าน อีกครั้ง</div>
                        <div class="input-group" style="margin-bottom: 10px;">
                            <input class="form-control" style="height: 40px;color: #000;" name="repassword" id="repassword" type="password" placeholder="Password Confirm" required="">
                        </div>

                        <div class="text-left mt-1"><i class="fa fa-angle-right"></i> เพศ</div>
                        <div class="form-group" style="color: #000;">
                            <div class="col-sm-4">

                                <select name='sSex' id='sSex' class="form-control" style="margin-bottom: 10px; color: #000;">
                                    <option value="">กรุณาเลือกเพศ</option>
                                    <option value="M">ชาย</option>
                                    <option value="F">หญิง</option>
                                </select>
                            </div>
                        </div>

                        <div class="text-left mt-1"><i class="fa fa-angle-right"></i> วัน/เดือน/ปี เกิด</div>
                        <div class="form-group">
                            <div class="col-sm-12">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <select name='sD1' id='sD1' class="form-control" style="color: #000;">
                                            <option value="">วัน</option>
                                            <?php
                                            for ($i = 1; $i <= 31; $i++) {
                                                $i2 = sprintf("%02d", $i); // ฟอร์แมตรูปแบบให้เป็น 00 เลข 2 หลัก
                                                echo '<option value="' . $i2 . '">' . $i2 . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="input-group-prepend">
                                        <select name='sM1' id='sM1' class="form-control" style="color: #000;">
                                            <option value="">เดือน</option>
                                            <?php
                                            for ($i = 1; $i <= 12; $i++) {
                                                $i2 = sprintf("%02d", $i);
                                                echo '<option value="' . $i2 . '">' . $i2 . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="input-group-prepend">
                                        <select name='sY1' id='sY1' class="form-control" style="color: #000;">
                                            <option value="">ปี</option>
                                            <?php
                                            $xYear = date('Y'); // เก็บค่าปีปัจจุบันไว้ในตัวแปร
                                            echo '<option value="' . $xYear . '">' . $xYear . '</option>'; // ปีปัจจุบัน
                                            for ($i = 1; $i <= 60; $i++) {
                                                echo '<option value="' . ($xYear - $i) . '">' . ($xYear - $i) . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- <input type="text" id="inputBDate" data-format="YYYY-MM-DD" data-template="D MMM YYYY" name="inputBDate"> -->


                            </div>
                        </div>


                        <div class="text-left mt-1"><i class="fas fa-shield-alt"></i> ยืนยันตน</div>
                        <div class="input-group" style="margin-bottom: 10px; text-align: center;">
                            <div class="g-recaptcha d-flex align-items-center justify-content-center" style="margin-top: 15px;" data-sitekey="<?php echo SITE_KEY; ?>"></div>
                        </div>

                    </div>
                </div>
            </div>
            <div id="return"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> ยกเลิก</button>
                <button type="button" class="btn btn-success" data-dismiss="modal" onclick="register()"><i class="fas fa-user-plus"></i> สมัครสมาชิก</button>
            </div>
        </div>
    </div>
</div>