<?php 


     

      session_start();
      include('\xampp\htdocs\Projeto\Login_v15\verificalogin.php');

      global $nome; // essa global nem precisa 
      $nome = $_SESSION['usuario'];

      $dbh = new PDO('mysql:host=127.0.0.1; dbname=projeto', 'root', '');

      $sth = $dbh->prepare('SELECT * FROM cadastro WHERE email = :email' );
      $sth->bindParam(':email', $nome, PDO::PARAM_STR);
      $sth->execute();

      $resultados = $sth->fetchAll(PDO::FETCH_ASSOC);

      if($resultados){

     } 
      else{
        header("Location: Login_v15\Index.php");
      }
     
 ?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="./styles.css">
  <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap"
      rel="stylesheet"
    />
    <script src="script.js" defer></script>
    
  <title>Home</title>
</head>
<header class="header">
     	
  <img src="./imagens/Screenshot_1.png" class="iconLogo">
  <div class="selector">
    <div id="selectField" class="pointer">
  <img src="./imagens/usuario.png" class="iconUser">
  <span><img src="./imagens/menu.png" class="icon"></span>

  <div class="bordaMenu">
 
  <ul class="menu hide" id="list">
    <li class="options"><a href=".\home.php">Home</a></li>
    <li class="options"><a href="\Projeto\AreaUsuario.php">Area usuário</a></li>
    <li class="options"><a href="\Projeto\CadastroImovel.php">Cadastrar imóvel</a></li>
    <li class="options"><a href="\Projeto\Areadebusca.php">Pesquisar imoveis</a></li>
  </ul>

</div>
</div>
</header>


<body>

 <h2><a href="\Projeto\Login_v15\logaut.php" class="sair">Sair</a></h2>

 <div class="content">
    <div class="content-carrossel">
    <div class="carrossel">
<div class="container" id="img">
  <img class="slider-img" src="./imagens/1.jpg" />
  <img class="slider-img" src="./imagens/2.jpg" />
  <img class="slider-img" src="./imagens/3.jpg" />
</div>
</div>
</div>
<br>

<div class="text">

  <?php

      if(count($resultados)){
        foreach($resultados as $Resultado){
    ?>


  <p>
  <center>
  <h1>Olá <?php echo ucfirst(  $Resultado["nome"]);?>! Vamos começar sua aventura pelos nossos imóveis?!</h1>
</center>
</p>
</div>

<div class="btn-content"><center>
<a href="\Projeto\Areadebusca.php"><button class="btn-primary"><span class="text">Vamos lá!</span></button></a>
</center>
</div>

 <?php
      } } else{
         header("Location: Login_v15\Index.php");
    }
    ?>

<center>

  <div class="columns">
    <div class="conteudocol">
      <h1>Casa 1</h1>
      <p>Casa no meio do mato com vários quartos</p>
    </div>
    <div class="imagemcol">
      <img class="imagec" src="imagens/1.jpg">
    </div>
  </div>

  <div class="columns">
    <div class="conteudocol">
      <h1>Casa 2</h1>
      <p>Rancho na beira do rio</p>
    </div>
    <div class="imagemcol">
      <img class="imagec" src="imagens/1.jpg">
    </div>
  </div>

  <div class="columns">
    <div class="conteudocol">
      <h1>Casa 3</h1>
      <p>Casa no meio do mato com piscina</p>
    </div>
    <div class="imagemcol">
      <img class="imagec" src="imagens/1.jpg">
    </div>
  </div>


</center>


<div class="rows">
    <div class="row-img">
    <div class="imgcard"><img class="pic" src="./imagens/casa1.jpg" alt=""></div>
    <div class="imgcard"><img class="pic" src="./imagens/casa2.jpg" alt=""></div>
    <div class="imgcard"><img class="pic" src="./imagens/casa3.jpg" alt=""></div>
  </div>
    <div class="row">
    <div class="card black">
      <h2>Casa 1</h2>
      <p>DESCRIÇÃO</p>
    </div>

    <div class="card black">
      <h2>Casa 2</h2>
      <p>DESCRIÇÃO</p>
    </div>

    <div class="card black">
      <h2>Casa 3</h2>
      <p>DESCRIÇÃO</p>
    </div>
  </div>
</div>
</div>
<footer class="footer">
</footer>
</body>
</html>