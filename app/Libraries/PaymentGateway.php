<?php

namespace App\Libraries;

use GuzzleHttp\Client;

class PaymentGateway
{
    protected $client;
    protected $api_url;
    protected $username;
    protected $password;

    public function __construct()
    {
        $this->api_url = 'https://secure.networkmerchants.com/api/transact.php';
        $this->username = 'piyushbarve06@gmail.com';
        $this->password = 'radhe@hello#1234';
        $this->client = new Client();
    }

    public function processPayment(array $paymentData): array
    {
        $data = array_merge($paymentData, [
            'username' => $this->username,
            'password' => $this->password,
        ]);

        try {
            $response = $this->client->post($this->api_url, [
                'form_params' => $data,
            ]);

            parse_str($response->getBody()->getContents(), $responseArray);
            return $responseArray;
        } catch (\Exception $e) {
            return [
                'response' => 0,
                'responsetext' => 'Error: ' . $e->getMessage(),
            ];
        }
    }
}
 