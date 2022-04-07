<?php
require_once 'convertFromPlans.php';
?>

<!DOCTYPE html>
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
                <a href="index.php" class="brand-logo center"> <img src="img/logo2.png" width="250px" alt="logo"></a>
                <ul id="nav-mobile" class="left hide-on-med-and-down">
                    <li><a href="#orcamento">Orçamento</a></li>
                </ul>
            </div>
        </nav>
        <div class="container2">
            <h2 class="center">Quando se trata de plano de saúde,<br>nós temos a solução completa.</h2>
            <h3 class="">Não perca tempo, falando com consultores e esperando horas pelo seu orçamento, aqui você mesmo
                consegue fazer seu orçamento de forma descomplicada.</h3>

            <a class="waves-effect waves-light btn" href="#orcamento">Simular Orçamento</a>
        </div>


        <!--  <div class='img-efect' src="img/img.png" alt=""></div> -->
    </div>
    <div class="container" id="orcamento">
        <div class="height-full">
            <h3 class="titulo center">Simulador de Plano Saúde</h3>
            <div class="row">
                <form class="col s12" action='' method='POST'>
                    <div class=" row">

                        <div class="center  input-field col s3">
                            <label for="icon_prefix">Digite a Qt de Beneficiários</label>
                            <input id="qt_benef" name="qt_benef" min='0' value='$qt_benef' type="number"
                                class=" input-center validate" required>
                        </div><br><br>

                        <div class="center input-center input-field col s6">
                            <input class="waves-effect waves-light btn" name="btn_sub" type="submit" value="Confirme">
                        </div>

                </form>


                <?php 
                 /*
                *caso seja recebido o valor do input qt_benf
                *faça a condição de repetição abaixo
                *colocando um input para escolher o plano desejado
                *outro para escolher o nome
                *e outro para escolher idade
                */
               if(isset($_POST['btn_sub'])){
                $qt_benef=$_POST['qt_benef'];
               
                /*
                *recebendo o valor do input do formulario a cima e enviando nesse novo formulario para simulador_plan.php
                */
               echo "<form class='col s12' action='simulador_plan.php' method='POST'>
               <div class='input-field col s12'>
                   <input name='totalBenef' value='$qt_benef'type='hidden' class='validate'> 
                </div>";
                
                for ($i=0; $i < $qt_benef; $i++) {
                    
                   echo "<div class='input-field col s4'>
                        <label>Escolha um plano: </label>
                        <select name='plano_escolhido[]' id='plano_escolhido' class='validate' required>
                            <option  disabled selected></option>";
                             foreach($data_plans as $row_plans){   
                                 echo "<option value='$row_plans->registro' >$row_plans->nome</option>";
                            }
                                
                    echo '</select>';
                echo '</div>';                   
                
                    echo "<div class='input-field col s6'>
                    <input name='nomes[]' type='text' class=' text-left validate' required>
                    <label>Nome</label>
                </div>
                <div class='input-field col s2'>
                     <input name='idades[]' type='number' min='0' class='validate' required>
                    <label>Idade</label>
                </div>";
                }
               echo "<div class='input-field col s12'>
                    <input type='submit' value='Simular' class='right waves-effect waves-light btn'>
                    </div>";
               } 
                
                
                ?>

            </div>
            </form>
        </div>
    </div>
    </div>



    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>