<?php

class Home extends Controller
{
    /**
     * @throws \AmoCRM\Exceptions\AmoCRMoAuthApiException
     */
    public function index()
    {
        $code = 'def50200f73d5794063c732d2352b5265def3e534796993a761d9dd67e3c28118e373d44eb71d82bd97aaab7028135182351329fb8477b607ccf96f5542cac77996711fd8a31aad3accb5f20631da657933c7d7df7dd7282f6eebd06aaf2512f55e929237850579e4b4a85e6593ba29121a5caca85697bae1ea225814f9eeb37b8ca372c80281c10ee1c754c032410fe58fb9712f50b3ce74af53e5f9691a21bc5f7d97003a4532c6ae1c92fc434c122e118dae4883f360a08c7a7b6131c18d987329d3c100b8b9d1656c312d4ab283ac8a6c02a4efdbba590a3fe7d34da32272cdb72781b99aa831e3e7429225cd08ea351997db7e8bdd3d39a4ffb0f476b50cc416bd1b354606a069fd97b100b3e9a41c05e7848aa37458cc640033be507290beebf28587e890f805e61e65510520f3ed8e464ab735b0798855f71883ac1d59eda99a383003fbf451d4aae2302f2f106b0b682af183edc9903d14a16a4c123dd3be94ddd3c472c9c2af2a4e0c9112f268b2037866326b2ef02efaac0ee40e0e5c540c475b100e0c6154af7bafbd353df4aaf6ca9b47fc63d74b144508dcd7dbf21eda1e88413a32468aa74b8f53d73da0ee4d1d7c75b14017fb7add69e21aab51a8645f780ee109f254febd37b4c5665e5ab274c5e5c09813a746ce359b777b0260ccffb9a0367673d6faa4f956d1fc40e';
        $amoClient = (new AmoCrmApi())->getOauthClient();
//        $token = $amoClient->getAccessTokenByCode($code);
        $authBtn = $amoClient->getOAuthButton();

        $this->view('home/index', ['authbtn' => $authBtn]);
    }
}