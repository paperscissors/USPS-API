<?php

namespace Paperscissorsandglue\USPS;


use Paperscissorsandglue\USPS\Operations\Rate;
use Paperscissorsandglue\USPS\Operations\RatePackage;

/**
 * Class USPSApi
 * @package Paperscissorsandglue\USPS
 *
 * Simple api key dependency injector
 */
class USPSApi {
    private string $api_key;

    public function __construct (string $api_key) {
        $this->api_key = $api_key;
    }

    public function rate(): Rate {
        return new Rate($this->api_key);
    }

    public function package(): RatePackage {
        return new RatePackage();
    }
}
