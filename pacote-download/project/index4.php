<?php
//session_start();
include_once("conn.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>CRUD - Listando Informacao</title>
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
     <?php
//session_start();
//ob_start();
//if(!empty($_SESSION['id'])){
   //}else{
   // header("location: login.php");
//}?>
<body class="fix-header fix-sidebar card-no-border logo-center">
    
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
            </svg>
        </div>
    
    <div id="main-wrapper">
        
        <header class="topbar">
                    <nav class="navbar top-navbar navbar-expand-lg navbar-light">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">
                                <b>
                                    <img src="../assets/logo-icon.png" alt="homepage" class="dark-logo"/>
                                    <img src="../assets/logo-light-icon2.png" alt="" class="light-logo"/>
                                </b>
                                <span>
                                    <img src="../assets/logo-text.png" alt="" class="dark-logo"/>
                                    <img src="../assets/logo-light-text1.png" alt=""  class="light-logo" />
                                </span>
                            </a>
                        </div>
                  
                    </nav>
        </header
        
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
                    <div class="scroll-sidebar">            
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li> <a class="has-arrow" aria-expanded="false"><i class="mdi mdi-menu"></i><span class="hide-menu">Listando Dados Benner </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="index.php">Principal</a></li
                                <li><a href="lista.php">Lista</a></li>
                                <li><a href="index2.php">Nome_num</a></li>
                                <li><a href="index3.php">Nome_usuario</a></li>
                                <li><a href="index5.php"> Listar_info2</a></li>
                            </ul>
                        </li> 
                        <li class="nav-devider"></li>
                        </ul>
                    </nav>
                 </div>
        </aside>
                <div class="page-wrapper">     
                    <div class="container-fluid">
                        <div class="row alert-success">    
                            <div class=" col-md-1 col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                                <h1 class="font-light m-b-0"> Registro de Handle</h1>
                                               
                                                <div class="col p-r-0 align-self-center">
                                                <?php
                                                //Paginção - Somar a quantidade de usuários
                                                $result_pg = "SELECT MAX(HANDLE) AS num_result FROM K_IP_EO_CONTRATO ";
                                                $resultado_pg = sqlsrv_query($conn, $result_pg);
                                                $row_pg = sqlsrv_fetch_array($resultado_pg,  SQLSRV_FETCH_ASSOC);
                                                ?>
                                               <h6 class="text-muted">Quantidades</h6>
                                                <h2 class="font-light m-b-0"><?php  echo $row_pg['num_result'];?></h2>
                                              </div>
                                            <div id="div_chart" style="width:100px; height:10px;"></div>
                                        </div>
                                    </div>     
                                
                                 <div class="card">
                                        <div class="card-body" >
                                                <h1 class="font-light m-b-0"> Sequencial</h1>
                                                <div class="col p-r-0 align-self-center">
                                                <?php
                                               
                                                date_default_timezone_set('America/Sao_Paulo');
                                                    $data1 = new DateTime();
                                                    $data1=$data1->format('Y');
                                               
                                                 $result = "SELECT COUNT(SEQUENCIAL)+1 AS NUMBER FROM K_IP_EO_CONTRATO WHERE DATAABERTURA BETWEEN '01/01/$data1' AND '12/31/$data1' ";
                                                    $resultado = sqlsrv_query($conn, $result);
                                                    $row = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC);
                                                   // echo $row['NUMBER'];
                                                    $text='SO '; 
                                                    $i=0;
                                                    $dados=0;

                                                    while( $i<=$row['NUMBER']){
                                                        $i++;
                                                    }
                                                    $dados= ''.$text . ''. $i.'.' .$data1 ;
                                                    echo $dados;
                                                ?>
                                               <h6 class="text-muted">Quantidades de SO :</h6>
                                                
                                                <h2 class="font-light m-b-0"><?php  echo $row['NUMBER'];?></h2>
                                              </div>
                                            <div id="div_chart" style="width:100px; height:10px;"></div>
                                        </div>
                                    </div>                
                            
                             <div class="card">
                                        <div class="card-body" >
                                                <h1 class="font-light m-b-0"> Numero</h1>
                                                <div class="col p-r-0 align-self-center">
                                                <?php
                                               
                                                    $sql2= " SELECT MAX(NUMERO) AS NUMERO FROM K_IP_EO_CONTRATO ";
                                                     $query = sqlsrv_query($conn, $sql2);
                                                     $row2 = sqlsrv_fetch_array($query);
                                                    // echo $row2['NUMERO'];
                                                     $i=0;
                                                     while($i<=$row2['NUMERO']){
                                                      $i++;
                                                    }
                                                ?>
                                               <h6 class="text-muted">Numero:</h6>
                                                <h2 class="font-light m-b-0"><?php  echo $row2['NUMERO'];?></h2>
                                              </div>
                                            <div id="div_chart" style="width:100px; height:10px;"></div>
                                        </div>
                                    </div>                
                            
                            <div class="card">
                                        <div class="card-body" >
                                                <h1 class="font-light m-b-0"> CLiente</h1>
                                                <div class="col p-r-0 align-self-center">
                                                <?php
                                               
