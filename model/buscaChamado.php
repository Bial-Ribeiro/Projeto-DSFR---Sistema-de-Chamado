<?php
    require_once "../factory/conexao.php";
      $conn = new Caminho;
       $query = "SELECT * FROM tbChamado WHERE codClienteChamado = :cxCodCliente";

       $busca = $conn->getConn()->prepare($query);
    
       $busca->bindParam(':cxCodCliente',$_GET['cxCodCliente'],PDO::PARAM_INT);

       $busca->execute();

       if($busca->rowcount() > 0){
        echo "
          <script>
          alert('Chamados localizados');
          </script>
        ";
  }else{
      echo "
      <script>
          alert('Sem chamados localizados');
      </script>
   ";
  }
  $linha = $busca->fetchAll(PDO::FETCH_ASSOC);
?>