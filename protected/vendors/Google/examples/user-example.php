<?php

include_once "templates/base.php";
session_start();

set_include_path("../src/" . PATH_SEPARATOR . get_include_path());
require_once 'Google/Client.php';
require_once 'Google/Service/Urlshortener.php';
require_once 'Google/Service/Analytics.php';
require_once 'core.php';


$client_id = '679993831031-3g9al0gh11a21m3dv4e6aotp9qlcf3ts.apps.googleusercontent.com';
$client_secret = '7qp4H_AJaRic524sC0UBi8YL';
$redirect_uri = 'http://bb.com/Google/examples/user-example.php';

$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope('https://www.googleapis.com/auth/yt-analytics.readonly','https://www.googleapis.com/auth/youtube.readonly');

if (isset($_REQUEST['logout'])) {
  unset($_SESSION['access_token']);
}

if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $authUrl = $client->createAuthUrl();
}

if ($client->getAccessToken() && isset($_GET['url'])) {
  $url = new Google_Service_Urlshortener_Url();
  $url->longUrl = $_GET['url'];
  $short = $service->url->insert($url);
  $_SESSION['access_token'] = $client->getAccessToken();
}

echo pageHeader("User Query - URL Shortener");
if (
    $client_id == '<YOUR_CLIENT_ID>'
    || $client_secret == '<YOUR_CLIENT_SECRET>'
    || $redirect_uri == '<YOUR_REDIRECT_URI>') {
  echo missingClientSecretsWarning();
}

echo $client->getAccessToken();


/* ------------------------------------------------------------------ */

$ch = curl_init('https://www.googleapis.com/youtube/analytics/v1/reports');

//

# /forum/loginout.php HTTP/1.1

//curl_setopt($ch, CURLOPT_GET, 1);
# POST /forum/..


curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36"); 
# User-Agent


$headers = array
(
    'Accept: */*',
    'Accept-Language: uk,ru;q=0.8,en-US;q=0.6,en;q=0.4',
    'Accept-Encoding: gzip,deflate',
    'Accept-Charset: windows-1251,utf-8;q=0.7,*;q=0.7',
    'authorization: Bearer ya29.jwA8sDr4MAc_At_e-bRJynHyE2eq6vL7N-YVDd7bKVYRDGA3cTiO2VoX',
); 

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
# добавляем заголовков к нашему запросу. Чтоб смахивало на настоящих

curl_setopt($ch, CURLOPT_REFERER, "http://bb.com/");
# Подделываем значение - откуда пришли данные.

curl_setopt($ch, CURLOPT_POSTFIELDS, 'ids=channel%3D%3DUCiMIPuSbkf53CVdZGbPq2kg&start-date=2000-01-01&end-date=2020-01-01&metrics=views&dimensions=video&max-results=10&sort=-views');
# post данные.
# умная libcurl сама добавит заголовки
# Content-Type: application/x-www-form-urlencoded и Content-Length: 71

//curl_setopt($ch, CURLOPT_COOKIEJAR, "my_cookies.txt");  
//curl_setopt($ch, CURLOPT_COOKIEFILE, "my_cookies.txt");  
# Функции для обработки установливаемых форумом кук.
# подробнее рассмотрим далее.

//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
# Убираем вывод данных в браузер. Пусть функция их возвращает а не выводит

$result = curl_exec($ch); // выполняем запрос curl
curl_close($ch);

echo $result;



?>
<div class="box">
  <div class="request">
    <?php if (isset($authUrl)): ?>
      <a class='login' href='<?php echo $authUrl; ?>'>Connect Me!</a>
    <?php else: ?>
      <form id="url" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input name="url" class="url" type="text">
        <input type="submit" value="Shorten">
      </form>
      <a class='logout' href='?logout'>Logout</a>
    <?php endif ?>
  </div>

  <?php if (isset($short)): ?>
    <div class="shortened">
      <?php var_dump($short); ?>
    </div>
  <?php endif ?>
</div>
<?php
echo pageFooter(__FILE__);
