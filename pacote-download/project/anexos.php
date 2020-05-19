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
    $result = "SELECT A.ANEXO, CONVERT(VARCHAR(250),DATA)DAT,"
            . "K9_EO_TIPOANEXO.NOME NOMTIPO "
            . "FROM K_IP_EO_CONTRATOANEXOS A (NOLOCK) "
            . "INNER JOIN K9_EO_TIPOANEXO  K9_EO_TIPOANEXO (NOLOCK) ON (A.TIPO = K9_EO_TIPOANEXO.HANDLE) "
            . "WHERE A.CONTRATO = $hand ";
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
    
    <div class="container-fluid" role="main" >
        <div class="row">
                <div class="col-lg-9 col-xlg-8 col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <form class="d-flex" method="POST" action="#" >
                                    
                                        <div class="form-group col-lg-4 ">
                                            <label for="recipient-name" class="col-form-label "> Data:</label>
                                            <input name="dat" type="text" class="form-control " readonly="true" value="<?php 
                                            echo $resultado['DAT'];  ?>">
                                        </div>
                                        <div class="form-group col-lg-4 ">
                                            <label for="recipient-name" class="col-form-label "> Tipo:</label>
                                            <input name="tipo" type="text" class="form-control " readonly="true" value="<?php echo utf8_encode($resultado['NOMTIPO']);  ?>">
                                        </div>
                                        <div class="form-group col-lg-4">
                                            <label for="recipient-name" class="col-form-label"> Anexos:</label>
                                            <input name="anexo" type="text" class="form-control"  value="<?php echo utf8_encode($resultado['ANEXO']);  ?>">
                                        </div>
                                            <input  name="NUM"  type="hidden" id="id_handle" value="<?php echo $resultado['NUMERO'];  ?>">
                                   </form>
                                    <div class="modal-footer ">
                                        <button type="button" class="btn" ><a href="index.php">Voltar</a></button>
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

