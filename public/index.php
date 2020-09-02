<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../config/dev.php';
require '../vendor/autoload.php';

try {
  if (isset($_GET['route'])) {
    if ($_GET['route'] === 'article') {
      require '../templates/single.php';
    } else {
      echo 'page inconnue';
    }
  } else {
    require '../templates/home.php';
  }
} catch (Exception $e) {
  echo 'Erreur';
}
