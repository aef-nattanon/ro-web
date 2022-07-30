<?php
// if(empty($block_page)) {
//     http_response_code(404);
//     echo "404";
//     exit();
// }

?>

<section class="download pb-0">

    <!-- <div style="background-image: url('assets/upload/bg-main-calendar.jpg');"></div> -->
    <div class="container" style="margin-top: 1px;">
        <div class="row">
            <div class="col-8" style="margin-top: 1px;">

                <div class="card" style="padding: 10px; background: rgba(0,0,0,0.1);  border-radius: 5px;">
                    <div class="card" style="padding: 10px; border-radius: 9px;">
                        <h2 style="color: #000;">ติดต่อแอดมิน <span class="text-danger">CONTACT ADMIN</span></h2>
                        <legend style="color: #000;">หากมีข้อสงสัยหรือพบปัญหาสามารถติดต่อแอดมินได้ทันที</legend>
                        <img src="assets/upload/Information.png" >
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped">
                                <thead>
                                    <tr align="center">
                                        <th><i class="fas fa-list-ul"></i> ช่องทาง</th>
                                        <th><i class="fas fa-link"></i> ลิ้งติดต่อ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr align="center">
                                        <th><i class="fab fa-facebook-square"></i> Facebook Fanpage</th>
                                        <th> <a href="https://bit.ly/3vzDNyP" target="_blank" rel="noopener noreferrer">
                                                https://web.facebook.com/Ro-YAK-112139181469752
                                            </a></th>
                                    </tr>
                                    <tr align="center">
                                        <th><i class="fab fa-discord"></i> Discord Chat</th>
                                        <th> <a href="https://discord.gg/ZVxctXka" target="_blank" rel="noopener noreferrer">
                                                https://discord.gg/ZVxctXka
                                            </a></th>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive">
                            <iframe src="https://discord.com/widget?id=966362236610289694&theme=dark" width="100%" height="350" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
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