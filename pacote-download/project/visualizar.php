<?php
//$dbhost   = "10.1.1.6";   #Nome do host
//    $db       = "corporativo";   #Nome do banco de dados
//    $user     = "sa"; #Nome do usuário
//    $password = "@@SA@@##2013##";   #Senha do usuário
//       
//        // Conexão com o banco
//    $conninfo = array("Database" => $db, "UID" => $user, "PWD" => $password,"ReturnDatesAsStrings" =>1);
//    $conn = sqlsrv_connect($dbhost, $conninfo);
//
//        if($conn==FALSE)
//            {
//                die( print_r( sqlsrv_errors(), true));
//            }
            
$serverName = "10.1.1.217";
$connectionInfo = array("Database" => "CORP_TESTE", "UID" => "sa", "PWD" => "@@SA@@##2013##"
);
$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}


$result=" SELECT TOP 1 HANDLE,SEQUENCIAL,NUMERO,CONVERT(VARCHAR(250),DATAABERTURA,111)DATA,ANEXOCD FROM K_IP_EO_CONTRATO"
               . " ORDER BY HANDLE DESC";

$dados = sqlsrv_query($conn, $result);
$resultado = sqlsrv_fetch_array($dados);
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
    <title> Visualizar </title>
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
    <!-- You can change the theme colors from here -->
    <link href="css/colors/megna.css" id="theme" rel="stylesheet">
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jquery-jvectormap-2.0.2.css" rel="stylesheet" type="text/css"/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/.css" rel="stylesheet" type="text/css"/>
    <script src="jss/jsapi.js" type="text/javascript"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
</head>
<body class="fix-header fix-sidebar card-no-border logo-center" onload="">
    
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    
    <div id="main-wrapper">
        
        <div class="page-wrapper">
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor"></h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)"></a></li>
                            <li class="breadcrumb-item active"></li>
                        </ol>
                    </div>
                </div>
               
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form>
                           
                                <div class="col-3">
                                    <label for="recipient-name" class="col-form-label "> Handle:</label>
                                    <input name="handle" readonly="true"
                                           value="<?php echo $resultado['HANDLE']; ?>">
                                </div>
                                <div class="col-3">
                                    <label for="recipient-name" class="col-form-label "> sequencial:</label>
                                    <input name="sequencial"  readonly="true" id="empresa" 
                                    value="<?php echo $resultado['SEQUENCIAL']; ?>">
                                </div>
                                <div class=" col-3">
                                    <label for="recipient-name" class="col-form-label"> numero:</label>
                                    <input name="numero"    readonly="true" value="<?php echo
                                        $resultado['NUMERO'];?>">
                                </div>
                                <div class=" col-3">
                                    <label for="recipient-name" class="col-form-label"> Data_Abertura:</label>
                                    <input name="data"  readonly="true" value="<?php echo
                                        $resultado['DATA'];?>">
                                </div>
                               <div class="col-3">
                                    <label for="recipient-name" class="col-form-label"> Anexo:</label>
                                    <input name="anexo"  readonly="true" value="<?php echo
                                        $resultado['ANEXOCD'];?>">
                                </div>
                           
                            <div class="modal-footer ">
                                    <button type="button" class="btn" ><a href="abrir.php">Voltar</a></button>
                            </div>
                     </form>

                </div>
                            
            </div>
        </div>
    </div>
                 <footer class="footer"> © 2019  Passaúra</footer>
    <script src="js/waves.js"></script>
        <!--Menu sidebar -->
        <script src="js/sidebarmenu.js"></script>
        <script src="js/custom.min.js"></script>
        <script src=""></script>
        <!-- Style switcher -->
        
        <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
        <script src="jss/bootstrap.min.js"></script>
        <script src="jss/jquery.slimscroll.js" type="text/javascript"></script>
        
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
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
    <script src="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js"></script>
    <script type="text/javascript" src="js/loader.js"></script>
    <script type="text/javascript" src="js/jsapi.js"></script>
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>





