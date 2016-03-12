<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 16-03-09
 * Time: 15:55
 */

namespace SEF;

use SEF\Classes\Events;
use SEF\Classes\Fencer;

class SEF
{
    private $setting;

    public function __construct($id)
    {
        $this->setting = new Settings($id);

    }

    /**
     * @param Settings $settings
     * @return array
     */
    public static function getEpreuveForTournament(Settings $settings)
    {
        $listEvents = json_decode(file_get_contents($settings->apiRoute . "epreuves/for-competition/" . $settings->getTournamentId()));
        $listEpreuve = array();
        foreach ($listEvents->data as $epreuve) {
            $listEpreuve[] = new Events($epreuve->id, $epreuve->arme_id, $epreuve->sexe, $epreuve->categorie_epreuve_id, $epreuve->dateHeureDebut, $settings);
        }
        usort($listEpreuve, function($a, $b){
           return strcmp($a->getEventName(), $b->getEventName());
        });
        return $listEpreuve;
    }

    public static function getFencerForEpreuveForTournament(Settings $settings)
    {
        $listEvents = self::getEpreuveForTournament($settings);
        for ($i = 0; $i < sizeof($listEvents); $i++) {
            $listEvents[$i]->fencersList = self::getFencersForEvent($settings, $listEvents[$i]->getId());
        }
        return $listEvents;
    }

    public static function getFencersForEvent(Settings $settings, $id)
    {
        $listFencers = json_decode(file_get_contents($settings->apiRoute . "tireurs/for-epreuve/" . $id));
        $finalListFencer = array();
        foreach ($listFencers->data as $fencer) {
            $finalListFencer[] = new Fencer($settings, $fencer->user->data->prenom . " " . $fencer->user->data->nom, $fencer->clubName, $fencer->user->data->pays);
        }
        return $finalListFencer;
    }
}