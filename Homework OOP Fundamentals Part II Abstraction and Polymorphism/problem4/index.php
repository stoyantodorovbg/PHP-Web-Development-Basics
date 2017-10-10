<?php

spl_autoload_register(function($class_name){
    include($class_name.'.php');
});

$father = new Father('Gosho', 1900, 1975);
$son = new Son('Pesho', 1920, 1999);
$grandSon = new GrandSon('Dragan', 1940, 2014);
$data = [$father, $son, $grandSon];

$html = '<table border=1><tr><th>Person</th><th>Name</th><th>Birth</th><th>Dead</th><th>Leaved</th></tr>';
foreach ($data as $person) {
    $html .= '<tr><th>'.$person->getGenerationNum()[0].'. '.$person->getGenerationNum()[1].'</th>';
    $html .= '<th>'.$person->getName().'</th><th>'.$person->getAgeBirth().'</th><th>'.$person->getAgeDead().'</th><th>'.$person->getTimeLived().'</th></tr>';
}
$html .= '</table>';

echo $html;


