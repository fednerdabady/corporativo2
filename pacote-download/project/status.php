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
    $result = "SELECT S.TIPO, S.STATUS,CONVERT(VARCHAR(250),S.DATA)DAT, "
            . "S.TIPOPROPOSTA,S.OBSERVACAO, Z_GRUPOUSUARIOS.NOME NOMEUSUARIO "
            . "FROM K_IP_EO_CONTRATOSTATUS S (NOLOCK)"
            . "LEFT OUTER JOIN Z_GRUPOUSUARIOS Z_GRUPOUSUARIOS (NOLOCK) ON "
            . "(S.USUARIO = Z_GRUPOUSUARIOS.HANDLE)"
            . "WHERE S.CONTRATO = $hand";
            
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
    
    <div class="container">
        <div class="row">
             <div class=" col-sm">
                   <label for="recipient-name" class="col-form-label "> Data:</label>
                   <input name="dat" class="form-control " id="dat" value="<?php
//                   $data=$resultado['DAT'];
//                   function ConverteData($data){
//                       if(strstr($data, "/")){
//                           $d = explode("/", $data);
//                           $trdata = "$d[2]-$d[1]-$d[0]";
//                       }else{
//                           $d = explode("-", $data);
//                            $trdata = "$d[2]-$d[1]-$d[0]";
//                       }
//                       return$trdata;
//                   }
                   echo $resultado['DAT'];  ?>">
                </div>
                <div class="col-sm ">
                   <label for="recipient-name" class="col-form-label "> Tipo:</label>
                   <input name="tipo" type="text" class="form-control " id="dat" value="<?php 
                   if($resultado['TIPO'] == 1){
                        echo 'Solicitação' ;
                   } elseif ($resultado['TIPO'] == 2) {
                        echo 'Proposta' ;
                   }
                   else {
                       echo 'Orçamento' ;
                    }
                    ?>">
                </div>
                <div class=" col-sm">
                    <label for="recipient-name" class="col-form-label "> Status:</label>
                    <input name="status" type="" class="form-control " value="<?php  
                        if($resultado['STATUS']          == 1)           { echo'Cadastrar' ;     }   elseif ($resultado['STATUS']  == 2)   {  echo'Em Elaboração' ;}
                            elseif ($resultado['STATUS'] == 3)  { echo'Liberada' ;               }elseif ($resultado['STATUS']     == 4)   { echo'Aprovada' ;      } 
                            elseif ($resultado['STATUS'] == 5)  { echo'Declinada' ;              }  elseif ($resultado['STATUS']   == 6)   { echo'Em Negociação' ; } 
                            elseif ($resultado['STATUS'] == 7)  { echo'Em Revisão' ;             } elseif ($resultado['STATUS']    == 8)   { echo'Viabilidade' ;   }   
                            elseif ($resultado['STATUS'] == 9)  { echo'Em Execução/Encerrada' ;  } elseif ($resultado['STATUS']    == 10)  { echo'Enviada' ;       }
                            elseif ($resultado['STATUS'] == 11) { echo'Em Analise' ;             }  elseif ($resultado['STATUS']   == 12)  { echo'Finalizada' ;    } 
                            elseif ($resultado['STATUS'] == 13) {echo'Encerrada(Perda)' ;        }    elseif ($resultado['STATUS'] == 14)  { echo'Comtemplada' ;   }  
                            elseif ($resultado['STATUS'] == 15) {  echo'Não Comtemplada' ;       }   else  { echo'Aguadando Envio' ;       }
                     ?>">
                </div>
            <div class="container">
                <div class="row">
                    <div class=" col-sm">
                        <label for="recipient-name" class="col-form-label "> Tipo_Proposta:</label>
                        <input name="tipo" type="" class="form-control " value="<?php   echo $resultado['TIPOPROPOSTA'];  ?>">
                    </div>
                    <div class="col-sm">
                      <label for="recipient-name" class="col-form-label"> Observação:</label>
                      <textarea name="observacao" type="text" class="form-control" >
                       <?php echo utf8_encode($resultado['OBSERVACAO']);  ?>
                       </textarea>
                    </div>
                    <div class="col-sm">
                      <label for="recipient-name" class="col-form-label"> Usuario:</label>
                      <input name="usuario" type="text" class="form-control"  value="<?php echo $resultado['NOMEUSUARIO'];  ?>">
                    </div>
                   
                </div>
                    <div class=" modal-footer ">
                     <button type="button" class="btn btn-success col-2" ><a href="index.php">Voltar</a></button>
                    </div>
                </div>
            </div>
        </div>
            
    <footer class="footer"> © 2019  Passaúra</footer>
    
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




