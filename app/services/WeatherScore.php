<?php

class WeatherScore
{
    const TEMP_WEIGHT = 0.6;
    const WIND_WEIGHT = 0.3;
    const HUMIDITY_WEIGHT = 0.1;

    /**
     * @param int $cityId
     * @param array $cityToWeather
     *
     * @return float|int
     */
    public function getScoresFor($cityId, $cityToWeather)
    {
        $this->sortBy('temperature', $cityToWeather);
        $tempPosition = $this->getPositionById($cityId, $cityToWeather);
        $tempScores = $this->getScoresForPosition($tempPosition, self::TEMP_WEIGHT);

        $this->sortBy('wind_speed', $cityToWeather);
        $windPosition = $this->getPositionById($cityId, $cityToWeather);
        $windScores = $this->getScoresForPosition($windPosition, self::WIND_WEIGHT);

        $this->sortBy('humidity', $cityToWeather);
        $humidPosition = $this->getPositionById($cityId, $cityToWeather);
        $humidScores = $this->getScoresForPosition($humidPosition, self::HUMIDITY_WEIGHT);

        return $tempScores + $windScores + $humidScores;
    }

    /**
     * @param string $parameter
     * @param array  $cityToWeather
     */
    private function sortBy($parameter, &$cityToWeather)
    {
        usort($cityToWeather, function($a, $b) use ($parameter){
            return $b->$parameter - $a->$parameter;
        });
    }

    /**
     * @param int $id
     * @param $cityToWeather
     *
     * @return int
     */
    private function getPositionById($id, &$cityToWeather)
    {
        $place = count($cityToWeather);
        foreach($cityToWeather as $key => $city)
        {
            if((int)$city->id === $id)
            {
                $place = (int)$key + 1;
            }
        }

        return $place;
    }

    /**
     * @param int $position
     * @param float|int $weight
     *
     * @return float|int
     */
    private function getScoresForPosition($position, $weight = 1)
    {
        return (100 - 10 * ( $position - 1)) * $weight;
    }
}