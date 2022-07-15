
<?php


    require "verificador.php";
   

   if(isset($_POST['entrada']) && !empty($_POST['entrada'])){
 
        $imovelid = $_POST['idimovel'];
    	$entrada = $_POST['entrada'];
    	$userid = $_POST['iduser'];
    	$saida = $_POST['saida'];
    	$objverifica = verifica( $imovelid, $entrada, $saida);

    	if($objverifica == true){
            printf("<center><h1 style='padding-top= 100px'> Esta data já esta agendada, tente uma nova data! </h1></center>");
    	}else{
    		 $objverifica = inserir( $imovelid, $userid, $entrada, $saida);
    		 if ($objverifica) {
                printf("<center><h1 style='padding-top= 100px'> Agendado com sucesso </h1></center>");
    		 }else{
    		 	echo "Erro ao agendar";
    		 }
    	}
    }


	?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="Alugar.css">
    </head>
    <body>
    
     <div class="pesquisa">
    <a onclick='history.go(-2)' class="link"><div class="voltar">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
       <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
    </svg> 
    
    </div></a></div>

    </body>
    </html>