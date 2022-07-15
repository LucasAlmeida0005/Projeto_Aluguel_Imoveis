<?php


   $dbHost = 'Localhost';
   $dbUsername = 'root';
   $dbPassword = '';
   $dbNome = 'projeto';
   
   global $conexao;
   $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbNome);

  /* if($conexao->connect_errno){
   	  echo"ERRO";
   }
   else{
   	 echo"Conexão efetuada";
   } */
?>