<style>
    .c-title_grid div,.c-content_grid div{
        float: left;
        padding: 5px;
    }

    body{
        font-family: Tahoma;
        font-size: 13px;
    }

    img{
        width: 20px;
    }

    .c-title_grid{
        font-size: 16px;
        text-decoration: underline;
        text-align: center;
    }

    .c-content_grid,.c-title_grid{
        width: 100%;
    }

    .c-content_grid{
        padding: 10px;
        border-bottom: 1px solid #eee;
    }
</style>


<meta charset="utf-8">
<div class="grid" style="margin: 30px 0;padding: 30px;">
    <div class="c-title_grid">
        Список YouTube каналов
    </div>
    <?php
    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$youtuber,
        'itemView'=>'analytics.views.channels.list',
        'ajaxUpdate'=>false,
        'emptyText'=>'В даній групі немає елементів',
        'summaryText'=>"",
    ));
    ?>
</div>