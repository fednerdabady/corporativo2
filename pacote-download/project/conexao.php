 <?php
//habilita mensagens de erros
ini_set('display_errors', true);
error_reporting(E_ALL);

        $dbhost   = "10.1.1.217";   #Nome do host
        $db       = "CORP_TESTE";   #Nome do banco de dados
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
