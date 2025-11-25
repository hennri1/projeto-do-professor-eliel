<h1>Editar Venda</h1>
<?php
    $sql = "SELECT v.*
            FROM venda AS v
            WHERE v.id_venda = ".$_REQUEST['id_venda'];

    $res = $conn->query($sql);
    $row = $res->fetch_object();
    
    $cliente_selecionado = $row->cliente_id_cliente;
    $funcionario_selecionado = $row->funcionario_id_funcionario;
    $modelo_selecionado = $row->modelo_id_modelo;
?>
<form action="?page=salvar-venda" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_venda" value="<?php print $row->id_venda; ?>">
    
    <div class="mb-3">
        <label>Cliente</label>
        <select name="cliente_id_cliente" class="form-control" required>
            <option value="">--Escolha o Cliente--</option>
            <?php 
                $sqlCliente = "SELECT id_cliente, nome_cliente FROM cliente ORDER BY nome_cliente";
                $resultCliente = $conn->query($sqlCliente);
                
                while($cliente = $resultCliente->fetch_object()){
                    $selected = ($cliente->id_cliente == $cliente_selecionado) ? "selected" : "";
                    echo "<option value='{$cliente->id_cliente}' {$selected}>{$cliente->nome_cliente}</option>";
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Funcionário</label>
        <select name="funcionario_id_funcionario" class="form-control" required>
            <option value="">--Escolha o Funcionário--</option>
            <?php 
                $sqlFuncionario = "SELECT id_funcionario, nome_funcionario FROM funcionario ORDER BY nome_funcionario";
                $resultFuncionario = $conn->query($sqlFuncionario);

                while($funcionario = $resultFuncionario->fetch_object()){
                    $selected = ($funcionario->id_funcionario == $funcionario_selecionado) ? "selected" : "";
                    echo "<option value='{$funcionario->id_funcionario}' {$selected}>{$funcionario->nome_funcionario}</option>";
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Modelo do Veículo</label>
        <select name="modelo_id_modelo" class="form-control" required>
            <option value="">--Escolha o Modelo--</option>
            <?php
                $sqlModelo = "SELECT mo.id_modelo, ma.nome_marca, mo.nome_modelo 
                              FROM modelo AS mo
                              INNER JOIN marca AS ma ON mo.marca_id_marca = ma.id_marca 
                              ORDER BY ma.nome_marca, mo.nome_modelo";
                $resultModelo = $conn->query($sqlModelo);
                
                while($modelo = $resultModelo->fetch_object()){
                    $selected = ($modelo->id_modelo == $modelo_selecionado) ? "selected" : "";
                    $nome_completo = $modelo->nome_marca.' - '.$modelo->nome_modelo;
                    echo "<option value='{$modelo->id_modelo}' {$selected}>{$nome_completo}</option>";
                }
            ?>
        </select>
    </div>
    
    <div class="mb-3">
        <label>Data da Venda</label>
        <input type="date" name="data_venda" value="<?php print $row->data_venda; ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Valor da Venda</label>
        <input type="text" name="valor_venda" value="<?php print $row->valor_venda; ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Salvar Edição</button>
    </div>
</form>
