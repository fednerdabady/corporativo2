 <?php
session_start();
ob_start();
$btnCadUsuario = filter_input(INPUT_POST, 'btnCadUsuario', FILTER_SANITIZE_STRING);
if($btnCadUsuario){
	include_once 'conexao.php';
	$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	//var_dump($dados);
	$dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
	
	$result_usuario = "INSERT INTO usuarios (nome, email, usuario, senha) VALUES (
					'" .$dados['nome']. "',
					'" .$dados['email']. "',
					'" .$dados['usuario']. "',
					'" .$dados['senha']. "'
					)";
	$resultado_usario = mysqli_query($strcon, $result_usuario);
	if(mysqli_insert_id($strcon)){
		$_SESSION['msgcad'] = "Usuario cadastrado com sucesso";
		header("Location: painelLogin.php");
	}else{
		$_SESSION['msg'] = "Erro ao cadastrar o usuÃ¡rio";
               // header("location:cadastrar.php");
	}
}
//echo "cliente cadastrado com sucesso...";
echo "<a href= 'consulte.php'>consultar o banco de dados</a></br>";
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
    <title>Cadastro</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    
    <h2>Cadastro</h2>
        <?php
	if(isset($_SESSION['msg'])){
	echo $_SESSION['msg'];
	unset($_SESSION['msg']);
			}  
	?>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(../assets/images/background/user-info.jpg);">        
            <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform"  method="POST" action="">
                    <h3 class="box-title m-b-20">Cadastro</h3>
                     
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="nome" required="" placeholder="Nome"> </div>
                    </div>
                    
                     <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="email" required  placeholder="Email"> </div>
                    </div>
                    
                     <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" name="usuario" required  placeholder="Usuario"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                         <input class="form-control" type="password" name="senha" required  placeholder="Senha"> </div>
                    </div>
                    
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" name="btnCadUsuario" value="cadastrar">Cadastrar
                                
                            </button>
                        </div>
                         </div>
                     
                    <div class="form-group m-b-0">
                          <div class="col-sm-12 text-center">
                          <a href="login.php" class="text-info m-l-5"><b>voltar ao login</b></a>
                           </div>
                      </div>
                </form>
            </div>
          </div>
        </div>
        
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
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
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
   
</body>

</html>
