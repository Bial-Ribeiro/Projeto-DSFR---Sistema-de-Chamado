<?php
    require_once "../factory/conexao.php";

      $conn = new Caminho;

        $query = "DELETE FROM tbChamado WHERE codChamado = :cxCodChamado AND codClienteChamado = :cxCodCliente";
        $deleta = $conn->getConn()->prepare($query);
        $deleta->bindParam(':cxCodChamado',$_GET['cxCodChamado'],PDO::PARAM_INT);
        $deleta->bindParam(':cxCodCliente',$_GET['cxCodCliente'],PDO::PARAM_INT);      
        $codCliente = $_GET['cxCodCliente'];
        if($deleta->execute()){
            echo "
            <script>
                alert('Chamado excluido com sucesso');
                window.location.href='../view/telaCliente.php?cxCodCliente=$codCliente&cxCodChamado=-1';
            </script>
            ";
        }else{
             echo "
                 <script>
                 alert('Chamado não excluido');
                 window.location.href='../view/telaCliente.php?cxCodCliente=$codCliente&cxCodChamado=-1';
                 </script>
             ";
        }
?>