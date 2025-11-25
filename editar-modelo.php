<h1>Editar Modelo</h1>
<?php
    $sql = "SELECT mo.*, ma.nome_marca 
            FROM modelo AS mo
            INNER JOIN marca AS ma
            ON mo.marca_id_marca = ma.id_marca
            WHERE mo.id_modelo = ".$_REQUEST['id'];

    $res = $conn->query($sql);
    $row = $res->fetch_object();
?>
<form action="?page=salvar_modelo" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_modelo" value="<?php print $row->id_modelo; ?>">
    
    <div class="mb-3">
        <label>Nome do Modelo</label>
        <input type="text" name="nome_modelo" value="<?php print $row->nome_modelo; ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Cor</label>
        <input type="text" name="cor_modelo" value="<?php print $row->cor_modelo; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Ano</label>
        <input type="number" name="ano_modelo" value="<?php print $row->ano_modelo; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Tipo (Ex: Sedan, Hatch)</label>
        <input type="text" name="tipo_modelo" value="<?php print $row->tipo_modelo; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Marca</label>
        <select name="marca_id_marca" class="form-control" required>
            <option value="">--Escolha a Marca--</option>

            <?php
                $sqlMarca = "SELECT * FROM marca";
                $resultMarca = $conn->query($sqlMarca);

                while($marca = $resultMarca->fetch_object()){
                    $selected = ($marca->id_marca == $row->marca_id_marca) ? "selected" : "";
                    echo "<option value='{$marca->id_marca}' {$selected}>{$marca->nome_marca}</option>";
                }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Editar</button>
    </div>
</form>
