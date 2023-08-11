<?php

class oauth2 extends Controller
{
    /**
     * @throws \AmoCRM\Exceptions\AmoCRMoAuthApiException
     */
    public function index()
    {
        $code = 'def50200ee6e113aeec19bf7fa34b1f8b5389327b8537974d1cf1b4dff61f9476e08545dd6c2b57bbedcf25f353fd87df93258e1244f4a0cc9bfc405a8c942bbb97d4c5348366341144cb6f549d01f0b3f095b98aa1fc2c33212e7d51fc78efc2a9f9f3e4d1fa4e30b6d7a42d8feefebee39b0f5a8bde6659ea377107b673f2cadac69d67b06bdbcac54123e17b88f513188c783d3e3b0ef5f67f004655de174d7dba5808c7a41ad398c467ab3248636e84ed8f90f1eb75d2b0ed5a37559921e8bd4120bfefbc770fdf230bdb70a9c7cfed9fedc400854aede4cd1a434a9be98f297cf4debaf921a06fba19fd40ac15430b41f7750b4f674e484e852277aec11cfd1a9f58e83561597e4cf051986f788e821f8b8ceb2d13ae4697f2164c2ce1ce672889158a4bf1ff92e54b6088f2d4959e1a017036e995c098283ec77542563a92d6e6f0284b5450f8a9872cecbb1b48b7120c1163aea9e8328f8dea5638354f3be47ab1b7afab29906358e643020ecff7c4b258f1a01328fad111a971f43fdf3f4b5e522419a4dd3ed5654457a7a1aeaeeefbf22bd4b42a3fb8f5e2e4bdab2bfaab0bda6745cdd692ed8004bab30eb9c4d392ff7fd5651ce026668cb8e826b8db103ba545c2fbf01044fc948f23a0815b84081f8952d4589ef25f1267764e91876982b804f50bcc55a0432d9423954ca17';
        $amoClient = (new AmoCrmApi())->getOauthClient();
        $amoClient->setBaseDomain("arthurelitedevsquadcom.kommo.com");
        dd($amoClient->getAccessTokenByCode($code));

        $this->view('home/index');
    }
}