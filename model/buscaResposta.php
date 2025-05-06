<?php
    require_once "../factory/conexao.php";
   # require_once "buscaDadosUsuario.php";
      $conn = new Caminho;

          $query = "SELECT * FROM tbResposta WHERE codChamadoRespondido = :cxCodChamado ORDER BY dataCriacaoRespChamado;";
          $buscaResposta = $conn->getConn()->prepare($query);
          $buscaResposta->bindParam(':cxCodChamado',$chamado["codChamado"],PDO::PARAM_INT);

       $buscaResposta->execute();
  $linhaRespostas = $buscaResposta->fetchAll(PDO::FETCH_ASSOC);
?>