<?php 
      // sempre ativar a session_start quando trabalhar com sessões
      session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login Projeto</title>
    <link rel="stylesheet" type="text/css" href="LoginCss.css">
</head>
<body>

    <?php 
                       if(isset($_SESSION['nao_autenticado'])):
                    ?>

                    <div class="notification is-danger">
                      <p>ERRO: Usuário ou senha inválidos.</p>
                    </div>

                    <?php 
                       endif;
                       unset($_SESSION['nao_autenticado']); // não permite q a mensagem de erro apareça sem o usuário digitar algo errado
                       
                    ?>
    <div class="arealogin">
        
        <h3>Entre ou Cadastre-se</h3>
        <hr>
        <form class="login" action="login.php" method="POST">
            
            <p>Usuário</p>
            <input type="text" name="usuario" placeholder="Insira seu usuário">
            <p>Senha</p>
            <input type="password" name="senha" placeholder="Insira sua Senha">
            <br>
            <input type="submit" name="login" value="Login">

            <a href="">Esqueceu a senha?</a>

        </form>
            
        </form>
    </div>

</body>
</html>
