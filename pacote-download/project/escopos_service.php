<?php

    $dbhost   = "10.1.1.6";   #Nome do host
    $db       = "corporativo";   #Nome do banco de dados
    $user     = "sa"; #Nome do usuário
    $password = "@@SA@@##2013##";   #Senha do usuário
       
        // Conexão com o banco
    $conninfo = array("Database" => $db, "UID" => $user, "PWD" => $password,"ReturnDatesAsStrings" =>1);
    $conn = sqlsrv_connect($dbhost, $conninfo);

        if($conn==FALSE)
            {
                die( print_r( sqlsrv_errors(), true));
            }
    $numero = $_REQUEST["numero"];
    $result = "SELECT CONVERT(VARCHAR(250),DATA,111)DAT,E.ALTERNATIVO,E.DESCRICAO,E.PRAZO,E.LOCALOBRA,E.PESO,E.VALORCALCULADO,
               E.VALORAPROVADO,E.TOTALHORA,E.TOTALPESSOAS,E.TOTALITEM,E.ACRESCIMOS,E.DESCONTOS
                FROM K_IP_EO_CONTRATOESCOPO E (NOLOCK)
            WHERE E.CONTRATO = $numero ";
            
    $dados = sqlsrv_query( $conn, $result) or die(print_r(sqlsrv_errors()));;
   $resultado = sqlsrv_fetch_array($dados,SQLSRV_FETCH_ASSOC);
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="../assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="../assets/plugins/css-chart/css-chart.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="../assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Vector CSS -->
    <link href="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    
     <div class="container" role="main">
        <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <form class="">
                                    <div class="form-row">
                                            <div class="form-group col-3 ">
                                               <label for="recipient-name" class="col-form-label "> Data:</label>
                                               <input name="versao" type="" class="form-control " id="versao" value="<?php  
                                               echo $resultado['DAT'];  ?>">
                                            </div>
                                            <div class="form-group col-3">
                                               <label for="recipient-name" class="col-form-label "> Alternativo:</label>
                                               <input name="dat" type="text" class="form-control " id="dat" value="<?php   echo utf8_encode($resultado['ALTERNATIVO']);  ?>">
                                            </div>
                                            <div class="form-group col-3">
                                               <label for="recipient-name" class="col-form-label "> Descricao:</label>
                                               <textarea name="descricao" type="text" class="form-control " id="tipo" value="">
                                               <?php echo utf8_encode($resultado['DESCRICAO']);  ?>
                                               </textarea>
                                            </div>
                                            <div class="form-group col-3">
                                              <label for="recipient-name" class="col-form-label"> Prazo :</label>
                                              <input name="dataEnvio" type="text" class="form-control" id="anexo" value="<?php echo $resultado['PRAZO'];  ?>">
                                            </div>
                                            
                                    </div>
                            </form>
                            <form class="">
                                    <div class="form-row">
                                        <div class="form-group col-3">
                                              <label for="recipient-name" class="col-form-label"> Local_Obra:</label>
                                              <input name="enviado" type="text" class="form-control" id="anexo" value="<?php echo utf8_encode($resultado['LOCALOBRA']);  ?>"> 
                                            </div>
                                        
                                            <div class="form-group col-3">
                                                <label for="recipient-name" class="col-form-label"> Peso:</label>
                                                <input name="enviado" type="text" class="form-control" id="anexo" value="<?php echo $resultado['PESO'];  ?>"> 
                                            </div>
                                            <div class="form-group col-3">
                                                <label for="recipient-name" class="col-form-label"> Valor_Calculado:</label>
                                                <input name="enviado" type="text" class="form-control" id="anexo" value="<?php echo number_format($resultado['VALORCALCULADO'],2,",",".");  ?>"> 
                                            </div>
                                            <div class="form-group col-3">
                                                <label for="recipient-name" class="col-form-label"> Valor_Aprovado:</label>
                                                <input name="enviado" type="text" class="form-control" id="anexo" value="<?php echo number_format($resultado['VALORAPROVADO'],2,",",".");  ?>"> 
                                            </div>
                                    </div>
                            </form> 
                            
                            <form class="">
                                    <div class="form-row">
                                        <div class="form-group col-2">
                                              <label for="recipient-name" class="col-form-label"> Total_Horas:</label>
                                              <input name="enviado" type="text" class="form-control" id="anexo" value="<?php echo $resultado['TOTALHORA'];  ?>"> 
                                            </div>
                                        
                                            <div class="form-group col-3">
                                                <label for="recipient-name" class="col-form-label"> Total_Pessoas:</label>
                                                <input name="enviado" type="text" class="form-control" id="anexo" value="<?php echo $resultado['TOTALPESSOAS'];  ?>"> 
                                            </div>
                                            <div class="form-group col-3">
                                                <label for="recipient-name" class="col-form-label"> Total_Item:</label>
                                                <input name="enviado" type="text" class="form-control" id="anexo" value="<?php echo number_format($resultado['TOTALITEM'],2,",",".");  ?>"> 
                                            </div>
                                            <div class="form-group col-2">
                                                <label for="recipient-name" class="col-form-label"> Acrescimos:</label>
                                                <input name="enviado" type="text" class="form-control" id="anexo" value="<?php echo $resultado['ACRESCIMOS'];  ?>"> 
                                            </div>
                                            <div class="form-group col-2">
                                                <label for="recipient-name" class="col-form-label"> Descontos:</label>
                                                <input name="enviado" type="text" class="form-control" id="anexo" value="<?php echo $resultado['DESCONTOS'];  ?>"> 
                                            </div>
                                             
                                                <input  name="numero"  type="hidden" id="id_handle" value="<?php echo $resultado['NUMERO'];  ?>">
                                    </div>
                            </form> 
                            <div class=" modal-footer ">
                             <button type="button" class="btn btn-success col-2" ><a href="index.php">Voltar</a></button>
                            </div>
                        </div>
                    </div>
             </div>
        </div>
            
    </div>
            
  <footer class="footer"> © 2018  Passaúra</footer>
  
 <!-- chartist chart -->
    <script src="../assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="../assets/plugins/d3/d3.min.js"></script>
    <script src="../assets/plugins/c3-master/c3.min.js"></script>
    <!-- Vector map JavaScript -->
    <script src="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js"></script>
    <script src="js/dashboard2.js"></script>
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>







