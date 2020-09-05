<?php

namespace App\src\constraint;

class Constraint
{
    public function notBlank($name, $value)
    {
        if (empty($value)) {
            return '<p>Le champ ' . $name . ' saisi est vide</p>';
        }
    }
    public function minLength($name, $value, $minSize)
    {
        if (strlen($value) < $minSize) {
            return '<p>Le champ ' . $name . ' doit contenir au moins ' . $minSize . ' caractères</p>';
        }
    }
    public function maxLength($name, $value, $maxSize)
    {
        if (strlen($value) > $maxSize) {
            return '<p>Le champ ' . $name . ' doit contenir au maximum ' . $maxSize . ' caractères</p>';
        }
    }
    public function haveArobase($name, $value)
    {
        if (!preg_match('/@/', $value)) {
            return '<p>Le champ ' . $name . ' doit contenir un @';
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
