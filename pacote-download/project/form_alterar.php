<?php
    $serverName = "10.1.1.217";
    $connectionInfo = array( "Database"=>"CORP_TESTE", "UID"=>"sa", "PWD"=>"@@SA@@##2013##" 
);
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    if( $conn === false ) {
         die( print_r( sqlsrv_errors(), true));
    }
    
  $hand = $_REQUEST['hand'];
 
  $result = "SELECT HANDLE, EMPRESA,SEQUENCIAL,CLIENTE, SERVICOS,CONVERT(VARCHAR(250),"
                . "DATAABERTURA,111 
)DATA,FORMASOLICITACAO,ANEXOGERAL,VISITATECNICA,DIRETOR,"
                . " USUARIOINCLUIU,ORIGEM,CONVERT(VARCHAR(250),DATAENTREGA,111)DATAEnt,"
                . "ANO,USUARIOALTEROU FROM K_IP_EO_CONTRATO WHERE HANDLE=".$hand;
  
  $dados = sqlsrv_query( $conn, $result);
  $resultado = sqlsrv_fetch_array( $dados);
// $resultado['SEQUENCIAL'];        
    
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
    <link href="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-
tooltip.css" rel="stylesheet">
    <link href="../assets/plugins/css-chart/css-chart.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="../assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Vector CSS -->
    <link href="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    
    <div class="container-fluid " >
        
        
        <form method="POST" action="processa.php" >
            <div class="row">
            <div class="col-sm-3 ">
                <label for="recipient-name" class="col-form-label "> Sequencial:</label>
                <input name="seq" type="text" class="form-control " id="sequencial" 
				value="<?php  echo $resultado['SEQUENCIAL']; ?>">
            </div>
            <div class="col-sm-3">
                <label for="recipient-name" class="col-form-label "> Empresa:</label>
               <input name="empresa" type="text" class="form-control " id="empresa" 
value="<?php echo $resultado['EMPRESA'];  ?>">
            </div>
            <div class=" col-sm-3">
                <label for="recipient-name" class="col-form-label"> Cliente:</label>
                <input name="cliente"  class="form-control" id="cliente" value="<?php echo 
$resultado['CLIENTE'];  ?>">
            </div>
        </div>
        </div>
        <div class="container-fluid">
            <div class="row">
               <div class="col-sm-3">
                    <label for="recipient-name" class="col-form-label "> 
Data_Abertura:</label>
                    <input name="abertura" class="form-control " id="dataabertura" 
value="<?php echo $resultado['DATA'];  ?>">
                </div>
                <div class="col-sm-3">
                    <label for="recipient-name" class="col-form-label"> DataEntrega:</label>
                    <input name="entrega"  class="form-control" id="dataentrega" value="<?php echo $resultado['DATAEnt'];  ?>">
                       
                </div>
                <div class="col-sm-3">
                    <label for="recipient-name" class="col-form-label "> 
Usuario_incluiu:</label>
                    <input name="incluiu"  class="form-control " id="incluiu" value="<?php 
echo $resultado['USUARIOINCLUIU'];  ?>">
                </div>
            </div>     

        </div>
         <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3">
                    <label for="recipient-name" class="col-form-label"> Servicos:</label>
                    <textarea name="servicos" type="text" class="form-control" 
id="servicos">
                    <?php echo utf8_encode($resultado['SERVICOS']) ;  ?>
                    </textarea>
                </div>
                <div class="col-sm-3 ">
                    <label for="recipient-name" class="col-form-label "> 
Usuario_Alterou:</label>
                    <input name="alterou"  class="form-control " id="alterou" value="<?php 
echo $resultado['USUARIOALTEROU'];  ?>">
                </div>
                     <input  name="handle" type="hidden" id="id_handle" value="<?php echo 
$resultado['HANDLE'];  ?>">
            </div>
        </div>
            <div class="modal-footer ">
                <button type="button" class="btn" ><a href="index.php">Voltar</a></button>
                <button type="submit" class="btn btn-danger">enviar </button>
            </div>
        </form>
    </div>
        
 <!-- chartist chart -->
    <script src="../assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-
tooltip.min.js"></script>
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



