<?php
    require_once "../factory/conexao.php";
   # require_once "buscaDadosUsuario.php";
      $conn = new Caminho;
      if($_GET['nivelAcesso'] == 1){
        if($_GET["cxCodChamado"] == -1){
         $query = "SELECT * FROM tbChamado WHERE codUsuarioChamado = :cxCodUsuario";
         $busca = $conn->getConn()->prepare($query);
         $busca->bindParam(':cxCodUsuario',$_GET['cxCodUsuario'],PDO::PARAM_INT);
        }else if($_GET['cxCodChamado'] != -1){
          $query = "SELECT * FROM tbChamado WHERE codChamado = :cxCodChamado AND codUsuarioChamado = :cxCodUsuario";
          $busca = $conn->getConn()->prepare($query);
          $busca->bindParam(':cxCodChamado',$_GET['cxCodChamado'],PDO::PARAM_INT);
          $busca->bindParam(':cxCodUsuario',$_GET['cxCodUsuario'],PDO::PARAM_INT);
          }
        }else if($_GET['nivelAcesso'] == 2){
          if($_GET['cxCodChamado'] != -1){
              $query = "SELECT * FROM tbChamado WHERE codChamado = :cxCodChamado";
              $busca = $conn->getConn()->prepare($query);
              $busca->bindParam(':cxCodChamado',$_GET['cxCodChamado'],PDO::PARAM_INT);
            }
            else{
              $query = "SELECT * FROM tbChamado ORDER BY statusChamado ASC";
              $busca = $conn->getConn()->prepare($query);
            }
          
        }
       $busca->execute();
  $linha = $busca->fetchAll(PDO::FETCH_ASSOC);
?>