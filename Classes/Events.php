<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 16-01-05
 * Time: 19:58
 */

namespace SEF\Classes;

use SEF\Classes\Weapon;
use SEF\Settings;


class Events
{
    private $id;
    private $arme;
    private $sexe;
    private $event_category;
    private $competition_id;
    private $endRegistration;
    private $eventName;

    /**
     * Events constructor.
     * @param $arme_id
     * @param $sexe
     * @param $event_category_id
     * @param Settings $settings
     * @internal param $competition_id
     */
    public function __construct($id, $arme_id, $sexe, $event_category_id, $endRegistration, Settings $settings)
    {
        $this->id = $id;
        $this->arme = Weapon::getArme($arme_id, $settings->lang);
        $this->sexe = $sexe;
        $this->event_category = $this->getEventCategory($settings->getCategoryEvent(), $event_category_id);
        $this->competition_id = $settings->getTournamentId();
        $this->endRegistration = $endRegistration;
        $this->setEventName($settings);
    }


    public function getArmeName($lang)
    {
        return $this->arme;
    }

    public function getEventCategoryName($lang)
    {
        //$weap = new EventsCategories();
        return $this->eventName;
    }

    private function getEventCategory($settings, $event_category_id)
    {
        foreach ($settings as $item) {
            if ($item->getId() == $event_category_id) {
                return $item;
            }
        }
        return null;
    }

    private function setEventName($settings)
    {
        if ($settings->lang == "en") {
            if (substr(strtoupper($this->sexe), 0, 1) == "F") {
                $this->eventName = $this->event_category->getNom() . " Women's " . $this->arme;
            } else {
                $this->eventName = $this->event_category->getNom() . " Men's " . $this->arme;
            }
        } else if ($settings->lang == "fr") {
            $this->eventName = $this->arme . " " . $this->sexe . " " . $this->event_category->getNom();
        } else {
            if (substr(strtoupper($this->sexe), 0, 1) == "F") {
                $this->eventName = $this->arme . " Femenina " . $this->event_category->getNom();
            } else {
                $this->eventName = $this->arme . " Masculina " . $this->event_category->getNom();
            }
        }
    }

    /**
     * @return mixed
     */
    public function getEndRegistration()
    {
        return $this->endRegistration;
    }

    /**
     * @return mixed
     */
    public function getEventName()
    {
        return $this->eventName;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


}