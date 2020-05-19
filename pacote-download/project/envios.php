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
    $hand = $_REQUEST["hand"];
    $result = "SELECT E.VERSAO,CONVERT(VARCHAR(250),DATA,111)DAT,CONVERT(VARCHAR(250),DATAENVIO)DATENV, "
            . " E.CORPO,E.EMAIL, E.DESCRICAO, E.STATUS,Z_GRUPOUSUARIOS.NOME  NOMEUSUARIO "
            . "FROM K_IP_EO_ENVIO  E (NOLOCK)"
            . "INNER JOIN Z_GRUPOUSUARIOS  Z_GRUPOUSUARIOS (NOLOCK)  ON "
            . "(E.ENVIADOPOR=Z_GRUPOUSUARIOS.HANDLE)"
            . "WHERE E.CONTRATO = $hand";
            
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
                    <div class="card animated">
                        <div class="card-body">
                            <form class="d-flex">
                                    <div class="form-row">
                                            <div class="form-group col-1 ">
                                               <label for="recipient-name" class="col-form-label "> Versao:</label>
                                               <input name="versao" type="" class="form-control " readonly="true" value="<?php   echo $resultado['VERSAO'];  ?>">
                                            </div>
                                            <div class="form-group col-2">
                                               <label for="recipient-name" class="col-form-label "> Data:</label>
                                               <input name="dat" type="text" class="form-control " readonly="true" value="<?php   echo $resultado['DAT'];  ?>">
                                            </div>
                                            <div class="form-group col-2">
                                               <label for="recipient-name" class="col-form-label "> Status:</label>
                                               <input name="dat" type="text" class="form-control " readonly="true" value="<?php 
                                               if($resultado['STATUS'] == 1){
                                                    echo 'Cadastrado' ;
                                               } else {
                                                    echo 'Enviado' ;
                                               }
                                                ?>">
                                            </div>
                                            <div class="form-group col-3">
                                              <label for="recipient-name" class="col-form-label"> Data Envio:</label>
                                              <input name="dataEnvio" type="text" class="form-control" readonly="true" value="<?php echo $resultado['DATENV'];  ?>">
                                            </div>
                                            <div class="form-group col-3">
                                              <label for="recipient-name" class="col-form-label"> Enviado Por:</label>
                                              <input name="enviado" type="text" class="form-control" readonly="true" value="<?php echo $resultado['NOMEUSUARIO'];  ?>"> 
                                            </div>
                                    </div>
                            </form>
                            <form class="d-flex">
                                    <div class="form-row">
                                        <div class="form-group col-4">
                                               <label for="recipient-name" class="col-form-label "> Descricao:</label>
                                               <textarea name="descricao" type="text" class="form-control " readonly="true" value="">
                                               <?php echo utf8_encode($resultado['DESCRICAO']);  ?>
                                               </textarea>
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="recipient-name" class="col-form-label"> Email:</label>
                                                <textarea name="email" type="text" class="form-control" readonly="true">
                                                <?php echo $resultado['EMAIL'];  ?>
                                                </textarea>
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="recipient-name" class="col-form-label"> Corpo do Email:</label>
                                                <textarea name="corpemail" type="text" class="form-control" readonly="true">
                                                <?php echo utf8_encode($resultado['CORPO']);  ?>
                                                </textarea>
                                            </div>
                                             
                                                <input  name="handle"  type="hidden" id="id_handle" value="<?php echo $resultado['HAND'];  ?>">
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
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>


