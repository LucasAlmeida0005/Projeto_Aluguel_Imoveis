<?php 

  session_start();

  // unset destroi uma sessão, já o session_destroy acaba com todas

  session_destroy();
  header('Location: index.php');
  exit();

?>