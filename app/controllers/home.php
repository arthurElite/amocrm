<?php

class Home extends Controller
{
    /**
     * @throws \AmoCRM\Exceptions\AmoCRMoAuthApiException
     */
    public function index()
    {
        $code = 'def5020024230d590d69ad9fdb2c46a5dd3e5c44b998e8ce4bc9c4237a04dcb03e80a17d34b07bfbc045373d0849cfdb86090d313ad7bd2fe1598d92cac39f543a6c429b3a7af8cf63e2414caee4724b06352a28db07e6f4064cce2d06d1684bb4e2bc62914ab95de711077d19f6072b01af17bde6a47a811573d9845716f07cd7f06e5bf22f68542dd3b59748e892bc00f6842651858eae173f7972160391ef35c3b88391bd1aaf18035a4afc77bfb55b77e245e425b485e1e28c743058b53cd44cb1e098d267c603e1a895a7b9a7bae001c8438420fb189c5660268b134548c8e6b88c6affe1eaa768df1ee4ede7d456b840fc0e0ebc5aefefa1464549da6aba8d19f83c0cea74ab0ac3aa8226fe6fd4b81e7448663555fe81aa8c2361540055d633fe6e66451211cbffcb8114ce97edbc60e061bc0fd61218973fa0bd81c15dd13c641bed6d4c6ce78f8d14240b7ab7d43ad172da530acf748959126bc2e4437d38a275a6b5d3fab28f150b7a230dc7033fb7bdcc80f85406cbadea3022aa7cdf5e245d8d1a2f7fc1adeb54aad2ee4de8efc70bdee4b12a4cfed0c8f38ecc8f13850c2b53468fe2ac54911a33d19b20e9892a577c354df104065f925e01a7d30393475b4c1f225f477d6599bb67988a8d2af6fd9de253eb6611ad9f14ef14e5f9d658301ad9e4e41afaf8defe3d';
        $amoClient = (new AmoCrmApi())->getOauthClient();
        $amoClient->setBaseDomain("arthurelitedevsquadcom.kommo.com");

//       $token = $amoClient->getAccessTokenByCode($code);
        dd($amoClient->getAccessTokenByCode($code));

        $authBtn = $amoClient->getOAuthButton();
        $this->view('home/index', ['authbtn' => $authBtn]);
    }
}