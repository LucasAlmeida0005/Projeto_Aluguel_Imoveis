<?php 
  
  session_start();

  if(!$_SESSION['usuario']){
  	header('Location: index.php');
  	exit();
  }
  /*else{
     require_once "UserClass.php";
     $u = new Usuario();

     $listlogged = $u->logged($_SESSION['usuario']);

     echo $listlogged['nome'];
  }*/
?>