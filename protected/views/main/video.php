<?php
 
Yii::import('application.vendors.*');
require_once 'Zend/Loader.php';
Zend_Loader::loadClass('Zend_Gdata_YouTube');
Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
Zend_Loader::loadClass('Zend_Gdata_Analytics');
 
     $authenticationURL = 'https://www.google.com/accounts/ClientLogin';
 
     $httpClient = Zend_Gdata_ClientLogin::getHttpClient(
                      $username          = 'ytusercii',
                      $password           = 'sdgfdhr24324dsfdfgwe',
                      $service           = 'youtube',
                      $client           = null,
                      $source           = 'YouTubeProject',
                      $loginToken           = null,
                      $loginCaptcha      = null,
                      $authenticationURL);
 
     $devkey = 'AI39si7D-mweinc2zRwfiYz6jHShS-LUKi2ZUc4lJMZDmRY8VANnQNEuO1J8p9xrZzxo9_FvOJRAa7jPXRRv1dZLIjX9FTs5fw';
 
          //$yt = new Zend_Gdata_YouTube($httpClient, '', '', $devkey);
          $a = new Zend_Gdata_Analytics($httpClient,'YouTubeProject');
		  
		  $a->newDataQuery()->setProfileId('UCiMIPuSbkf53CVdZGbPq2kg');
		  $a->newDataQuery()->addMetric('likes');
		  $a->newDataQuery()->setStartDate('2014-01-11');
		  $a->newDataQuery()->setEndDate('2015-01-11');
		  echo $a->newDataQuery()->getQueryUrl();
		  echo $a->getDataFeed();
		  
		  /*$video = new Zend_Gdata_YouTube_VideoEntry();
 
 
          $video->setVideoTitle('Your video title');
          $video->setVideoDescription('Description of the video');
          $video->setVideoPrivate();
          $video->setVideoCategory('People'); // see Youtube. Else you may get an error. Avoid using People & Blogs. People alone or Blogs alone is good.
          $video->SetVideoTags('apps');
          $handler_url     = 'http://gdata.youtube.com/action/GetUploadToken';
          $token_array     = $yt->getFormUploadToken($video, $handler_url);
          $token          = $token_array['token'];
          $post_url     = $token_array['url'];
          //$next_url      = 'http://yourdomain.com/yourappname/index.php/controller/action';

		  */
		  
		  //$videoFeed = $yt->getUserFavorites('ytusercii');
		  ?>
 
 <pre><?php //echo print_r($videoFeed); ?></pre>
 
<form action="<?php echo $post_url ?>?nexturl=<?php echo $next_url ?>"
method="post" enctype="multipart/form-data">
     <input name="file" type="file"/>
     <input name="token" type="hidden" value="<?php echo $token ?>"/>
     <input value="Upload Video File" type="submit" />
</form>