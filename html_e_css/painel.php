<?php 

      session_start();
      include('verificalogin.php');
?>

 <h2> Olá <?php echo $_SESSION['usuario'];?></h2>
 <h2><a href="logaut.php">Sair</a></h2>