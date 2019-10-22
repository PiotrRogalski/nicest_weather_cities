<?php

//todo - wyrzucic do klasy
$apiKeys = [
	'fccf260402e5c42c680ad1df4b0c8d7f',
	'2033233b99c02366becc2e1ec74e5fcc',
];
const WHEATHER_API_SERVER_NAME = 'api.openweathermap.org';

$message = 'wez mi to dodaj';
$content = file_put_contents ('data.json' ,json_encode($message), FILE_APPEND);
print($content);


// $ch = curl_init("http://api.openweathermap.org/data/2.5/weather?id=2172797&appid=2033233b99c02366becc2e1ec74e5fcc"); // such as http://example.com/example.xml
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_HEADER, 0);
// $data = curl_exec($ch);
// curl_close($ch);
// print($data);
