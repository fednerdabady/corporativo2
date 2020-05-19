<?php
        $serverName = "10.1.1.217";
        $connectionInfo = array( "Database"=>"CORP_TESTE", "UID"=>"sa", "PWD"=>"@@SA@@##2013##" );
        $conn = sqlsrv_connect( $serverName, $connectionInfo);
        if( $conn === false ) {
             die( print_r( sqlsrv_errors(), true));
        }
        
        $hand       = $_REQUEST['handle'];
        $seq        = $_REQUEST['seq'];
        $empresa    = $_REQUEST['empresa'];
        $cliente    = $_REQUEST['cliente'];
        $abertura   = $_REQUEST['abertura'];
        $servicos   = $_REQUEST['servicos'];
        $alterou    = $_REQUEST['alterou'];
        $incluiu    = $_REQUEST['incluiu'];
       // $numero     = $_REQUEST['numero'];
        $entrega    = $_REQUEST['entrega'];

        $sql = " UPDATE K_IP_EO_CONTRATO SET SEQUENCIAL='$seq',CLIENTE='$cliente',DATAABERTURA='$abertura' , "
                . " USUARIOALTEROU='$alterou', USUARIOINCLUIU='$incluiu',DATAENTREGA='$entrega',EMPRESA='$empresa', "
                . " SERVICOS='$servicos' WHERE HANDLE='$hand' ";  


        $stmt = sqlsrv_query( $conn, $sql);
        if( !$stmt ) {
                die( print_r( sqlsrv_errors(), true));
        }
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(sqlsrv_execute( $stmt ) === false){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://localhost/corporativo2/project/index.php'>
				<script type=\"text/javascript\">
					alert(\"Linha alterado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/corporativo2/project/index.php'>
				<script type=\"text/javascript\">
					alert(\"Linha não foi alterado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>


