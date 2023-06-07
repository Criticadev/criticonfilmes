<?php 
session_start();
include_once('conectdb.php');
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php 
        if(!isset($_SESSION['email'])){

            if(isset($_POST['acao'])){
                //Aqui fica a verificação de login 
                $email=$_POST['email'];
                $senha=$_POST['senha'];

                $slct="SELECT * FROM tbusuario WHERE email = '$email' AND senha = '$senha'"; 

                $get = mysqli_query($conexao ,$slct);
                $num = mysqli_num_rows($get);

                

                if($num == 1){
                    //logado som sucesso
                    $_SESSION['email'] = $email;
                    header('Location: Categorya.html');
                } else {
                    header('Location: index.php');
                }

            }
            //caso n exista uma sessão, leva a página login
            include('login.html');
        }

        
    ?>
</body>
</html>