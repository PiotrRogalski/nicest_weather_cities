<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

print('ok');
//
//$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//if ($_SERVER["REQUEST_METHOD"] === 'POST') {
//
//    if (!isset($_POST['path'])) {
//        print('"path" variable needed');
//        exit();
//    }
//
//    if (!isset($_POST['data']) && !isJson($_POST['data'])) {
//        print('"data" variable required and need to be json');
//        exit();
//    }
//
//    switch ($_POST['path']) {
//        case 'weather/cities/':
//            break;
//        case 'search/city/':
//            break;
//        case 'auth-key/set/':
//            break;
//        default:
//            header("HTTP/1.1 404 Not Found");
//            exit();
//    }
//}
//todo jesli get to zwroc widok


function isJson($string)
{
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
}