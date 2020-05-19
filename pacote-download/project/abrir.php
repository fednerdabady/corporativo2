<?php
include_once 'conn.php';
error_reporting(0);
ini_set("display_errors", 0);
   
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
    <title> Abrir | SO </title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="../assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="../assets/plugins/css-chart/css-chart.css" rel="stylesheet">
    <link href="../assets/plugins/dropzone-master/dist/dropzone.css" rel="stylesheet" type="text/css" />

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

<body class="fix-header fix-sidebar card-no-border logo-center" onload="">
    
     
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    
    <div id="main-wrapper">
        

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor"></h3>
                        <ol class="breadcrumb">
<!--                            <li class="breadcrumb-item"><a href="javascript:void(0)"></a></li>
                            <li class="breadcrumb-item active">Dashboard2</li>-->
                        </ol>
                    </div>
                </div>
               
                        <div class="row">
                             <div class="col-lg-9" style="margin-left: 150px">
                                <div class="card">
                                    <div class="card-body">
                                        <h1 class="title has-text-grey">Abrir SO</h1>
                                        <h6 class="card-subtitle"></h6>
                                        <form method="POST"  action="processa_cad.php" class="dropzone" >
                                            <div class="col-9">
                                                <label for="recipient-name" class="col-form-label "> Sequencial:</label>
                                                <input   readonly="true" id="sequencial" class="form-control "></br>
                                                <label for="recipient-name" class="col-form-label "> Número:</label>
                                                <input   readonly="true"  id="numero"  class="form-control "></br>
                                                <label for="recipient-name" class="col-form-label "> Data_Abertura:</label>
                                                <input   readonly="true" id="data" class="form-control " 
                                                   value="<?php $matricula = date ("d/m/Y"); echo $matricula;?> "></br>
                                                <label for="recipient-name" class="col-form-label "> Data_Entrega:</label>
                                                <input   id="dataentrega" type="date" name="dataentrega" class="form-control " 
                                                    ></br>

                                             </div>  

                                                <input  name="handle"  type="hidden" id="handle" >
                                                <input  name="sequencial"  type="hidden" id="sequencial" >
                                                <input  name="numero"  type="hidden" id="numero">
                                                <input  name="data"  type="hidden" id="data">
                                                
                                                 <div class="fallback ">
                                                     <input name="file" required="" type="file" multiple />
                                                </div>

                                                <div class="footer" >
                                                    <button  class="btn" ><a href="visualizar.php">Visualizar</a></button>
                                                    <button  class="btn" ><a href="index.php">Voltar</a></button>
                                                </div>
                                            
                                        </form>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

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
    <script src="../assets/plugins/dropzone-master/dist/dropzone.js"></script>

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