<?php
session_start();
include_once 'configuracao.php';

$id = $_GET['id'];

$dbh = new PDO('mysql:host=127.0.0.1; dbname=projeto', 'root', '');

          $sth = $dbh->prepare('SELECT * FROM cad_imovel WHERE id = :id' );
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
    
         <form method="POST" action="proc_editimovel_msg.php">
                <div class="form-header">
                    <div class="title">
                        <h1>Atualize seus dados</h1>
                    </div>
                </div>

                <input type="hidden" name="id" value="<?php if(isset($dado['id'])){ echo $dado['id']; } ?>">

                <div class="input-group">
                    <div class="input-box">
                        <label for="endereco">Endereço</label>
                        <input id="endereco" type="text" name="endereco" value="<?php if(isset($dado['endereco'])){ echo $dado['endereco']; } ?>" required>
                    </div>

                    <div class="input-box">
                        <label for="bairro">Bairro</label>
                        <input id="bairro" type="text" name="bairro" value="<?php if(isset($dado['bairro'])){ echo $dado['bairro']; } ?>" required>
                    </div>
                    <div class="input-box">
                        <label for="cidade">Cidade</label>
                        <input id="cidade" type="cidade" name="cidade" value="<?php if(isset($dado['cidade'])){ echo $dado['cidade']; } ?>" required>
                    </div>

                    <div class="input-box">
                        <label for="estado">Estado</label>
                        <input id="estado" type="text" name="estado" value="<?php if(isset($dado['estado'])){ echo $dado['estado']; } ?>" required>
                    </div>

                    <div class="input-box">
                        <label for="tipo">Tipo do imóvel</label>
                        <input id="tipo" type="text" name="tipoimovel" value="<?php if(isset($dado['tipoimovel'])){ echo $dado['tipoimovel']; } ?>" required>
                    </div>


                    <div class="input-box">
                        <label for="text">Metros quadrados</label>
                        <input type="text" name="metroquadrado" value="<?php if(isset($dado['metroquadrado'])){ echo $dado['metroquadrado']; } ?>"required>
                    </div>

                    <div class="input-box">
                        <label for="text">Quantidade de comodos</label>
                        <input type="text" name="qtdcomodos" value="<?php if(isset($dado['qtdcomodos'])){ echo $dado['qtdcomodos']; } ?>"required>
                    </div>

                    <div class="input-box">
                        <label for="text">Mobiliado</label>
                        <input type="text" name="mobilia" value="<?php if(isset($dado['mobilia'])){ echo $dado['mobilia']; } ?>"required>
                    </div>

                    <div class="input-box">
                        <label for="valor">Valor</label>
                        <input id="valor" type="text" name="valor" value="<?php if(isset($dado['valor'])){ echo $dado['valor']; } ?>" required>
                    </div>

                    <div class="input-box">
                        <label for="imagem">Foto</label>
                        <input type="file" name="arquivo" value="<?php if(isset($dado['arquivo'])){ echo $dado['arquivo']; } ?>">
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