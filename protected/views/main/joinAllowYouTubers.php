<?php
    $this->pageTitle = 'Регистрация YouTube канала!';
    Yii::app()->clientScript->registerPackage('other_css');
?>
<html>

<head>
    <meta charset="utf-8">
    <title><?=$this->pageTitle?></title>
    <!-- start Mixpanel --><script type="text/javascript">(function(f,b){if(!b.__SV){var a,e,i,g;window.mixpanel=b;b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split(".");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;"undefined"!==typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){var a="mixpanel";"mixpanel"!==d&&(a+="."+d);b||(a+=" (stub)");return a};c.people.toString=function(){return c.toString(1)+".people (stub)"};i="disable track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.set_once people.increment people.append people.track_charge people.clear_charges people.delete_user".split(" ");
            for(g=0;g<i.length;g++)f(c,i[g]);b._i.push([a,e,d])};b.__SV=1.2;a=f.createElement("script");a.type="text/javascript";a.async=!0;a.src="//cdn.mxpnl.com/libs/mixpanel-2.2.min.js";e=f.getElementsByTagName("script")[0];e.parentNode.insertBefore(a,e)}})(document,window.mixpanel||[]);
        mixpanel.init("6374fe0ab314b8bad17a35b02cb708d5");</script><!-- end Mixpanel -->

</head>

<body  class="sign-in-bg">
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter26724339 = new Ya.Metrika({id:26724339,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/26724339" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<div class="wizard-container">
    <div class="primary-content buinsses-wiz-wrapper">

        <div style="padding: 40px;">

            <div class="wizard-steps" id="yw0">
                <h1 style="text-align: center">Подача заявки на сотрудничество с PlaceChannels</h1>
            </div>
            <div class="clear"></div>
        </div>
        <div class="widget">
            <div style="margin: 43px;
text-align: justify;
font-size: 16px;">
                Для того, чтобы мы могли начать поиск рекламодателя  для Вашего канала нам необходимо получить статистику канала.
                <br>Данные собираются в автоматическом режиме при авторизации вашего аккаунта и могут быть использованы исключительно для оценки вашей статистики и репутации канала.

            </div>
            <div style="padding-right: 42px;
text-align: right;
margin-bottom: 25px;">
                <a
                    onclick="mixpanel.track('Ютюбер нажал на кнопку YouTube на стр. регистрации')"
                    href="<?=Yii::app()->createAbsoluteUrl('oauth/createAndFollowAuthUrl')?>">
                    <div style="display: inline-block;
zoom: 1;
padding: 12px 18px;
background: #46BD7B;
line-height: 30px;
vertical-align: middle;
font-size: 16px;
color: #fff;">
                        <div style="display: inline-block;
vertical-align: middle;">Заполнить данные при помощи</div>
                        <span style="background: url(/public/img/yt.png) no-repeat;
background-position: 0px 0px;
width: 100px;
height: 38px;
background-size: 86%;
display: inline-block;
vertical-align: middle;">

                        </span>

                        <span style="background: url(/public/img/right-line.png) no-repeat;
background-position: 0px 0px;
width: 36px;
height: 22px;
background-size: 67%;
display: inline-block;
vertical-align: middle;">

                        </span>
                    </div>
                </a>
            </div>
                 </div>
    </div>
    <div class="trouble-txt"><!--Регистрируясь у нас на сайте вы принимаете <a href="javascript:void(0)" target="_blank"
    onclick="mixpanel.track('Ютюбер хотел почитать условия пользования')">условия пользования сайтом</a><br>-->Если у вас возникли проблемы пишите нам <a href="mailto:support@placechannels.com">support@placechannels.com</a></div>
</div>
</body>
</html>

