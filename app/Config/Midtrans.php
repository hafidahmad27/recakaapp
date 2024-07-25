<?php

namespace App\Config;

use CodeIgniter\Config\BaseConfig;

class Midtrans extends BaseConfig
{
    public $serverKey = 'SB-Mid-server-2pcJEIwgv7gQ4R6lfmntxjci';
    public $clientKey = 'SB-Mid-client-z4t_5XTrEzCq9pxg';
    public $isProduction = false; // Set to true for production environment
    public $isSanitized = true;
    public $is3ds = true;

    public static function configure()
    {
        $config = new self();
        return [
            'serverKey' => $config->serverKey,
            'clientKey' => $config->clientKey,
            'isProduction' => $config->isProduction,
            'isSanitized' => $config->isSanitized,
            'is3ds' => $config->is3ds,
        ];
    }

    public static function getClientKey()
    {
        $config = new self();
        return $config->clientKey;
    }
}
