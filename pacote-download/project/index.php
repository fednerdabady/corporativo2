<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title> Sistema Corporativo</title>
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
//if(isset($_SESSION['id'])){
//}else{
   // header("location:login.php");
//}?>
<body class="fix-header fix-sidebar card-no-border logo-center" onload="">
     
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    
    <div id="main-wrapper">
        
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="">
                        <b>
                            <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <img src="../assets/images/logo-light-icon2.png" alt="homepage" class="light-logo" />
                        </b>
                        
                        <span>
                         <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                         <img src="../assets/images/logo-light-text1.png" class="light-logo" alt="homepage" />
                        </span> 
                    </a>
                </div>
                
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                       <form  class="form-inline mt-2 mt-md-0 pull-right" method="POST" id="form-pesquisa" action="result.php">
                            <input class="form-control mr-sm-2" placeholder="Search" aria-label="Search" type="text" name="buscar" required>
                             <button class="btn btn-outline-success my-2 my-sm-0" name="seqsend" type="submit" onclick="exibirMensagem()">Pesquisar SO </button>
                        </form> 
                      <!-- <form  class="form-inline mt-2 mt-md-0 pull-right" method="POST" id="form-pesquisa" action="#">
                            <button class="btn btn-outline-primary my-2 my-sm-0" name="seqsend" href="#" type="submit"> Imprimir </button>
                        </form> -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">PERSONAL</li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dados de Benner </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="lista.php">Listando Dados</a></li>
                                <li><a href="index2.php">nome_Numero_cliente</a></li>
                                <li><a href="index3.php">nome_usuario</a></li>
                                <li><a href="index4.php">listando_Informaçao</a></li>
                                <li><a href="index5.php">Listando_info2</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="abrir.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu"> Abrir SO</span></a>

