<?php 
session_start();

if(!isset($_SESSION['msg'])){
    header("location:baixa.php");
    session_destroy();
}
if(isset($_GET['deslogar'])){
    session_destroy();
     header("location:baixa.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Baixar arquivo</title>
    </head>
    <body>
        <div>
             <h1>Arquivos em PDF | <a href="?deslogar">Sair</a></h1>
             
            <ul>
                <li>
                    <p>Ler:</p>
                    <a href="valida.php?file=1">holerite</a><br />
                    <a href="valida.php?file=2">Imposto de renda</a>
                </li>
            </ul>
        </div>
<!--        <h1>Arquivos em PDF | <a href="?deslogar">Sair</a></h1>
        <ul>
            <?php
//            foreach (glob("upload/*.*") as $v ){
//                $name = basename($v);
//                echo '<li><a href="valida.php?file='.$name.'">'.$name.'</a></li>';
//                
//            }
        ?>
        </ul>-->
        
    </body>
</html>

