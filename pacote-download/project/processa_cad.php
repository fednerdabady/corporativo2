<?php
include_once 'conn.php';

$file = $_FILES['file']['name'];
$dataentrega = $_POST['dataentrega'];
// Dados da tabela
$tabela = "K_IP_EO_CONTRATO";    #Nome da tabela


$result_pg = "SELECT MAX(HANDLE)  AS HANDLE FROM K_IP_EO_CONTRATO";
$resultado_pg = sqlsrv_query($conn, $result_pg);
$row_pg = sqlsrv_fetch_array($resultado_pg);
$i = 0;
while ($i <= $row_pg['HANDLE']) {
    $i++;
}
$handle = $i;
// var_dump($handle);

$sql2 = "SELECT MAX(NUMERO) AS NUMERO FROM K_IP_EO_CONTRATO ";
$query = sqlsrv_query($conn, $sql2);
$row2 = sqlsrv_fetch_array($query);
// echo $row2['NUMERO'];
$i = 0;
while ($i <= $row2['NUMERO']) {
    $i++;
}
$numero = $i;
// echo $numero
var_dump($numero);

date_default_timezone_set('America/Sao_Paulo');
$data1 = new DateTime();
$data2 = new DateTime();
$datastatus =new DateTime();
$datainclusao =new DateTime();
$data1 = $data1->format('Y');
$data = $data2->format('Y/m/d');
$datastatus = $datastatus->format('Y/m/d H:i:s');
$datainclusao = $datainclusao->format('Y/m/d H:i:s');


$result = "SELECT COUNT(SEQUENCIAL)+1 AS SEQUENCIAL FROM K_IP_EO_CONTRATO WHERE DATAABERTURA BETWEEN '01/01/$data1' AND '12/31/$data1' ";
$resultado = sqlsrv_query($conn, $result);
$row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC);
// var_dump($row['SEQUENCIAL']) ;
$var = $row['SEQUENCIAL'];
$exp = explode(".", $var);
$i = $exp[0];
$text = 'SO ';

$dados = 0;

while ($i <= $row['SEQUENCIAL']) {
    $i++;
}
$dados = '' . $text . '' . $i . '.' . $data1;
// echo $dados;
$seq = $dados;

$situacao = 1;
$status_orcamento = 1;
$status_proposta = 1;
$status_solicitacao = 1;
$empresa = 1;
$origem =4;
$cliente = 32762;
$tiposolicitacao = 70;
$formasolicitacao = 2;
$visitatecnica = 1;
$cartadeclinio = 1;
$usuarioincluiu =991;




$sql = "INSERT INTO K_IP_EO_CONTRATO (HANDLE,EMPRESA, SEQUENCIAL,ORIGEM, NUMERO,DATAABERTURA,DATAENTREGA,CLIENTE,
                TIPOSOLICITACAO,FORMASOLICITACAO,VISITATECNICA,CARTADECLINIO,DATASTATUS,USUARIOINCLUIU,DATAINCLUSAO,
                ANEXOCD,SITUACAO,STATUSORCAMENTO,STATUSPROPOSTA,STATUSSOLICITACAO,ANO )
                VALUES 
                ('{$handle}','{$empresa}','{$seq}','$origem','{$numero}','{$data}','{$dataentrega}','{$cliente}','{$tiposolicitacao}',
                '{$formasolicitacao}','{$visitatecnica}','{$cartadeclinio}','{$datastatus}','{$usuarioincluiu}','{$datainclusao}',
                '{$file}','{$situacao}','{$status_orcamento}','{$status_proposta}','{$status_solicitacao}','{$data1}'
                )";

                
  // echo $sql;         
$stmt = sqlsrv_query($conn, $sql);
if (!$stmt) {
    die(print_r(sqlsrv_errors(), true));
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
    </head>
    <body> <?php
if (sqlsrv_execute($stmt) === false) {
    echo "
                            <META HTTP-EQUIV=REFRESH CONTENT ='0;URL=http://localhost/corporativo2/project/abrir.php'>
                            <script type=\"text/javascript\">
                                    alert(\"Dados Cadastrado com Sucesso...\");
                            </script>
			";
} else {
    echo "
                            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/corporativo2/project/abrir.php'>
                            <script type=\"text/javascript\">
                                    alert(\"Dados não foi Cadastrado com Sucesso...\");
                            </script>
			";
}
?>
    </body>
</html>