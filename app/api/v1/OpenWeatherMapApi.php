<?php

class OpenWeatherMapApi
{
    private $authKey = 'fccf260402e5c42c680ad1df4b0c8d7f';
    private $errors = [];


    /**
     * @return string
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }


    /**
     * @param string $authKey
     */
    public function setAuthKey(string $authKey)
    {
        $this->authKey = $authKey;
    }


    /**
     * @param array $cityIds
     *
     * @return string | null
     */
    public function fetchByIds(array $cityIds)
    {
        $request = curl_init($this->createRequestUrl($cityIds));

        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($request, CURLOPT_HEADER, 0);
        $json = curl_exec($request);
        curl_close($request);

        return $json;
    }

    /**
     * @return array
     */
    public function errors()
    {
        return $this->errors;
    }


    /**
     * @param array  $cityIds
     * @param string|null $authKey
     *
     * @return string
     */
    private function createRequestUrl(array $cityIds, $authKey = null): string
    {
        $appid = $authKey ?? $this->getAuthKey();
        $ids = implode(',', $cityIds);
        $requestPath = config('WHEATHER_API_REQUEST_PATH');

        if(!$this->isAuthKeyValid($appid))
        {
            $this->errors[] = 'ERROR: Auth key (appid) is invalid';
        }

        return "$requestPath?id=$ids&appid=$appid";
    }


    /**
     * @param mixed $authKey
     *
     * @return bool
     */
    private function isAuthKeyValid($authKey)
    {
        if(!is_string($authKey) || $authKey === '')
        {
            return false;
        }
        return true;
    }
}