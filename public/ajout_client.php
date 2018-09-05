<?php

require_once __DIR__ . '/../src/functions.php';

$dbh = ConnectToBDD(); //Connexion a la BDD

ajoutClient($dbh);

?>
