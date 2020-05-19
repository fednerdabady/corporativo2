<?php
//habilita mensagens de erros
ini_set('display_errors', true);
error_reporting(E_ALL);
            
            $dbhost   = "10.1.1.6";   #Nome do host
            $db       = "corporativo";   #Nome do banco de dados
            $user     = "sa"; #Nome do usuário
            $password = "@@SA@@##2013##";   #Senha do usuário

        $connectionInfo = array( "UID"=>$user,                              
                             "PWD"=>$password,                              
                             "Database"=>$db); 
                        
            /* Connect using SQL Server Authentication. */    
        $conn = sqlsrv_connect( $dbhost, $connectionInfo); 
       
            if($conn==FALSE){
                die( print_r( sqlsrv_errors(), true));
                          
                }
                
//                date_default_timezone_set('America/Sao_Paulo');
//                                                $data1 = new DateTime();
//                                                $data1=$data1->format('Y');
                                                
        $result = "SELECT C.HANDLE, C.EMPRESA,C.SEQUENCIAL ,C.CLIENTE, "
                . "CONVERT(VARCHAR(250),DATAABERTURA,111)DATA,C.FORMASOLICITACAO,C.ANEXOGERAL,C.VISITATECNICA,C.DIRETOR, "
                . " C.USUARIOINCLUIU, C.NUMERO,C.ORIGEM,CONVERT(VARCHAR(250),DATAENTREGA,111)DATAEnt,"
                . "C.TIPOSOLICITACAO,CONVERT(VARCHAR(250),DATAPREVISTAVT,111 )DATAprev,C.USUARIOALTEROU , "
                . "C.TECNICOVT,C.LOCALVT,C.COMENTARIOVT,C.ANEXOVT, "
                . "CONVERT(VARCHAR(250),DATAREALVT,111 )DATAreal,C.CARTADECLINIO,C.SERVICOS,C.ANEXOCD, "
                . "CONVERT(VARCHAR(250),DATAREGISTROCD,111 )DATAREGISTRO,C.ORCAMENTISTA,C.PROPOSTA, "
                . "CONVERT(VARCHAR(250),DATACONCLUSAO,111 )DATACONCL,C.USUARIOPROPOSTA,C.TEXTOASSINATURAS, "
                . "CONVERT(VARCHAR(250),DATASTATUS,111 )DATASTAT,C.MOTIVOSTATUS,C.LIBERADA,C.SITUACAO, "
                . "CONVERT(VARCHAR(250),DATAINCLUSAO,111 )DATAINCLUSAO,C.PROJETO,C.STATUSORCAMENTO,C.STATUSPROPOSTA,"
                . "CONVERT(VARCHAR(250),DATAALTERACAO,111 )DATAALTER,C.STATUSSOLICITACAO,C.LOCALOBRA,C.ENDERECOOBRA, "
                . "CONVERT(VARCHAR(250),MESBASE,111 )MESBAS,C.PRAZOOBRA,C.HHDIA,C.CUSTOTOTAL,C.CONTINGENCIA, "
                . "C.SUBTOTALUM,C.SUBTOTALDOIS,C.VALORTOTAL,C.UNIDADEPRAZO,C.PREPARACAOUNIDADE,C.MOBILIZACAO,C.EXECUCAO, "
                . "C.DESMOBILIZACAO,C.MOBILIZACAOUNIDADE,C.EXECUSAOUNIDADE,C.DESMOBILIZACAOUNIDADE, "
                . "CONVERT(VARCHAR(250),DATAINICIO,111 )DATAINICIO,CONVERT(VARCHAR(250),DATAVENCIMENTO,111 )DATAVENC, "
                . "C.TIPOSERVICO,C.MUNICIPIOOBRA,C.UFOBRA,C.CLIENTEFINAL,C.RESPONSAVELCOMERCIAL,C.RESPONSAVELTECNICO, "
                . "C.RESPONSAVELJURIDICO,C.RESPONSAVELELABORACAO,C.RESPONSAVELANALISE,C.RESPONSAVELFECHAMENTO, "
                . "RAIZ,DOCUMENTOS,FOTOS,HHPREPARACAO,HHMOBILIZACAO,HHDESMOB,TOTALPESSOAS,TARGET, "
                . "C.ANO FROM K_IP_EO_CONTRATO C (NOLOCK) ";
               // . "WHERE C.DATAABERTURA BETWEEN '01/01/$data1' AND '12/31/$data1'";
               // . "LEFT OUTER JOIN GN_PESSOAS CLIENTE (NOLOCK) ON (CLIENTE.HANDLE = C.CLIENTE)";
	$resultado = sqlsrv_query( $conn, $result);

