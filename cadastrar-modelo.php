<h1>Cadastrar Modelo</h1>
    <from action="?page=salvar-modelo&acao=cadastrar" method="POST">
        <input type="hidden" name="acao" value="cadastrar">
        <div class="mb-3">
            <label>Modelo
                <select name="id_modelo" class="form-control">
                    <?php
                    $sql = "SELECT * FROM modelo";
                    $res = $conn->query($sql);
                    $qtd = $res ? $res->num_rows : 0;
                    if ($qtd > 0) {
                        while ($row = $res->fetch_object()) {
                            print "<option value='" . htmlspecialchars($row->id_modelo) . "'>" . htmlspecialchars($row->nome_modelo) . "</option>";
                      
                        }
                    }else {
                        print "<option value=''>Nenhum modelo encontrado</option>";
                    }
                    ?>
                </select>
            </label>
        </div>
        <div class="mb-3">
            <label>Nome
                <input type="text" name="nome_modelo" class="form-control">
            </label>
        </div>
        <div class="mb-3"> 
            <label>Ano
                <input type="number" name="ano_modelo" class="form-control">
            </label>
        </div>
        <div class="mb-3">
            <label>tipo
                <textarea name="tipo_modelo" class="form-control"></textarea>
            </label>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>