<?php
	$this->pageTitle=Yii::app()->name;
?>

<script>
    function changeState(a){

        if(a == 'youtube'){

            mixpanel.track("Нажата кнопка YouTube");


            jQuery('body').addClass('position3');
            jQuery('body').removeClass('position2');

            jQuery('.menu_ull').find('li.upper.youtuber').addClass('current-page');
            jQuery('.menu_ull').find('li.upper.brand').removeClass('current-page');

            window.location.hash = 'more2';
        }else if(a == 'brand'){

            mixpanel.track("Нажата кнопка Бренд");

            jQuery('body').addClass('position2');
            jQuery('body').removeClass('position3');

            jQuery('.menu_ull').find('li.upper.brand').addClass('current-page');
            jQuery('.menu_ull').find('li.upper.youtuber').removeClass('current-page');

            window.location.hash = 'more3';
        }
    }

    jQuery(document).ready(function(){
        window.location.hash = '';
    })
</script>

<!-- Begin Large Hero Block -->
<section class="hero accent parallax" style="background-image: url(./public/img/hero21.jpg); background-position: 50% -306px;">

    <!-- Heading -->
    <div class="hero-content container" style="margin-top: 252px;">
        <h1><span class="txt-underline">#1 платформа</span> для маркетинга на YouTube</h1>
        <!--<h1>Самый простой способ начать работать с YouTube каналами</h1>-->
        <h2>
            <span>Где YouTube каналы и Бренды начинают сотрудничать!</span>
            <!--<span>Раскрути свой бренд с помощью YouTube каналов</span>-->
        </h2>
    </div><!-- END -->

    <!-- Button -->
    <div class="sub-hero container btn-container-top">
        <a href="javascript:void(0)" onclick="changeState('youtube')" class="button red btn-right">Я владелец YouTube канала</a>
        <a href="javascript:void(0)" onclick="changeState('brand')"  style="padding-left: 109px;padding-right: 109px;" class="button red mobile-margin">Я Бренд</a>
    </div>
    <!-- Button -->
    <div class="sub-hero container btn-container-top">
        Нажмите на нужную кнопку
    </div><!-- END -->
</section>
<!-- End Large Hero Block -->

<!-- Begin Overview Block -->
<section class="center-mobile content container" id="more">

    <div class="row">
       <div class="center title col-lg-12">
           <h2>Зарабатывай на своем YouTube канале больше<br> Получай деньги за съемку любимого видео!</h2>
       </div>
   </div>
    <div class="row">

        <div class="col-sm-4 center">
            <div class="icon icon-red" data-icon=""><img src="./public/img/h1.png"></div>
            <h2>Соединяем</h2>
            <div class="line"></div>
            <p>Наша платформа соединяет Бренды с YouTube каналами, чтобы создать оригинальный видеоконтент, который будет просмотрен целевой аудиторией бренда.</p>
        </div>

        <div class="col-sm-4 center">
            <div class="icon icon-red" data-icon=""><img src="./public/img/h2.png"></div>
            <h2>Упрощаем</h2>
            <div class="line"></div>
            <p>От знакомства до создания видео наша платформа помогает в работе Брендам с YouTube каналом.</p>
        </div>
        <div class="col-sm-4 center">
            <div class="icon icon-red" data-icon=""><img src="./public/img/h3.png"></div>
            <h2>Анализируем</h2>
            <div class="line"></div>
            <p>Анализируй результаты созданного видео. Мы предоставляем полную аналитику по видеоконтенту.</p>
        </div>

    </div>
</section>
<!-- End Overview Block -->

<section class="center-mobile content-steps-header" id="section_name_block">

    <div class="row">
        <div class="center title col-lg-10 step-col-container">
            <h1 class="steps-head-red">Для Брендов и YouTube каналов</h1>
        </div>
    </div>
</section>

