<section class="bossinfo pb-0">

    <!-- <div style="background-image: url('assets/upload/bg-main-calendar.jpg');"></div> -->
    <div class="container" style="margin-top: 5px;">
        <div class="row">
            <div class="col-8" style="margin-top: 5px;">

                <div class="card" style="padding: 10px; background: rgba(0,0,0,0.1);  border-radius: 9px;">
                    <div class="card" style="padding: 10px; border-radius: 9px;;">
                        <h2 style="color: #000;">Boss <span class="text-danger"> ภายในเซิฟเวอร์และเวลาเกิด AU-RO</span>
                        </h2>
                        <legend style="color: #000;">สามารถดูข้อมูลไอเท็ม การดอปของบอส @mi ตัวด้วยรหัสมอนเตอร์
                            จะพบคำอธิบายการดอปภายในเกมส์ครับ</legend>

                        <div class="container">
                            <div class="row">

                                <div class="col-2">
                                    <img class="hover-me" src="imgBoss/1039.gif" width="99" height="120">
                                </div>
                                <div class="col-2">
                                    <img src="imgBoss/1038.gif" width="99" height="120">
                                </div>
                                <div class="col-2">
                                    <img src="imgBoss/1046.gif" width="99" height="120">
                                </div>
                                <div class="col-2">
                                    <img src="imgBoss/1059.gif" width="99" height="120">
                                </div>
                                <div class="col-2">
                                    <img src="imgBoss/1086.gif" width="99" height="120">
                                </div>
                                <div class="col-2">
                                    <img src="imgBoss/1087.gif" width="99" height="120">
                                </div>
                                <div class="col-2">
                                    <img src="imgBoss/1096.gif" width="99" height="120">
                                </div>
                                <div class="col-2">
                                    <img src="imgBoss/1112.gif" width="99" height="120">
                                </div>
                                <div class="col-2">
                                    <img src="imgBoss/1115.gif" width="99" height="120">
                                </div>
                            </div>
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
    </div>

    <div style="margin-top: 25px;"></div>
</section>