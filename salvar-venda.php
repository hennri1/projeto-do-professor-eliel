<h1>Salvar Vendas</h1>
<?php
    switch ($_REQUEST['acao']) {
        case 'cadastrar':
            $data      = $_POST['data_venda'];
            $valor     = $_POST['valor_venda'];
            $id_cliente = $_POST['cliente_id_cliente'];
            $id_func    = $_POST['funcionario_id_funcionario'];
            $id_modelo  = $_POST['modelo_id_modelo'];

            $sql = "INSERT INTO venda (data_venda, valor_venda, cliente_id_cliente, funcionario_id_funcionario, modelo_id_modelo) 
                    VALUES ('{$data}', '{$valor}', '{$id_cliente}', '{$id_func}', '{$id_modelo}')";
            
            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Cadastrou com sucesso');</script>";
                print "<script>location.href='?page=lista-venda';</script>";
            }else{
                print "<script>alert('NÃO CADASTROU! Erro SQL Detalhado: ".$conn->error."');</script>";
                print "<script>location.href='?page=lista-venda';</script>";
            }
            break;
        
        case 'editar':
            $id        = $_POST['id_venda'];
            $data      = $_POST['data_venda'];
            $valor     = $_POST['valor_venda'];
            $id_cliente = $_POST['cliente_id_cliente'];
            $id_func    = $_POST['funcionario_id_funcionario'];
            $id_modelo  = $_POST['modelo_id_modelo'];

            $sql = "UPDATE venda SET
                        data_venda='{$data}',
                        valor_venda='{$valor}',
                        cliente_id_cliente='{$id_cliente}',
                        funcionario_id_funcionario='{$id_func}',
                        modelo_id_modelo='{$id_modelo}'
                    WHERE id_venda={$id}";

            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Editado com sucesso');</script>";
                print "<script>location.href='?page=lista-venda';</script>";
            }else{
                print "<script>alert('Não foi possível editar');</script>";
                print "<script>location.href='?page=lista-venda';</script>";
            }
            break;

        case 'excluir':
            $id = $_REQUEST['id_venda'];
            
            $sql = "DELETE FROM venda WHERE id_venda={$id}";

            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Excluído com sucesso');</script>";
                print "<script>location.href='?page=lista-venda';</script>";
            }else{
                print "<script>alert('Não foi possível excluir');</script>";
                print "<script>location.href='?page=lista-venda';</script>";
            }
            break;
    }
?>