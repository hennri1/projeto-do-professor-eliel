<h1>Lista funcionarios</h1>

<?php
require_once "config.php";

$sql = "SELECT * FROM funcionario";

$res = $conn->query($sql);

$qtd = ($res) ? $res->num_rows : 0;

if ($qtd > 0) {
    print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    print "<table class='table table-bordered table-striped table-hover'>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Nome</th>";
    print "<th>E-mail</th>";
    print "<th>Telefone</th>";
    print "<th>Ações</th>";
    print "</tr>";

    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>{$row->id_funcionario}</td>";
        print "<td>{$row->nome_funcionario}</td>";
        print "<td>{$row->email_funcionario}</td>";
        print "<td>{$row->telefone_funcionario}</td>";

        print "<td>
                <button class='btn btn-success'
                    onclick=\"location.href='?page=editar-funcionario&id={$row->id_funcionario}';\">
                    Editar
                </button>

                <button class='btn btn-danger'
                    onclick=\"if(confirm('Deseja realmente excluir?')) {
                        location.href='?page=salvar-funcionario&acao=excluir&id={$row->id_funcionario}';
                    }\">
                    Excluir
                </button>
            </td>";

        print "</tr>";
    }

    print "</table>";
} else {
    print "<p>Nenhum resultado encontrado.</p>";
}