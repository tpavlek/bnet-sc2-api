<?php

namespace Depotwarehouse\BattleNetSC2Api\Tests\Functional;

use Depotwarehouse\BattleNetSC2Api\ApiService;
use Depotwarehouse\BattleNetSC2Api\Region;
use GuzzleHttp\Exception\ClientException;

class ApiServiceTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        parent::setUp();
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function it_retrieves_north_american_ladder_information()
    {
        $apiService = new ApiService(getenv('BNET_API_KEY'), Region::America);
        $reflection = new \ReflectionClass($apiService);
        $method = $reflection->getMethod('retrieveGrandmasterInformationFromApi');
        $method->setAccessible(true);
        try {
            $result = $method->invoke($apiService);
            $this->assertObjectHasAttribute("ladderMembers", $result);
        } catch (ClientException $exception) {
            $this->fail("API returned an error with: " . (string)$exception->getResponse()->getBody());
        }
    }

    /**
     * @test
     */
    public function it_retrieves_european_ladder_information()
    {
        $apiService = new ApiService(getenv('BNET_API_KEY'), Region::Europe);
        $reflection = new \ReflectionClass($apiService);
        $method = $reflection->getMethod('retrieveGrandmasterInformationFromApi');
        $method->setAccessible(true);
        try {
            $result = $method->invoke($apiService);
            $this->assertObjectHasAttribute("ladderMembers", $result);

        } catch (ClientException $exception) {
            $this->fail("API returned an error with: " . (string)$exception->getResponse()->getBody());
        }
    }
}
