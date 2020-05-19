<?php
include_once 'conn.php';

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title> Buscar SO </title>
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
<body class="fix-header fix-sidebar card-no-border logo-center">
    
            <div class="preloader">
                <svg class="circular" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
                </svg>
            </div>
    <div id="main-wrapper">
        
        <header class="topbar">
                    <nav class="navbar top-navbar navbar-expand-lg navbar-light">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">
                                <b>
                                    <img src="../assets/logo-icon.png" alt="homepage" class="dark-logo"/>
                                    <img src="../assets/logo-light-icon2.png" alt="" class="light-logo"/>
                                </b>
                                <span>
                                    <img src="../assets/logo-text.png" alt="" class="dark-logo"/>
                                    <img src="../assets/logo-light-text1.png" alt=""  class="light-logo" />
                                </span>
                            </a>
                        </div>
<!--                  <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                       <form  class="form-inline mt-2 mt-md-0 pull-right" method="POST" id="form-pesquisa" action="#">
                            <input class="form-control mr-sm-2" placeholder="Search" aria-label="Search" type="text" name="buscar" required>
                             <button class="btn btn-outline-success my-2 my-sm-0" name="seqsend" type="submit" onclick="exibirMensagem()"> Imprimir </button>
                        </form> 
                      
                    </ul>
                </div>-->
                    </nav>
                </header>
        
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                        <ul id="sidebarnav">
 
                        <li class="nav-devider"></li>
                        </ul>
                    </nav>
                 </div>
           </aside>
         <div class="page-wrapper">
                    <div class="container-fluid">
                        <div class="row">    
                            <div class=" col-lg-6">
                                    <div class="card">
                                        <div class="card-body primary">
                                            <?php
                                            require_once 'conn2.php';
                                            
                                             ?>
                                               
                                                <form class="form-inline mt-2 mt-md-0">
                                                     <a href="index.php">Voltar</a>
                                                    <button class="btn btn-outline-success my-2 my-sm-0" onclick="imprime()">imprimir </button>

<!--                                                    <input type="button" name="imprimir" value="imprimir" onclick="imprime()" />-->
                                               </form>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
         </div>        
    </div>

        <footer class="footer"> © 2019 Passaúra </footer>
        
        <script language="javascript">
            function imprime(text)
            {
                text=document
                print(text)
            }
        </script>
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
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    
</body>
</html>
