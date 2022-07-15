<?php // ### Exibindo imagens no banco ###
include ("conexao.php");

$consulta = "SELECT * FROM carrossel;";
$con = $mysqli->query($consulta) or die($mysqli->error);

while($dado = $con-> fetch_array()){
	echo "<br><hr><br>" .$dado['arquivo'] ."<br>";
	echo "<br><br><img src='upload/" .$dado['arquivo'] ."' width='500'><br>";
}
?>
<!-- Form selecione imagem e exiba -->
<form action="index.php" method="POST" enctype="multipart/form-data">
	Qual arquivo exibir: 	
	<select id="num" name="codigo">
<?php 	
	$i = "SELECT COUNT(CodImagem) as nlinhas FROM imagens;";
	$con2 = $mysqli->query($i) or die($mysqli->error);

	while($linhas = $con2-> fetch_array()){
		
		$con = $mysqli->query($consulta) or die($mysqli->error);
		while($dado = $con-> fetch_array()){
			
			while ($linhas['nlinhas']!=0){
			echo "<option value='".$dado['CodImagem'] ."'>" . $dado['arquivo'] ." - " .$dado['data'] ."</option>";
			$linhas['nlinhas']--;	
			}
		}
	}
	  	
?>
	</select>
	<input type="submit">
</form>
<?php
$i = false;
$i = "SELECT arquivo FROM imagens WHERE CodImagem = '".$_POST['codigo'] ."'";
//echo $_POST["codigo"];
if($i != false)
$con3 = $mysqli->query($i) or die($mysqli->error);
while($dado = $con3-> fetch_array()){
	echo "<br><hr><br>" .$dado['CodImagem'] ."<br>";
	echo "<br><br><img src='upload/" .$dado['arquivo'] ."' width='500'><br><hr><br>";
}
?>

