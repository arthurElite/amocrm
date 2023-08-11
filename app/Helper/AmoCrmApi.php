<?php

use AmoCRM\Client\AmoCRMApiClient;
class AmoCrmApi
{
    public object $amoClient;

    public function __construct()
    {
         try {
             $this->amoClient = new AmoCRM\Client\AmoCRMApiClient('31552427', 'dZD5Wd0cdS2UJlDKRfmafjZGscOBwd0DRj78hZJBYKxJL8WhFUduYznmuyed0hBQ', 'https://arthurmelikyan.github.io/');
         } catch (Exception $e) {
             dd($e->getMessage());
         }
    }

    public function getClient(): object
    {
        return $this->amoClient;
    }

    public function getOauthClient()
    {
        return $this->amoClient->getOAuthClient();
    }
}

// secret
//W8HxHlQ6u4cBszJDjG3OuIWOOAfKIa7dudzoVoYINWN6xJsGyowI2gdtzUg06yBv

// integration id
//29d9b2d1-ed31-4555-8efd-7b4245f10d8d

// auth code
//def502000d321da88bd6cdf915649fcfb244aeeda65263d532e8bc245edf8f34f7b2bdc22080484ca8ea22028d2e459d093668291bbefc679253313a4931d04ef0d352f7b85da12a2a43d633326fb466e6bd489dfa9338c1311cccebff7327d7ed7c1d93a3cfc360a76ebb39e582cfd903e6f1f4b75551faf52ae10810ace8e5142023058cae3410f60fd333fc08391ee8afc165ae2e1c65614c79fc5b0c91198621dbcd7f0e46e425c020ede11b0794cbbed640137a8b4613b562c843d460ed16cf212af36e685add607c9aceaade88c8051670e01710642b5259af846488fee7af024d6f5cdef2ef85e7d30e24cde1c2688e0b7c6ff55a5ef578926a42b5426c799de41a5888eb237d20892c897f50bfe4b8fb5617e795c4424a64568e876e5d89566916f661ec7ae1399a36bb873bf2038101590c7af7447c82a831d533e10b41dd5ec0721821c973641d74bede0ea23e5dfa8f75a0646d00b54b1145d1f3b6eddcdf621fb16837d51126a27eb9d0b433f1ba59b47260e819fb7a2e7861f11c9d6c29c2b1337b94509f108e8695585eec9ecf311783258910baf4bf13d3909cec73274bb8c7ec200c7ad2efe72b706bf8b2fb246b276c8a7f9b754f900bf8a553b60089aac73d8bdf4d56935c028e96c7decceba14011b95bba7c769c25e7af6ddd8f90