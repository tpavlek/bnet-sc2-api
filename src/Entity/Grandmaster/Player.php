<?php

namespace Depotwarehouse\BattleNetSC2Api\Entity\Grandmaster;

class Player
{

    protected $id;
    protected $realm;
    protected $displayName;
    protected $clanName;
    protected $clanTag;
    protected $profile_url;
    protected $region;

    protected $joinTimestamp;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getRealm()
    {
        return $this->realm;
    }

    /**
     * @return mixed
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @return mixed
     */
    public function getClanName()
    {
        return $this->clanName;
    }

    /**
     * @return mixed
     */
    public function getClanTag()
    {
        return $this->clanTag;
    }

    /**
     * @return string
     */
    public function getProfileUrl()
    {
        return $this->profile_url;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @return mixed
     */
    public function getJoinTimestamp()
    {
        return $this->joinTimestamp;
    }

    /**
     * @return mixed
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @return mixed
     */
    public function getWins()
    {
        return $this->wins;
    }

    /**
     * @return mixed
     */
    public function getLosses()
    {
        return $this->losses;
    }

    /**
     * @return mixed
     */
    public function getHighestRank()
    {
        return $this->highestRank;
    }

    /**
     * @return mixed
     */
    public function getPreviousRank()
    {
        return $this->previousRank;
    }

    /**
     * @return mixed
     */
    public function getCurrentRank()
    {
        return $this->currentRank;
    }

    /**
     * @return string
     */
    public function getRace()
    {
        return $this->race;
    }
    protected $points;
    protected $wins;
    protected $losses;
    protected $highestRank;
    protected $previousRank;
    protected $currentRank;
    /**
     * Maps to the attribute "favoriteRaceP1"
     * @var string
     */
    protected $race;

    public function __construct($attributes)
    {
        $this->id = $attributes['character']->id;
        $this->realm = $attributes['character']->realm;
        $this->displayName = $attributes['character']->displayName;
        $this->clanName = $attributes['character']->clanName;
        $this->clanTag = $attributes['character']->clanTag;
        $this->profile_url = $this->constructProfileUrl($attributes['character']->profilePath, $attributes['region']);
        $this->region = $attributes['region'];
        $this->currentRank = $attributes['currentRank'];

        $this->joinTimestamp = $attributes['joinTimestamp'];
        $this->points = $attributes['points'];
        $this->wins = $attributes['wins'];
        $this->losses = $attributes['losses'];
        $this->highestRank = $attributes['highestRank'];
        $this->previousRank = $attributes['previousRank'];
        $this->race = $attributes['favoriteRaceP1'];
    }

    private function constructProfileUrl($path, $region)
    {
        return "https://{$region}.battle.net/sc2/{$path}";
    }


}
