<?php

return array(
	'title'=>'My Yii Blog',
	'adminEmail'=>'webmaster@example.com',
	'postsPerPage'=>10,
	'recentCommentCount'=>10,
	'tagCloudCount'=>20,
	'commentNeedApproval'=>true,
	'copyrightInfo'=>'Copyright &copy; 2009 by My Company.',
    'useCache'=>true, //При использовании кеша всегда проверять эту переменную на нужность или не нужность его включения

    //Данные берем здесь https://console.developers.google.com/project/place-channels-001/apiui/credential?authuser=1
    'YouTubeAPI_client_id'=>'175295166942-vhd80g8279s56ff3h9984ppkb212h3aq.apps.googleusercontent.com',
    'YouTubeAPI_client_secret'=>'FEGrMU1JNvEsoZMagfdFM9Ft',
    'YouTubeAPI_redirect_uri'=>'http://placechannels.com/index.php?r=oauth/callback',
    'YouTubeAPI_app_name'=>'PlaceChannels',
    'YouTubeAPI_developer_key'=>'AI39si5rabu7TQcRn1A350AFgpvhoGEZlcSiL9dM3MBgxm4b5Kb0xQbhovxaOg7GlV21cuCGm_c5VJ_Y6lr69D3mv8TyPSUxmQ',
    'YouTubeAPI_scope'=>array(
                            'https://www.googleapis.com/auth/yt-analytics.readonly',
                            'https://www.googleapis.com/auth/youtube.readonly',
                            'https://www.googleapis.com/auth/userinfo.email',
                            'https://www.googleapis.com/auth/userinfo.profile'
    )

);
