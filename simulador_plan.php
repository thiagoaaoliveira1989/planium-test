<?php
require_once 'convertFromPlans.php';
?>

<!DOCTYPE html>
<html lang="PT-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orçamento - Planium</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>


    <nav>
        <div class="nav-wrapper black">
            <a href="index.php" class="brand-logo"><img src="img/logo.png" width="200px" alt=""></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
              <li><a href="index.php">Home</a></li>
            </ul>
        </div>
    </nav>

    
<?php
require_once 'convertFromPrices.php';
require_once 'convertFromPlans.php';




$tot_benef=$_POST['totalBenef'];
$plano =$_POST['plano_escolhido'];
$nomes= $_POST['nomes'];
$idades= $_POST['idades'];


    for($i=0; $i < count($nomes); $i++){
        
        $data[] = array(
            "Plano Escolhido"=>$plano[$i],
            "Nome"=>$nomes[$i],
            "Idade"=>intval($idades[$i])
        ); 
    }

    
    //Salvando os dados recebidos do formulario no beneficiarios.json
    $arquivo = "json/beneficiarios.json";
    $json = json_encode($data);
    $file = fopen(__DIR__ . '/' . $arquivo,'w');
    fwrite($file, $json);
    fclose($file);

?>
<div class="container">
<h3 class="titulo center">Orçamento</h3>
<table border="1" class='striped'>
    <tr>
        <th>Plano</th>
        <th>Nome</th>
        <th>Idade</th>
        <th>Valor do Plano</th>
    </tr>
    
<?php 




