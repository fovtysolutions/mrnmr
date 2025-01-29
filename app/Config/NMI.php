<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class NMI extends BaseConfig
{
    public $api_url = 'https://secure.networkmerchants.com/api/transact.php';
    public $username = 'YOUR_API_USERNAME';
    public $password = 'YOUR_API_PASSWORD';
}