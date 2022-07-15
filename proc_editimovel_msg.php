<?php
session_start();
include_once 'configuracao.php';

//Verificar se o usuário clicou no botão, clicou no botão acessa o IF e tenta cadastrar, caso contrario acessa o ELSE
$SendEditCont = filter_input(INPUT_POST, 'SendEditCont', FILTER_SANITIZE_STRING);
// $SendEditCont = $_POST['SendEditCont'];
if($SendEditCont){
    //Receber os dados do formulário
    
    $id = $_POST['id'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $tipoimovel = $_POST['tipoimovel'];
    $metroquadrado = $_POST['metroquadrado'];
    $qtdcomodos = $_POST['qtdcomodos'];
    $mobilia = $_POST['mobilia'];
    $valor = $_POST['valor'];
/*
    if(isset($_FILES['arquivo'])){
        $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
        $novo_nome = md5(time()) . $extensao; //defineo nome do arquivo
        $diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
        
        $dadoimovel = $diretorio.$novo_nome;
        move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); // efetua o upload

}
    */
      $dbh = new PDO('mysql:host=127.0.0.1; dbname=projeto', 'root', '');
    //Inserir no BD
   // $result = "UPDATE cadastro SET nome=:nome, email=:email, sobrenome=:sobrenome, senha=:senha, telefone=:telefone, datanasc=:datanasc WHERE id=:id";
    
    $update = $dbh->prepare('UPDATE cad_imovel SET endereco=:endereco, bairro=:bairro, cidade=:cidade, estado=:estado, tipoimovel=:tipoimovel, metroquadrado=:metroquadrado, qtdcomodos=:qtdcomodos, mobilia=:mobilia, valor=:valor WHERE id=:id');
    $update->bindParam(':id', $id, PDO::PARAM_STR);
    $update->bindParam(':endereco', $endereco, PDO::PARAM_STR);
    $update->bindParam(':bairro', $bairro, PDO::PARAM_STR );
    $update->bindParam(':cidade', $cidade, PDO::PARAM_STR );
    $update->bindParam(':estado', $estado, PDO::PARAM_STR );
    $update->bindParam(':tipoimovel', $tipoimovel, PDO::PARAM_STR );
    $update->bindParam(':metroquadrado', $metroquadrado, PDO::PARAM_STR );
    $update->bindParam(':qtdcomodos', $qtdcomodos, PDO::PARAM_STR );
    $update->bindParam(':mobilia', $mobilia, PDO::PARAM_STR );
    $update->bindParam(':valor', $valor, PDO::PARAM_STR );
    

    if($update->execute()){
        $_SESSION['msg'] = "<p style='color:green;'>Dados editados com sucesso</p>";
        header("Location: DadosImovel.php");
    }else{
        $_SESSION['msg'] = "<p style='color:red;'> Não foi editado com sucesso</p>";
        header("Location: DadosImovel.php");
    }    
}else{
    $_SESSION['msg'] = "<p style='color:red;'> Não foi editado com sucesso</p>";
    header("Location: DadosImovel.php");
}