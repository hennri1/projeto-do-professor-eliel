<h1>Salvar Modelos</h1>
<?php
    switch ($_REQUEST['acao']) {
        case 'cadastrar':
            $nome     = $_POST['nome_modelo'];
            $cor      = $_POST['cor_modelo'];
            $ano      = $_POST['ano_modelo'];
            $tipo     = $_POST['tipo_modelo'];
            $id_marca = $_POST['marca_id_marca'];

            $sql = "INSERT INTO modelo (nome_modelo, cor_modelo, ano_modelo, tipo_modelo, marca_id_marca) 
                    VALUES ('{$nome}', '{$cor}', '{$ano}', '{$tipo}', '{$id_marca}')";
            
            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Cadastrou com sucesso');</script>";
                print "<script>location.href='?page=lista-modelo';</script>";
            }else{
                print "<script>alert('Não Cadastrou');</script>";
                print "<script>location.href='?page=lista-modelo';</script>";
            }
            break;
        
        case 'editar':
            $id       = $_POST['id_modelo'];
            $nome     = $_POST['nome_modelo'];
            $cor      = $_POST['cor_modelo'];
            $ano      = $_POST['ano_modelo'];
            $tipo     = $_POST['tipo_modelo'];
            $id_marca = $_POST['marca_id_marca'];

            $sql = "UPDATE modelo SET
                        nome_modelo='{$nome}',
                        cor_modelo='{$cor}',
                        ano_modelo='{$ano}',
                        tipo_modelo='{$tipo}',
                        marca_id_marca='{$id_marca}'
                    WHERE id_modelo={$id}";

            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Editado com sucesso');</script>";
                print "<script>location.href='?page=lista-modelo';</script>";
            }else{
                print "<script>alert('Não foi possível editar');</script>";
                print "<script>location.href='?page=lista-modelo';</script>";
            }
            break;

        case 'excluir':
            $id = $_REQUEST['id'];
            
            $sql = "DELETE FROM modelo WHERE id_modelo={$id}";

            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Excluído com sucesso');</script>";
                print "<script>location.href='?page=lista-modelo';</script>";
            }else{
                print "<script>alert('Não foi possível excluir');</script>";
                print "<script>location.href='?page=lista-modelo';</script>";
            }
             break;
    }
?>
