<?php
    require_once "../factory/conexao.php";

      $conn = new Caminho;

        $query = "DELETE FROM tbChamado WHERE codChamado = :cxCodChamado AND codUsuarioChamado = :cxCodUsuario";
        $deleta = $conn->getConn()->prepare($query);
        $deleta->bindParam(':cxCodChamado',$_GET['cxCodChamado'],PDO::PARAM_INT);
        $deleta->bindParam(':cxCodUsuario',$_GET['cxCodUsuario'],PDO::PARAM_INT);      
        $codUsuario = $_GET['cxCodUsuario'];
        $nivel = $_GET['nivelAcesso'];
        if($deleta->execute()){
            echo "
            <script>
                alert('Chamado excluido com sucesso');
                window.location.href='../view/telaCliente.php?cxCodUsuario=$codUsuario&cxCodChamado=-1&nivelAcesso=$nivel';
            </script>
            ";
        }else{
             echo "
                 <script>
                 alert('Chamado não excluido');
                 window.location.href='../view/telaCliente.php?cxCodUsuario=$codUsuario&cxCodChamado=-1';
                 </script>
             ";
        }
?>