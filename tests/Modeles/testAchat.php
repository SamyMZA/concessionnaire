<?php

require_once 'Modele/Achat.php';

$tstAchat = new Achat;
$achats = $tstAchat->getAchats();
echo '<h3>Test getAchat : </h3>';
var_dump($achats->rowCount());

echo '<h3>Test getAchat : </h3>';
$achat =  $tstAchat->getAchat(1);
var_dump($achat);