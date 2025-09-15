<?php

require_once 'Framework/Configuration.php';
require_once 'Framework/Vue.php';

$voitures = [
    [
        'id' => '1',
        'marque' => 'Mazda',
        'modele' => '3',
        'prix' => 5250,
        'img' => 'test'
    ],
    [
        'id' => '2',
        'marque' => 'Toyota',
        'modele' => 'Corrola',
        'prix' => 10000,
        'img' => 'test'
    ]
];

$vue = new Vue('index', 'Voitures');
$vue->generer(['voitures' => $voitures]);
