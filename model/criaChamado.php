<?php
    require_once "../factory/conexao.php";
    
    if(($_POST['cxDescrChamado'] != "") && ($_POST['cxTituloChamado'] != "")){
       $conn = new Caminho;
       $query = "INSERT INTO tbChamado
       (titleChamado,   descrChamado,   statusChamado,  codUsuarioChamado,  emailUsuarioChamado,    dataCriacaoChamado)
       VALUES
       (:titleChamado,  :descrChamado,              1,  :codUsuarioChamado, :emailUsuarioChamado,   CURRENT_TIMESTAMP)"; 

       $cadastrar=$conn->getConn()->
       prepare($query);
       
       $cadastrar->
       bindParam(':titleChamado',$_POST['cxTituloChamado'],PDO::PARAM_STR);

       $cadastrar->
       bindParam(':descrChamado',$_POST['cxDescrChamado'],PDO::PARAM_STR);
       
       $cadastrar->
       bindParam(':codUsuarioChamado',$_POST['cxCodUsuario'],PDO::PARAM_INT);
       
       $cadastrar->
       bindParam(':emailUsuarioChamado',$_POST['cxEmailUsuario'],PDO::PARAM_STR);
       $codUsuario = $_POST['cxCodUsuario'];
       $nivel = $_POST['nivelAcesso'];
       if($cadastrar->execute()){
        echo "
        <script>
            alert('Chamado criado com sucesso');
            window.location.href='../view/telaCliente.php?cxCodUsuario=$codUsuario&cxCodChamado=-1&nivelAcesso=$nivel';
        </script>
        ";
    }else{
         echo "
             <script>
             alert('Chamado não criado');
             window.location.href='../view/telaCliente.php?cxCodUsuario=$codUsuario&cxCodChamado=-1&nivelAcesso=$nivel';
             </script>
         ";
        }
    }else{
        echo "Dados incompleto";
    }
?>