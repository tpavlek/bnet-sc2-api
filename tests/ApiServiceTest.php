<?php

namespace Depotwarehouse\BattleNetSC2Api\Tests;


use Depotwarehouse\BattleNetSC2Api\ApiService;
use Depotwarehouse\BattleNetSC2Api\Region;

class ApiServiceTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function it_throws_error_if_unknown_region_on_instantiation()
    {
        new ApiService("some_key", "fart_region");
    }

    /**
     * @test
     */
    public function it_instantiates_with_europe_or_america()
    {
        $service = new ApiService("some_key", Region::America);

        $service = new ApiService("some_key", Region::Europe);
    }

}
