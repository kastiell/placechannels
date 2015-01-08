<?php $this->beginContent('/layouts/main'); ?>



    <!-- Begin Navigation -->
    <nav class="desktop sticky" style="top: 15px;">

        <!-- Menu -->
        <ul class="nav-content clearfix menu_ull">
            <li id="magic-line" style="width: 37px; left: 0px; overflow: hidden;"></li>
            <li class="<?=$actionId == 'index' ? 'current-page' : ''?> upper"><a href="<?=Yii::app()->createAbsoluteUrl('/')?>">Главная</a></li>
            <li class="upper youtuber"><a href="javascript:void(0)" onclick="changeState('youtube')">YouTube канал</a></li>
            <li class="upper brand"><a href="javascript:void(0)" onclick="changeState('brand')">Бренд</a></li>
            <li class="drop upper">
                <a class="drop-btn" href="#" onclick="mixpanel.track('Нажата кнопка Регистрация')">Регистрация</a>
                <ul class="drop-list">
                    <li><a href="<?=Yii::app()->createAbsoluteUrl('main/joinYouTubersNew')?>" onclick="mixpanel.track('Нажата кнопка регистрация для YouTube')">Для YouTube каналов</a></li>
                    <li><a href="<?=Yii::app()->createAbsoluteUrl('main/joinBrands')?>" onclick="mixpanel.track('Нажата кнопка регистрация для Брендов')">Для Брендов</a></li>
                    <?php
                        if(!Yii::app()->user->isGuest&&(Yii::app()->user->getRole() == 'admin')){
                    ?>
                    <li><a href="<?=Yii::app()->createAbsoluteUrl('analytics/channels/list')?>" onclick="mixpanel.track('Нажата кнопка Аналитика')">Аналитика</a></li>
                    <?php
                        }
                    ?>
                </ul>
            </li>
            <?php
                if(Yii::app()->user->isGuest){
            ?>
            <li class="upper"><a href="<?=Yii::app()->createAbsoluteUrl('main/login')?>" class="login-btn" onclick="mixpanel.track('Нажата кнопка Вход')">Вход</a></li>
            <?php
                }else{
            ?>
            <li class="upper"><a href="<?=Yii::app()->createAbsoluteUrl('main/logout')?>" class="login-btn" onclick="mixpanel.track('Нажата кнопка Выход')">Выход</a></li>
             <?php
                }
            ?>
        </ul><!-- END -->

    </nav>
    <header class="desktop sticky" style="top: 15px;">

        <!-- Logo -->
        <a href="/" style="
    font-size: 31px;
	"><span style="
		color: #fff;
	">Place</span><span style="
		color: rgba(233, 64, 48, 1);
	">Channels</span></a>
        <!-- Menu Button -->
        <button type="button" class="nav-button">
            <div class="button-bars"></div>
        </button><!-- END -->

    </header>

    <div class="sticky-head" style="overflow: hidden; display: block;"></div>
    <!-- End Navigation -->


<div>
		<?php echo $content; ?>
</div>

    <!-- Begin Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <!-- Contact List -->
                <ul class="contact-list col-md-8">
                    <li><a href="mailto:support@placechannels.com">support@placechannel.com</a></li>
                    <li><a href="http://placechannels.com/#">Лицензионные условия</a></li>
                    <li><a href="http://placechannels.com/index.php?r=main/login">Вход</a></li>
                </ul><!-- END -->

                <!-- Social List -->
                <ul class="social-list col-md-4">
                    <li class="copyright">2014 PlaceChannels, Inc. All Rights Reserved.</li>
                </ul><!-- END -->

            </div>
        </div>
    </footer>
    <!-- End Footer -->


<?php $this->endContent(); ?>