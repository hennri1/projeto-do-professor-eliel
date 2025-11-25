<h1>Lista Modelo</h1>
<?php
require_once 'config.php';

// Query corrigida usando a coluna correta de relação
$sql = "SELECT mo.*, ma.nome_marca
        FROM modelo AS mo
        INNER JOIN marca AS ma
        ON mo.marca_id_marca = ma.id_marca";

$res = $conn->query($sql);
$qtd = ($res) ? $res->num_rows : 0;

if($qtd > 0){
    print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    print "<table class='table table-bordered table-striped table-hover'>";
    print "<tr>
            <th>#</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Cor</th>
            <th>Ano</th>
            <th>Tipo</th>
            <th>Ações</th>
          </tr>";

    while($row = $res->fetch_object()){
        print "<tr>";
        print "<td>{$row->id_modelo}</td>";
        print "<td>{$row->nome_marca}</td>";
        print "<td>{$row->nome_modelo}</td>";
        print "<td>{$row->cor_modelo}</td>";
        print "<td>{$row->ano_modelo}</td>";
        print "<td>{$row->tipo_modelo}</td>";
        print "<td>
                <button class='btn btn-success' onclick=\"location.href='?page=editar-modelo&id_modelo={$row->id_modelo}';\">Editar</button>
                <button class='btn btn-danger' onclick=\"if(confirm('Deseja realmente excluir?')){location.href='?page=salvar-modelo&acao=excluir&id_modelo={$row->id_modelo}';}\">Excluir</button>
              </td>";
        print "</tr>";
    }

    print "</table>";
} else {
    print "<p>Nenhum resultado encontrado</p>";
}
?>