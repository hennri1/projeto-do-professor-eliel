<?php
include("config.php");

if (!isset($_REQUEST['acao'])) {
    $_REQUEST['acao'] = "";
}

switch ($_REQUEST['acao']) {

    case 'cadastrar':
        $nome      = $_POST['nome_funcionario'];
        $email     = $_POST['email_funcionario'];
        $telefone  = $_POST['telefone_funcionario'];

        $sql = "INSERT INTO funcionario 
                (nome_funcionario, email_funcionario, telefone_funcionario)
                VALUES ('{$nome}', '{$email}', '{$telefone}')";

        $res = $conn->query($sql);

        if($res == true){
            print "<script>alert('Cadastrou com sucesso!');</script>";
            print "<script>location.href='index.php';</script>";
        }else{
            print "<script>alert('Não cadastrou');</script>";
            print "<script>location.href='index.php';</script>";
        }
    break;


 case 'editar':
    $id       = $_POST['id_boostador'];
    $nome     = $_POST['nome_boostador'];
    $email    = $_POST['email_boostador'];
    $discord  = $_POST['discord_boostador'];

    $sql = "UPDATE boostador SET 
                nome_boostador='{$nome}',
                email_boostador='{$email}',
                discord_boostador='{$discord}'
            WHERE id_boostador=".$id;

    $res = $conn->query($sql);

    if($res == true){
        print "<script>alert('Editou com sucesso!');</script>";
        print "<script>location.href='?page=lista-boostador';</script>";
    }else{
        print "<script>alert('Erro ao editar');</script>";
        print "<script>location.href='?page=lista-boostador';</script>";
    }
break;


case 'excluir':
    $sql = "DELETE FROM boostador 
            WHERE id_boostador=".$_REQUEST['id_boostador'];

    $res = $conn->query($sql);

    if($res == true){
        print "<script>alert('Excluiu com sucesso!');</script>";
        print "<script>location.href='?page=lista-boostador';</script>";
    }else{
        print "<script>alert('Não excluiu');</script>";
        print "<script>location.href='?page=lista-boostador';</script>";
    }
break;

}
?>
