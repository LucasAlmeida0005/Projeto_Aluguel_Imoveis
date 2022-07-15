<?php
session_start();
include_once 'configuracao.php';

$id = $_GET['id'];

$dbh = new PDO('mysql:host=127.0.0.1; dbname=projeto', 'root', '');

          $sth = $dbh->prepare('SELECT * FROM cadastro WHERE id = :id' );
          $sth->bindParam(':id', $id, PDO::PARAM_STR);
          $sth->execute();
          $dado = $sth->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Editar</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
       

    <?php
    if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }

      if(count($dado)){
        foreach($dado as $dado){
    ?>
    <div class="form">
    
         <form method="POST" action="proc_edit_msg.php">
                <div class="form-header">
                    <div class="title">
                        <h1>Atualize seus dados</h1>
                    </div>
                </div>

                <input type="hidden" name="id" value="<?php if(isset($dado['id'])){ echo $dado['id']; } ?>">

                <div class="input-group">
                    <div class="input-box">
                        <label for="nome">Primeiro Nome</label>
                        <input id="nome" type="text" name="nome" placeholder="Digite seu primeiro nome" value="<?php if(isset($dado['nome'])){ echo $dado['nome']; } ?>" required>
                    </div>

                    <div class="input-box">
                        <label for="sobrenome">Sobrenome</label>
                        <input id="sobrenome" type="text" name="sobrenome" placeholder="Digite seu sobrenome" value="<?php if(isset($dado['sobrenome'])){ echo $dado['sobrenome']; } ?>" required>
                    </div>
                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu e-mail" value="<?php if(isset($dado['email'])){ echo $dado['email']; } ?>" required>
                    </div>

                    <div class="input-box">
                        <label for="telefone">Celular</label>
                        <input id="telefone" type="tel" name="telefone" placeholder="(xx) xxxx-xxxx" value="<?php if(isset($dado['telefone'])){ echo $dado['telefone']; } ?>" required>
                    </div>

                    <div class="input-box">
                        <label for="senha">Senha</label>
                        <input id="senha" type="password" name="senha" placeholder="Digite sua senha" value="<?php if(isset($dado['senha'])){ echo $dado['senha']; } ?>" required>
                    </div>


                    <div class="input-box">
                        <label for="data">Data de nascimento</label>
                        <input type="date" name="datanasc" value="<?php if(isset($dado['datanasc'])){ echo $dado['datanasc']; } ?>"required>
                    </div>

                </div>

                <div class="continue-button">
                    <input name="SendEditCont" type="submit" value="concluir">
                </div>
            </form>
        </div>
            <?php

              } } else{

                 header("Location: Login_v15\Index.php");
            }
            ?>
    </body>
</html>