<!--                            <button class="btn"><a href="abrir.php">Abrir SO</a> </button>-->
                        </li>
                        <li>
                            <a class="has-arrow" href="http://localhost/corporativo1/index.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Baixar Holerite </span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor"></h3>
                        <ol class="breadcrumb">
                        </ol>
                    </div>
                </div>
               
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round round-lg align-self-center round-info"><i class="ti-wallet"></i></div>
                                        <div class="m-l-10 align-self-center">
                                            
                                             <?php
                                               require_once 'conn.php';
                                               
                                                date_default_timezone_set('America/Sao_Paulo');
                                                    $data1 = new DateTime();
                                                    $data1=$data1->format('Y');

                                                //Paginção - Somar a quantidade de usuários
                                                $result_pg = "SELECT COUNT(HANDLE) AS num_result FROM K_IP_EO_CONTRATO WHERE DATAABERTURA BETWEEN '01/01/$data1' AND '12/31/$data1' ";
                                                $resultado_pg = sqlsrv_query($conn, $result_pg);
                                                $row_pg = sqlsrv_fetch_array($resultado_pg,  SQLSRV_FETCH_ASSOC);
                                               

                                                ?>
                                            <h3 class="m-b-0 font-lgiht"><?php  echo $row_pg['num_result'];?></h3>
                                            <h5 class="text-muted m-b-0"> Registro de Handle</h5>
                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Column -->
                    <!-- Column -->
             <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round round-lg align-self-center round-warning"><i class="mdi mdi-cellphone-link"></i></div>
                                         <div class="m-l-10 align-self-center">
                                             
                                             <?php
                                               
                                                date_default_timezone_set('America/Sao_Paulo');
                                                    $data1 = new DateTime();
                                                    $data1=$data1->format('Y');
                                               
                                                 $result = "SELECT COUNT(SEQUENCIAL) AS NUMBER FROM K_IP_EO_CONTRATO WHERE DATAABERTURA BETWEEN '01/01/$data1' AND '12/31/$data1' ";
                                                    $resultado = sqlsrv_query($conn, $result);
                                                    $row = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC);
                                                ?>
                                        <h3 class="m-b-0 font-lgiht"><?php  echo $row['NUMBER'];?></h3>
                                        <h5 class="text-muted m-b-0"> Sequencial</h5>
                                     
                                         </div>
                                </div>
                            </div>
                        </div>
            </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round round-lg align-self-center round-primary"><i class="mdi mdi-cart-outline"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <?php
                                               
                                                    $sql2= " SELECT MAX(NUMERO) AS NUMERO FROM K_IP_EO_CONTRATO ";
                                                     $query = sqlsrv_query($conn, $sql2);
                                                     $row2 = sqlsrv_fetch_array($query);
                                                ?>
                                        <h3 class="m-b-0 font-lgiht"><?php  echo $row2['NUMERO'];?></h3>
                                        <h5 class="text-muted m-b-0">Numero</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round round-lg align-self-center round-danger"><i class="mdi mdi-bullseye"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        
                                            <?php
                                                $result = "SELECT COUNT( DISTINCT NOME) AS NOME FROM GN_PESSOAS ";
                                                $resultado = sqlsrv_query($conn, $result);
                                                $row = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC);
                                            ?>
                                        <h3 class="m-b-0 font-lgiht"><?php  echo $row['NOME'];?></h3>
                                        <h5 class="text-muted m-b-0"> Cliente</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
                <!-- Row -->
        <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-wrap">
                                    
                           <table class="table stylish-table">
                               
                            <thead>
                                <tr>
                                    <th><h1>Sequencial</h1></th>
                                     <th><h1>Handle</h1></th>
                                </tr>
                            </thead>
                                    <tbody>
                                        
                                            <?php 
                                             require_once 'conexao2.php';
                                            while($rows = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC) ){
                                               
                                                ?>
                                                <tr>
                                                    
                                                    <td>
                                                        <a  data-toggle="modal"  onclick="getConfirmation()" data-target="#myModal<?php echo $rows['HANDLE']; ?>"><?php echo $rows['SEQUENCIAL']; ?>
                                                        
                                                         </a>
                                                    </td>
                                                    <td>
                                                        <?php echo $rows['HANDLE']; ?>
                                                    </td>
<!--                                                    <td>
                                                        <?php echo $rows['NUMERO']; ?>
                                                    </td>-->
                                                  
                                                        <td>
                                                            
                                                          <?php 
                                                          echo "<a href='form_alterar.php?hand=" . $rows['HANDLE'] . "'> Alterar | </a>";
                                                          echo "<a href='anexos.php?hand=" . $rows['HANDLE'] ."'> Anexo | </a>";
                                                          echo "<a href='envios.php?hand=" . $rows['HANDLE'] ."'> Envio | </a>";
                                                          echo "<a href='documentos.php?hand=" . $rows['HANDLE'] ."'> Doc_Enviados | </a>";
                                                          echo "<a href='escopos.php?hand=" . $rows['HANDLE'] ."'>Escopos | </a>";
                                                        //  echo "<a href='escopos_Service.php?numero=" . $rows['NUMERO'] ."'>Escopos_Servicos | </a>";
                                                          echo "<a href='status.php?hand=" . $rows['HANDLE'] ."'> Status | </a>";
                                                          echo "<a href='protocolo.php?hand=" . $rows['HANDLE'] ."'> Protocolo | </a>";
                                                          ?>
                                                            
                                                        </td>
                                                </tr>
                                            <!-- Inicio Modal -->
                            <div class="modal fade chart-text m-r-10" id="myModal<?php echo $rows['HANDLE']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center" id="myModalLabel"><?php echo 'HANDLE : '. $rows['HANDLE']; ?></h4>
                                        </div>
                                             <div class="modal-body " >
                                                      <!--  <p class="text-primary"><strong><?php echo " HANDLE:           ", $rows['HANDLE']; ?></strong></p>   -->   
                                                        <p class="text-primary"><strong><?php echo " EMPRESA :          "; 
                                                        if($rows['EMPRESA'] == 1){ echo '01 - Matriz - Irmãos Passaúra S/A';}
                                                        ?></strong></p>   
                                                        <p class="text-primary"><strong><?php echo " SEQUENCIAL :       ", $rows['SEQUENCIAL']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " NUMERO :           ", $rows['NUMERO']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " ORIGEM :           ", $rows['ORIGEM']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " CLIENTE :          ", $rows['CLIENTE']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " SERVICOS :         ", utf8_encode($rows['SERVICOS']); ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " TIPO_SOLICITACAO : ", $rows['TIPOSOLICITACAO']; ?></strong></p>
                                                         <p class="text-primary"><strong><?php echo " DATA_ABERTURA :    ",$rows['DATA']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " DATA_ENTREGA :     ", $rows['DATAEnt']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " USUARIO_INCLUIU :  ", $rows['USUARIOINCLUIU']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " USUARIO_ALTEROU :  ", $rows['USUARIOALTEROU']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " FORMA_SOLICITACAO :", $rows['FORMASOLICITACAO']; ?></strong></p> 
                                                        <p class="text-primary"><strong><?php echo " ANEXO_GERAL :      ", $rows['ANEXOGERAL']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " VISITA_TECNICA :   "; 
                                                                if($rows['VISITATECNICA'] == 1){
                                                                    echo 'Sim';
                                                                } else {
                                                                    echo 'Nao';
                                                                }
                                                                        ; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " DATA_PREVISTA :    ", $rows['DATAprev']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " TECNICO_VT :       ", $rows['TECNICOVT']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " LOCAL_VT :         ", $rows['LOCALVT']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " DATAREAL_VT :      ", $rows['DATAreal']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " COMENTARIO_VT :    ", utf8_encode($rows['COMENTARIOVT']); ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " ANEXO_VT :         ", $rows['ANEXOVT']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " CARTA_DECLINIO :   "; 
                                                               if($rows['CARTADECLINIO']==1){
                                                                   echo 'sim';
                                                               } else {
                                                                   echo 'Nao';
                                                               }
                                                                ; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " DATAREGISTRO_CD :  ", $rows['DATAREGISTRO']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " ANEXO_CD :         ", $rows['ANEXOCD']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " DIRETOR :          ", $rows['DIRETOR']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " ORCAMENTISTA :     ", $rows['ORCAMENTISTA']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " DATA_CONCLUSAO :   ", $rows['DATACONCL']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " USUARIO_PROPOSTA : ", $rows['USUARIOPROPOSTA']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " PROPOSTA :         ", $rows['PROPOSTA']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " TEXTO_ASSINATURAS :", $rows['TEXTOASSINATURAS']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " DATA_STATUS :      ", $rows['DATASTAT']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " MOTIVO_STATUS :    ", $rows['MOTIVOSTATUS']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " DATA_INCLUSAO :    ", $rows['DATAINCLUSAO']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " DATA_ALTERACAO :   ", $rows['DATAALTER']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " LIBERADA :         ", $rows['LIBERADA']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " SITUACAO :         "; 
                                                        if($rows['SITUACAO'] == 1) { echo 'solicitacao';} elseif ($rows['SITUACAO'] == 2) {echo 'Proposta';}
                                                        else {echo 'Orçamento';} ; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " PROJETO :          ", $rows['PROJETO']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " STATUS_ORCAMENTO : ";
                                                        if($rows['STATUSORCAMENTO'] == 1) { echo 'Em Negociação'; }   elseif ($rows['STATUSORCAMENTO'] == 2) {echo 'revisão'; }
                                                        elseif ($rows['STATUSORCAMENTO'] == 3) { echo 'Contemplada'; }  elseif ($rows['STATUSORCAMENTO'] == 4) { echo 'Não Contemplada';} 
                                                        else { echo 'Declinada';} ; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " STATUS_PROPOSTA :  ";
                                                        if($rows['STATUSPROPOSTA'] == 1) {echo 'Cadastrada';}  elseif ($rows['STATUSPROPOSTA'] == 2){echo 'Em Elaboração'; }
                                                        elseif ($rows['STATUSPROPOSTA'] == 3) { echo 'Liberada'; }  elseif ($rows['STATUSPROPOSTA'] == 4) { echo 'Aprovada';}
                                                        elseif ($rows['STATUSPROPOSTA'] == 5)  { echo 'Declinada'; } elseif ($rows['STATUSPROPOSTA'] == 6){echo 'Em Negociação'; }
                                                        elseif ($rows['STATUSPROPOSTA'] == 7) {echo 'Revisão';}  elseif ($rows['STATUSPROPOSTA'] == 8){ echo 'Enviadas';  } 
                                                        else {echo 'Aguadando Envio';  }; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " STATUS_SOLICITACAO :   "; 
                                                        if($rows['STATUSSOLICITACAO'] == 1){echo 'Cadastrada';}  elseif ($rows['STATUSSOLICITACAO'] == 2){echo 'Viabilidade';}
                                                        elseif ($rows['STATUSSOLICITACAO'] == 3) { echo 'Aprovada'; }
                                                        elseif ($rows['STATUSSOLICITACAO'] == 4) { echo 'Encerrada(Perda)'; }
                                                        else {echo 'Declinada'; } ; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " LOCAL_OBRA :       ", $rows['LOCALOBRA']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " ENDERECO_OBRA :    ", $rows['ENDERECOOBRA']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " PRAZO_OBRA:       ", $rows['PRAZOOBRA']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " HHDIA :            ", $rows['HHDIA']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " MESBASE :          ", $rows['MESBAS']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " CUSTOTOTAL :       ", $rows['CUSTOTOTAL']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " SUBTOTALUM :       ", $rows['SUBTOTALUM']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " SUBTOTALDOIS :     ", $rows['SUBTOTALDOIS']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " VALORTOTAL :       ", $rows['VALORTOTAL']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " UNIDADEPRAZO :     ", $rows['UNIDADEPRAZO']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " PREPARACAOUNIDADE :    ", $rows['PREPARACAOUNIDADE']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " MOBILIZACAO :       ", $rows['MOBILIZACAO']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " EXECUCAO :          ", $rows['EXECUCAO']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " DESMOBILIZACAO :    ", $rows['DESMOBILIZACAO']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " MOBILIZACAOUNIDADE : ", $rows['MOBILIZACAOUNIDADE']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " EXECUSAOUNIDADE:     ", $rows['EXECUSAOUNIDADE']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " DESMOBILIZACAOUNIDADE :    ", $rows['DESMOBILIZACAOUNIDADE']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " DATAINICIO :          ", $rows['DATAINICIO']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " DATAVENCIMENTO :      ", $rows['DATAVENC']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " TIPOSERVICO :         "; 
                                                                if($rows['TIPOSERVICO'] == 1)
                                                                {
                                                                    echo 'Montagem';
                                                                }elseif ($rows['TIPOSERVICO'] == 2) 
                                                                {
                                                                    echo 'Manutenção'; 
                                                                } else {
                                                                    echo 'Administração';
                                                                }
                                                                
                                                                ; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " MUNICIPIOOBRA :       ", $rows['MUNICIPIOOBRA']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " UFOBRA :              ", $rows['UFOBRA']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " CLIENTEFINAL :        ", $rows['CLIENTEFINAL']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " RESPONSAVELCOMERCIAL :  ", $rows['RESPONSAVELCOMERCIAL']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " RESPONSAVELTECNICO :    ", $rows['RESPONSAVELTECNICO']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " RESPONSAVELJURIDICO :   ", $rows['RESPONSAVELJURIDICO']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " RESPONSAVELELABORACAO : ", $rows['RESPONSAVELELABORACAO']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " RESPONSAVELANALISE :    ", $rows['RESPONSAVELANALISE']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " RESPONSAVELFECHAMENTO : ", $rows['RESPONSAVELFECHAMENTO']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " RAIZ :                  ", $rows['RAIZ']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " DOCUMENTOS :            ", $rows['DOCUMENTOS']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " FOTOS :                 ", $rows['FOTOS']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " HHPREPARACAO :          ", $rows['HHPREPARACAO']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " HHMOBILIZACAO :         ", $rows['HHMOBILIZACAO']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " HHDESMOB:              ", $rows['HHDESMOB']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " TOTALPESSOAS :          ", $rows['TOTALPESSOAS']; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " TARGET :                "; 
                                                                
                                                              if($rows['TARGET'] == 1)
                                                                {
                                                                  echo 'Normal';
                                                                }elseif ($rows['TARGET'] == 2) 
                                                                {
                                                                  echo 'Budget';  
                                                                } else {
                                                                    echo 'Posibilidade';
                                                                }
                                                                        ; ?></strong></p>
                                                        <p class="text-primary"><strong><?php echo " ANO  :                  ", $rows['ANO']; ?></strong></p>
                                                </div>
                                            
                                        </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
                    
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2019  Passaúra</footer>
            
    <!-- All Jquery -->
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
    <script language="javascript">
            function chegada(){
                window.alert("Seja bem-vindo ! ");
            }
            </script>
            <script language="javascript">
               function getConfirmation()
               {
                    var retVal = confirm("Do you want to continue ?");
                    if (retVal === true)
                    {
                        return true;
                    } 
                    else
                   {
                          return (window.location.reload()); ;
                    }
               }
            </script>

            <script type="text/javascript">
            function exibirMensagem()
            {
                var data = new Date();
                alert(data.toString());
            }
            </script>
    </script>
</body>

</html>