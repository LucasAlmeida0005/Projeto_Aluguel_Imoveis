<?php
session_start();
include_once 'configuracao.php';

//Verificar se o usuário clicou no botão, clicou no botão acessa o IF e tenta cadastrar, caso contrario acessa o ELSE
$SendEditCont = filter_input(INPUT_POST, 'SendEditCont', FILTER_SANITIZE_STRING);
// $SendEditCont = $_POST['SendEditCont'];
if($SendEditCont){
    //Receber os dados do formulário
    
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $celular = $_POST['telefone'];
    $sobrenome = $_POST['sobrenome'];
    $datanascimento = $_POST['datanasc'];
    
      $dbh = new PDO('mysql:host=127.0.0.1; dbname=projeto', 'root', '');
    //Inserir no BD
   // $result = "UPDATE cadastro SET nome=:nome, email=:email, sobrenome=:sobrenome, senha=:senha, telefone=:telefone, datanasc=:datanasc WHERE id=:id";
    
    $update = $dbh->prepare('UPDATE cadastro SET nome=:nome, sobrenome=:sobrenome, email=:email, senha=:senha, telefone=:telefone, datanasc=:datanasc WHERE id=:id');
    $update->bindParam(':id', $id, PDO::PARAM_STR);
    $update->bindParam(':nome', $nome, PDO::PARAM_STR);
    $update->bindParam(':email', $email, PDO::PARAM_STR );
    $update->bindParam(':sobrenome', $sobrenome, PDO::PARAM_STR );
    $update->bindParam(':senha', $senha, PDO::PARAM_STR );
    $update->bindParam(':telefone', $celular, PDO::PARAM_STR );
    $update->bindParam(':datanasc', $datanascimento, PDO::PARAM_STR );

    if($update->execute()){
        $_SESSION['msg'] = "<p style='color:green;'>Mensagem editada com sucesso</p>";
        header("Location: InfoUsuario.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Mensagem não foi editada com sucesso</p>";
        header("Location: InfoUsuario.php");
    }    
}else{
    $_SESSION['msg'] = "<p style='color:red;'>Mensagem não foi editada com sucesso</p>";
    header("Location: InfoUsuario.php");
}