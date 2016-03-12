<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 16-01-05
 * Time: 20:00
 */

namespace SEF;


use SEF\Classes\Events;
use SEF\Classes\EventsCategories;

class Settings
{
    //Tournament
    //Tournament ID to get the events
    private $tournamentID;

    //For Oauth purpose
    private $apiKey;
    private $apiSecret;

    //Language
    public $lang;

    public $apiRoute;

    public $categoryEvent = [];

    public function __construct($id, $lang = "fr")
    {
        $this->apiKey = "the api key";
        $this->apiSecret = "the api secret";

        $this->tournamentID = $id;

        $this->lang = $lang;

        $this->apiRoute = "https://sef-scores.com/api/";
        $this->loadCategoryEvents();
    }

    public function getTournamentInfo()
    {
        return file_get_contents($this->apiRoute . "competitions/show/" . $this->tournamentID);
    }

    public function getTournamentId()
    {
        return $this->tournamentID;
    }

    private function loadCategoryEvents()
    {
        $listCategoryEvent = json_decode(file_get_contents($this->apiRoute . "categories-epreuves"));
        foreach ($listCategoryEvent->data as $uneCat) {
            $this->categoryEvent[] = new EventsCategories($uneCat->id, $uneCat->nom, $uneCat->ageMin, $uneCat->ageMax, $this->lang);

        }
    }

    /**
     * @return array
     */
    public function getCategoryEvent()
    {
        return $this->categoryEvent;
    }


}