<?php

class Config
{
    private static $instance;

    private function __construct() {}
    private function __clone() {}

    public static function getInstance()
    {
        if (self::$instance === null)
        {
            self::$instance = new Config();
        }
        return self::$instance;
    }

    /**
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed|null
     */
    public function get(string $key, $default = null)
    {
        $constantName = ConfigurationData::class . "::$key";
        if (defined($constantName))
        {
            return constant($constantName);
        }
        return $default;
    }
}
