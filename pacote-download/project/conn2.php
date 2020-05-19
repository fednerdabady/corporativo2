<?php

//habilita mensagens de erros
ini_set('display_errors', true);
error_reporting(E_ALL);

    $buscar = $_POST['buscar'];
        $result = " SELECT C.EMPRESA,C.SEQUENCIAL,C.CLIENTE,CONVERT(VARCHAR(250),DATAABERTURA,111)DATA, "
                   . " C.USUARIOINCLUIU,Z_GRUPOUSUARIOS.NOME NOMEUSUARIO,C.LIBERADA,C.STATUSORCAMENTO, "
                   . "EMPRESAS.NOME NOMEEMPR, CONVERT(VARCHAR(250),DATAENTREGA,111)DATAENT,C.STATUSPROPOSTA, "
                   . "C.FORMASOLICITACAO,C.SERVICOS,C.TIPOSOLICITACAO,C.SITUACAO,C.STATUSSOLICITACAO, "
                   . "GN_PESSOAS.NOME NOME_CLIENTE , K9_EO_TIPOSOLICITACAO.NOME,K9_EO_FORMASOLICITACAO.NOME NOMEFORMA,"
                   . "C.CLIENTEFINAL,FINAL.NOME CLIENTEFINAL,C.RESPONSAVELTECNICO,TECNICO.NOME RESPONSAVELTECNICO,"
                   . "C.RESPONSAVELCOMERCIAL,COMERCIAL.NOME RESPONSAVELCOMERCIAL,C.RESPONSAVELJURIDICO, "
                   . "JURIDICO.NOME RESPONSAVELJURIDICO,C.RESPONSAVELANALISE,ANALISE.NOME RESPONSAVELANALISE, "
                   . "C.CARTADECLINIO, VISITATECNICA,DOCUMENTO,C.TARGET,C.CUSTOTOTAL,C.RESPONSAVELELABORACAO,ELABORACAO.NOME RESPONSAVELELABORACAO "
                   . "FROM K_IP_EO_CONTRATO C (NOLOCK) "
                   . "LEFT OUTER JOIN EMPRESAS EMPRESAS (NOLOCK) ON    (EMPRESAS.HANDLE     = C.EMPRESA) "
                   . "LEFT OUTER JOIN GN_PESSOAS GN_PESSOAS(NOLOCK) ON (GN_PESSOAS.HANDLE   = C.CLIENTE) "
                   . "LEFT OUTER JOIN GN_PESSOAS FINAL(NOLOCK) ON (FINAL.HANDLE   = C.CLIENTEFINAL) "
                   . "LEFT OUTER JOIN K9_EO_TIPOSOLICITACAO K9_EO_TIPOSOLICITACAO(NOLOCK) ON (K9_EO_TIPOSOLICITACAO.HANDLE    = C.TIPOSOLICITACAO) "
                   . "LEFT OUTER JOIN K9_EO_FORMASOLICITACAO K9_EO_FORMASOLICITACAO(NOLOCK) ON (K9_EO_FORMASOLICITACAO.HANDLE = C.FORMASOLICITACAO) "
                   . "LEFT OUTER JOIN Z_GRUPOUSUARIOS  Z_GRUPOUSUARIOS(NOLOCK) ON (C.USUARIOINCLUIU = Z_GRUPOUSUARIOS.HANDLE) "
                   . "LEFT OUTER JOIN Z_GRUPOUSUARIOS  TECNICO (NOLOCK) ON (C.RESPONSAVELTECNICO = TECNICO.HANDLE) "
                   . "LEFT OUTER JOIN Z_GRUPOUSUARIOS  COMERCIAL (NOLOCK) ON (C.RESPONSAVELCOMERCIAL = COMERCIAL.HANDLE) "
                   . "LEFT OUTER JOIN Z_GRUPOUSUARIOS  JURIDICO (NOLOCK) ON (C.RESPONSAVELJURIDICO = JURIDICO.HANDLE) "
                   . "LEFT OUTER JOIN Z_GRUPOUSUARIOS  ANALISE (NOLOCK) ON (C.RESPONSAVELANALISE = ANALISE.HANDLE) "
                   . "LEFT OUTER JOIN Z_GRUPOUSUARIOS  ELABORACAO (NOLOCK) ON (C.RESPONSAVELELABORACAO = ELABORACAO.HANDLE) "
                   . "WHERE  C.SEQUENCIAL LIKE '%".$buscar."%' ";

       $resultado = sqlsrv_query($conn, $result);

      while ($rows_usuario = sqlsrv_fetch_array($resultado,SQLSRV_FETCH_ASSOC)){
          
           echo "<h5>Empresa                : "           . utf8_encode($rows_usuario['NOMEEMPR']) .        "</h5><br>";
           echo "<h5>Sequencial             : "        . $rows_usuario['SEQUENCIAL'] .                   "</h5><br>";
           echo "<h5>Cliente                : "           .utf8_encode($rows_usuario['NOME_CLIENTE'] ) .    "</h5><br>";
           echo "<h5>Cliente_Final          : "           .utf8_encode($rows_usuario['CLIENTEFINAL'] ) .    "</h5><br>";
           echo "<h5>Data_Abertura          : "     . $rows_usuario['DATA'] .                         "</h5><br>";
           echo "<h5>Data_Entrega           : "      . $rows_usuario['DATAENT'] .                      "</h5><br>";
           echo "<h5>Servicos               : "          . utf8_encode($rows_usuario['SERVICOS']) .        "</h5><br>";
           echo "<h5>Documento               : "          . utf8_encode($rows_usuario['DOCUMENTO']) .        "</h5><br>";
           echo "<h5>Tipo_Solicitacao       : "  .utf8_encode($rows_usuario['NOME'])  .            "</h5><br>";
           echo "<h5>Forma_Solicitacao      : " . utf8_encode($rows_usuario['NOMEFORMA']) .                    "</h5><br>";
           echo "<h5>Usuario_Incluiu        : "   . $rows_usuario['NOMEUSUARIO'] .                  "</h5><br>";
           echo "<h5>Responsavel_Tecnico    : "   . $rows_usuario['RESPONSAVELTECNICO'] .                  "</h5><br>";
           echo "<h5>Responsavel_Comercial  : "   . $rows_usuario['RESPONSAVELCOMERCIAL'] .                  "</h5><br>";
           echo "<h5>Responsavel_Juridico   : "   . $rows_usuario['RESPONSAVELJURIDICO'] .                  "</h5><br>";
           echo "<h5>Responsavel_Analise   : "   . $rows_usuario['RESPONSAVELANALISE'] .                  "</h5><br>";
           echo "<h5>Responsavel_Elaboracao   : "   . $rows_usuario['RESPONSAVELELABORACAO'] .                  "</h5><br>";
           echo "<h5>Liberada               : "          . $rows_usuario['LIBERADA'] .                     "</h5><br>";
           echo "<h5>Valor_Aprovado               : "          .number_format($rows_usuario['CUSTOTOTAL'])  .    "</h5><br>";

            if($rows_usuario['CARTADECLINIO'] == 1) { echo "<h5>Carta_Declinio: Não </h5><br>"; }
            else {echo "<h5>Carta_Declinio:  Sim </h5><br>";}
            
            if($rows_usuario['VISITATECNICA'] == 1) { echo " <h5>Visita_Tecnica:  Sim </h5><br>"; }
              else {echo " <h5>Visita_Tecnica:  Não </h5><br>";}
            
            if($rows_usuario['SITUACAO'] == 1) { echo "<h5>Situacao:  Solicitacao </h5><br>"; }
                elseif ($rows_usuario['SITUACAO'] == 2){ echo "<h5>Situacao:  Proposta </h5><br>";}
            else {echo "<h5>Situacao:  Orcamento </h5><br>";}
            
            if($rows_usuario['TARGET'] == 1) { echo "<h5>Target:  Normal </h5><br>"; }
                elseif ($rows_usuario['TARGET'] == 2){ echo "<h5>Target:  Budget </h5><br>";}
            else {echo "<h5>Target:  Possibilidade </h5><br>";}
            
            if($rows_usuario['STATUSORCAMENTO'] == 1) { echo "<h5>Status_Orcamento:  Em Negociação </h5><br>"; }
                elseif ($rows_usuario['STATUSORCAMENTO'] == 2) { echo "<h5>Status_Orcamento:  Revisão </h5><br>"; } 
                elseif ($rows_usuario['STATUSORCAMENTO'] == 3) {echo "<h5>Status_Orcamento:  Contemplada </h5><br>";  }
                elseif ($rows_usuario['STATUSORCAMENTO'] == 4) { echo "<h5>Status_Orcamento:  Nao Contemplada </h5><br>";  }
            else { echo "<h5>Status_Orcamento:  Declinada </h5><br>"; }
            
            if($rows_usuario['STATUSPROPOSTA'] == 1){ echo "<h5>Status_Proposta:  Cadastrada </h5><br>"; }
                elseif ($rows_usuario['STATUSPROPOSTA'] == 2){ echo "<h5>Status_Proposta:  Em Elaboração </h5><br>";}
                elseif ($rows_usuario['STATUSPROPOSTA'] == 3){ echo "<h5>Status_Proposta: Liberada </h5><br>"; }
                elseif ($rows_usuario['STATUSPROPOSTA'] == 4){ echo "<h5>Status_Proposta: Aprovada </h5><br>"; }
                elseif ($rows_usuario['STATUSPROPOSTA'] == 5){echo "<h5>Status_Proposta: Declinada </h5><br>"; }
                elseif ($rows_usuario['STATUSPROPOSTA'] == 6){ echo "<h5>Status_Proposta: Em Negociação </h5><br>"; }
                elseif ($rows_usuario['STATUSPROPOSTA'] == 7){ echo "<h5>Status_Proposta: Revisão </h5><br>"; }
                elseif ($rows_usuario['STATUSPROPOSTA'] == 8){echo "<h5>Status_Proposta: Enviadas </h5><br>"; }
            else { echo "<h5>Status_Proposta: Aguardando Envio </h5><br>";}
            
            if($rows_usuario['STATUSSOLICITACAO'] == 1){echo "<h5>Status_Solicitacao:  Cadastrada </h5><br>"; }
                elseif ($rows_usuario['STATUSSOLICITACAO'] == 2){echo "<h5>Status_Solicitacao:  Viabilidade </h5><br>"; }
                elseif ($rows_usuario['STATUSSOLICITACAO'] == 3){echo "<h5>Status_Solicitacao:  Aprovada </h5><br>"; }
                elseif ($rows_usuario['STATUSSOLICITACAO'] == 4){ echo "<h5>Status_Solicitacao: Encerrada(Perda) </h5><br>"; }
            else { echo "<h5>Status_Solicitacao: Declinada </h5><br>";}
            


           //echo "Data_Inclusao: " . $rows_usuario['DATAINCLUSAO'] . "<br>";
         
      }

