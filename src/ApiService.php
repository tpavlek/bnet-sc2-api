<?php

namespace Depotwarehouse\BattleNetSC2Api;

use Depotwarehouse\BattleNetSC2Api\Entity\Grandmaster\Player;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class ApiService
{

    protected $httpClient;

    private $apiKey;

    protected $region;
    private $locale;

    public function __construct($api_key, $region, $locale = "en_US")
    {
        $this->apiKey = $api_key;
        $this->region = $region;
        $this->locale = $locale;
        $this->httpClient = new Client([
            'base_uri' => "https://{$region}.api.battle.net/sc2/"
        ]);
    }

    private function retrieveGrandmasterInformationFromApi()
    {
        $request = new Request('GET', 'ladder/190001?' . http_build_query([ 'locale' => $this->locale, 'apiKey' => $this->apiKey ]));
        $response = $this->httpClient->send($request);

        return json_decode($response->getBody()->getContents());
    }

    public function getGrandmasterInformation()
    {
        $gm_information = $this->retrieveGrandmasterInformationFromApi();

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

        return $players;

    }
}
