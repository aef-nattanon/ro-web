<!DOCTYPE html>
<?php
if (empty($protect)) {
    http_response_code(404);
    exit();
}
if (@$_GET['yak'] == "logout") {
    if (isset($_GET['yes'])) {
        session_destroy();
        echo '<script>location.href="?yak=home";</script>';
        exit();
    } else {
        exit();
    }
}

// $id = $connect->query("SELECT * FROM log_shop")->num_rows;
$user = $connect->query("SELECT * FROM login")->num_rows;
?>


<html lang="th">

<head>
    <meta charset="utf-8">

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta http-equiv="content-language" content="th" />
    <meta name='robots' content='index,follow' />
    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" href="assets/upload/logo/favicon.png">
    <link rel="icon" href="assets/upload/logo/favicon.png" type="image/icon type">

    <title>Yak sv ฟิวชั่นคลาสสิค เพราะ ความสนุกเป็นสิ่งที่ดีกว่า</title>
    <meta name="description" content="🌍ทีมงาน PAC-MAN มีเจตนาให้  YAK-RO  มีความมั่นคงถาวร และต้องไม่เป็นเซิฟเวอร์เชิงธุรกิจเหมือนในปัจจุบัน เราอาจไม่สมบูรณ์แบบในทุกด้านเหมือนเซิฟใหญ่ด้วยงบประมานที่มีอย่างจำกัด แต่เรามั่นใจว่าผู้เล่นในแต่ละสาย ทุกคนจะ มีความสุขกับการร่วมเดินทางไปด้วนกันและร่วมกิจกรรมกับเรานะครับ" />

    <!-- OG -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Yak sv ฟิวชั่นคลาสสิค เพราะ ความสนุกเป็นสิ่งที่ดีกว่า" />
    <meta property="og:description" content="🌍ทีมงาน PAC-MAN มีเจตนาให้  YAK-RO  มีความมั่นคงถาวร และต้องไม่เป็นเซิฟเวอร์เชิงธุรกิจเหมือนในปัจจุบัน เราอาจไม่สมบูรณ์แบบในทุกด้านเหมือนเซิฟใหญ่ด้วยงบประมานที่มีอย่างจำกัด แต่เรามั่นใจว่าผู้เล่นในแต่ละสาย ทุกคนจะ มีความสุขกับการร่วมเดินทางไปด้วนกันและร่วมกิจกรรมกับเรานะครับ" />
    <meta property="og:url" content="/" />
    <meta property="og:image" content="assets/upload/logo/favicon.png"" />
    <meta property=" og:site_name" content="pacman" />
    <!-- End OG -->

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="pacman">
    <meta name="twitter:title" content="Yak sv ฟิวชั่นคลาสสิค เพราะ ความสนุกเป็นสิ่งที่ดีกว่า">
    <meta name="twitter:description" content="🌍ทีมงาน PAC-MAN มีเจตนาให้  YAK-RO  มีความมั่นคงถาวร และต้องไม่เป็นเซิฟเวอร์เชิงธุรกิจเหมือนในปัจจุบัน เราอาจไม่สมบูรณ์แบบในทุกด้านเหมือนเซิฟใหญ่ด้วยงบประมานที่มีอย่างจำกัด แต่เรามั่นใจว่าผู้เล่นในแต่ละสาย ทุกคนจะ มีความสุขกับการร่วมเดินทางไปด้วนกันและร่วมกิจกรรมกับเรานะครับ">
    <meta name="twitter:image" content="assets/upload/logo/favicon.png">
    <meta name="twitter:domain" content="/">
    <!-- End twitter -->
    <!-- START: Styles -->

    <link rel="stylesheet" href="assets/frontend/css/bootstrap.min.css" />

    <!--Slide-->
    <link rel="stylesheet" href="assets/frontend/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/frontend/owlcarousel/assets/owl.theme.default.css">
    <!--Slide-->

    <!-- Image hover -->
    <link rel="stylesheet" href="assets/frontend/css/imagehover.min.css" />
    <!-- Image hover -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7cOpen+Sans:400,700" rel="stylesheet" type="text/css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/dist/css/bootstrap.min.css">

    <!-- FontAwesome -->
    <script defer src="assets/vendor/fontawesome-free/js/all.js"></script>
    <script defer src="assets/vendor/fontawesome-free/js/v4-shims.js"></script>

    <!-- IonIcons -->
    <link rel="stylesheet" href="assets/vendor/ionicons/css/ionicons.min.css">

    <!-- Flickity -->
    <link rel="stylesheet" href="assets/vendor/flickity/dist/flickity.min.css">

    <!-- Photoswipe -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/photoswipe/dist/photoswipe.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/photoswipe/dist/default-skin/default-skin.css">

    <!-- Seiyria Bootstrap Slider -->
    <link rel="stylesheet" href="assets/vendor/bootstrap-slider/dist/css/bootstrap-slider.min.css">

    <!-- Summernote -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/summernote/dist/summernote-bs4.css">

    <!-- GoodGames -->
    <link rel="stylesheet" href="assets/css/goodgames.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- END: Styles -->

    <!-- jQuery -->
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>

    <script type="text/javascript" src="assets/frontend/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="assets/frontend/js/temmy.js"></script>
    <script type="text/javascript" src="assets/frontend/js/include/overlib/overlibmws.js"></script>
    <script type='text/javascript' src='assets/frontend/js/include/function.js'></script>

    <script type="text/javascript" src="assets/frontend/js/menu-dropdown.js"></script>

    <!-- <script src='https://www.google.com/recaptcha/api.js?hl=th'></script> -->



    <!-- costom -->
    <!-- <link rel="stylesheet" href="assets/frontend/css/menu-dropdown.css" /> -->
    <!-- <link rel="stylesheet" href="assets/frontend/css/style.css" /> -->
    <!-- <link rel="stylesheet" href="assets/frontend/css/hover.css" /> -->
    <link rel="stylesheet" href="assets/frontend/css/world_map.css" />
