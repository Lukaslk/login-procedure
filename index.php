<?php
//Sessão
session_start();

//conexão
require_once 'db_connect.php';

//Verificação
if(isset($_SESSION['Logado'])):
    header('Location: dinamic_css.php');
    die();
endif;

//Botão enviar
if(isset($_POST['btn-logar'])): 
    $erros = array();
    $login = mysqli_escape_string($connect, $_POST['login']);
    $pass = mysqli_escape_string($connect, $_POST['password']);

    if(empty($login) or empty($pass)):
        $erros[] = '<li> O campo login/senha precisa preenchido </li>';
    else:
        $sql = "SELECT email FROM user WHERE email = '$login'";
        $resultado = mysqli_query($connect, $sql);

        if(mysqli_num_rows($resultado) > 0):
            $pass = md5($pass);
            
            $sql = "SELECT * FROM user WHERE email = '$login' AND password = '$pass'";
            $resultado = mysqli_query($connect, $sql);
            
                if(mysqli_num_rows($resultado) == 1):
                   $dados = mysqli_fetch_array($resultado);
                    mysqli_close($connect);
                    $_SESSION['Logado'] = true;
                    $_SESSION['id_user'] = $dados['id'];
                    header('Location: dinamic_css.php');
                else:
                    $erros[] = '<li>Usuário e senha não conferem</li>';
                endif;

        else:
            $erros[] = 'Usuário inexistente';
        endif;
     endif;
endif;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <title>Dinamic CSS</title>
</head>
<body>

    <div class="login">
        <?php

            if(!empty($erros)):
                foreach($erros as $erro):
                    echo $erro;
                endforeach;
            endif;
        ?>
        <img src="img/img.png" class="img_usuario" width="100" height="100" alt="">
        <form method="POST" action="">
            <h1>Faça o seu Login</h1>

            <input type="email" name="login" class="input" class="desfocado" placeholder="Insira seu email" required="required">
            <input type="password" name="password" class="input" class="desfocado" placeholder="Insira sua senha" required="required" pattern="[A-Za-z]+"><br>
            <input type="submit" name="btn-logar" value="LOGAR">
            <input type="submit" name="" value="CANCELAR">

        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>