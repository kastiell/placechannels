<?php
Yii::app()->clientScript->registerPackage('other_css');
$this->pageTitle = 'Спасибо за регистрацию!';
?>
<html>

<head>
    <meta charset="utf-8">
    <title><?=$this->pageTitle?></title>

    <style>
        .name{
            font-size: 20px;
            margin-top: 35px;
            margin-bottom: 20px;
            border-bottom: 1px solid rgba(255, 64, 48, 1);
            color: #000;
        }
        .content{
            font-size: 20px;
        }
        .content2{
            margin-top: 20px;font-size: 20px;
        }
    </style>

</head>

<body  class="sign-in-bg">

<div class="wizard-container">
    <div class="primary-content buinsses-wiz-wrapper">

        <div style="padding: 40px;">

            <div class="wizard-steps" id="yw0">
                <div style="text-align: center;">
                    <div class="name">Спасибо за регистрацию!</div>
                    <div class="content">
                        Наши сотрудники свяжутся с Вами и сообщат результаты рассмотрения вашей заявки.</div>
                    <div class="content2">
                        Вернутся на <a href="http://placechannels.com">главную</a>.</div>
                </div>
            </div>
            <div class="clear"></div>
        </div>

    </div>
</div>
</body>
</html>
