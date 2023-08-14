<?php

class settoken extends Controller
{
    public function index()
    {
        $data = file_get_contents('php://input');
        file_put_contents(__DIR__.'data.txt', $data);

//        if (strlen($data) > 0)
//        {
//            $json = json_decode($data);
//            /**
//             * Здесь получаем следующие данные:
//             * $json->state         - Идентификатор, который Вы указывали в кнопке
//             * $json->client_id     - Ваш ClientID (его нужно сохранить)
//             * $json->client_secret - Ваш Client Secret (его нужно сохранить)
//             */
//            file_put_contents(__DIR__.'data.txt', $data);
//        }

        dd($_SERVER);
    }
}