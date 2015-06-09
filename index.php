<?php
require 'vendor/autoload.php';

$api = new \Depotwarehouse\BattleNetSC2Api\ApiService("9yr3vx4huyrqqnunqyx67n762dp9guev", \Depotwarehouse\BattleNetSC2Api\Region::America);

$api->getGrandmasterInformation();
