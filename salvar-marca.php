<h1>Salvar Marcas</h1>
<?php
    switch ($_REQUEST['acao']) {
        case 'cadastrar':
            $nome = $_POST['nome_marca'];

            $sql = "INSERT INTO marca (nome_marca) VALUES ('{$nome}')";
            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Cadastrou com sucesso');</script>";
                print "<script>location.href='?page=lista-marca';</script>";
            }else{
                print "<script>alert('Não Cadastrou');</script>";
                print "<script>location.href='?page=lista-marca';</script>";
            }
            break;
        
        case 'editar':
            $id   = $_POST['id_marca'];
            $nome = $_POST['nome_marca'];
            
            $sql = "UPDATE marca SET nome_marca='{$nome}' WHERE id_marca={$id}";
            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Editado com sucesso');</script>";
                print "<script>location.href='?page=lista-marca';</script>";
            }else{
                print "<script>alert('Não foi possível editar');</script>";
                print "<script>location.href='?page=lista-marca';</script>";
            }
            break;

        case 'excluir':
            $id = $_REQUEST['id'];
            
            $sql = "DELETE FROM marca WHERE id_marca={$id}";
            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Excluído com sucesso');</script>";
                print "<script>location.href='?page=lista-marca';</script>";
            }else{
                print "<script>alert('Não foi possível excluir');</script>";
                print "<script>location.href='?page=lista-marca';</script>";
            }
            break;
    }
?>
