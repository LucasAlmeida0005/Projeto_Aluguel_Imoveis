<?php

  /* class Usuario{


         public function logged($id){
            global $pdo2;

            $arrayn = array();

            $sql = "SELECT * from cadastro where id = :id";
            $sql = $pdo2->prepare($sql);
            $sql->bindValue("id", $id);
            $sql->execute();

            if($sql->rowCount() > 0){
                $arrayn = $sql->fetch();
            }

            return $arrayn;
        }
   }*/


	?>