foreach($data as $row){
    //retornando na tela uma lista com os dados escolhido pelo usuario e mostrando o valor total do plano.
    echo "<tr><td>".$row['Plano Escolhido']."</td>";
    echo "<td>".$row['Nome']."</td>";
    echo "<td>".$row['Idade']."</td>";
    
    /*
    *verificando o plano escolhido, e o minimo de vidas de correspondente a cada plano, e assim calculando o valor de cada plano.
    */
    if(($row['Plano Escolhido'] == 'reg1') && ($tot_benef < $data_prices[1]->minimo_vidas)){
        
        switch($row['Idade']){
            case $row['Idade']< 18:
             $valordoplano =  $data_prices[0]->faixa1;
             echo "<td>".$valordoplano.",00 </td>";
             break;
             case ($row['Idade'] >= 18) && ($row['Idade'] <= 40):
             $valordoplano =  $data_prices[0]->faixa2;
             echo "<td>".$valordoplano.",00 </td>";
             break;  
             case ($row['Idade'] > 40):
             $valordoplano =  $data_prices[0]->faixa3;
             echo "<td>".$valordoplano.",00 </td></tr>";
             break; 
        }  

    }elseif(($row['Plano Escolhido'] == 'reg1') && ($tot_benef >= $data_prices[1]->minimo_vidas)){
        switch($row['Idade']){
            case $row['Idade']< 18:
             $valordoplano =  $data_prices[1]->faixa1;
             echo "<td>".$valordoplano.",00 </td>";
             break;
             case ($row['Idade'] >= 18) && ($row['Idade'] <= 40):
             $valordoplano =  $data_prices[1]->faixa2;
             echo "<td>".$valordoplano.",00 </td>";
             break;  
             case ($row['Idade'] > 40):
             $valordoplano =  $data_prices[1]->faixa3;
             echo "<td>".$valordoplano.",00 </td></tr>";
             break; 
        }  
    }elseif(($row['Plano Escolhido'] == 'reg2') && ($tot_benef >= $data_prices[2]->minimo_vidas)){
        
        switch($row['Idade']){
            case $row['Idade']< 18:
             $valordoplano =  $data_prices[2]->faixa1;
             echo "<td>".$valordoplano.",00 </td>";
             break;
             case ($row['Idade'] >= 18) && ($row['Idade'] <= 40):
             $valordoplano =  $data_prices[2]->faixa2;
             echo "<td>".$valordoplano.",00 </td>";
             break;  
             case ($row['Idade'] > 40):
             $valordoplano =  $data_prices[2]->faixa3;
             echo "<td>".$valordoplano.",00 </td></tr>";
             break; 
        }  

    }elseif(($row['Plano Escolhido'] == 'reg3') && ($tot_benef >= $data_prices[3]->minimo_vidas)){
        
        switch($row['Idade']){
            case $row['Idade']< 18:
             $valordoplano =  $data_prices[3]->faixa1;
             echo "<td>".$valordoplano.",00 </td>";
             break;
             case ($row['Idade'] >= 18) && ($row['Idade'] <= 40):
             $valordoplano =  $data_prices[3]->faixa2;
             echo "<td>".$valordoplano.",00 </td>";
             break;  
             case ($row['Idade'] > 40):
             $valordoplano =  $data_prices[3]->faixa3;
             echo "<td>".$valordoplano.",00 </td></tr>";
             break; 
        }  
    }elseif(($row['Plano Escolhido'] == 'reg4') && ($tot_benef >= $data_prices[4]->minimo_vidas)){
        
        switch($row['Idade']){
            case $row['Idade']< 18:
             $valordoplano =  $data_prices[4]->faixa1;
             echo "<td>".$valordoplano.",00 </td>";
             break;
             case ($row['Idade'] >= 18) && ($row['Idade'] <= 40):
             $valordoplano =  $data_prices[4]->faixa2;
             echo "<td>".$valordoplano.",00 </td>";
             break;  
             case ($row['Idade'] > 40):
             $valordoplano =  $data_prices[4]->faixa3;
             echo "<td>".$valordoplano.",00 </td></tr>";
             break; 
        }  
    }elseif(($row['Plano Escolhido'] == 'reg5') && ($tot_benef >= $data_prices[5]->minimo_vidas)){
        
        switch($row['Idade']){
            case $row['Idade']< 18:
             $valordoplano =  $data_prices[5]->faixa1;
             echo "<td>".$valordoplano.",00 </td>";
             break;
             case ($row['Idade'] >= 18) && ($row['Idade'] <= 40):
             $valordoplano =  $data_prices[5]->faixa2;
             echo "<td>".$valordoplano.",00 </td>";
             break;  
             case ($row['Idade'] > 40):
             $valordoplano =  $data_prices[5]->faixa3;
             echo "<td>".$valordoplano.",00 </td></tr>";
             break; 
        }  
    }elseif(($row['Plano Escolhido'] == 'reg6') && ($tot_benef == $data_prices[6]->minimo_vidas)){
        
        switch($row['Idade']){
            case $row['Idade']< 18:
             $valordoplano =  $data_prices[6]->faixa1;
             echo "<td>".$valordoplano.",00 </td>";
             break;
             case ($row['Idade'] >= 18) && ($row['Idade'] <= 40):
             $valordoplano =  $data_prices[6]->faixa2;
             echo "<td>".$valordoplano.",00 </td>";
             break;  
             case ($row['Idade'] > 40):
             $valordoplano =  $data_prices[6]->faixa3;
             echo "<td>".$valordoplano.",00 </td></tr>";
             break; 
        }  
    }elseif(($row['Plano Escolhido'] == 'reg6') && ($tot_benef >= $data_prices[7]->minimo_vidas)){
        
        switch($row['Idade']){
            case $row['Idade']< 18:
             $valordoplano =  $data_prices[7]->faixa1;
             echo "<td>".$valordoplano.",00 </td>";
             break;
             case ($row['Idade'] >= 18) && ($row['Idade'] <= 40):
             $valordoplano =  $data_prices[7]->faixa2;
             echo "<td>".$valordoplano.",00 </td>";
             break;  
             case ($row['Idade'] > 40):
             $valordoplano =  $data_prices[7]->faixa3;
             echo "<td>".$valordoplano.",00 </td></tr>";
             break; 
        }  
    }                    

   $tot_plano = $tot_plano + $valordoplano;
   

    $data2[] =  array(
        "Plano Escolhido"=>$row['Plano Escolhido'],
        "Nome"=>$row['Nome'],
        "Idade"=>$row['Idade'],
        "Valor do Plano"=>$valordoplano,
    );


    
   
}

echo "<br><br><table class='striped'>
            <tr>
                <th>Total do Plano:</th>
                <th>R$ $tot_plano,00</th>
             </tr>

</table></div>";
    /*
    *depois de fazer a condiçao a cima e calcular o preço unitario de cada plano e o preço total
    *salvo a prosposta em proposta.json
    */
$data2[] =  array("Valor Total"=>$tot_plano);
$arquivo2 = "json/proposta.json";
$json2 = json_encode($data2);
$file2 = fopen(__DIR__ . '/' . $arquivo2,'w');
fwrite($file2, $json2);
fclose($file2);


?>
   