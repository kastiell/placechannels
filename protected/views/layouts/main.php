<?php 
	Yii::app()->clientScript->registerPackage('index');

	$actionId = Yii::app()->controller->action->id;
?>


<!DOCTYPE html>
<html class="no-js" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]--><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$this->pageTitle?></title>
    <meta name="description" content="First self-service marketplace that makes Youtube video influence marketing super easy for advertisers, brands and YouTube influencers.">
    <meta name="keywords" content="YouTube influence, YouTube marketing, YouTube guru, YouTube stars, marketplace, influence marketing, engagement marketing, influencers, influential engagement marketing, youTube engagement">


    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <div class="fit-vids-style" id="fit-vids-style" style="display: none;">­<style>.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}</style></div>

    <!-- start Mixpanel --><script type="text/javascript">(function(f,b){if(!b.__SV){var a,e,i,g;window.mixpanel=b;b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split(".");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;"undefined"!==typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){var a="mixpanel";"mixpanel"!==d&&(a+="."+d);b||(a+=" (stub)");return a};c.people.toString=function(){return c.toString(1)+".people (stub)"};i="disable track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.set_once people.increment people.append people.track_charge people.clear_charges people.delete_user".split(" ");
            for(g=0;g<i.length;g++)f(c,i[g]);b._i.push([a,e,d])};b.__SV=1.2;a=f.createElement("script");a.type="text/javascript";a.async=!0;a.src="//cdn.mxpnl.com/libs/mixpanel-2.2.min.js";e=f.getElementsByTagName("script")[0];e.parentNode.insertBefore(a,e)}})(document,window.mixpanel||[]);
        mixpanel.init("6374fe0ab314b8bad17a35b02cb708d5");</script><!-- end Mixpanel -->
    <?php
        if(!Yii::app()->user->isGuest){
    ?>
            <script>
                jQuery(document).ready(function(){
                    mixpanel.identify('<?=Yii::app()->user->getId()?>');
                    mixpanel.track('Обновление страницы авторизированым пользователем');
                })
            </script>
    <?php
        }
    ?>

</head>
<body class="position1">

<!-- Start SiteHeart code -->
<script>
    (function(){
        var widget_id = 742280;
        _shcp =[{widget_id : widget_id}];
        var lang =(navigator.language || navigator.systemLanguage
            || navigator.userLanguage ||"en")
            .substr(0,2).toLowerCase();
        var url ="widget.siteheart.com/widget/sh/"+ widget_id +"/"+ lang +"/widget.js";
        var hcc = document.createElement("script");
        hcc.type ="text/javascript";
        hcc.async =true;
        hcc.src =("https:"== document.location.protocol ?"https":"http")
            +"://"+ url;
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hcc, s.nextSibling);
    })();
</script>
<!-- End SiteHeart code -->


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

<?php echo $content; ?>

</body>
</html>