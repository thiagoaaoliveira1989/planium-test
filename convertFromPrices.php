<?php
    /*
    *Pegando Arquivo prices.json e decodificando para dentro da variavel 
    */
    $json_prices = file_get_contents("json/prices.json");
    $data_prices = json_decode($json_prices);
    


?>