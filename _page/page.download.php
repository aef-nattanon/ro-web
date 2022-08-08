<section class="download pb-0">

    <!-- <div style="background-image: url('assets/upload/bg-main-calendar.jpg');"></div> -->
    <div class="container" style="margin-top: 5px;">
        <div class="row">
            <div class="col-8" style="margin-top: 5px;">

                <div class="card" style="padding: 10px; background: rgba(0,0,0,0.1);  border-radius: 9px;">
                    <div class="card" style="padding: 10px; border-radius: 9px;">
                        <h2 style="color: #000;">CLIENT <span class="text-danger">REQUIREMENT</span></h2>
                        <legend style="color: #000;">สเป็กเครื่องที่แนะนำและขั้นต่ำ</legend>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>รายการ</th>
                                        <th>สเป็กขั้นต่ำ</th>
                                        <th>สเป็กเครื่องที่แนะนำ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>OS :</td>
                                        <td>Window 7</td>
                                        <td>Window 10</td>
                                    </tr>
                                    <tr>
                                        <td>CPU :</td>
                                        <td>Pentium 4 2.5GHz</td>
                                        <td>Core I3 หรือมากกว่า</td>
                                    </tr>
                                    <tr>
                                        <td>RAM :</td>
                                        <td>Memory 1 GB</td>
                                        <td>Memory 4 GB</td>
                                    </tr>
                                    <tr>
                                        <td>Graphic :</td>
                                        <td>Memory 512 MB</td>
                                        <td>Memory 1 GB</td>
                                    </tr>
                                    <tr>
                                        <td>Direct X :</td>
                                        <td>Direct X 9.0c</td>
                                        <td>Direct X 11.0c</td>
                                    </tr>
                                    <tr>
                                        <td>Harddisk :</td>
                                        <td>6 GB</td>
                                        <td>20 GB</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <h2 style="color: #000;">DOWNLOAD <span class="text-danger">LINKS</span></h2>
                        <legend style="color: #000;">ลิงค์สำหรับดาวน์โหลด</legend>

                        <p class="text-sm text-danger">*ดาวน์โหลด LINK ไหนก็ได้เลือกเพียง 1 Link เท่านั้นสำหรับ Computer</p>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-sm table-bordered">
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="https://drive.google.com/file/d/1S4KMn8Noh7yC2vR63ePhEruZVluIsJgI/view?usp=sharing" target="_blank" class="bg-none">
                                                <!-- <a href="https://drive.google.com/file/d/1TU5-upb88gAKCwRiTgkS77j4UrVSta7i/view?usp=sharing" target="_blank" class="bg-none"> -->
                                                <img src="assets/upload/menu/btn-download-client.png" alt="My Host" class="img-fluid">
                                            </a>
                                        </td>
                                        <td>
                                            <legend>LINK 1 <span class="text-blue">Drive คลิกปุ่มสีฟ้า 2 ครั้ง</span>
                                            </legend>
                                            <p class="mb-0 p-0">ขนาดไฟล์: <b class="text-primary">3.6Gb</b></p>
                                            <p class="m-0 p-0">UPDATE: <b class="text-primary"><?php echo th_s(time()); ?></b></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="https://drive.google.com/u/0/uc?id=1hmt437-WzadPfhffIW7XNRAd0IC5zrLL&export=download" target="_blank" class="bg-none">
                                                <!-- <a href="https://www.mediafire.com/file/4ylazrhgw0xuh7l/AU-RO-Ragnarok-Classic-Ep4.0-Gepard3.0_11022565.rar/file" target="_blank" class="bg-none"> -->
                                                <img src="assets/upload/menu/btn-download-client.png" alt="Google Drive" class="img-fluid">
                                            </a>
                                        </td>
                                        <td>
                                            <legend>LINK 1 <span class="text-blue">Drive คลิกปุ่มสีฟ้า 2 ครั้ง</span>
                                            </legend>
                                            <p class="mb-0 p-0">ขนาดไฟล์: <b class="text-primary">3.6Gb</b></p>
                                            <p class="m-0 p-0">UPDATE: <b class="text-primary"><?php echo th_s(time()); ?></b></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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