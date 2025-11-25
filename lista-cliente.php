<h1>Lista de Clientes</h1>
<?php
require_once "config.php";

$sql = "SELECT * FROM cliente";

$res = $conn->query($sql);

$qtd = $res->num_rows;

if($qtd > 0){
    print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    print "<table class='table table-bordered table-striped table-hover'>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Nome</th>";
    print "<th>E-mail</th>";
    print "<th>Telefone</th>";
    print "<th>Ações</th>";
    print "</tr>";

    while($row = $res->fetch_object()){
        print "<tr>";
        print "<td>".$row->id_cliente."</td>";
        print "<td>".$row->nome_cliente."</td>";
        print "<td>".$row->email_cliente."</td>";
        print "<td>".$row->telefone_cliente."</td>";

    print "<td>
                <button class='btn btn-success'
                    onclick=\"location.href='?page=editar-cliente&id={$row->id_cliente}';\">
                    Editar
                </button>

                <button class='btn btn-danger'
                    onclick=\"if(confirm('Deseja realmente excluir?')) {
                        location.href='?page=salvar-cliente&acao=excluir&id={$row->id_cliente}';
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
?>