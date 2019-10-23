<?php

class CityStorage
{
    private $cityNameToId = [];

    public function __construct()
    {
        if(empty($this->cityNameToId))
        {
            $this->fetchCityNameToId();
        }
    }

    /**
     * @param string $cityName
     *
     * @return bool
     */
    public function has($cityName)
    {
        if(isset($this->cityNameToId[$cityName]))
        {
            return true;
        }
        return false;
    }

    /**
     * @param string $cityName
     *
     * @return integer
     */
    public function getId($cityName)
    {
        return (int)$this->cityNameToId[$cityName];
    }


    /**
     * @param string $cityName
     * @param int $limit
     *
     * @return array
     */
    public function find($cityName, $limit = 100)
    {
        $found = [];
        $regex = "/$cityName/";
        $count = 0;

        foreach($this->cityNameToId as $city => $id)
        {
            if($count > $limit)
            {
                break;
            }

            if(preg_match($regex, $city))
            {
                $found[$city] = $id;
                ++$count;
            }
        }

        return $found;
    }


    private function fetchCityNameToId()
    {
        $this->cityNameToId = (array)json_decode(file_get_contents(config('CITY_NAME_TO_ID_FILE_PATH')));
    }
}