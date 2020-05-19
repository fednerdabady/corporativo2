<?php
include_once("conn.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <title>CRUD - Listar Cliente</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
        <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
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
  // }else{
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
                </header>
            
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li><i class="mdi mdi-menu"></i><span class="hide-menu">Listando Dados Benner </span>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="index.php">Principal</a></li
                                <li><a href="lista.php">Lista</a></li>
                                <li><a href="index3.php">Nome_usuario</a></li>
                                <li><a href="index4.php"> Listar_info</a></li>
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
                        <div class="row card-outline-primary">    
                            <div class=" col-md-1 col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                                <h1 class="title has-text-grey""> Registro de Handle</h1>
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
                                            <div id="div_chart" style="width:200px; height:90px;"></div>
                                        </div>
                                    </div>     
                                
                                 <div class="card">
                                        <div class="card-body" >
                                                <h1 class="title has-text-grey"> Sequencial</h1>
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
                                            <div id="div_chart" style="width:200px; height:90px;"></div>
                                        </div>
                                    </div>                
                            
                             <div class="card">
                                        <div class="card-body" >
                                                <h1 class="title has-text-grey"> Numero</h1>
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
                                            <div id="div_chart" style="width:200px; height:90px;"></div>
                                        </div>
                                    </div>                
                            
                            
                            <div class="card">
                                        <div class="card-body" >
                                                <h1 class="title has-text-grey"> CLiente</h1>
                                                <div class="col p-r-0 align-self-center">
                                                <?php
//                                               
                                                 $result = "SELECT COUNT( DISTINCT NOME) AS NOME FROM GN_PESSOAS ";
                                                    $resultado = sqlsrv_query($conn, $result);
                                                    $row = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC);
                                                ?>
                                               <h6 class="text-muted">Quantidades de Cliente :</h6>
                                                
                                                <h2 class="font-light m-b-0"><?php  echo $row['NOME'];?></h2>
                                              </div>
                                            <div id="div_chart" style="width:200px; height:90px;"></div>
                                        </div>
                                    </div>       
                                
                            </div>
                            
                            <!-- col -->
                                <div class=" col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                                <h1 class="title has-text-grey">Informaçoes do Cliente</h1>
                                                <h5>
                                                     <?php
                                                if(isset($_SESSION['msg'])){
                                                        echo $_SESSION['msg'];
                                                        unset($_SESSION['msg']);
                                                }

                                               $result_usuarios = "
                                                                        SELECT DISTINCT  A.CLIENTE ,CLIENTE.NOME, CLIENTE.BAIRRO,CLIENTE.COMPLEMENTO ,
                                                                       CLIENTE.LOGRADOURO,CLIENTE.CEP,CLIENTE_MUNICIPIO.NOME NOME_MUNICIPIO,CLIENTE_ESTADO.NOME NOME_ESTADO,
                                                                         CLIENTE_PAIS.NOME NOME_PAIS
                                                                        FROM K_IP_EO_CONTRATO A (NOLOCK)
                                                                        LEFT OUTER JOIN GN_PESSOAS CLIENTE (NOLOCK) ON (CLIENTE.HANDLE = A.CLIENTE)
                                                                         LEFT OUTER JOIN MUNICIPIOS CLIENTE_MUNICIPIO (NOLOCK) ON (CLIENTE_MUNICIPIO.HANDLE = CLIENTE.MUNICIPIO)
                                                                         LEFT OUTER JOIN ESTADOS CLIENTE_ESTADO (NOLOCK) ON (CLIENTE_ESTADO.HANDLE = CLIENTE.ESTADO)
                                                                         LEFT OUTER JOIN PAISES CLIENTE_PAIS (NOLOCK) ON (CLIENTE_PAIS.HANDLE = CLIENTE.PAIS)
                                                                  ";
                                                       
                                                       
                                                                   
                                                $resultado_usuarios = sqlsrv_query($conn, $result_usuarios);

                                                while($rows_usuario = sqlsrv_fetch_array($resultado_usuarios,SQLSRV_FETCH_ASSOC)){
                                                       // echo "Empresa: " . $rows_usuario['EMPRESA'] . "<br>";
                                                        echo "Nome_Cliente: " . utf8_encode($rows_usuario['NOME']) . "<br>";
                                                        echo "Bairro_Cliente: " . utf8_encode($rows_usuario['BAIRRO']) . "<br>";
                                                        echo "Complemento_Cliente: " . utf8_encode($rows_usuario['COMPLEMENTO']) . "<br>";
                                                        echo "Municipio_Cliente: " . utf8_encode($rows_usuario['NOME_MUNICIPIO']) . "<br>";
                                                        echo "Estado_Cliente: " . utf8_encode($rows_usuario['NOME_ESTADO']) . "<br>";
                                                        echo "Logradouro_Cliente: " . utf8_encode($rows_usuario['LOGRADOURO']) . "<br>";
                                                        echo "CEP_Cliente: " . utf8_encode($rows_usuario['CEP']) . "<br>";
                                                        echo "Pais_Cliente: " . utf8_encode($rows_usuario['NOME_PAIS']) . "<br>";
                                                        echo "Numero_Cliente: " . $rows_usuario['CLIENTE'] . "<br><hr>";
                                                       // echo "Data_Abertura: " . $rows_usuario['DATA'] . "<br>";
                                                       // echo "Usuario_Incluiu: " . $rows_usuario['USUARIOINCLUIU'] . "<br>";
                                                        //echo "<a href='proc_apagar.php?handle=" . $rows_usuario['HANDLE'] ."'>apagar</a><br><hr>";
                                                }

                                                ?>	
                                                </h5>
                                               
                                        </div>
                                    </div>                          
                                </div>
                            </div>
                          </div>	   
                        </div>
    </div>
  
            <!-- ============================================================== -->
    <footer class="footer"> © 2019 Passaúra </footer>
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/waves.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/custom.min.js"></script>

    <script type="text/javascript" src="js/jsapi.js"></script>
    <script language="JavaScript1.2">
            /*
            Advanced window scroller script-
            By JavaScript Kit (www.javascriptkit.com)
            Over 200+ free JavaScripts here!
            */

            var currentpos=0,alt=1,curpos1=0,curpos2=-1
            function initialize(){
            startit()
            }
            function scrollwindow(){
            if (document.all)
            temp=document.body.scrollTop
            else
            temp=window.pageYOffset
            if (alt==0)
            alt=1
            else
            alt=0
            if (alt==0)
            curpos1=temp
            else
            curpos2=temp
            if (curpos1!=curpos2){
            if (document.all)
            currentpos=document.body.scrollTop+1
            else
            currentpos=window.pageYOffset+1
            window.scroll(0,currentpos)
            }
            else{
            currentpos=0
            window.scroll(0,currentpos)
            }
            }
            function startit(){
            setInterval("scrollwindow()",30)
            }
            window.onload=initialize
</script>
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>

