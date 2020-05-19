<?php
//session_start();
include_once("conn.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <title> Listar SO </title>
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
                                    <li><a href="index2.php">Nome_num</a></li>
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
                        <div class="row card-outline-success">    
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
                                            <div id="div_chart" style="width:200px; height:90px;"></div>
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
                                               
                                                 $result = "SELECT COUNT(SEQUENCIAL) AS NUMBER FROM K_IP_EO_CONTRATO WHERE DATAABERTURA BETWEEN '01/01/$data1' AND '12/31/$data1' ";
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
                                            <div id="div_chart" style="width:200px; height:90px;"></div>
                                        </div>
                                    </div>                
                            </div>
                            <!-- col -->
                                <div class=" col-lg-8">
                                    <div class="card">
                                        <div class="card-body primary">
                                                <h1>Listando Dados1</h1>
                                                <h3>
                                                <?php
                                                if(isset($_SESSION['msg'])){
                                                        echo $_SESSION['msg'];
                                                        unset($_SESSION['msg']);
                                                        
                                                }
                                                
                                               date_default_timezone_set('America/Sao_Paulo');
                                                $data1 = new DateTime();
                                                $data1=$data1->format('Y');
                                              $result_usuarios =  "SELECT C.HANDLE, C.EMPRESA,C.SEQUENCIAL ,CLIENTE.NOME NOME_CLIENTE , C.SITUACAO,C.STATUSORCAMENTO,C.STATUSPROPOSTA,C.SERVICOS,
                                                                            C.TIPOSOLICITACAO,K9_EO_TIPOSOLICITACAO.NOME NOMETIPO,C.FORMASOLICITACAO,K9_EO_FORMASOLICITACAO.NOME NOMEFORMA,
                                                                            C.RESPONSAVELANALISE,RESPONSAVEL.NOME RESPONSAVELANALISE,C.RESPONSAVELCOMERCIAL,COMERCIAL.NOME RESPONSAVELCOMERCIAL,
                                                                            Z_GRUPOUSUARIOS.NOME NOMEUSUARIO ,C.USUARIOINCLUIU ,CONVERT(VARCHAR(250),C.DATAABERTURA,111)DATA, EMPRESAS.NOME,
                                                                            CONVERT(VARCHAR(250),C.DATAENTREGA,111)DATAENT,C.DOCUMENTO,C.CARTADECLINIO,C.VISITATECNICA,C.TARGET,
                                                                            C.RESPONSAVELJURIDICO,JURIDICO.NOME RESPONSAVELJURIDICO,C.RESPONSAVELTECNICO,TECNICO.NOME  RESPONSAVELTECNICO,
                                                                            C.STATUSSOLICITACAO,C.CLIENTEFINAL,CLIENTEFINAL.NOME NOMEF FROM K_IP_EO_CONTRATO C  (NOLOCK)
                                                                            LEFT OUTER JOIN  Z_GRUPOUSUARIOS  RESPONSAVEL (NOLOCK) ON (C.RESPONSAVELANALISE = RESPONSAVEL.HANDLE)
                                                                            LEFT OUTER JOIN  Z_GRUPOUSUARIOS  COMERCIAL (NOLOCK) ON (C.RESPONSAVELCOMERCIAL = COMERCIAL.HANDLE)
                                                                            LEFT OUTER JOIN  Z_GRUPOUSUARIOS  JURIDICO (NOLOCK) ON (C.RESPONSAVELJURIDICO = JURIDICO.HANDLE)
                                                                            LEFT OUTER JOIN  Z_GRUPOUSUARIOS  TECNICO (NOLOCK) ON (C.RESPONSAVELTECNICO = TECNICO.HANDLE)
                                                                            LEFT OUTER JOIN  Z_GRUPOUSUARIOS  Z_GRUPOUSUARIOS (NOLOCK) ON (C.USUARIOINCLUIU = Z_GRUPOUSUARIOS.HANDLE)
                                                                            LEFT OUTER JOIN GN_PESSOAS CLIENTE(NOLOCK) ON (CLIENTE.HANDLE = C.CLIENTE)
                                                                            LEFT OUTER JOIN GN_PESSOAS  CLIENTEFINAL (NOLOCK) ON (CLIENTEFINAL.HANDLE = C.CLIENTEFINAL)
                                                                            LEFT OUTER JOIN  EMPRESAS EMPRESAS (NOLOCK) ON (EMPRESAS.HANDLE = C.EMPRESA)
                                                                            LEFT OUTER JOIN K9_EO_FORMASOLICITACAO K9_EO_FORMASOLICITACAO(NOLOCK) ON (K9_EO_FORMASOLICITACAO.HANDLE = C.FORMASOLICITACAO)
                                                                            LEFT OUTER JOIN K9_EO_TIPOSOLICITACAO K9_EO_TIPOSOLICITACAO(NOLOCK) ON (K9_EO_TIPOSOLICITACAO.HANDLE    = C.TIPOSOLICITACAO)
                                                                            WHERE C.DATAABERTURA BETWEEN '01/01/$data1' AND '12/31/$data1' ";
                                                                                       
                                                $resultado_usuarios = sqlsrv_query($conn, $result_usuarios);

                                                while($rows_usuario = sqlsrv_fetch_array($resultado_usuarios,SQLSRV_FETCH_ASSOC)){
                                                       // echo "Handle: " . $rows_usuario['HANDLE'] . "<br>";
                                                        echo "Empresa: " .utf8_encode($rows_usuario['NOME']) . "<br>";
                                                        echo "Sequencial: " . $rows_usuario['SEQUENCIAL'] . "<br>";
                                                        echo "Cliente: " . utf8_encode($rows_usuario['NOME_CLIENTE']) . "<br>";
                                                        echo "Cliente_Final: " . utf8_encode($rows_usuario['NOMEF']) . "<br>";
                                                        echo "Usuario_Incluiu: " . $rows_usuario['NOMEUSUARIO'] . "<br>";
                                                        //echo "Responsavel_Analise: " . utf8_encode($rows_usuario['RESP_ANALISE']) . "<br>";
                                                        echo "Data_Abertura: " . $rows_usuario['DATA'] . "<br>";
                                                        echo "Data_Entrega: " . $rows_usuario['DATAENT'] . "<br>";
                                                        echo "Tipo_Solicitacao: "  .utf8_encode($rows_usuario['NOMETIPO'])  . "<br>";
                                                        echo "Forma_Solicitacao: " . utf8_encode($rows_usuario['NOMEFORMA']) .             "<br>";
                                                        echo "Servicos: "          . utf8_encode($rows_usuario['SERVICOS']) . "<br>";
                                                        echo "Documento: "          . utf8_encode($rows_usuario['DOCUMENTO']) . "<br>";

                                                        if($rows_usuario['SITUACAO'] == 1) { echo "Situacao:  Solicitacao <br>"; }
                                                            elseif ($rows_usuario['SITUACAO'] == 2){ echo "Situacao:  Proposta <br>";}
                                                        else {echo "Situacao:  Orcamento <br>";}
                                                        
                                                        if($rows_usuario['TARGET'] == 1) { echo "Target:  Normal <br>"; }
                                                            elseif ($rows_usuario['TARGET'] == 2){ echo "Target:  Budget <br>";}
                                                        else {echo "Target:  Possibilidade <br>";}
                                                        
                                                        if($rows_usuario['CARTADECLINIO'] == 1) { echo "Carta_Declinio:  Não <br>"; }
                                                        else {echo "Carta_Declinio:  Sim <br>";}
                                                        
                                                        if($rows_usuario['VISITATECNICA'] == 1) { echo "Visita_Tecnica:  Sim <br>"; }
                                                        else {echo "Visita_Tecnica:  Não <br>";}
                                                        
                                                        if($rows_usuario['STATUSORCAMENTO'] == 1) { echo "Status_Orcamento:  Em Negociação <br>"; }
                                                            elseif ($rows_usuario['STATUSORCAMENTO'] == 2) { echo "Status_Orcamento:  Revisão <br>"; } 
                                                            elseif ($rows_usuario['STATUSORCAMENTO'] == 3) {echo "Status_Orcamento:  Contemplada <br>";  }
                                                            elseif ($rows_usuario['STATUSORCAMENTO'] == 4) { echo "Status_Orcamento:  Nao Contemplada <br>";  }
                                                        else { echo "Status_Orcamento:  Declinada <br>"; }

                                                        if($rows_usuario['STATUSPROPOSTA'] == 1){ echo "Status_Proposta:  Cadastrada <br>"; }
                                                            elseif ($rows_usuario['STATUSPROPOSTA'] == 2){ echo "Status_Proposta:  Em Elaboração <br>";}
                                                            elseif ($rows_usuario['STATUSPROPOSTA'] == 3){ echo "Status_Proposta: Liberada <br>"; }
                                                            elseif ($rows_usuario['STATUSPROPOSTA'] == 4){ echo "Status_Proposta: Aprovada <br>"; }
                                                            elseif ($rows_usuario['STATUSPROPOSTA'] == 5){echo "Status_Proposta: Declinada <br>"; }
                                                            elseif ($rows_usuario['STATUSPROPOSTA'] == 6){ echo "Status_Proposta: Em Negociação <br>"; }
                                                            elseif ($rows_usuario['STATUSPROPOSTA'] == 7){ echo "Status_Proposta: Revisão <br>"; }
                                                            elseif ($rows_usuario['STATUSPROPOSTA'] == 8){echo "Status_Proposta: Enviadas <br>"; }
                                                        else { echo "Status_Proposta: Aguardando Envio <br>";}
                                                        
                                                        if($rows_usuario['STATUSSOLICITACAO'] == 1){echo "Status_Solicitacao:  Cadastrada <br>"; }
                                                            elseif ($rows_usuario['STATUSSOLICITACAO'] == 2){echo "Status_Solicitacao:  Viabilidade <br>"; }
                                                            elseif ($rows_usuario['STATUSSOLICITACAO'] == 3){echo "Status_Solicitacao:  Aprovada <br>"; }
                                                            elseif ($rows_usuario['STATUSSOLICITACAO'] == 4){ echo "Status_Solicitacao: Encerrada(Perda) <br>"; }
                                                        else { echo "Status_Solicitacao: Declinada <br>";}
                                                        
                                                        echo "Responsavel_Analise  : "          . utf8_encode($rows_usuario['RESPONSAVELANALISE']) . "<br>";
                                                        echo "Responsavel_Comercial  : "          . utf8_encode($rows_usuario['RESPONSAVELCOMERCIAL']) . "<br>";
                                                        echo "Responsavel_Juridico  : "          . utf8_encode($rows_usuario['RESPONSAVELJURIDICO']) . "<br>";
                                                        echo "Responsavel_Tecnico  : "          . utf8_encode($rows_usuario['RESPONSAVELTECNICO']) . "<br>";

            
                                                        echo "<a href='proc_apagar.php?handle=" . $rows_usuario['HANDLE'] ."'></a><br><hr>";
                                                }

                                                ?>	
                                                    </h3>
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
    <script src="../assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js"></script>
    <script type="text/javascript" src="js/loader.js"></script>
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
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
