<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 16-01-05
 * Time: 20:10
 */

namespace SEF\Classes;


class Tournament
{
    private $id;
    private $fees;
    private $eventFees;
    private $otherEventFees;
    private $dateStart;
    private $dateEnd;
    private $adresse;
    private $ville;
    private $codePostal;

    public function __construct($id)
    {

    }

    public function getJson()
    {
        return $this->adresse;
    }

    public function parseJSON(){

    }
}