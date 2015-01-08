<?php
Yii::app()->clientScript->registerPackage('other_css');
$this->pageTitle = 'Регистрация YouTube канала!';
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
                <h1 style="text-align: center">Регистрация YouTube канала!</h1>
                <div style="text-align: center;">Сделайте скриншот статистики YouTube и загрузите их в форме ниже</div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="widget">
            <?php
                if(isset($_GET['status'])&&$_GET['status']=='success'){
                    if($img != null){
            ?>
                <div class="image_block" style="padding: 15px;">
            <?php
                        foreach($img as $k=>$v){
                            ?>
                                <img style="width: 150px;" src="<?=Yii::app()->createAbsoluteUrl('main/GetImage',array('nameImg'=>$v->screen_name))?>">
                            <?php
                        }
                    }
            ?>
                    </div>
                    <div style="text-align: center;
font-weight: bold;">Файл Загружен</div><div style="text-align: center;">Вы можете добавить еще. Для этого выберете новую фотографию и нажмите "Сохранить скрин".</div>
            <?php
                }
            ?>
            <div class="wiz_form">
                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'joinYouTubers-form',
                    //'action' => Yii::app()->createUrl('main/brandsSave'),
                    'enableClientValidation'=>false,
                    'clientOptions'=>array(
                        'validateOnSubmit'=>false,

                    ),
                    'enableAjaxValidation'=>false,
                    'htmlOptions'=>array( 'enctype'=>'multipart/form-data')
                )); ?>

                <div class=" fluid">
                    <div class="formRow ">
                        <div class="grid4" style="vertical-align: middle;display: inline-block;padding: 10px;">
                            <?php echo CHtml::activeFileField($model, 'image'); ?>
                        </div>
                        <div class="formRow  noBorderB" style="border: none;padding: 0;">
                            <div class="formSubmit">
                                <input class="buttonXL bGreen" type="submit" name="yt0" onclick="mixpanel.track('Ютюбер нажал Сделать скрин')" value="Сохранить скрин!" <!-- onclick="mixpanel.track('Ютюбер ввел телефон и нажал продолжить',{'phone':document.getElementById('JoinYouTubers_phone').value})" -->
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow  noBorderB">
                        <div style="text-align: center;">Если вы закончили загружать скриншоты нажмите "Закончить регистрацию"</div>
                        <div class="formSubmit" style="text-align: center;width: 100%;">
                            <input class="buttonXL bGreen" type="button" name="yt0" onclick="window.location.assign('<?=Yii::app()->createAbsoluteUrl('main/ResetSession')?>')" value="Закончить регистрацию" <!-- onclick="mixpanel.track('Ютюбер ввел телефон и нажал продолжить',{'phone':document.getElementById('JoinYouTubers_phone').value})" -->
                        </div>
                        <div class="clear"></div>
                    </div>

                </div>
                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
    <div class="trouble-txt"><!--Регистрируясь у нас на сайте вы принимаете <a href="javascript:void(0)" target="_blank"
    onclick="mixpanel.track('Ютюбер хотел почитать условия пользования')">условия пользования сайтом</a><br>-->Если у вас возникли проблемы пишите нам <a href="mailto:support@placechannels.com">support@placechannels.com</a></div>
</div>
</body>
</html>