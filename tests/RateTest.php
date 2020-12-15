<?php

namespace Paperscissorsandglue\USPS\Tests;

use Paperscissorsandglue\USPS\Rate;
use Paperscissorsandglue\USPS\RatePackage;
use PHPUnit\Framework\TestCase;

class RateTest extends TestCase
{
    private $username = "";

    /** @test */
    public function can_get_estimate()
    {
        $to_address = (object) [
            'first_name' => 'Tina',
            'last_name' => 'Belcher',
            'street_1' => '4 Ocean Avenue',
            'street_2' => '',
            'municipality' => 'Wonder Wharf',
            'region' => 'NJ',
            'postal_code' => '08223',
        ];
        
        $this->assertTrue(true);
        $rate = new Rate($this->username ?: false);
        $this->assertInstanceOf(Rate::class, $rate);
        $weight = 10;
        // media mail
        $rate->addPackage(self::addDomesticPackage($to_address, $weight, RatePackage::SERVICE_MEDIA));
    
        // first class
        $rate->addPackage(self::addDomesticPackage($to_address, $weight, RatePackage::SERVICE_FIRST_CLASS));
    
        // priority
        $rate->addPackage(self::addDomesticPackage($to_address, $weight, RatePackage::SERVICE_PRIORITY));
        
        $rates = simplexml_load_string($rate->getRate());
    
        $estimates = [];
    
        if (! empty($rates->Package)) {
            foreach ($rates->Package as $estimate) {
                if (! empty($estimate->Postage)) {
                    $name = str_replace(' Service', '', $estimate->Postage->MailService);
                    $rate = $estimate->Postage->Rate;
                
                    $estimates[htmlentities(html_entity_decode($name)).'%'.htmlentities($rate)] = html_entity_decode($name).' $'.$rate;
                }
            }
        } else {
            //error
            throw new \Exception('Error getting estimate');
        }
        
        $this->assertIsArray($estimates);
        $this->assertTrue(count($estimates) > 0);
    }
    
    public static function addDomesticPackage($to_address, $weight, $service): RatePackage
    {
        $package = new RatePackage();
        
        $package->setService($service);
        
        if ($service == 'FIRST CLASS') {
            $package->setFirstClassMailType(RatePackage::MAIL_TYPE_PARCEL);
        }
        
        $package->setZipOrigination(94103);
        $package->setZipDestination($to_address->postal_code);
        $package->setPounds(0);
        $package->setOunces($weight);
        $package->setContainer('');
        $package->setSize(RatePackage::SIZE_REGULAR);
        $package->setField('Machinable', true);
        
        return $package;
    }
}
