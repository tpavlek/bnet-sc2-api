<?php

namespace Depotwarehouse\BattleNetSC2Api;

use Depotwarehouse\BattleNetSC2Api\Entity\Player;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class ApiService
{

    protected $httpClient;

    private $apiKey;

    protected $region;

    public function __construct($api_key, $region)
    {
        $this->apiKey = $api_key;
        $this->region = $region;
        $this->httpClient = new Client([
            //'base_url' => "https://{$region}.api.battle.net/sc2/"
        ]);

        // TODO figure out why base_url is not working
    }

    public function getGrandmasterInformation($locale = "en_US")
    {
        $request = $this->httpClient->get('https://us.api.battle.net/sc2/ladder/grandmaster', ['query' => [ 'locale' => $locale, 'apiKey' => $this->apiKey ] ]);
        $gm_information = json_decode($request->getBody()->getContents());

        $players = [];
        $i = 1;
        foreach ($gm_information->ladderMembers as $item)
        {
            $item = (array)$item;
            $item['currentRank'] = $i;
            $item['region'] = $this->region;

            $player = new Player($item);
            $players[] = $player;
            $i++;
        }

    }
}
