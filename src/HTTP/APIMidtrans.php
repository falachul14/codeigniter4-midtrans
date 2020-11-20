<?php

namespace Codenom\Midtrans\HTTP;

class APIMidtrans
{
    /**
     * 
     * @var $typeCURL = \Codenom\Midtrans\Constant::CURL_TYPE_GET (default GET)
     * @var \Codenom\Midtrans\Parse\JSONParse::encode($options)
     * @var string $endPoint URL
     * @param array $options = [] //for sent data to API Midtrans
     * @param string $serverKey \Codenom\Midtrans\Config\Midtrans
     * 
     * @return Object response body
     */
    public static function call($typeCURL = \Codenom\Midtrans\Constant::CURL_TYPE_GET, string $endPoint = '', string $serverKey = '', array $options = [])
    {
        $services = \CodeIgniter\Config\Services::curlrequest();
        return $services->setBody(
            \Codenom\Midtrans\Parse\JSONParse::encode($options)
        )
            ->request(
                $typeCURL,
                $endPoint,
                ['headers' => [
                    'Content-type' => \Codenom\Midtrans\Constant::CONTENT_TYPE,
                    'Accept'     => \Codenom\Midtrans\Constant::ACCEPT,
                    'Authorization' => 'Basic ' . base64_encode($serverKey . ':')
                ]]
            )->getBody();
    }
}
