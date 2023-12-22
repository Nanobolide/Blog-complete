<?php 
require "classTeste.php";


    $perso1 = new classTeste();
    $perso1->vie = 20;
    $perso1->mortPerso();
    $perso1->regenerer(100);

     var_dump($perso1);
    // var_dump($perso1->mortPerso());










?>