<!-- Begin Feature Block -->
<section class="absolute clearfix" id="section_content_block">

    <div class="content container center-mobile">

        <!-- Features -->
        <div class="row">
            <div class="feature col-sm-6 clearfix">
                <h2 class="heading-spacer">БРЕНДЫ</h2>
                <h3>Видео стоимостью 100$</h3>
                <p class="small bottom-spacer">Маркетинг в YouTube не должен быть дорогим. Бренды могут устанавливать свои собственные цены на видео  которые начинаются от $ 100 за видео.  </p>
                <div class="clearfix"></div>
                <h3 class="font_tube_ch">Выберите наиболее подходящий YoTube канал</h3>
                <p class="small bottom-spacer text_bl_ch">PlaceChannels позволяет Брендам выбрать лучшие каналы для своего бренда, смотреть  профиль и статистику канала до найма.</p>
                <div class="clearfix"></div>
                <h3>Увеличьте количество своих клиентов</h3>
                <p class="small">PlaceChannels помогает увеличить узнаваемость бренда и лояльность клиентов.</p>
                <div class="clearfix"></div>
                <div class="why-btn-wrapper" >
                    <a class="button red_l btn-right-sm" href="http://placechannels.com/business/start">Зарегистрировать Бренд</a>
                    <a class="button gray_l mobile-margin" style="margin-top:10px;" href="<?=Yii::app()->createAbsoluteUrl('main/brands')?>#more">Узнать больше</a>
                </div>
            </div>

            <div class="feature col-sm-6 clearfix marg_chan">
                <h2 class="heading-spacer">YouTube каналы</h2>
                <h3>Зарабатывайте деньги</h3>
                <p class="small bottom-spacer">YouTube каналы могут заниматься только созданием видео, а мы позаботиться о том чтобы найти им рекламодателя и увеличит доход.</p>
                <div class="clearfix"></div>
                <h3>Растите аудиторию</h3>
                <p class="small bottom-spacer">PlaceChannels помогает увеличит посещаемость Youtube каналов через уникальные инструменты Growth Hacking.</p>
                <div class="clearfix"></div>
                <h3>Вливайтесь в сообщество</h3>
                <p class="small">Мы создаем большое сообщество для брендов, YouTube каналов и их фанов.</p>
                <div class="clearfix"></div>
                <div class="why-btn-wrapper" >
                    <a class="button red_l btn-right-sm" href="http://placechannels.com/oauth/callback">Зарегистрировать YouTube канал</a>
                    <a class="button gray_l mobile-margin"  style="margin-top:10px;" href="<?=Yii::app()->createAbsoluteUrl('main/youtubers')?>#more">Узнать больше</a>
                </div>
            </div>
        </div><!-- END -->

    </div>
</section>



<?php

    echo $this->renderPartial('brands',array(),true,false);
    echo $this->renderPartial('youtubers',array(),true,false);

?>

<!-- END -->
    <div class="row logos-wrapper" style="
margin-bottom: 50px;">
	<h1 style="margin: 30px;
font-size: 35px; text-align:center;">Расскажи о нас</h1>
        <div class="col-sm-12 center">
            <a href="http://forbes.ua/contacts"><img class="logo-img" src="./public/img/FORBES1.png"></a>
            <a href="http://ain.ua/contacts"><img style="margin-top: -10px;"  class="logo-img" src="./public/img/ain.png"></a>
            <a href="http://techcrunch.com/got-a-tip/"><img class="logo-img" src="./public/img/techcrunch.png"></a>
            <a href="http://www.businessinsider.com/contact"><img class="logo-img" src="./public/img/businessinsider.png"></a>
            <a href="http://venturebeat.com/contact/"><img class="logo-img" src="./public/img/venturebeat.png"></a>
        </div>
    </div>
</section>
<!-- End Testimonials Block -->



<!-- Begin Call to Action Block -->
<section class="call-to-action content light" style="border-top: 1px solid #ccc;" id="section_other_block">
    <div class="container">

        <!-- Actions -->
        <div class="row">
            <div class="col-lg-12">
                <h2>Присоединяйтесь сейчас! Регистрация занимает всего 30 секунд</h2>
                <p class="signup-txt"><span class="first-m">#1 платформа</span> где YouTube каналы и Бренды сотрудничают на своих условиях! </p>
            </div>
            <div class="actions padded col-lg-12">
                <a class="button red btn_fix_sc" href="http://placechannels.com/business/start" style="padding-left:61px;padding-right:61px;margin-top:10px;">Зарегистрировать Бренд</a>
                <a class="button red btn_fix_sc" style="margin-top:10px;" href="http://placechannels.com/oauth/callback">Зарегистрировать YouTube канал</a>
            </div>
        </div><!-- END -->
    </div>
</section>
<!-- End Call to Action Block -->

<script>
    $('#ilightbox1').iLightBox();
    $('#ilightbox2').iLightBox();
    $('#ilightbox3').iLightBox();
    $('#ilightbox4').iLightBox();
</script>

<style type="text/css" id="stylebot-global-css">#left_ads {display: none  !important;}#profile_friends {margin-top: 10px !important;}.im_new_msg .im_log_author, .im_new_msg .im_log_body, .im_new_msg .im_log_date {background: #84B9E5 !important;}.rate_line.stage0, .profile_rate_warning, #profile_idols, #profile_videos, #profile_audios, .profile_rate_warning+#profile_friends {display: none !important;}</style>