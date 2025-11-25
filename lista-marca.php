<h1>Listar Marcas</h1>
<?php
    $sql = "SELECT * FROM marca";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if($qtd > 0){
        print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
        print "<table class='table table-hover table-striped table-bordered'>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Nome da Marca</th>";
        print "<th>Ações</th>";
        print "</tr>";

        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->id_marca."</td>";
            print "<td>".$row->nome_marca."</td>";
            print "<td>
                <button onclick=\"location.href='?page=editar-marca&id=".$row->id_marca."';\" class='btn btn-success'>Editar</button>
                <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-marca&acao=excluir&id=".$row->id_marca."';}else{false;}\" class='btn btn-danger'>Excluir</button>
            </td>";
            print "</tr>";
        }
        print "</table>";

    }else{
        print "<p>Não encontrou resultado</p>";
}
?>