<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 16-03-10
 * Time: 22:59
 */

namespace SEF\Classes;


use SEF\Settings;

class Fencer
{
    private $name;
    private $club;
    private $country;

    public function __construct(Settings $settings, $name, $club, $country)
    {
        $this->name = $name;
        $this->club = $club;
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }




}