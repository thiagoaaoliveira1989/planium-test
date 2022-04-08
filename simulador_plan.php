<?php
require_once 'convertFromPlans.php';
?>

<html lang="PT-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planium</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
</head>

<body>




    <div class="topo">
        <nav>
            <div class="nav-wrapper">
                <a href="index.php" class="brand-logo left"> <img src="img/logo2.png" width="250px" alt="logo"></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="index.php">HOME</a></li>
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


$data = array();
$data['error']= false;
$data['mensagem'] = '';

if($data > 0){
    for($i=0; $i < count($nomes); $i++){
        
        $data['beneficiarios'][] = array(
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

}else{
    $data['error']=true;
    $data['mensagem'] = "Erro ao Inserir dados no Arquivo beneficiarios.json";
    
}
    
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



$data2 = array();
$data2['orcamento_total'] = 0;
$data2['error']= false;
$data2['mensagem'] = '';

$json_benef = file_get_contents("json/plans.json");
$data_benef= json_decode($json_benef);


if($data_benef[0]->nome > 0){

foreach($data['beneficiarios'] as $row){
    

    //retornando na tela uma lista com os dados escolhido pelo usuario e mostrando o valor total do plano.
    echo "<tr><td>".$row['Plano Escolhido']."</td>";
    echo "<td>".$row['Nome']."</td>";
    echo "<td>".$row['Idade']."</td>";
    
    /*
    *verificando o plano escolhido, e o minimo de vidas de correspondente a cada plano, e assim calculando o valor de cada plano.
    */
    if(($row['Plano Escolhido'] == $data_plans[0]->nome) && ($tot_benef < $data_prices[1]->minimo_vidas)){
        
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

    }elseif(($row['Plano Escolhido'] == $data_plans[0]->nome) && ($tot_benef >= $data_prices[1]->minimo_vidas)){
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
    }elseif(($row['Plano Escolhido'] == $data_plans[1]->nome) && ($tot_benef >= $data_prices[2]->minimo_vidas)){
        
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

    }elseif(($row['Plano Escolhido'] == $data_plans[2]->nome) && ($tot_benef >= $data_prices[3]->minimo_vidas)){
        
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
    }elseif(($row['Plano Escolhido'] == $data_plans[3]->nome) && ($tot_benef >= $data_prices[4]->minimo_vidas)){
        
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
    }elseif(($row['Plano Escolhido'] == $data_plans[4]->nome) && ($tot_benef >= $data_prices[5]->minimo_vidas)){
        
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
    }elseif(($row['Plano Escolhido'] == $data_plans[5]->nome) && ($tot_benef == $data_prices[6]->minimo_vidas)){
        
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
    }elseif(($row['Plano Escolhido'] == $data_plans[5]->nome) && ($tot_benef >= $data_prices[7]->minimo_vidas)){
        
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
    
    $data2['dados_orcamento'][]=  array(
        "Plano Escolhido"=>$row['Plano Escolhido'],
        "Nome"=>$row['Nome'],
        "Idade"=>$row['Idade'],
        "Valor do Plano"=>$valordoplano,
    );
}
   
   

 


    
   
}else{
    $data2['error']= true;
    $data2['mensagem'] = 'Erro ao Receber o Plano Escolhido';
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
$data2['orcamento_total']= $tot_plano;
$arquivo2 = "json/proposta.json";
$json2 = json_encode($data2);
$file2 = fopen(__DIR__ . '/' . $arquivo2,'w');
fwrite($file2, $json2);
fclose($file2);


?>
     <footer class="page-footer">
        <div class="center">
            <a href="index.php" class="brand-logo center"> <img src="img/logo3.png" width="300px" alt="logo"></a>
        </div>
        <div class="left-footer">
            <a class="grey-text text-lighten-4 left"
                href="https://www.linkedin.com/in/thiago-araujo-de-aguiar-oliveira-78ba12a7/" target="_blank">© 2022
                Desenvolvido por Thiago Araujo</a>
        </div>


    </footer>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>