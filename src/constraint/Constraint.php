<?php

namespace App\src\constraint;

class Constraint
{
    public function notBlank($name, $value)
    {
        if (empty($value)) {
            return "Le champ " . $name . " saisi est vide";
        }
    }
    public function minLength($name, $value, $minSize)
    {
        if (strlen($value) < $minSize) {
            return "Le champ " . $name . " doit contenir au moins ' . $minSize . ' caractères";
        }
    }
    public function maxLength($name, $value, $maxSize)
    {
        if (strlen($value) > $maxSize) {
            return "Le champ " . $name . " doit contenir au maximum ' . $maxSize . ' caractères";
        }
    }
    public function haveArobase($name, $value)
    {
        if (!preg_match('/@/', $value)) {
            return "Le champ " . $name . " doit contenir un @";
        }
    }

    public function haveSpace($name, $value)
    {
        if (preg_match("/\s/", $value)) {
            return "Le champ " . $name . " ne doit pas contenir d'espace";
        }
    }

    public function minSize($name, $value)
    {
        $minSize = 1;
        if ($value < $minSize) {
            return "La " . $name . " minimum de l'image doit être de " . $minSize . "Ko";
        }
    }

    public function maxSize($name, $value)
    {
        $maxSize = 4000000;
        if ($value > $maxSize) {
            return "La " . $name . " maximum de l'image doit être de " . $maxSize . "Ko";
        }
    }

    public function haveExt($name, $value)
    {
        $validExt = [".jpg", ".jpeg", ".png"];
        $validExtTips = implode(",", $validExt);
        $fileExt = "." . strtolower(substr(strrchr($value, "/"), 1));

        if (!in_array($fileExt, $validExt)) {
            return "Le " . $name . "doit être une image de type : " . $validExtTips;
        }
    }

    public function haveSpecialCharacter($name, $value)
    {
        if (strlen($value) < 8 || strlen($value) > 16) {
            return "Le champ " . $name . " doit contenir au moins 8 caractères et maximum 16 caractères";
        }
        if (!preg_match("/\d/", $value)) {
            return "Le champ " . $name . " doit contenir au moins un nombre";
        }
        if (!preg_match("/[A-Z]/", $value)) {
            return "Le champ " . $name . " doit contenir au moins une majuscule";
        }
        if (!preg_match("/[a-z]/", $value)) {
            return "Le champ " . $name . " doit contenir au moins une minuscule";
        }
        if (!preg_match("/\W/", $value)) {
            return "Le champ " . $name . " doit contenir au moins un caractère spécial";
        }
        if (preg_match("/\s/", $value)) {
            return "Le champ " . $name . " ne doit pas contenir d'espace";
        }
    }
}
