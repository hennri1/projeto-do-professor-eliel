<?php
require_once 'config.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT * FROM funcionario WHERE id_funcionario = $id";
$res = $conn->query($sql);
$row = $res ? $res->fetch_object() : null;
?>

<h1>Editar funcionário</h1>
<?php if ($row): ?>
<form action="salvar-funcionario.php" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_funcionario" value="<?php echo htmlspecialchars($row->id_funcionario); ?>">
    <div class="mb-3">
        <label>Nome
        <input type="text" name="nome_funcionario" value="<?php echo htmlspecialchars($row->nome_funcionario); ?>" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>E-mail
        <input type="email" name="email_funcionario" value="<?php echo htmlspecialchars($row->email_funcionario); ?>" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>Telefone
        <input type="text" name="telefone_funcionario" value="<?php echo htmlspecialchars($row->telefone_funcionario); ?>" class="form-control">
        </label>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
<?php else: ?>
    <p>Funcionário não encontrado.</p>
<?php endif; ?>