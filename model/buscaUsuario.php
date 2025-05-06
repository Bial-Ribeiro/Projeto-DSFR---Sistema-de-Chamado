<?php
    require_once "../factory/conexao.php";
   # require_once "buscaDadosUsuario.php";
      $conn = new Caminho;

          $query = "SELECT nomeUsuario, emailUsuario FROM tbUsuario WHERE codUsuario = :cxCodRespondeu;";
          $buscaUsuario = $conn->getConn()->prepare($query);
          $buscaUsuario->bindParam(':cxCodRespondeu',$procuraUser,PDO::PARAM_INT);
       $buscaUsuario->execute();

  $linhaUsuario = $buscaUsuario->fetch(PDO::FETCH_ASSOC);
?>