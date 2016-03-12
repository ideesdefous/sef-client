<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 16-03-09
 * Time: 01:15
 */

namespace SEF\Classes;


use SEF\Settings;

class EventsCategories
{
    private $id;
    private $nom;
    private $ageMin;
    private $ageMax;

    public function __construct($id, $nom, $ageMin, $ageMax, $lang)
    {
        $this->id = $id;
        if (strtoupper($lang) == "EN" && substr($nom, 0, 1) == "-") {
            $this->nom = "Y" . (intval(substr($nom, 1, 2)) - 1);
        } else {
            $this->nom = $nom;
        }
        $this->ageMax = $ageMax;
        $this->ageMin = $ageMin;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getAgeMin()
    {
        return $this->ageMin;
    }

    /**
     * @return mixed
     */
    public function getAgeMax()
    {
        return $this->ageMax;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


}