</head>


<!--
    Additional Classes:
        .nk-page-boxed
-->

<body>





    <!--
    Additional Classes:
        .nk-header-opaque
-->
    <header class="nk-header nk-header-opaque">



        <!-- START: Top Contacts -->
        <div class="nk-contacts-top">
            <div class="container">
                <div class="nk-contacts-left">
                    <ul class="nk-social-links">
                        <i class="fa-brands fa-discord"></i>
                        <li><a class="nk-social-facebook" href="https://bit.ly/3vzDNyP"><span class="fab fa-facebook"></span></a></li>
                        <li><a class="nk-social-discord" href="https://discord.gg/ZVxctXka"><span class="fab fa-discord"></span></a></li>
                        <!-- Additional Social Buttons
                    <li><a class="nk-social-behance" href="#"><span class="fab fa-behance"></span></a></li>
                    <li><a class="nk-social-bitbucket" href="#"><span class="fab fa-bitbucket"></span></a></li>
                    <li><a class="nk-social-dropbox" href="#"><span class="fab fa-dropbox"></span></a></li>
                    <li><a class="nk-social-dribbble" href="#"><span class="fab fa-dribbble"></span></a></li>
                    <li><a class="nk-social-deviantart" href="#"><span class="fab fa-deviantart"></span></a></li>
                    <li><a class="nk-social-flickr" href="#"><span class="fab fa-flickr"></span></a></li>
                    <li><a class="nk-social-foursquare" href="#"><span class="fab fa-foursquare"></span></a></li>
                    <li><a class="nk-social-github" href="#"><span class="fab fa-github"></span></a></li>
                    <li><a class="nk-social-instagram" href="#"><span class="fab fa-instagram"></span></a></li>
                    <li><a class="nk-social-linkedin" href="#"><span class="fab fa-linkedin"></span></a></li>
                    <li><a class="nk-social-medium" href="#"><span class="fab fa-medium"></span></a></li>
                    <li><a class="nk-social-odnoklassniki" href="#"><span class="fab fa-odnoklassniki"></span></a></li>
                    <li><a class="nk-social-paypal" href="#"><span class="fab fa-paypal"></span></a></li>
                    <li><a class="nk-social-reddit" href="#"><span class="fab fa-reddit"></span></a></li>
                    <li><a class="nk-social-skype" href="#"><span class="fab fa-skype"></span></a></li>
                    <li><a class="nk-social-soundcloud" href="#"><span class="fab fa-soundcloud"></span></a></li>
                    <li><a class="nk-social-slack" href="#"><span class="fab fa-slack"></span></a></li>
                    <li><a class="nk-social-tumblr" href="#"><span class="fab fa-tumblr"></span></a></li>
                    <li><a class="nk-social-vimeo" href="#"><span class="fab fa-vimeo"></span></a></li>
                    <li><a class="nk-social-vk" href="#"><span class="fab fa-vk"></span></a></li>
                    <li><a class="nk-social-wordpress" href="#"><span class="fab fa-wordpress"></span></a></li>
                    <li><a class="nk-social-youtube" href="#"><span class="fab fa-youtube"></span></a></li>
                -->
                    </ul>
                </div>
                <div class="nk-contacts-right">
                    <ul class="nk-contacts-icons">
                        <li>
                            <a href="#" style="color:white;" data-toggle="modal" data-target="#modalLogin" class="nk-cart-toggle">

                                จำนวนผู้เล่น <span class="nk-badge"><?php echo number_format($user); ?></span> <span class="fa fa-user"></span>
                            </a>
                            <div class="nk-cart-dropdown">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h4 class="mb-0">จำนวนผู้เล่น <span class="text-main-1"><?php echo number_format($user); ?></span> คน</h4>
                                            <h4 class="mb-0">สถานะเซิฟเวอร์
                                                <span class="nk-badge" style="background-color: #007123;">Online</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>


                        <li>
                            <a href="#" style="color:white;" data-toggle="modal" data-target="#modalLogin" class="nk-cart-toggle">
                                สถานะเซิฟเวอร์
                                <span class="nk-badge" style="background-color: #007123;">Online</span>
                                <span class="fa fa-server"></span>
                            </a>
                            <div class="nk-cart-dropdown">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h4 class="mb-0">จำนวนผู้เล่น <span class="text-main-1"><?php echo number_format($user); ?></span> คน</h4>
                                            <h4 class="mb-0">สถานะเซิฟเวอร์
                                                <span class="nk-badge" style="background-color: #007123;">Online</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- END: Top Contacts -->



        <!--
        START: Navbar

        Additional Classes:
            .nk-navbar-sticky
            .nk-navbar-transparent
            .nk-navbar-autohide
    -->
        <nav class="nk-navbar nk-navbar-top nk-navbar-sticky nk-navbar-autohide">
            <div class="container">
                <div class="nk-nav-table">

                    <a href="/" class="nk-nav-logo">
                        <img src="assets/images/logo.png" alt="GoodGames" width="199">
                    </a>


                    <ul class="nk-nav nk-nav-right d-none d-lg-table-cell" data-nav-mobile="#nk-nav-mobile">


                        <li><a href="?yak=home" class="nav-link"><i class="fafa-home"></i> หน้าหลัก</a></li>
                        <li><a href="?yak=donate" class="nav-link"><i class="fafa-dollar-sign"></i> โดเนทเซิฟเวอร์</a></li>
                        <!-- <li><a href="?yak=boss" class="nav-link" ><i class="fafa-money-alt"></i> ข้อมูลบอส</a></li> -->
                        <li><a href="?yak=wordmap" class="nav-link"><i class="fafa-map-marked"></i> ข้อมูลแมพ</a></li>
                        <!-- <li><a href="" class="nav-link"><i class="fafa-user-edit"></i> ข้อมูลผู้เล่น</a></li> -->
                        <li><a href="?yak=download" class="nav-link"><i class="fafa-download"></i> ดาวน์โหลด</a></li>
                        <li><a href="?yak=admin" class="nav-link"><i class="fafa-comments"></i> ติดต่อแอดมิน</a></li>
                        <?php
                        if (@$userinfo_login['group_id'] == "99") {
                            //INSERT INTO `web_news` (`id`, `title_news`, `info_news`, `color`, `time`) VALUES (NULL, 'test', 'ssssss', 'success', '1637384931');
                        ?>

                            <li><a href="?yak=mynameis" class="nav-link"><i class="fafa-comments"></i> จัดการหลังบ้าน</a></li>
                        <?php
                        }

                        ?>

                    </ul>
                    <ul class="nk-nav nk-nav-right nk-nav-icons">

                        <li class="single-icon d-lg-none">
                            <a href="#" class="no-link-effect" data-nav-toggle="#nk-nav-mobile">
                                <span class="nk-icon-burger">
                                    <span class="nk-t-1"></span>
                                    <span class="nk-t-2"></span>
                                    <span class="nk-t-3"></span>
                                </span>
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>
        <!-- END: Navbar -->

    </header>



    <!--
    START: Navbar Mobile

    Additional Classes:
        .nk-navbar-left-side
        .nk-navbar-right-side
        .nk-navbar-lg
        .nk-navbar-overlay-content
