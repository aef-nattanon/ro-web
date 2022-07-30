<?php
// if(empty($block_page)) {
//     http_response_code(404);
//     echo "404";
//     exit();
// }
if ($userinfo_login['group_id'] != "99") {
    http_response_code(404);
    echo "404";
    exit();
}
?>

<section class="download pb-0">

    <!-- <div style="background-image: url('assets/upload/bg-main-calendar.jpg');"></div> -->
    <div class="container" style="margin-top: 1px;">
        <div class="row">
            <div class="col-8" style="margin-top: 1px;">

                <div class="card" style="padding: 10px; background: rgba(0,0,0,0.1);  border-radius: 5px;">
                    <div class="card" style="padding: 10px; border-radius: 9px;">
                        <h2 style="color: #000;">จัดการหลังบ้าน <span class="text-danger">SETTING</span></h2>
                        <legend style="color: #000;">จัดการหัวข้อข่าวสารและประกาศ</legend>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr align="center">
                                        <th><i class="fa fa-money-bill-alt"></i> #</th>
                                        <th><i class="fa fa-window-maximize"></i> หัวเรื่อง</th>
                                        <th><i class="fa fa-file-text"></i> ประเภท</th>
                                        <th><i class="fa fa-money-bill-alt"></i> จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php
                                    $ii = 1;
                                    $res['news'] = $connect->query("SELECT * FROM `web_news` ORDER BY `id` DESC LIMIT 10;");
                                    while ($info['news'] = $res['news']->fetch_assoc()) {
                                    ?>

                                        <tr align="center">
                                            <td><?php echo $ii++; ?></td>
                                            <td><?php echo $info['news']['title_news']; ?></td>
                                            <td><?php echo $info['news']['color']; ?></td>
                                            <td>
                                                <a class="btn btn-warning " href="?<?php echo $info['news']['id']; ?>"><i class="fa fa-pencil-square-o"></i></a>
                                                <button type="button" class="btn btn-danger" onclick="del_news(<?php echo $info['news']['id']; ?>);"><i class="fa fa-trash-alt"></i> </button>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>

                        <?php
                        if (isset($_SESSION['username'])) {
                        ?>
                            <div class="text-left mt-1" style="color: #000;"><i class="fa fa-angle-right"></i> เพิ่มประกาศ</div>
                            <div class="input-group" style="margin-bottom: 10px;">
                                <div class="input-group form-group mt-3">
                                    <span class="input-group-text">หัวเรื่อง</span>
                                    <input class="form-control" name="title" id="title" type="text" placeholder="หัวเรื่อง" required style="color: #000;">
                                </div>
                            </div>

                            <div class="input-group" style="margin-bottom: 10px;">
                                <div class="input-group form-group mt-3">
                                    <span class="input-group-text">URL รูปหัวเร่อง</span>
                                    <input class="form-control" name="img_news" id="img_news" type="text" placeholder="<?= $config_url ?>fileupload/022.png" required style="color: #000;">
                                </div>
                            </div>
                            <div class="input-group form-group">
                                <span class="input-group-text">ประเภท</span>
                                <select name="color" id="color" class="form-control" style="color: #000;">
                                    <option value="highlight">highlight</option>
                                    <option value="event">event</option>
                                    <option value="quest">quest</option>
                                    <option value="promotion">promotion</option>
                                    <option value="npc">npc</option>
                                    <option value="special">special</option>

                                </select>
                            </div>

                            <div class="input-group form-group mt-3">
                                <span class="input-group-text">รายอะเอียด</span>
                                <textarea rows="50" name="info_news" class="form-control" id="info_news"></textarea>
                                <script src="ckeditor/ckeditor.js"></script>
                                <script>
                                    //CKEDITOR.replace( 'information' );
                                    CKEDITOR.replace('info_news', {
                                        filebrowserUploadUrl: 'ckeditor/ck_upload.php',
                                        filebrowserUploadMethod: 'form'
                                    });
                                </script>
                            </div>



                            <div id="return"></div>
                            <div class="input-group mb-2 d-flex align-items-center justify-content-center">
                                <button type="button" class="btn btn-success btn-block" data-dismiss="modal" onclick="add_news();">
                                    <i class="fafa-plus-circle"></i> เพิ่มประกาศ</button>
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

                <div class="card" style="padding: 10px; background: rgba(0,0,0,0.1); border-radius: 9px;">
                    <div class="card card-header bg-info text-light">
                        <h5><i class="fafa-tools"></i>&nbsp;จัดการหลังบ้าน</h5>
                    </div>
                    <div class="card" style="padding: 10px; border-radius: 9px;">


                        <div class="input-group" style="margin-bottom: 10px; text-align: center; margin-top: 1px;">
                            <button type="button" class="btn btn-success btn-block" onclick="logout()"><i class="fafa-tools"></i> จัดการประกาศ</button>
                        </div>
                        <div class="input-group" style="margin-bottom: 10px; text-align: center; margin-top: 1px;">
                            <button type="button" class="btn btn-warning btn-block" onclick="logout()"><i class="fafa-tools"></i> ตั้งค่าเว็บไซต์</button>
                        </div>
                        <div class="input-group" style="margin-bottom: 10px; text-align: center; margin-top: 1px;">
                            <button type="button" class="btn btn-warning btn-block" onclick="logout()"><i class="fafa-tools"></i> จัดการข้อมูลผู้เล่น</button>
                        </div>
                        <div class="input-group" style="margin-bottom: 10px; text-align: center; margin-top: 8px;">
                            <div id="return"></div>
                            <button type="button" class="btn btn-danger btn-block" onclick="logout()"><i class="fafa-sign-out-alt"></i> ออกจากระบบ</button>
                        </div>
                    </div>
                </div>


                <!-- <div class="card" style="padding: 10px; background: rgba(0,0,0,0.1); border-radius: 9px; margin-top: 8px;">
                    <a href="?yak=download"><img class="d-block w-100 hvr-bubble-float-left"
                            src="assets/images/menu-1.png" alt="Second slide"></a>
                    <a href="?yak=home"><img class="d-block w-100 hvr-bubble-float-left"
                            src="assets/images/menu-2.png" alt="Second slide"></a>
                    <a href="?yak=topup"><img class="d-block w-100 hvr-bubble-float-left"
                            src="assets/images/menu-3.png" alt="Second slide"></a>
                    <a  href="https://bit.ly/3vzDNyP" target="_blank"><img class="d-block w-100 hvr-bubble-float-left"
                            src="assets/upload/menu/btn-option44.png" alt="Second slide"></a>
                </div> -->
            </div>



        </div>
    </div>

    <div style="margin-top: 25px;"></div>
</section>