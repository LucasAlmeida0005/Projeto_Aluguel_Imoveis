
<?php 

session_start();

$id = $_GET['id'];

$dbh = new PDO('mysql:host=127.0.0.1; dbname=projeto', 'root', '');

$sth = $dbh->prepare('SELECT * FROM cad_imovel WHERE id = :id' );
$sth->bindParam(':id', $id, PDO::PARAM_STR);
$sth->execute();

$resultados = $sth->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Alugar.css">
</head>
<body>


	<div class="pesquisa">
	<a onclick='history.go(-1)' class="link"><div class="voltar">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
       <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
    </svg> 
    <span>Voltar</span>
    </div></a></div>

    <form method="POST" action="processaagendamento.php">

	<div class="container">
		<div class="titulo"><center><h2>Informaçoes do imóvel</h2>
		<hr class="linha"></center></div>
        
	    <?php
      if($resultados){
      	foreach($resultados as $resultados){
      		
    ?>
        <input type="hidden" name="idimovel" value="<?php if(isset($resultados['id'])){ echo $resultados['id']; } ?>">
        <span class="cidade"> <?php echo ucfirst($resultados["cidade"]);?> -</span> <span class="estado"><?php echo ucfirst($resultados["estado"]);?></span>
		<div class="imagem"> <?php  echo   "<img src='upload/" .$resultados['arquivo'] ."' width='100%' height='100%' ' >"?> </div>

		<table>
		<tr id="titulos"><td><span>Endereço</span></td> <td><span>Bairro</span></td></tr>	
		<tr><td><span><?php echo $resultados["endereco"];?></span></td><td><span><?php echo $resultados["bairro"];?></span></td></tr>
		<tr id="titulos"><td><span>tipo de imóvel</span></td> <td><span>Metros quadrados</span></td></tr>
		<tr><td><span><?php echo $resultados["tipoimovel"];?></span></td> <td><span><?php echo $resultados["metroquadrado"];?></span></td></tr>
		<tr id="titulos"><td><span>Comodos</span></td> <td><span>Mobilia</span></td></tr>
		<tr><td><span><?php echo $resultados["qtdcomodos"];?></span></td> <td><span><?php echo $resultados["mobilia"];?></span></td></tr>
		<tr id="titulos"><td><span>Valor</span></td></tr>
		<tr><td><span><?php echo $resultados["valor"];?> por dia</span><td></tr>
		</table>
        <hr>

	        <?php
                  $idusuario = $resultados["iduser_fk"];
	      } }
	      else{
	      	echo "ERRO";
	      }

             // $idfk = $_GET['idfk'];

			  $db = new PDO('mysql:host=127.0.0.1; dbname=projeto', 'root', '');

			  $st = $db->prepare('SELECT * FROM cadastro WHERE id = :iduser_fk' );
			  $st->bindParam(':iduser_fk', $idusuario, PDO::PARAM_STR);
			  $st->execute();

			  $dadosdono = $st->fetchAll(PDO::FETCH_ASSOC);

	    ?>
		<p>Informações do Locador</p>
		<hr class="linha">
		<div class="dadosdono">

		<?php
          if(count($dadosdono)){
      	  foreach($dadosdono as $Dados){
        ?>
        <input type="hidden" name="iduser" value="<?php if(isset($Dados['id'])){ echo $Dados['id']; } ?>">
			<table>
				<tr id="titulos"><td><span>Nome completo</span></td> <td><span>CPF</span></td> <td><span>Quantidade de Dias</span></td></tr>
				<tr><td><span><?php echo $Dados["nome"]; echo $Dados["sobrenome"];?></span></td><td><span><?php echo $Dados["cpf"];?></span></td><td>Entrada <input type="date" name="entrada" required>Saida <input type="date" name="saida" required></td></tr>
				<tr id="titulos"><td><span>Email</span></td> <td><span>Telefone</span></td> <td><span>Valor diária</span></td></tr>
				<tr><td><span><?php echo $Dados["email"];?></span></td><td><span><?php echo $Dados["telefone"];?></span></td><td><span>$ <?php echo $resultados["valor"];?></span></td></tr>
			</table>
			<?php
			      } 
			    } 
			      else{
                     echo "Erro";
			      }

			    ?>
		</div>

		<hr>

		<table class="cartao">
			<tr id="titulos"><td><span>Número do cartão</span></td></tr>
			<tr><td><input type="number" name=""  placeholder="ex: 0000 0000 0000 0000" required=""></td></tr>
			<tr id="titulos"><td><span>Nome no cartão</span></td> <td><span>Data de validade</span></td></tr>
			<tr><td><input type="text" name="" placeholder="ex: Lucas Almeida V" required></td> <td><input type="month" name="" required></td></tr>
			<tr id="titulos"><td><span>Código de segurança / CVC</span></td></tr>
			<tr><td><input type="number" name="" placeholder="ex: 000 ou 0000" required></td></tr>
			<tr><td></td></tr>
		</table>

		<div class="pagamento">
		<input type="radio" name="a" id="formapag1" checked="">
		<label for="formapag1"> 1x sem juros</label> 

        <input type="radio" name="a" id="formapag2">
		<label for="formapag2"> 3x sem juros</label> 

		<input type="radio" name="a" id="formapag3">
		<label for="formapag3"> 6x sem juros</label> 

		<input type="radio" name="a" id="formapag4">
		<label for="formapag4"> 12x sem juros</label> 

		</div>

        <center><div><input type="submit" name="" value="CONFIRMAR" class="botao"></div></center>
	</div>
	</form>


	 <div class="cont">
            <div class="fotr">
                <div class=" fotr_historia">
                        <h3>Sobre nós</h3>
                        <p> Nós somos alunos da fatec ourinhos e estamos desenvolvendo um site para aluguel de imóveis parecido
                            com o airbnb. Resposáveis: Bruno, Lucas, Mateus, Paulo.</p>
                </div>

                <div class=" fotr_contato">
                        <h3>Contato</h3>
                        
                            <p> 14 9999 9999 </p>
                            <p> contato@Hotel.com </p>
                            <p> Ourinhos - SP </p>
                        
                    </div>

                    <div class="fotr_redes">
                        <h3>Redes sociais</h3>
                        <ul>
                            <li><a href="https://www.facebook.com/bruno.piga.1" target="_blank" ><img src="facebook.svg" alt="Facebook Bruno"></a></li>
                            <li><a href="http://instagram.com" target="_blank"><img src="instagram.svg"  alt="Instagram Lucas"></a></li>
                            <li><a href="http://twitter.com" target="_blank"><img src="twitter.svg"  alt="Twitter Mateus"></a></li>
                        </ul>
                    </div>
            </div>
        </div>
     
</body>
</html>