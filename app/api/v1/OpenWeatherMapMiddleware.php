<?php

require_once('OpenWeatherMapApi.php');
require_once('app\helpers\Http.php');


class OpenWeatherMapMiddleware
{
    /**
     * @param array $cityIds
     *
     * @return object
     */
    public function fetchByIds(array $cityIds)
    {
        $weatherApi = new OpenWeatherMapApi;
        $weatherCityList = json_decode($weatherApi->fetchByIds($cityIds));

        $data = [];
        if (! $this->isApiResponseValid($weatherCityList))
        {
            $message = 'bad response data type';
            $status = Http::INTERNAL_SERVER_ERROR;
        }
        else if ($this->isApiResponseError($weatherCityList))
        {
            $message = $weatherApi->errors();
            $status = Http::BAD_REQUEST;
        }
        else
        {
            $message = 'ok';
            $status = Http::OK;

            $cityToWeather = [];
            $cities = $this->getCityList($weatherCityList);
            foreach($cities as $city)
            {
                $cityToWeather[] = $this->mapCityToWeather($city);
            }

            $data = [
                'fetch_datatime' => $this->getTime(),
                'city_to_weather' => $cityToWeather
            ];
        }

        return (object)[
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];
    }


    /**
     * @param object $city
     *
     * @return object
     */
    private function mapCityToWeather(&$city)
    {
        $id = null;
        if(isset($city->id))
        {
            $id = $city->id;
        }

        $name = null;
        if(isset($city->name))
        {
            $name = $city->name;
        }

        $temp = null;
        if(isset($city->main->temp))
        {
            $temp = $city->main->temp;
        }

        $humidity = null;
        if(isset($city->main->humidity))
        {
            $humidity = $city->main->humidity;
        }

        $windSpeed = null;
        if(isset($city->wind->speed))
        {
            $windSpeed = $city->wind->speed;
        }

        return (object) [
            'id' => $id,
            'name' => $name,
            'temperature' => $temp,
            'wind_speed' => $windSpeed,
            'humidity' => $humidity
        ];
    }


    /**
     * @return null|string
     */
    private function getTime()
    {
        date_default_timezone_set(config('TIMEZONE', 'Europe/Warsaw'));

        $datatime = date('Y-m-d H:i:s', time());
        if(!$datatime)
        {
            return null;
        }
        return $datatime;
    }


    /**
     * @param $response
     *
     * @return array
     */
    private function getCityList(&$weatherCityList)
    {
        return $weatherCityList->list ?? [];
    }


    /**
     * @param mixed $response
     *
     * @return bool
     */
    private function isApiResponseValid($response)
    {
        if(!is_object($response) || empty((array) $response))
        {
            return false;
        }
        return true;
    }


    /**
     * @param object $response
     *
     * @return bool
     */
    private function isApiResponseError($response)
    {
        if(isset($response->cod) || !isset($response->list))
        {
            return true;
        }
        return false;
    }


}

