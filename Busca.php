<?php

//include_once('configuracao.php');
session_start();


if(!isset($_GET['consulta'])){
header("Location: Busca.php");
exit;
}


$cidade = "%".trim($_GET['consulta'])."%";

$dbh = new PDO('mysql:host=127.0.0.1; dbname=projeto', 'root', '');

$sth = $dbh->prepare('SELECT * FROM cad_imovel WHERE cidade LIKE :cidade' );
$sth->bindParam(':cidade', $cidade, PDO::PARAM_STR);
$sth->execute();

$resultados = $sth->fetchAll(PDO::FETCH_ASSOC);




//$dadosid = $resultados["iduser_fk"];
//echo "<pre>";
//print_r($resultados);exit;

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Resultado</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Pesquisa.css">
</head>
<body>

   <div class="container-sm pesquisa">
		<a href="\Projeto\Login_v15\home\home.php" class="link"><div class="voltar">
	    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
	       <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
	    </svg> 
	    <p>Voltar</p>
	    </div></a>

	   <form action="Busca.php" method="GET">

	   <div class="form-group input-group barra">
			<button class="busca"><span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span></button>
			<input name="consulta" id="txt_consulta" placeholder="Buscar" type="text" class="form-control">
	   </div>

	   </form>

	</div>
	<?php
      if(count($resultados)){
      	
      	foreach($resultados as $Resultado){
    ?>
   

    <div class="container-lg anuncio">
		<div class="container-sm imagem">
		 <?php echo	"<img src='upload/" .$Resultado['arquivo'] ."' width='100%' height='280px' >" ?>
		</div>
        
		<div class="container-sm informacoes">
			<div class="row">
		      <span>Cidade: <?php echo $Resultado["cidade"];?></span>
		    </div>
		</div>

		<div class="container-sm informacoes">
			<div class="row">
		      <span>Endereço: <?php echo $Resultado["endereco"];?></span>
		    </div>
		</div>

		<div class="container-sm informacoes">
			<div class="row">
		      <span>Tipo imóvel: <?php echo $Resultado["tipoimovel"];?></span>
		    </div>
		</div>

		<div class="container-sm informacoes">
			<div class="row">
		      <span>Valor: <?php echo $Resultado["valor"];?></span>
		    </div>
		</div>
		<div class="container-sm informacoes">
			<div class="row">
		      <span>Comodos: <?php echo $Resultado["qtdcomodos"];?></span>
		    </div>
		</div>
		<div>
		      
          <?php $iduser = $Resultado["id"]; 
                $idfk = $Resultado["iduser_fk"];?>
		      <a href="Alugar.php?id=<?php echo $iduser ?>?idfk=<?php echo $idfk ?>" > <button class="botao" type="submit">Alugar</button></a>	
		      
		</div>
	</div>

   
    <?php

      } 
    } 
      else{

    ?>

    <center><h2 style="margin-top: 160px; color: darkblue;">Não foram encontrados resultados pelo termo buscado!</h2></center>

    <?php

    }
  
    $_SESSION['id'] = $iduser;

    ?>


</body>
</html>