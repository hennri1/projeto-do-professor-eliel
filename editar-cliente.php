<h1>Editar Cliente</h1>
<?php
    $sql = "SELECT * FROM cliente WHERE id_cliente=".$_REQUEST['id'];
    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>
<form action="?page=salvar_cliente" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_cliente" value="<?php print $row->id_cliente; ?>">
    
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome_cliente" value="<?php print $row->nome_cliente; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>CPF</label>
        <input type="text" name="cpf" value="<?php print $row->cpf; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Telefone</label>
        <input type="text" name="telefone_cliente" value="<?php print $row->telefone_cliente; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>E-mail</label>
        <input type="email" name="email_cliente" value="<?php print $row->email_cliente; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Endereço</label>
        <input type="text" name="edereco_cliente" value="<?php print $row->edereco_cliente; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Data de Nascimento</label>
        <input type="date" name="dt_nasc_client" value="<?php print $row->dt_nasc_client; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Editar</button>
    </div>
</form>