//                                                date_default_timezone_set('America/Sao_Paulo');
//                                                    $data1 = new DateTime();
//                                                    $data1=$data1->format('Y');
//                                               
                                                 $result = "SELECT COUNT( DISTINCT NOME) AS NOME FROM GN_PESSOAS ";
                                                    $resultado = sqlsrv_query($conn, $result);
                                                    $row = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC);
                                                   // echo $row['NOME'];
//                                                    $text='SO '; 
//                                                    $i=0;
//                                                    $dados=0;
//
//                                                    while( $i<=$row['NUMBER']){
//                                                        $i++;
//                                                    }
//                                                    $dados= ''.$text . ''. $i.'.' .$data1 ;
//                                                    echo $dados;
                                                ?>
                                               <h6 class="text-muted">Quantidades de Cliente :</h6>
                                                
                                                <h2 class="font-light m-b-0"><?php  echo $row['NOME'];?></h2>
                                              </div>
                                            <div id="div_chart" style="width:100px; height:10px;"></div>
                                        </div>
                                    </div>       
                                
                            </div>
                            
                            <!-- col -->
                                <div class=" col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                                <h1>Listando Informacao </h1>
                                                <?php
                                                if(isset($_SESSION['msg'])){
                                                        echo $_SESSION['msg'];
                                                        unset($_SESSION['msg']);
                                                }

                                               $result_usuarios = " SELECT C.HANDLE,
                                                                       C.TIPOSOLICITACAO,
                                                                        K9_EO_TIPOSOLICITACAO.NOME NOME_TIPO,
                                                                       C.FORMASOLICITACAO,
                                                                       K9_EO_FORMASOLICITACAO.NOME  NOME_FORMA
                                                                    FROM K_IP_EO_CONTRATO C (NOLOCK)
                                                                       INNER JOIN K9_EO_TIPOSOLICITACAO K9_EO_TIPOSOLICITACAO  (NOLOCK) ON 
                                                                       (C.TIPOSOLICITACAO = K9_EO_TIPOSOLICITACAO.HANDLE)
                                                                       INNER JOIN K9_EO_FORMASOLICITACAO K9_EO_FORMASOLICITACAO (NOLOCK)ON 
                                                                       (C.FORMASOLICITACAO = K9_EO_FORMASOLICITACAO.HANDLE)

                                                                     ";
                                                $resultado_usuarios = sqlsrv_query($conn, $result_usuarios);

                                                while($rows_usuario = sqlsrv_fetch_array($resultado_usuarios,SQLSRV_FETCH_ASSOC)){
                                                       // echo "Empresa: " . $rows_usuario['EMPRESA'] . "<br>";
                                                        echo "Tipo_Solicitacao: " . $rows_usuario['TIPOSOLICITACAO'] . "<br>";
                                                        echo "Nome_tipo: " . utf8_encode($rows_usuario['NOME_TIPO']) . "<br>";
                                                        echo "Forma_Solicitacao: " . $rows_usuario['FORMASOLICITACAO'] . "<br>";
                                                        echo "Nome_Forma: " . $rows_usuario['NOME_FORMA'] . "<br><hr>";
                                                        //echo "<a href='proc_apagar.php?handle=" . $rows_usuario['HANDLE'] ."'>apagar</a><br><hr>";
                                                }
                                                ?>	
                                        </div>
                                    </div>                          
                                </div>
                            </div>
                          </div>	   
                        </div>
                    </div>
            <!-- ============================================================== -->
        <footer class="footer"> © 2019 Passaúra </footer>
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
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>





