<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 16-01-05
 * Time: 19:59
 */

namespace SEF\Classes;


class Weapon
{
    public static $weapon =
        array(
            1 => array(
                "en" => "Foil",
                "fr" => "Fleuret",
                "es" => "Florete",
                "du" => "Florett",
                "it" => "Fioretto",
                "po" => "Florete"),
            2 => array(
                "en" => "Saber",
                "fr" => "Sabre",
                "es" => "Sable",
                "du" => "Säbel",
                "it" => "Sciabola",
                "po" => "Sabre"),
            3 => array(
                "en" => "Epee",
                "fr" => "Épée",
                "es" => "Espada",
                "du" => "Degen",
                "it" => "Spada",
                "po" => "Espaga")
        );


    public static function getArme($idArme, $lang = "en")
    {
        return Weapon::$weapon[$idArme][$lang];

    }
}