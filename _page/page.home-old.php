<section class="home-menu pb-0" style="padding: 120px 0;">


    <?= include "_page/page.singup.php"; ?>

    <section class="home-menu pb-0" style="padding: 20px 0;">

        <!-- <div style="background-image: url('assets/upload/bg-main-calendar.jpg');"></div> -->
        <div class="container" style="background-color: #fff; margin-top: 20px;">
            <div class="row">
                <div class="col-8" style="margin-top: 15px;">
                    <div class="card" style="padding: 10px; background: rgba(0, 87, 0, 1); border-radius: 9px;">
                        <div class="card" style="padding: 10px; border-radius: 9px;">
                            <img class="d-block w-100 hvr-bubble-float-left" style="margin-top: -45px;" src="assets/upload/news.png" alt="Second slide">

                            <div class="container">
                                <div class="row">

                                    <?php
                                    $res['news'] = $connect->query("SELECT * FROM `web_news` ORDER BY `id` DESC LIMIT 10;");
                                    while ($info['news'] = $res['news']->fetch_assoc()) {
                                    ?>

                                        <div class="col-12" style="padding: 2px;margin-top:20px; border-radius: 9px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                            <div class="container" style="margin-top:25px;">
                                                <div class="row">
                                                    <div class="col-6">


                                                        <div class="card">
                                                            <a href="?yak=news&news=<?php echo $info['news']['id']; ?>">
                                                                <div class="imghvr-zoom-in">
                                                                    <img src="<?php echo $info['news']['img_news']; ?>" loading="lazy" class="img-fluid" style="border-radius: 8px;width: 320px;" />
                                                                    <figcaption>
                                                                        <img src="<?php echo $info['news']['img_news']; ?>" loading="lazy" class="img-fluid" style="border-radius: 8px;width: 320px;" />
                                                                    </figcaption>
                                                                </div>
                                                            </a>
                                                        </div>


                                                    </div>
                                                    <div class="col-6">
                                                        เขียนเมื่อ : <?php echo th($info['news']['time']); ?><br>
                                                        เรื่อง : <?php echo $info['news']['title_news']; ?><br><br>
                                                        <a class="btn btn-outline-<?php echo $info['news']['color']; ?> btn-block" href="?yak=news&news=<?php echo $info['news']['id']; ?>">อ่านรายละเอียดเพิ่มเติม</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>




                        </div>
                    </div>
                </div>

                <div class="col-4" style="margin-top: 15px;">
                    <div>
                        <a href="?yak=home" data-toggle="modal" data-target="#model-register"><img class="d-block w-100 hvr-bubble-float-left" src="assets/images/menu-2.png" alt="Second slide"></a>

                        <a href="#" data-toggle="modal" data-target="#model-register"><img class="d-block w-100 hvr-bubble-float-left" src="assets/images/menu-2.png" alt="Second slide"></a>
                        <a href="?yak=truetopup"><img class="d-block w-100 hvr-bubble-float-left" src="assets/images/menu-3.png" alt="Second slide"></a>
                        <a href="?yak=donate"><img class="d-block w-100 hvr-bubble-float-left" src="assets/upload/menu/btn-option44.png" alt="Second slide"></a>

                    </div>

                    <div class="card" style="padding: 10px; margin-top: 10px; background: rgba(0, 87, 0, 1); border-radius: 9px;">
                        <div class="card" style="padding: 10px; border-radius: 9px;">
                            <img class="d-block w-100 hvr-bubble-float-left" style="margin-top: -45px;" src="assets/upload/ranking.png" alt="Second slide">

                            <div class="table-responsive">
                                <table style="color: #ffcc00;background-color: #000;border-style: solid;border-color: #ffcc00;width: 100%;" class="table">
                                    <thead>
                                        <tr align="center">
                                            <th><i class="fa fa-trophy"></i> อันดับ</th>
                                            <th><i class="fas fa-hand-point-right"></i> รายชื่อ</th>
                                            <th><i class="fas fa-signal"></i> แต้ม</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $res['rank'] = $connect->query("SELECT * FROM `char` ORDER BY `head_top` DESC LIMIT 10;");
                                        $iiii = 1;
                                        while ($info['rank'] = $res['rank']->fetch_assoc()) {

                                        ?>
                                            <tr align="center">
                                                <td><?php echo $iiii++; ?></span></td>
                                                <td><?php echo $info['rank']['name']; ?></td>
                                                <td><?php echo $info['rank']['head_top']; ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <br />
                    <p>
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v13.0&appId=2653355474878026&autoLogAppEvents=1" nonce="Vi81ChJz"></script>
                    <div class="fb-like" data-href="https://www.facebook.com/Ro-YAK-112139181469752" data-width="30" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>
                    </p>
                </div>
            </div>
        </div>


    </section>

    <section>
        <div class="col-4" style="margin-top: 15px;"></div>
    </section>