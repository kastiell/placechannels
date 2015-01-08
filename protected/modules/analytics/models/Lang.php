<?php

class Lang extends CActiveForm
{
    public $lang = array(
        'demographic'=>array(
            'age18-24'=>array('18-24','Возраст пользователей от 18 до 24 лет'),
            'age13-17'=>array('13-17','Возраст пользователей от 13 до 17 лет'),
            'age25-34'=>array('25-34','Возраст пользователей от 25 до 34 лет'),
            'age35-44'=>array('35-44','Возраст пользователей от 35 до 44 лет'),
            'age45-54'=>array('45-54','Возраст пользователей от 45 до 54 лет'),
            'age55-64'=>array('55-64','Возраст пользователей от 55 до 64 лет'),
            'age65-'=>array('65-->','Возраст пользователей от 65 и больше'),

            'male'=>array('Мужчина','Мужская аудитория'),
            'female'=>array('Женщина','Женская аудитория'),
        ),

        'deviceType'=>array(
            'DESKTOP'=>array('Персональный компютер','Видео смотрели с персонального компютера'),
            'MOBILE'=>array('Смартфон','Видео смотрели со смартфона'),
            'TABLET'=>array('Планшет','Видео смотрели с планшета'),
            'UNKNOWN_PLATFORM'=>array('Неизвестная платформа','Видео смотрели с неизвестно с чего'),
            'TV'=>array('Телевизор','Видео смотрели с телевизора'),
            'GAME_CONSOLE'=>array('Игровая консоль','Видео смотрели с игровой консоли'),
        ),

        'trafficSourceType'=>array(
            'RELATED_VIDEO'=>array('Связанные видео','Просмотр видео были переданы от связанной список видео на другой странице просмотра видео'),
            'YT_SEARCH'=>array('Поиск YOUTUBE','Просмотр видео были переданы из результатов поиска YouTube'),
            'YT_CHANNEL'=>array('Канал','Просмотр видео произошла на странице канала'),
            'PLAYLIST'=>array('Плейлист','Просмотр видео были переданы из списка воспроизведения'),
            'NO_LINK_OTHER'=>array('Реферер не определен','YouTube не определить реферер для движения. Эта категория включает в себя прямой трафик на видео, а также трафик на мобильные приложения.'),
            'SUBSCRIBER'=>array('Подписка','Просмотр видео были переданы от кормов на главной странице YouTube или от особенностей подписки YouTube'),
            'ANNOTATION'=>array('Аннотация','Зрителям достигли видео, нажав на аннотации в другом видео'),
            'YT_OTHER_PAGE'=>array('Не стандартные ссылки','Просмотр видео были переданы по ссылке, кроме результата поиска или родственной связи видео, которое было опубликовано на странице YouTube'),
            'PROMOTED'=>array('Неоплачиваемый трафик','Просмотр видео были переданы от неоплачиваемой продвижения YouTube, такие как на Ютюбе "Видео в центре внимания"'),
            'EXT_URL'=>array('Другие ссылки','Просмотр видео были переданы по ссылке на другой сайт'),
            'NO_LINK_EMBEDDED'=>array('Другой сайт','Видео было вложено на другом сайте, когда он был просмотрен'),
            'EXT_APP'=>array('Другие приложения','Видео было вложено в других приложениях'),
        ),

        'playbackLocationType'=>array(
            'WATCH'=>array('YouTube','Данные описывают виды, которые произошли на YouTube видео в страницу просмотра или в официальном приложении YouTube, такие как приложения YouTube для Android'),
            'MOBILE'=>array('MOBILE','Данные описывает взгляды, которые произошли на мобильном сайте YouTube, или на утвержденных клиентов API YouTube, в том числе мобильных устройств'),
            'EMBEDDED'=>array('Встроеное в сайт','Данные описывают виды, которые произошли на другом сайте или приложении, где видео было встроенного помощью IFRAME или объекта вставлять'),
            'CHANNEL'=>array('Канал','Данные описывает взгляды, которые произошли на странице канала'),
            'YT_OTHER'=>array('Не классыфицированы','Данные описывают виды, которые иначе не классифицированные'),
            'EXTERNAL_APP'=>array('Другие сайты','Данные описывает взгляды, которые произошли в стороннем приложении, где видео игралась с использованием другого метода IFRAME или объекта вставлять. Например, воспроизведений в приложениях, использующих API YouTube для Android игрока будет по категориям с помощью этого значения'),
        ),

        'basic'=>array(
            'country'=>array('Страна','В какой старане смотрели'),
            'video'=>array('Видео','Ид видео'),
            'day'=>array('Дата','В какой день смотрели'),
            'views'=>array('Просмотры','Что видео было рассматривать количество раз.'),
            'comments'=>array('Комменты','Количество раз, что пользователи прокомментировал видео.'),
            'favoritesAdded'=>array('Отмечено в любимые','Количество раз, что пользователи, отмеченных видео в качестве любимого видео'),
            'favoritesRemoved'=>array('Удалено из любимых','Количество раз, что пользователи удаленных видео из своих любимых списков видео'),
            'likes'=>array('Лайков','Количество раз, что пользователи отметили, что им понравилось видео, придав ему положительную оценку число'),
            'dislikes'=>array('Дислайков','Количество раз, что пользователи указали, что они не любили видео, давая ему отрицательную оценку номер'),
            'shares'=>array('Shares','Раз, что пользователи разделили видео через ряд Share кнопку'),
            'subscribersGained'=>array('Подписалось','Что пользователи подписались на канал число раз'),
            'subscribersLost'=>array('Отписалось','Что пользователи отписался из канала число раз'),
        )
    );

    public $exScope = array(
        'basic'=>array(
            'estimatedMinutesWatched',
            'averageViewDuration',
            'averageViewPercentage',
            'annotationClickThroughRate',
            'annotationCloseRate',
            'annotationImpressions',
            'annotationClickableImpressions',
            'annotationClosableImpressions',
            'annotationClicks',
            'annotationCloses',
            'annotationImpressions'
        )
    );

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function t($key,$category = null){
        if($category == null){
            foreach($this->lang as $k=>$v){
                if(array_key_exists($key,$v)){
                    $category = $k;
                    break;
                }
            }
        }

        if($category == null){
            return false;
        }

        if(array_key_exists($key,$this->lang[$category])){
            return array('value'=>$key,'title'=>$this->lang[$category][$key][0],'description'=>$this->lang[$category][$key][1]);
        }else{
            return false;
        }
    }

    public function tspan($key,$category = null){
        $t = $this->t($key,$category);
        if($t){
            return "<span class='multiple_key key_table'><span class='wrap_cir'><span class='cir'></span><span class='cir_desc'><span class='title_cir'>".$t['value']."</span><span class='text1_cir'>".$t['description']."</span></span></span><span class='text_cir'>".$t['title']."</span></span>";
        }else{
            return "<span class='single_key key_table'>".$key."</span>";
        }
    }

    public function isExistExScope($key,$scope = 'basic'){
        if(is_array($scope)){
            $sc = array();
            foreach($scope as $v){
                $sc = array_merge($sc,$this->exScope[$v]);
            }
        }else{
            $sc = $this->exScope[$scope];
        }
        if(in_array($key,$sc)){
            return true;
        }else{
            return false;
        }
    }
}
