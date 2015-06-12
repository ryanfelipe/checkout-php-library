<?php
/**
 * Created by PhpStorm.
 * User: dhiraj.gangoosirdar
 * Date: 11/06/2015
 * Time: 13:23
 */

namespace test;


final class TestHelper
{

    public static function getCardTokenChargeModel()
    {
        $cardTokenChargePayload = new \com\checkout\ApiServices\Charges\RequestModels\CardTokenChargeCreate();
        $cardTokenChargePayload->setEmail(TestHelper::getRandName().'@checkout.com');
        $cardTokenChargePayload->setAutoCapture('N');
        $cardTokenChargePayload->setAutoCaptime('0');
        $cardTokenChargePayload->setValue('100');
        $cardTokenChargePayload->setCurrency('usd');
        $cardTokenChargePayload->setTrackId('TrackId-'.rand(0,1000));
        $cardTokenChargePayload->setShippingDetails(TestHelper::getMockUpAddress());
        $cardTokenChargePayload->setProducts(TestHelper::getMockUpProduct());
        $cardTokenChargePayload->setProducts(TestHelper::getMockUpProduct());
        $cardTokenChargePayload->setTransactionIndicator(1);
        return $cardTokenChargePayload;
    }

    public static function  getBaseChargeModel($cardChargePayload)
    {
        $cardChargePayload->setEmail(TestHelper::getRandName().'@checkout.com');
        $cardChargePayload->setAutoCapture('N');
        $cardChargePayload->setAutoCaptime('0');
        $cardChargePayload->setValue('100');
        $cardChargePayload->setCurrency('usd');
        $cardChargePayload->setTrackId('TrackId-'.rand(0,100));

        $cardChargePayload->setTransactionIndicator(1);
        $cardChargePayload->setProducts(TestHelper::getMockUpProduct());
        $cardChargePayload->setProducts(TestHelper::getMockUpProduct());
        $cardChargePayload->setShippingDetails(TestHelper::getMockUpAddress());
        return $cardChargePayload;
    }

    public static function  getMockUpAddress()
    {
        $billingDetails = new \com\checkout\ApiServices\SharedModels\Address();

        $billingDetails->setAddressLine1('1 Glading Fields"');
        $billingDetails->setAddressLine2('Second line"');
        $billingDetails->setPostcode('N16 2BR');
        $billingDetails->setCountry('GB');
        $billingDetails->setCity('London');
        $billingDetails->setState('Uk');
        $billingDetails->setPhone(TestHelper::getMockUpPhone());

        return $billingDetails;
    }

    public static function  getMockUpPhone()
    {
        $phone  = new \com\checkout\ApiServices\SharedModels\Phone();
        $phone->setNumber("203 583 44 55");
        $phone->setCountryCode("44");
        return $phone;
    }

    public static function  getMockUpProduct()
    {

        $product = new \com\checkout\ApiServices\SharedModels\Product();
        $product->setName('Product-'.TestHelper::getRandName());
        $product->setDescription('Description-'.TestHelper::getRandName());
        $product->setQuantity(rand(0,5));
        $product->setShippingCost(rand(0,10));
        $product->setSku('Sku-'.TestHelper::getRandName().'-'.rand(0,100));
        $product->setTrackingUrl('http://www.'.TestHelper::getRandName().'.com');

        return $product;
    }

    public static function  getMockUpBaseChargeModel()
    {
        $baseChargePayload = new \com\checkout\ApiServices\Charges\RequestModels\BaseCharge();
        $baseChargePayload->setEmail(TestHelper::getRandName().'@checkout.com');
        $baseChargePayload->setAutoCapture('N');
        $baseChargePayload->setAutoCaptime('0');
        $baseChargePayload->setValue('100');
        $baseChargePayload->setCurrency('usd');
        $baseChargePayload->setTrackId('TrackId-'.rand(0,1000));
        $baseChargePayload->setShippingDetails(TestHelper::getMockUpAddress());
        return $baseChargePayload;
    }

    public  static function getMockUpBaseCard()
    {
        $baseCardCreateObject = new \com\checkout\ApiServices\Cards\RequestModels\BaseCardCreate();
        $baseCardCreateObject->setNumber('4242424242424242');
        $baseCardCreateObject->setName('Test Name');
        $baseCardCreateObject->setExpiryMonth('06');
        $baseCardCreateObject->setExpiryYear('2018');
        $baseCardCreateObject->setCvv('100');
        $baseCardCreateObject->setBillingDetails(TestHelper::getMockUpAddress());
        return $baseCardCreateObject;

    }
    public static function getRandName()
    {
        $charset = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $base = strlen($charset);
        $result = '';

        $nowR = explode(' ', microtime());
        $now = $nowR[1];
        while ($now >= $base){
            $i = $now % $base;
            $result = $charset[$i] . $result;
            $now /= $base;
        }
        return substr($result, -5);
    }
} 