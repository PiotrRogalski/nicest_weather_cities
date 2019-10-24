<?php


if(!function_exists('config'))
{
    /**
     * @param string $key
     * @param mixed $defaultValue
     * @return mixed
     */
    function config(string $key, $defaultValue = null)
    {
        return Config::getInstance()->get($key, $defaultValue);
    }
}


if(!function_exists('log_info'))
{
    /**
     * @param string $message
     * @param mixed  $data
     */
    function log_info($message, $data = [])
    {
        $jsonData = '';
        if($data !== [])
        {
            $jsonData ='[data: ' . json_encode($data) . ']';
        }

        print("[INFO]: $message $jsonData" );
    }
}
