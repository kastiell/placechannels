<?php

/*
$ch = curl_init();

//

# /forum/loginout.php HTTP/1.1

//curl_setopt($ch, CURLOPT_GET, 1);
# POST /forum/..


curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.124 Safari/537.36"); 
# User-Agent


$headers = array
(
    'Accept: * /*',
    'Accept-Language: uk,ru;q=0.8,en-US;q=0.6,en;q=0.4',
    'Accept-Encoding: gzip,deflate',
    'Accept-Charset: windows-1251,utf-8;q=0.7,*;q=0.7',
    'Authorization: Bearer ya29.jwA8sDr4MAc_At_e-bRJynHyE2eq6vL7N-YVDd7bKVYRDGA3cTiO2VoX',
); 

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
# добавляем заголовков к нашему запросу. Чтоб смахивало на настоящих

curl_setopt($ch, CURLOPT_REFERER, "http://bb.com/");
# Подделываем значение - откуда пришли данные.

//curl_setopt($ch, CURLOPT_GETFIELDS, 'ids=channel%3D%3DUCiMIPuSbkf53CVdZGbPq2kg&start-date=2000-01-01&end-date=2020-01-01&metrics=views&dimensions=video&max-results=10&sort=-views');
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
*/
/*
if( $curl = curl_init() ) {
    curl_setopt($curl, CURLOPT_URL, 'http://myrusakov.ru/');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
	curl_setopt($curl, CURLOPT_NOBODY, 1);
	curl_setopt($curl, CURLOPT_HEADER, 1);
    $out = curl_exec($curl);
    echo $out;
    curl_close($curl);
  }


$ch = curl_init();

$url = "http://myblaze.ru";
curl_setopt($ch, CURLOPT_URL,$url);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	'Accept: * /*',
	'Accept-Language: ua,ru;q=0.8,en-US;q=0.6,en;q=0.4',
	'Accept-Encoding: gzip, deflate',
	'Accept-Charset: windows-1251,utf-8;q=0.7,*;q=0.7',
	'Authorization: Bearer ya29.jwA8sDr4MAc_At_e-bRJynHyE2eq6vL7N-YVDd7bKVYRDGA3cTiO2VoX',
));

//curl_setopt($ch, CURLOPT_HEADER, 1); // читать заголовок
//curl_setopt($ch, CURLOPT_NOBODY, 1); // читать ТОЛЬКО заголовок без тела



$result = curl_exec($ch);
curl_close($ch);
//echo $result;*/




$headers = array
(
    'Accept: */*',
    'Accept-Language: uk,ru;q=0.8,en-US;q=0.6,en;q=0.4',
    'Accept-Encoding: gzip,deflate',
    'Accept-Charset: windows-1251,utf-8;q=0.7,*;q=0.7',
    'Authorization: Bearer ya29.jwBqMpKRFAPyVUgpdOaLINEnfeV2t28sVZ5S0xfr5aipktMijxTlziX0',
);

	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, 'https://www.googleapis.com/youtube/analytics/v1/reports?ids=channel%3D%3DUC--i9Fptp2kkvDpDmFtltVg&start-date=2000-01-01&end-date=2020-01-01&metrics=views&dimensions=video&max-results=10&sort=-views'); //feed is obtained from spreadsheet url and id can be obtained by retrieving list feed
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
	//curl_setopt($curl, CURLOPT_POSTFIELDS, $xml);
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	//curl_setopt($curl, CURLOPT_NOBODY, 1);
	curl_setopt($curl, CURLOPT_VERBOSE, true);
	$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	$response = curl_exec($curl);
	echo $response;

		
		
		
		
/* 
	Получаем token парсим его находим ключь
	
	вставляем в хедер высше, не забываем про scope для доступа
	
	и формируем адрес(link) для запроса нужных параметров(данных)

 */ 
		

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
