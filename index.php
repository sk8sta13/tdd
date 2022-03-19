<?php

require('vendor/autoload.php');

use \App\Client;

$client = new Client('Marcelo', '1988-12-25', 84.5, 1.77, 'M');
echo $client->name . ' have ' . $client->getYearsOld() . " years old.\nThe IMC of " . $client->name . ' is ' . number_format($client->getImc(), 2, '.', ',') . ' ' . $client->imcAnalyze();

$client = new Client('Talitha', '1985-10-02', 70, 1.68, 'F');
echo $client->name . ' have ' . $client->getYearsOld() . " years old.\nThe IMC of " . $client->name . ' is ' . number_format($client->getImc(), 2, '.', ',') . ' ' . $client->imcAnalyze();

$client = new Client('Gilberto', '2021-06-10', 10, 1.02, 'M');
$client->waist = 10;
$client->hip = 0;
try {
    echo $client->getRcq();
} catch(\DivisionByZeroError $e) {
    die($e->getMessage());
}
exit;
echo $client->name . ' have ' . $client->getYearsOld() . " years old.\nThe IMC of " . $client->name . ' is ' . number_format($client->getImc(), 2, '.', ',') . ' ' . $client->imcAnalyze();