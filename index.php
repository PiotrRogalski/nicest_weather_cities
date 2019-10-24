<?php
require_once('bootstrap.php');

$apiKeys = [
	'Default' => 'fccf260402e5c42c680ad1df4b0c8d7f',
	'Free' => '2033233b99c02366becc2e1ec74e5fcc',
    'OWM-key' => 'b6907d289e10d714a6e88b30761fae22'
];

$exampleCityIds = [
    524901,703448,2643743,
    7531926//Warszawa
];

$searchResults = [
    "miasto" => 12344,
    "miasto2" => 12345,
    "miasto3" => 12346,
    "miasto4" => 12344,
    "miasto24" => 12345,
    "miasto35" => 12346,
    "miasto5" => 12344,
    "miasto62" => 12345,
    "miasto73" => 12346,
];
include('app/views/LandPage.php');
//https://openweathermap.org/data/2.5/weather/q=warsaw?appid=b6907d289e10d714a6e88b30761fae22&id=756135&units=metric
//this work but its not my appid
//mozna go uzywac do pobierania pogody z polskich miast po ich nazwie
//
//$message = 'wez mi to dodaj';
//$content = file_put_contents ('data.json' ,json_encode($message), FILE_APPEND);
//print(json_encode((new OpenWeatherMapMiddleware)->fetchByIds([7531926,1283378])));
//
//$cityToWeather =
//    [
//        (object)["id" => 1273374,"name" => "Gorkh3","temperature" => 301,"wind_speed" => 0.61,"humidity" => 92],
//        (object)["id" => 1283378,"name" => "Gorkh","temperature" => 289.631,"wind_speed" => 0.61,"humidity" => 92],
//        (object)["id" => 7531926,"name" => "Warszawa","temperature" => 285.07,"wind_speed" => 1,"humidity" => 100],
//        (object)["id" => 1213375,"name" => "Gorkh2","temperature" => 251.631,"wind_speed" => 0.61,"humidity" => 92],
//    ];
//$cityId = 1213375;
//
//$scores = (new WeatherScore)->getScoresFor($cityId, $cityToWeather);
//log_info($scores);



//print(json_encode((new OpenWeatherMapMiddleware)->fetchByNames(['Warszawa',''])));


// print(json_encode((new CityStorage)->find('Pozn', 100)));
//READ FROM FILE
//$read = (array)json_decode(file_get_contents('storage\files\result.json'));
//print(var_dump($read));




// TODO przerobic, wyrzucic do klas, kontrola bledow, lepsze zabezpieczenia, bardziej generycznie
// I had too small amount of time to end this REST section
