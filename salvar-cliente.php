<?php
include("config.php");

if (!isset($_REQUEST['acao'])) {
    $_REQUEST['acao'] = "";
}

switch ($_REQUEST['acao']) {

    case 'cadastrar':
        $nome      = $_POST['nome_cliente'];
        $email     = $_POST['email_cliente'];
        $telefone  = $_POST['telefone_cliente'];

        $sql = "INSERT INTO cliente 
                (nome_cliente, email_cliente, telefone_cliente)
                VALUES ('{$nome}', '{$email}', '{$telefone}')";

        $res = $conn->query($sql);

        if($res == true){
            print "<script>alert('Cliente cadastrado com sucesso!');</script>";
            print "<script>location.href='?page=lista-cliente';</script>";
        }else{
            print "<script>alert('Erro ao cadastrar cliente');</script>";
            print "<script>location.href='?page=lista-cliente';</script>";
        }
    break;

    case 'editar':
        $nome      = $_POST['nome_cliente'];
        $email     = $_POST['email_cliente'];
        $telefone  = $_POST['telefone_cliente'];

        $sql = "UPDATE cliente SET 
                    nome_cliente='{$nome}',
                    email_cliente='{$email}',
                    telefone_cliente='{$telefone}'
                WHERE id_cliente=".$_REQUEST['id_cliente'];

        $res = $conn->query($sql);

        if($res == true){
            print "<script>alert('Cliente editado com sucesso!');</script>";
            print "<script>location.href='?page=lista-cliente';</script>";
        }else{
            print "<script>alert('Erro ao editar cliente');</script>";
            print "<script>location.href='?page=lista-cliente';</script>";
        }
    break;

	case 'excluir':
		$sql = "DELETE FROM cliente 
				WHERE id_cliente=".$_REQUEST['id'];

		$res = $conn->query($sql);

		if($res){
			print "<script>alert('Cliente excluído com sucesso!');</script>";
			print "<script>location.href='?page=lista-cliente';</script>";
		} else {
			print "<script>alert('Erro ao excluir cliente');</script>";
			print "<script>location.href='?page=lista-cliente';</script>";
		}
	break;
}