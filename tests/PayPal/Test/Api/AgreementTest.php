<?php

namespace PayPal\Test\Api;

use PayPal\Common\PayPalResourceModel;
use PayPal\Validation\ArgumentValidator;
use PayPal\Api\AgreementTransactions;
use PayPal\Rest\ApiContext;
use PayPal\Transport\PayPalRestCall;
use PayPal\Api\Agreement;

/**
 * Class Agreement
 *
 * @package PayPal\Test\Api
 */
class AgreementTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Gets Json String of Object Agreement
     * @return string
     */
    public static function getJson()
    {
        return '{"id":"TestSample","state":"TestSample","name":"TestSample","description":"TestSample","start_date":"TestSample","payer":' .PayerTest::getJson() . ',"shipping_address":' .AddressTest::getJson() . ',"override_merchant_preferences":' .MerchantPreferencesTest::getJson() . ',"override_charge_models":' .OverrideChargeModelTest::getJson() . ',"plan":' .PlanTest::getJson() . ',"create_time":"TestSample","update_time":"TestSample","links":' .LinksTest::getJson() . '}';
    }

    /**
     * Gets Object Instance with Json data filled in
     * @return Agreement
     */
    public static function getObject()
    {
        return new Agreement(self::getJson());
    }


    /**
     * Tests for Serialization and Deserialization Issues
     * @return Agreement
     */
    public function testSerializationDeserialization()
    {
        $obj = new Agreement(self::getJson());
        $this->assertNotNull($obj);
        $this->assertNotNull($obj->getId());
        $this->assertNotNull($obj->getState());
        $this->assertNotNull($obj->getName());
        $this->assertNotNull($obj->getDescription());
        $this->assertNotNull($obj->getStartDate());
        $this->assertNotNull($obj->getPayer());
        $this->assertNotNull($obj->getShippingAddress());
        $this->assertNotNull($obj->getOverrideMerchantPreferences());
        $this->assertNotNull($obj->getOverrideChargeModels());
        $this->assertNotNull($obj->getPlan());
        $this->assertNotNull($obj->getCreateTime());
        $this->assertNotNull($obj->getUpdateTime());
        $this->assertNotNull($obj->getLinks());
        $this->assertEquals(self::getJson(), $obj->toJson());
        return $obj;
    }

    /**
     * @depends testSerializationDeserialization
     * @param Agreement $obj
     */
    public function testGetters($obj)
    {
        $this->assertEquals($obj->getId(), "TestSample");
        $this->assertEquals($obj->getState(), "TestSample");
        $this->assertEquals($obj->getName(), "TestSample");
        $this->assertEquals($obj->getDescription(), "TestSample");
        $this->assertEquals($obj->getStartDate(), "TestSample");
        $this->assertEquals($obj->getPayer(), PayerTest::getObject());
        $this->assertEquals($obj->getShippingAddress(), AddressTest::getObject());
        $this->assertEquals($obj->getOverrideMerchantPreferences(), MerchantPreferencesTest::getObject());
        $this->assertEquals($obj->getOverrideChargeModels(), OverrideChargeModelTest::getObject());
        $this->assertEquals($obj->getPlan(), PlanTest::getObject());
        $this->assertEquals($obj->getCreateTime(), "TestSample");
        $this->assertEquals($obj->getUpdateTime(), "TestSample");
        $this->assertEquals($obj->getLinks(), LinksTest::getObject());
    }

    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testCreate($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    self::getJson()
            ));

        $result = $obj->create($mockApiContext, $mockPayPalRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testExecute($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    self::getJson()
            ));

        $result = $obj->execute("123123", $mockApiContext, $mockPayPalRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testGet($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    AgreementTest::getJson()
            ));

        $result = $obj->get("agreementId", $mockApiContext, $mockPayPalRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testUpdate($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    self::getJson()
            ));
        $patchRequest = PatchRequestTest::getObject();

        $result = $obj->update($patchRequest, $mockApiContext, $mockPayPalRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testSuspend($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    true
            ));
        $agreementStateDescriptor = AgreementStateDescriptorTest::getObject();

        $result = $obj->suspend($agreementStateDescriptor, $mockApiContext, $mockPayPalRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testReActivate($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    true
            ));
        $agreementStateDescriptor = AgreementStateDescriptorTest::getObject();

        $result = $obj->reActivate($agreementStateDescriptor, $mockApiContext, $mockPayPalRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testCancel($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    true
            ));
        $agreementStateDescriptor = AgreementStateDescriptorTest::getObject();

        $result = $obj->cancel($agreementStateDescriptor, $mockApiContext, $mockPayPalRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testBillBalance($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    true
            ));
        $agreementStateDescriptor = AgreementStateDescriptorTest::getObject();

        $result = $obj->billBalance($agreementStateDescriptor, $mockApiContext, $mockPayPalRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testSetBalance($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    true
            ));
        $currency = CurrencyTest::getObject();

        $result = $obj->setBalance($currency, $mockApiContext, $mockPayPalRestCall);
        $this->assertNotNull($result);
    }
    /**
     * @dataProvider mockProvider
     * @param Agreement $obj
     */
    public function testTransactions($obj, $mockApiContext)
    {
        $mockPayPalRestCall = $this->getMockBuilder('\PayPal\Transport\PayPalRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockPayPalRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                    AgreementTransactionsTest::getJson()
            ));

        $result = $obj->transactions("agreementId", $mockApiContext, $mockPayPalRestCall);
        $this->assertNotNull($result);
    }

    public function mockProvider()
    {
        $obj = self::getObject();
        $mockApiContext = $this->getMockBuilder('ApiContext')
                    ->disableOriginalConstructor()
                    ->getMock();
        return array(
            array($obj, $mockApiContext),
            array($obj, null)
        );
    }
}
