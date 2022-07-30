<?php


if (!preg_match('/^[0-9]*$/', $_GET['news'])) {
    http_response_code(404);
    echo "404";
    exit();
}

$ids = $_GET['news'];
$url_path = "http://www.ro-yak.online/?yak=news&news=" . $ids;
?>
<section class="bossinfo pb-0">

    <!-- <div style="background-image: url('assets/upload/bg-main-calendar.jpg');"></div> -->
    <div class="container" style="margin-top: 5px;">
        <div class="row">
            <div class="col-8" style="margin-top: 5px;">

                <?php
                $res['news'] = $connect->query("SELECT * FROM `web_news` WHERE id = " . $ids . ";")->fetch_assoc();

                ?>

                <div class="card" style="padding: 10px; background: rgba(0,0,0,0.1);  border-radius: 9px;">
                    <div class="card" style="padding: 10px; border-radius: 9px;;">
                        <h2 style="color: #000;">หัวเรื่อง <span class="text-danger"> <?php echo $res['news']['title_news']; ?></span>
                        </h2>
                        <legend style="color: #000;">สร้างเมื่อ <?php echo  th_full($res['news']['time']); ?></legend>

                        <div class="container">
                            <div class="row">

                                <div class="fb-share-button" data-href="<?= $url_path ?>" data-layout="button_count"> </div>

                                <div class="col-12">
                                    <p style="color: #000;"><?php echo $res['news']['info_news']; ?></p>
                                </div>


                            </div>

                            <div class="nk-match" style="background-color:#f3f3f3">
                                <div class="fb-comments" data-href="<?= $url_path ?>" data-width="" data-numposts="5"></div>
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