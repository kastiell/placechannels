
    <div class="c-content_grid">
        <div><img src="<?=$data->image_url?>"></div>
        <div><?=$data->id?></div>
        <div><a href="<?=Yii::app()->createAbsoluteUrl('analytics/channels/show',array('id'=>$data->id))?>"><?=$data->channel?></a></div>
        <div><?=$data->familyName?></div>
        <div><?=$data->givenName?></div>
        <div><?=$data->language?></div>
        <div><?=$data->gender?></div>
    </div>


