<?php


   session_start();

   include('conexao.php');

   if(empty($_POST['usuario']) || empty($_POST['senha'])){

   	  header('Location: index.php');
   	  exit();
   } // verificamos se o usuário inseriu dados nos campos usuário e senha, caso não ele redireciona para index.php

// verifica se esta vindo um ataque de sql injection e assim não prejudicando nosso sistema

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']); 
// precisamos passar a variável conexão de conexao.php incluso na linha 3
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select id, email from cadastro where email = '{$usuario}' and senha ='{$senha}'";

//md5('{senha}') faz com que busque senhas criptografadas pode ser usando em senha = md5('{senha}').

$result = mysqli_query($conexao, $query);
// vai realizar os comandos no banco


$row = mysqli_num_rows($result);
// vai contar quantas linhas foram extraidas


if($row == 1){ // caso ele encontre uma linha correta no banco faça:

   $_SESSION['usuario'] = $usuario;
   header('Location: .\home\home.php'); // se estiver tudo certo vai direcionar para essa página 
   exit();
}else{

   $_SESSION['nao_autenticado'] = true;
   // caso der erro direciona para index.php
   header('Location: index.php');
   exit();
}