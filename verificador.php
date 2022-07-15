

<?php

  function inserir( $imovelid, $userid, $datainicio, $datafim){

  	$dbh = new PDO('mysql:host=127.0.0.1; dbname=projeto', 'root', '');

     $stmt = $dbh->prepare("INSERT INTO agendamento (imovelid, userid ,datainicio,datafim) VALUES (:imovelid, :userid, :datainicio, :datafim)");
      $stmt->bindParam(":imovelid", $imovelid, PDO::PARAM_STR);
     $stmt->bindParam(":userid", $userid, PDO::PARAM_STR);
     $stmt->bindParam(":datainicio", $datainicio, PDO::PARAM_STR);
     $stmt->bindParam(":datafim", $datafim, PDO::PARAM_STR);
     $stmt->execute();
     if($stmt->rowCount()){
     	return true;
     }
     else{
     	return false;
     }

  }

  function verifica($imovelid, $datainicio, $datafim){

  	$dbh = new PDO('mysql:host=127.0.0.1; dbname=projeto', 'root', '');

    $stmt = $dbh->prepare("SELECT * FROM agendamento where '$imovelid' and '$datainicio' between datainicio and datafim or '$datafim' between datainicio and datafim");
    // $stmt->bindParam(':imovelid', $imovelid, PDO::PARAM_STR);
    // $stmt->bindParam(':datainicio', $datainicio, PDO::PARAM_STR);
    //$stmt->bindParam(":datafim", $datafim, PDO::PARAM_STR);
     $stmt->execute();
     $dado = $stmt->fetchAll(PDO::FETCH_ASSOC);
     if(count($dado)){
     	return true;
     }
     else{
     	return false;
     }


  }



	?>