<?php
    $id = $_GET["id"];
    
    include_once 'configuracao.php';
    
    $sql = "DELETE from cad_imovel where id = ".$id;
    $delete = mysqli_query($conexao,$sql);
    if($delete){
        $msg = "Deletado com sucesso!";
        header("Location: DadosImovel.php");
    }else{
        $msg = "Erro ao deletar!";
    }
    mysqli_close($conexao);
 
?>

