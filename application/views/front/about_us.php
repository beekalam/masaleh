<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>مت کار</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url('assets/front_assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/front_assets/css/fontawesome-all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/front_assets/css/bootstrap-select.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/front_assets/animate.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/front_assets/css/main.css'); ?>">
</head>
<body>
<section class="menu_sec">
    <nav class="navbar navbar-expand-sm fixed-top navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item pr-3"><a href="<?php echo base_url('front/home/index'); ?>"
                                             class="txt_gr nav-link bold font18">مت کار</a></li>
                <li class="nav-item pr-3"><a href="<?php echo base_url('front/home/index'); ?>#section1"
                                             class="txt_gr nav-link bold font18">دانلود اپ</a></li>
                <li class="nav-item pr-3"><a href="<?php echo base_url('front/home/index'); ?>#section2"
                                             class="txt_gr nav-link bold font18">خدمات ما</a></li>
                <li class="nav-item pr-3"><a href="<?php echo base_url('front/home/rules'); ?>"
                                             class="txt_gr nav-link bold font18">قوانین و مقررات</a></li>
                <li class="nav-item pr-3"><a href="<?php echo base_url('front/home/complaint'); ?>"
                                             class="txt_gr nav-link bold font18">ثبت شکایت</a></li>
                <li class="nav-item pr-3"><a href="<?php echo base_url('front/home/aboutus'); ?>"
                                             class="txt_gr nav-link bold font18">درباره ی ما</a>
                </li>
                <li class="nav-item pr-3"><a href="<?php echo base_url('front/home/contactus'); ?>"
                                             class="txt_gr nav-link bold font18">تماس با ما</a>
                </li>
            </ul>
        </div>
    </nav>
</section>
<section class="main pt-8">
    <div class="container aboutusmain_cont">
        <div class="row aboutus_main_row pb-7">
            <div class="col-12 col-md-6 aboutus_txt pl-5">
                <h4 class="txt_black bold pb-4">درباره ی ما</h4>
                <p class="txt_black pt-2 pb-3 text-justify">
                    <?php echo $about_us_long; ?>
                </p>
            </div>
            <div class="col-12 col-md-6 about_us_imgcol">
                <img class="about_us_img" src="<?php echo base_url('assets/front_assets/img/logo.png'); ?>">
            </div>
        </div>
    </div>
</section>

<footer class="pt-2 " id="section3">
    <div class="container-fluid footer_cont inner_pgs_footer">

        <div class="row scmain_row">
            <div class="col-12 col-md-6 offset-md-4cus scmain_col">
                <div class="row sc_row">
                    <div class="col-3 col-md-2 sc_col">
                        <img class="sc_icof"
                             src="<?php echo base_url('assets/front_assets/img/facebook-logo-button.png'); ?>">
                    </div>
                    <div class="col-3 col-md-2 sc_col">
                        <img class="sc_icof" src="<?php echo base_url('assets/front_assets/img/linkedin.png'); ?>">
                    </div>
                    <div class="col-3 col-md-2 sc_col">
                        <img class="sc_icof" src="<?php echo base_url('assets/front_assets/img/telegram.png'); ?>">
                    </div>
                    <div class="col-3 col-md-2 sc_col">
                        <img class="sc_icof" src="<?php echo base_url('assets/front_assets/img/instagram.png'); ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="row inrpages_footer_row">

            <div class="col-12 col-md-3 footer_col">
                <ul class="list-inline input-group inrpages_footer_ul list-unstyled pt-3  pb-3 mb-0">
                    <li class="list-group-item list-inline-item li_itemst txt_black">
                        <ul class="inrpages_footer_li_ul list-unstyled pr-1">
                            <li><a href="index.html" class=" font18 txt_black">مت کار</a></li>
                            <li><a href="#section1" class=" font18 txt_black">دانلود اپ</a></li>
                            <li><a href="#section2" class=" font18 txt_black">خدمات ما</a></li>
                            <li><a href="doctor_reg.html" class="font18 txt_black">درباره ی ما</a></li>
                            <li><a href="#section3" class="font18 txt_black">تماس با ما</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="col-12 col-md-6 footer_col pt-5">
                <div class="row dllappbut_row">
                    <div class="col-12 col-md-6 dl_but_col ">
                        <a type="sumbit" href="#"
                           class="btn btn-raised btn_cuswhite btn-lg bold font17 btn_full w-70 mt-5">
                            دریافت از <img src="<?php echo base_url('assets/front_assets/img/Bazar.png'); ?>"
                                           class="cafe_blogo"></a>
                    </div>
                    <div class="col-12 col-md-6 dl_but_col ">
                        <a type="sumbit" href="#"
                           class="btn btn-raised btn_cuswhite btn-lg bold font17 btn_full w-70 mt-5">
                            دریافت مستقیم اپ <img
                                    src="<?php echo base_url('assets/front_assets/img/android-logo_g.png'); ?>"
                                    class="cafe_blogo"></a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3 footer_col pt-5">
                <div class="namads_cont row">
                    <div class="samandehi_col col-6 col-md-6">
                        <img id='jxlzesgtjxlzapfuoeuksizpesgt' style='cursor:pointer'
                             onclick='window.open("https://logo.samandehi.ir/Verify.aspx?id=1015890&p=rfthobpdrfthdshwmcsipfvlobpd", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")'
                             alt='logo-samandehi'
                             src='https://logo.samandehi.ir/logo.aspx?id=1015890&p=nbpdlymanbpdujynaqgwbsiylyma'/>
                    </div>
                    <div class="e_namad_col col-6 col-md-6">
                        <img src="https://trustseal.enamad.ir/logo.aspx?id=107968&amp;p=QX9SwJY6MzFEX9Ev" alt=""
                             onclick="window.open(&quot;https://trustseal.enamad.ir/Verify.aspx?id=107968&amp;p=QX9SwJY6MzFEX9Ev&quot;, &quot;Popup&quot;,&quot;toolbar=no, location=no, statusbar=no, menubar=no, scrollbars=1, resizable=0, width=580, height=600, top=30&quot;)"
                             style="cursor:pointer" id="QX9SwJY6MzFEX9Ev">
                    </div>
                </div>
            </div>

            <div class="col-md-12 text-center txt_black pt-3 pb-2">
                کلیه ی حقوق این سایت برای مت کار محفوظ می باشد
            </div>
            <div class="col-md-12 text-center txt_black pb-3" style="font-family: lato">
                Powered by <a title="" class="txt_black" href="http://fanacmp.ir/">FANA</a>
            </div>

        </div>
    </div>
</footer>

<script src="<?php echo base_url('assets/front_assets/js/jquery-3.2.1.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/front_assets/js/popper.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/front_assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/front_assets/js/bootstrap-select.js'); ?>"></script>
<script src="<?php echo base_url('assets/front_assets/js/vanilla.js'); ?>"></script>
<script src="<?php echo base_url('assets/front_assets/js/main_js.js'); ?>"></script>

</body>
</html>

