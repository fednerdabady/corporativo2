<html>
    <body style="background-image:url(../assets/images/background/database.jpg)">
   <?php
      
// Conectando ao banco de dados: 
include_once("conect.php");
// Criando tabela e cabeçalho de dados:
 echo "<table border=1>";
 echo "<tr>";
 echo "<th>id</th>";
 echo "<th>nome</th>";
 echo "<th>email</th>";
 echo "<th>usuario</th>";
 echo "<th>senha</th>";
 echo "</tr>";
  
 $sql = "SELECT * FROM usuarios";
 $resultado = mysqli_query($strcon,$sql) or die("Erro ao retornar dados");
 // Obtendo os dados por meio de um loop while
 while ($registro = mysqli_fetch_array($resultado))
 {
    $id = $registro['id'];
    $nome = $registro['nome'];
    $email = $registro['email'];
    $usuario = $registro['usuario'];
    $senha = $registro['senha'];
     
    echo "<tr>";
    echo "<td>".$id."</td>";
    echo "<td>".$nome."</td>";
    echo "<td>".$email."</td>";
    echo "<td>".$usuario."</td>";
    echo "<td>".$senha."</td>";
    echo "</tr>";
 }
 mysqli_close($strcon);
 echo "</table></br>";
 echo"<a class='btn btn-green' href= 'cadastrar.php'> novo cadastro</a>";
echo" <a  class='btn btn-green'href= 'login.php'> pagina de login</a></br>";
  
 ?>

  <style type="text/css">
        
            .btn{
               font-family: arial;
               font-size: 14px;
               text-transform: uppercase;
               font-weight: 700;
               border: none;
               padding: 10px;
               cursor: pointer;
               display: inline-block;
               text-decoration: none;
            }
            .btn-green{
                background: #cccccc;
                color: #fff;
                box-shadow:0 5px #008183;
            }
            .btn-green:hover{
                background: #006000;
                color: #fff;
                box-shadow:0 5px #003f00;
            }
            .btn-green:active{
                position: relative;
                top: 5px;
                box-shadow:none;
            }
         h3{
             font-family: Futura ;
             width: 100%;
             text-align: center;
             padding-top: 50px;
             padding-bottom: 20px;
              
         }
       form{
                   
        display: block;
        margin: auto;
        margin-top: 20px;
        padding: 10px 20px;
        border: 1px solid #666;
        width: 340px;
        border-radius: 0.3cm;
        background-color: #444;
                    }
        form #field{
             width: 300px;
             padding-left: 10px;
             height: 25px;
             border: 1px solid #ccc;
              border-radius: 0.2cm;
              margin-bottom: 10px;
              background-color: #444;
                        
                   }
        form input[type ="submit"]{
              
              border: none;
              background-color: #444;
              color: #fff;
              border-radius: 0.2cm;
              margin-top: 10px;
              cursor: pointer;
                        
                }
         form h2{
              text-align: center;
             margin-bottom: 20px;
              font-family: arial;
             
                        }
            </style>
            
  </body>
</html>

