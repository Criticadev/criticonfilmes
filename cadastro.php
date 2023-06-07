<?php
    include("conectdb.php");

    if(empty($_POST['usuario']) || empty($_POST['email']) || empty($_POST['senha'])){
        header('Location: Cadastrar.html');
        exit();
    }

    if(isset($_POST['email']))
    {
        $email=$_POST['email'];

        $slct="SELECT * FROM tbusuario WHERE email = '$email'"; 

        $get = mysqli_query($conexao ,$slct);
        $num = mysqli_num_rows($get);

        if($num == 1){            
           header('Location: Cadastrar.html');
        exit();
        }
    }
    
    $usuario=$_POST['usuario'];
    $senha=$_POST['senha'];
    $email=$_POST['email'];

    $sql="INSERT INTO tbusuario(usuario,senha,email) VALUES ('$usuario', '$senha', '$email')";

    if(mysqli_query($conexao, $sql)){
        header('Location: registered.html');
    } else {
        echo "Erro".mysqli_connect_error($conexao);
    }
    mysqli_close($conexao);
?>