<?php
Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerPackage('other_css');
Yii::app()->clientScript->registerPackage('style_native_el');
$this->pageTitle = 'Вход';
?>
<html>

<head>
    <meta charset="utf-8">
    <title><?=$this->pageTitle?></title>

    <!-- start Mixpanel --><script type="text/javascript">(function(f,b){if(!b.__SV){var a,e,i,g;window.mixpanel=b;b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split(".");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;"undefined"!==typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){var a="mixpanel";"mixpanel"!==d&&(a+="."+d);b||(a+=" (stub)");return a};c.people.toString=function(){return c.toString(1)+".people (stub)"};i="disable track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.set_once people.increment people.append people.track_charge people.clear_charges people.delete_user".split(" ");
            for(g=0;g<i.length;g++)f(c,i[g]);b._i.push([a,e,d])};b.__SV=1.2;a=f.createElement("script");a.type="text/javascript";a.async=!0;a.src="//cdn.mxpnl.com/libs/mixpanel-2.2.min.js";e=f.getElementsByTagName("script")[0];e.parentNode.insertBefore(a,e)}})(document,window.mixpanel||[]);
        mixpanel.init("6374fe0ab314b8bad17a35b02cb708d5");</script><!-- end Mixpanel -->
    <script>
        (function($) {
            $(function() {
                $('input, select').styler();
            })
        })(jQuery)
    </script>

    <style>
        #CampaignProposal_views_count-styler{
            width: 100%;
            margin-top: 11px;
        }

        #CampaignProposal_id_img-styler{
            width: 100%;
        }
    </style>
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
                <h1 style="text-align: center">Заявка на рекламную кампанию!</h1>
            </div>
            <div class="clear"></div>
        </div>
        <div class="widget">
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
                            <div class="grid4">
                                <label>Название продукта</label></div><div class="grid8">
                                <input placeholder="Введите название продукта" type="text" name="CampaignProposal[title]" id="CampaignProposal_title" class="<?=(($form->error($model,'title') != '') ? 'error' : '')?>">
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow ">
                            <div class="grid4">
                                <label>Описание продукта</label></div><div class="grid8">
                                <textarea placeholder="Описание продукта" name="CampaignProposal[details]" id="CampaignProposal_details" class="<?=(($form->error($model,'details') != '') ? 'error' : '')?>"></textarea>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow ">
                            <div class="grid4">
                                <label>Желаемое количество просмотров видео</label></div><div class="grid8">
                                <select style="width: 100%;" name="CampaignProposal[views_count]" id="CampaignProposal_views_count" class="<?=(($form->error($model,'title') != '') ? 'error' : '')?>">
                                    <option value="1">10,000</option>
                                    <option value="2">20,000</option>
                                    <option value="3">30,000</option>
                                    <option value="4">50,000</option>
                                    <option value="5">100,000</option>
                                    <option value="6">500,000</option>
                                </select>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow ">
                            <div class="grid4">
                                <label>Целевая аудитория</label></div><div class="grid8">
                                <div><input type="checkbox" name="CampaignProposal[au13-17]" id="CampaignProposal_au13-17"> <label for="CampaignProposal_au13-17">13-17</label></div>
                                <div><input type="checkbox" name="CampaignProposal[au18-24]" id="CampaignProposal_au18-24"> <label for="CampaignProposal_au18-24">18-24</label></div>
                                <div><input type="checkbox" name="CampaignProposal[au25-34]" id="CampaignProposal_au25-34"> <label for="CampaignProposal_au25-34">25-34</label></div>
                                <div><input type="checkbox" name="CampaignProposal[au34-50]" id="CampaignProposal_au34-50"> <label for="CampaignProposal_au34-50">35-50</label></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow ">
                            <div class="grid4">
                                <label>Фото продукта</label></div><div class="grid8">
                                <input placeholder="Фото продукта" type="file" name="CampaignProposal[id_img]" id="CampaignProposal_id_img" class="<?=(($form->error($model,'details') != '') ? 'error' : '')?>">
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow  noBorderB">
                            <div class="formSubmit">
                                <input class="buttonXL bGreen" type="submit" name="yt0" value="Продолжить"  onclick="mixpanel.track('Бренд подал заявку на рекламную кампанию')">
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
        </div>
    </div>
    <div class="trouble-txt"><!--Регистрируясь у нас на сайте вы принимаете <a href="#" target="_blank"  onclick="mixpanel.track('Бренд хотел почитать условия пользования')">условия пользования сайтом</a><br>-->Если у вас возникли проблемы пишите нам <a href="mailto:support@placechannels.com">support@placechannels.com</a></div>
</div>
</body>
</html>