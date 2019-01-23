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

<section class="main_sec container main-content">
    <div class="row contus_main_row">
        <div class="col-12 col-md-12 onlineSu_cnt">
            <h4 class="txt_black bold pb-4">دفتر مرکزی</h4>
            <div class="row onlineSu_row">
                <div class="col-12 col-md-6 TellChat_col pt-4 pb-4">
                    <div class="row TellChat_row">
                        <div class="col-12 col-md-12 tell_col pb-3">
                            <span class="txt_black bold font15 "><i class="fa fa-fw fa-phone"></i> شماره تماس : </span>
                            <span class="txt_black lato pb-3"><?php echo $settings['phone']; ?></span>
                            <span class="txt_black bold d-block pt-3"><i
                                        class="fa fa-fw fa-map-marker"></i> آدرس : </span>
                            <p class="txt_black pt-2 pb-3">
                                <?php echo $settings['address']; ?>
                            </p>
                            <span class="txt_black bold font15"><i class="fa fa-fw fa-envelope"></i> ایمیل : </span>
                            <span class="txt_black lato">
                                <?php echo $settings['email']; ?>
                            </span>
                        </div>
                        <div class="col-12 col-md-12 map_office_col pt-4 pb-4">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d902.4182022667519!2d55.277868867310524!3d25.214254276653485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f428c33c44065%3A0x590fccd834b6aaf8!2sAl+Attar+Business+Tower+-+Dubai+-+United+Arab+Emirates!5e0!3m2!1sen!2siq!4v1538296889024"
                                    width="400" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 SocialM_col pt-4 pb-4">
                    <div class="row SocialM_row">
                        <h6 class="txt_black bold pb-4">ما را در شبکه های اجتماعی دنبال کنید</h6>
                        <div class="col-12 col-md-12 scm_ico p-0">
                            <div class="row sc_row">
                                <div class="col-3 col-md-2 sc_col">
                                    <a href="#"><img class="sc_icof2"
                                                     src="<?php echo base_url('assets/front_assets/img/facebookbge.png'); ?>"></a>
                                </div>
                                <div class="col-3 col-md-2 sc_col">
                                    <a href="#"><img class="sc_icof2"
                                                     src="<?php echo base_url('assets/front_assets/img/linkedinbgr.png'); ?>"></a>
                                </div>
                                <div class="col-3 col-md-2 sc_col">
                                    <a href="#"><img class="sc_icof2"
                                                     src="<?php echo base_url('assets/front_assets/img/telegrambgr.png'); ?>"></a>
                                </div>
                                <div class="col-3 col-md-2 sc_col">
                                    <a href="#"><img class="sc_icof2"
                                                     src="<?php echo base_url('assets/front_assets/img/instagrambgr.png'); ?>"></a>
                                </div>
                            </div>
                        </div>

                        <h6 class="txt_black bold pt-5 pb-4">ارسال پیام</h6>
                        <div class="col-12 col-md-12 scm_ico p-0">
                            <div class="row sc_row">
                                <form id="comment_form" action="<?php echo base_url('front/home/concatus_form'); ?>"
                                      method="post" role="form" class="w-100">
                                    <div class="form-group col-12 col-md-12 pb-4">
                                        <div class="input-group input-group-sm">
														  <span class="input-group-addon span_cus inpgr_addoncus_regmodal"
                                                                id="sizing-addon8">
														  <i class="fa fa-envelope"></i>
															  </span>
                                            <input class="form-control srch_cus3 txt_black mr-0" type="email"
                                                   name="email"
                                                   placeholder="ایمیل">
                                        </div>
                                    </div>
                                    <div class="form-group col-12 col-md-12 mg">
                                        <textarea class="form-control cus_txtarea" placeholder="پیام"
                                                  id="exampleFormControlTextarea1" name="message" rows="5"></textarea>

                                    </div>
                                    <div class="col-md-5 offset-md-7 mg">
                                        <div>
                                            <button type="sumbit" href="user_profile.html"
                                                    class="btn btn-raised btn_cusblgray btn-sm btn_full w-100">ارسال
                                                پیام
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
