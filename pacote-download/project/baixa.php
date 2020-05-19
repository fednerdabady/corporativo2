<?php
session_start();

include_once("config.php");
include_once ("connection.php");
include_once("functions.php");

 if(isset($_SESSION['msg'])){
         echo $_SESSION['msg'];
         unset($_SESSION['msg']);
    }
if(isset($_SESSION['msg'])){
     header("Location: index7.php");
     die(); 
}
if(isset($_GET['deslogar'])){
    session_destroy();
     header("location:index.php");
}
if (isset($_POST['entrar'])) {
    $conn = DBConnect();
    $cpf = mysqli_escape_string($conn, $_POST['cpf']);
    $nascimento = mysqli_escape_string($conn, $_POST['nascimento']);

    $teste = DBQuery('pessoas', "WHERE cpf = '$cpf' AND nascimento = '$nascimento'");
    if ($teste) {
         $_SESSION['msg'] = true;
         header("Location: index7.php");
    } else {
       // echo " <script>alert('CPF ou Data de Nascimento ???incorreto!')</script>";
        $_SESSION['msg'] = "<p style='color:red;'>CPF ou Data Nascimento incorreto..</p>";
        header("location: baixa.php");
    }
}
?>
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
<!--        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">-->
        <title>Baixar Arquivo</title>
        <!-- Bootstrap Core CSS -->
        <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/colors/blue.css" id="theme" rel="stylesheet">
       <script type="text/javascript">
            function fMasc(objeto,mascara)
                {
                    obj=objeto
                    masc=mascara
                    setTimeout("fMascEx()",1)
                }
            function fMascEx() 
                {
                    obj.value=masc(obj.value)
                }
                function mCPF(cpf)
                {
                    cpf=cpf.replace(/\D/g,"")
                    cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
                    cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
                    cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
                    return cpf
		}

                
                function formatar(src, mask)
                {
                  var i = src.value.length;
                  var saida = mask.substring(0,1);
                  var texto = mask.substring(i)
                if (texto.substring(0,1) != saida)
                  {
                                src.value += texto.substring(0,1);
                  }
                }
        </script>
    </head>
    <body>
        <h3 class="title has-text-grey">download Arquivo PDF | <a href="?deslogar">Sair</a></h3>
     
        <!-- ============================================================== -->
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" 
                    stroke-miterlimit="10" /> </svg>
        </div>
        <!-- ============================================================== -->
        <section class="hero is-success is-fullheight">
            <div class="login-register" style="">        
                <div class="login-box card">
                    <div class="card-body">
                        <form class="form-horizontal form-material" id="loginform"  method="POST" 
                              action="">
                             
                            <h3 class="box-title m-b-20">Baixar Holerite</h3>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control" name="cpf" required="" id="cpf"
                                           placeholder="CPF" autofocus="" type="text" onkeydown="javascript: fMasc( this, mCPF );" size="20" maxlength="14" maxlengt="14"> </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <input class="form-control" type="text" name="nascimento" 
                                           required="" placeholder="Data_Nascimento" id="nascimento" onkeypress="formatar(this, ####-##-##')" size="20" maxlength="10" maxlengt="9"></div>
                            </div>

                            <div class="form-group text-center m-t-20">
                                <div class="col-xs-12">
                                    <button class="btn btn-info btn-lg btn-block text-uppercase 
                                            waves-effect waves-light" type="submit" name="entrar">Download
                                    </button>
                                    
                                </div>
                            </div>

                    </div>
                    </form>
                    </P>
                </div>
            </div>
        </div>
    </section>
 <footer class="footer"> © 2019  Passaúra</footer>
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

