<br>
<br>
<br>
<br>
<style>
    table tr:first-child td{
        border-bottom: 1px solid #000;
        font-weight: bold;
        background-color: #C5C5C5;
    }

    td{
        padding: 5px;
        background-color: #D7D7D7;
    }

    .opened td{
        background-color: #F4F4F4;
    }

</style>
<table  style="width: 800px;text-align: center;margin:auto;">
    <tr>
        <td style="width: 80px">id</td>
        <td style="width: 80px">id_brand</td>
        <td style="width: 300px">email</td>
        <td style="width: 180px">count opened</td>
        <td style="width: 180px">time last opened</td>
    </tr>
    <?php

        foreach($model as $k=>$v){
    ?>
            <tr class="<?=((int)$v->open > 0)? 'opened' : ''?>">
                <td><?=$v->id?></td>
                <td><?=$v->id_user_brand?></td>
                <td><?=$v->email?></td>
                <td><?=$v->open?></td>
                <td><?=date("Y.m.d H:i:s",$v->ts_open)?></td>
            </tr>

    <?php
        }
    ?>
</table>

<br>
<br>
<br>

<pre>
    <p>Сюда добавить скрітое изображение
    <p>Добрый день, В дополнение к нашему телефонному разговору высылаю презентацию наших услуг в прикрепленном файле.</p>
    <p>_______________________________<br /> С Уважением,<br /> Фурманенко Игорь Русланович<br /> тел. +7 (499) 579-89-27<br /> web: <a href="http://placechannels.com/index.php?r=main/RuBrands"> http://placechannels.com/</a><br /> _______________________________</p>
</pre>