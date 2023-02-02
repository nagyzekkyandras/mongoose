<?php

class Trigger
{
    public $curl;

    function __construct()
    {
        $this->curl = new Curl\Curl();
    }

    public function nexusTrigger(string $url, string $username, string $password)
    {
        $this->curl->setBasicAuthentication($username, $password);
        $this->curl->setUserAgent('');
        $this->curl->setHeader('X-Requested-With', 'XMLHttpRequest');
        $this->curl->setCookie('key', 'value');
        $this->curl->get($url);
        if ($this->curl->error) {
            # If the server is not reachable the error code is 6
            $value = $this->curl->error_code;
        } else {
            $value = $this->curl->response;
        }
        return $value;
    }
}
