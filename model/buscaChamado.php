<?php
    require_once "../factory/conexao.php";
      $conn = new Caminho;

      if($_GET["cxCodChamado"] == -1){
       $query = "SELECT * FROM tbChamado WHERE codClienteChamado = :cxCodCliente";
       $busca = $conn->getConn()->prepare($query);
       $busca->bindParam(':cxCodCliente',$_GET['cxCodCliente'],PDO::PARAM_INT);
      }else{
        $query = "SELECT * FROM tbChamado WHERE codChamado = :cxCodChamado AND codClienteChamado = :cxCodCliente";
        $busca = $conn->getConn()->prepare($query);
        $busca->bindParam(':cxCodChamado',$_GET['cxCodChamado'],PDO::PARAM_INT);
        $busca->bindParam(':cxCodCliente',$_GET['cxCodCliente'],PDO::PARAM_INT);
      }
       $busca->execute();
  $linha = $busca->fetchAll(PDO::FETCH_ASSOC);
?>