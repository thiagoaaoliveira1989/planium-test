<?php
    /*
    *Pegando Arquivo plans.json e decodificando para dentro da variavel 
    */
    $json_plans = file_get_contents("json/plans.json");
    $data_plans = json_decode($json_plans);
    
   

   

?>