-->
    <div id="nk-nav-mobile" class="nk-navbar nk-navbar-side nk-navbar-right-side nk-navbar-overlay-content d-lg-none">
        <div class="nano">
            <div class="nano-content">
                <a href="index.html" class="nk-nav-logo">
                    <img src="assets/images/logo.png" alt="" width="120">
                </a>
                <div class="nk-navbar-mobile-content">
                    <ul class="nk-nav">
                        <!-- Here will be inserted menu from [data-mobile-menu="#nk-nav-mobile"] -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Navbar Mobile -->





    <?php

    if (@$_GET['yak'] == "download") {
        include "_page/page.download.php";
    } else if (@$_GET['yak'] == "boss") {
        include "_page/page.bossinfo.php";
    } else if (@$_GET['yak'] == "truetopup") {
        include "_page/page.true_topup.php";
    } else if (@$_GET['yak'] == "razertopup") {
        include "_page/page.razer_topup.php";
    } else if (@$_GET['yak'] == "mynameis") {
        include "_page/page.mynameis.php";
    } else if (@$_GET['yak'] == "news") {
        include "_page/page.news.php";
    } else if (@$_GET['yak'] == "wordmap") {
        include "_page/page.wordmap.php";
    } else if (@$_GET['yak'] == "admin") {
        include "_page/page.discord.php";
    } else if (@$_GET['yak'] == "vip") {
        include "_page/page.vip.php";
    } else if (@$_GET['yak'] == "donate") {
        include "_page/page.donate.php";
    } else {
        include "_page/page.home.php";
    }
    ?>
    <?php include "_page/page.singup.php"; ?>
    <!-- START: Page Background -->
    <span id="particles-js"></span>
    <img class="nk-page-background-bottom" src="assets/images/bg-bottom.png" alt="">

    <!-- <div id="particles-js"></div>  -->
    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <!-- END: Page Background -->

    <!-- START: Login Modal -->
    <div class="nk-modal modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="ion-android-close"></span>
                    </button>
                    <h4 class="mb-0">จำนวนผู้เล่น <span class="text-main-1"><?php echo number_format($user); ?></span> คน</h4>
                    <h4 class="mb-0">สถานะเซิฟเวอร์
                        <span class="nk-badge" style="background-color: #007123;">Online</span>
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Login Modal -->


    <!-- START: Footer -->
    <footer class="nk-footer">
        <div class="nk-gap-2"></div>

        <div class="container">
            <div class="row row-mlr--5">
                <div class="col-sm-6 col-md-3 col-plr-5">
                    <!-- <img src="assets/upload/111.png" class="animate__animated animate__shakeY animate__infinite animate__slower	3s" alt="Google Drive" class="img-fluid"> -->
                    <!-- Histats.com  (div with counter) -->
                    <div id="histats_counter"></div>
                    <!-- Histats.com  START  (aync)-->
                    <!-- <script type="text/javascript">
                        var _Hasync = _Hasync || [];
                        _Hasync.push(['Histats.start', '1,4652192,4,408,270,55,00011111']);
                        _Hasync.push(['Histats.fasi', '1']);
                        _Hasync.push(['Histats.track_hits', '']);
                        (function() {
                            var hs = document.createElement('script');
                            hs.type = 'text/javascript';
                            hs.async = true;
                            hs.src = ('//s10.histats.com/js15_as.js');
                            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
                        })();
                    </script>
                    <noscript><a href="/" target="_blank"><img src="//sstatic1.histats.com/0.gif?4652192&101" alt="" border="0"></a></noscript> -->
                    <!-- Histats.com  END  -->
                </div>
                <div class="col-sm-6 col-md-3 col-plr-5">
                    <div class="font-weight-bold mb-2" style="color: #ff0000;">เกี่ยวกับเรา</div>
                    <ul>
                        <li>
                            <a href="#" target="_blank">เกี่ยวกับเรา</a>
                        </li>
                        <li>
                            <a href="?yak=truetopup">เติมเงิน</a>
                        </li>
                        <li>
                            <a href="?yak=download">ดาวน์โหลด</a>
                        </li>
                        <li>
                            <a href="?yak=topup">สุ่มของรางวัล</a>
                        </li>
                        <li>
                            <a href="?yak=topup">สมัครสมาชิก</a>
                        </li>
                        <li>
                            <a href="?yak=topup">เข้าสู่ระบบ</a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6 col-md-3 col-plr-5">

                    <div class="row row-mlr--5">
                        <div class="col-md-12 col-plr-5">
                            <div class="font-weight-bold mb-2" style="color: #ff0000;">ติดต่อเรา</div>
                            <ul>
                                <!-- <li>
                            <a href="tel:0618359433">Tel : 061 835 9433</a>
                        </li> -->
                                <li>
                                    <a href="/cdn-cgi/l/email-protection#94e4fefee7fcfbe4baf7fbfae0f5f7e0d4f3f9f5fdf8baf7fbf9" style="word-break: break-all;">Email : <span class="__cf_email__" data-cfemail="5d2d37372e35322d733e3233293c3e291d3a303c3431733e3230">[email&#160;protected]</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="col-sm-6 col-md-3 col-plr-5">
                    <div class="font-weight-bold mb-2" style="color: #ff0000;">Facebook Fanpage</div>

                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v12.0&appId=581350589420027&autoLogAppEvents=1" nonce="K6sC3OGp"></script>
                    <div class="fb-page" data-href="https://web.facebook.com/Ro-YAK-112139181469752/" data-tabs="timeline" data-width="300" data-height="250" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://web.facebook.com/Ro-YAK-112139181469752/" class="fb-xfbml-parse-ignore"><a href="https://web.facebook.com/Ro-YAK-112139181469752/">AuRagnarok</a></blockquote>
                    </div>
                </div>

            </div>
        </div> <input type="hidden" id="base_url" value="/">
        <input type="hidden" id="lang" value="1">
        <div class="nk-copyright">
            <div class="container">
                <div class="nk-copyright-left">
                    Copyright © 2022 YAK All Rights Reserved.
                </div>

                <div class="nk-copyright-right">
                    <ul class="nk-social-links-2">
                        <!--  <li><a class="nk-social-rss" href="#"><span class="fa fa-rss"></span></a></li>
                        <li><a class="nk-social-twitch" href="#"><span class="fab fa-twitch"></span></a></li>
                        <li><a class="nk-social-steam" href="#"><span class="fab fa-steam"></span></a></li> -->
                        <li><a class="nk-social-facebook" href="https://bit.ly/3vzDNyP"><span class="fab fa-facebook"></span></a></li>

                        <li><a class="nk-social-discord" href="https://discord.gg/ZVxctXka"><span class="fab fa-discord"></span></a></li>
                        <!-- <li><a class="nk-social-google-plus" href="#"><span class="fab fa-google-plus"></span></a></li>
                        <li><a class="nk-social-twitter" href="#" target="_blank"><span class="fab fa-twitter"></span></a></li>
                        <li><a class="nk-social-pinterest" href="#"><span class="fab fa-pinterest-p"></span></a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- END: Footer -->

    <!-- START: Scripts -->

    <!-- Object Fit Polyfill -->
    <script src="assets/vendor/object-fit-images/dist/ofi.min.js"></script>

    <!-- GSAP -->
    <script src="assets/vendor/gsap/src/minified/TweenMax.min.js"></script>
    <script src="assets/vendor/gsap/src/minified/plugins/ScrollToPlugin.min.js"></script>

    <!-- Popper -->
    <script src="assets/vendor/popper.js/dist/umd/popper.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Sticky Kit -->
    <script src="assets/vendor/sticky-kit/dist/sticky-kit.min.js"></script>

    <!-- Jarallax -->
    <script src="assets/vendor/jarallax/dist/jarallax.min.js"></script>
    <script src="assets/vendor/jarallax/dist/jarallax-video.min.js"></script>

    <!-- imagesLoaded -->
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>

    <!-- Flickity -->
    <script src="assets/vendor/flickity/dist/flickity.pkgd.min.js"></script>

    <!-- Photoswipe -->
    <script src="assets/vendor/photoswipe/dist/photoswipe.min.js"></script>
    <script src="assets/vendor/photoswipe/dist/photoswipe-ui-default.min.js"></script>

    <!-- Jquery Validation -->
    <script src="assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>

    <!-- Jquery Countdown + Moment -->
    <script src="assets/vendor/jquery-countdown/dist/jquery.countdown.min.js"></script>
    <script src="assets/vendor/moment/min/moment.min.js"></script>
    <script src="assets/vendor/moment-timezone/builds/moment-timezone-with-data.min.js"></script>

    <!-- Hammer.js -->
    <script src="assets/vendor/hammerjs/hammer.min.js"></script>

    <!-- NanoSroller -->
    <script src="assets/vendor/nanoscroller/bin/javascripts/jquery.nanoscroller.js"></script>

    <!-- SoundManager2 -->
    <script src="assets/vendor/soundmanager2/script/soundmanager2-nodebug-jsmin.js"></script>

    <!-- Seiyria Bootstrap Slider -->
    <script src="assets/vendor/bootstrap-slider/dist/bootstrap-slider.min.js"></script>

    <!-- Summernote -->
    <script src="assets/vendor/summernote/dist/summernote-bs4.min.js"></script>

    <!-- nK Share -->
    <script src="assets/plugins/nk-share/nk-share.js"></script>

    <!-- GoodGames -->
    <script src="assets/js/goodgames.min.js"></script>
    <script src="assets/js/goodgames-init.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- END: Scripts -->


    <!-- Your SDK code -->
    <!-- Messenger ปลั๊กอินแชท Code -->
    <div id="fb-root"></div>

    <!-- Your ปลั๊กอินแชท code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "112139181469752");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v13.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/th_TH/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- END: Scripts -->
</body>

</html>