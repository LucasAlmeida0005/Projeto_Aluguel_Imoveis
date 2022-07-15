<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pesquisa</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Pesquisa.css">
</head>
<body>

	<div class="container-sm pesquisa">
		<a onclick='history.go(-1)' class="link"><div class="voltar">
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

	<center><h1>Busque por um imóvel!</h1></center>

</body>
</html>