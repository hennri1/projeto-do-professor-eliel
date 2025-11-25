<h1>Listar Vendas</h1>
<?php
    $sql = "SELECT 
                v.id_venda,
                v.data_venda,
                v.valor_venda,

                c.nome_cliente,
                f.nome_funcionario,
                m.nome_modelo,
                ma.nome_marca

            FROM venda AS v
            INNER JOIN cliente AS c ON v.cliente_id_cliente = c.id_cliente
            INNER JOIN funcionario AS f ON v.funcionario_id_funcionario = f.id_funcionario
            INNER JOIN modelo AS m ON v.modelo_id_modelo = m.id_modelo
            INNER JOIN marca AS ma ON m.marca_id_marca = ma.id_marca";

    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if($qtd > 0){
        print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
        print "<table class='table table-hover table-striped table-bordered'>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Cliente</th>";
        print "<th>Funcionário</th>";
        print "<th>Marca</th>";
        print "<th>Modelo</th>";
        print "<th>Data</th>";
        print "<th>Valor</th>";
        print "<th>Ações</th>";
        print "</tr>";
        
        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->id_venda."</td>";
            print "<td>".$row->nome_cliente."</td>";
            print "<td>".$row->nome_funcionario."</td>";
            print "<td>".$row->nome_marca."</td>";
            print "<td>".$row->nome_modelo."</td>";
            print "<td>".$row->data_venda."</td>";
            print "<td>R$ ".number_format($row->valor_venda, 2, ',', '.')."</td>"; 
            print "<td>
                <button onclick=\"location.href='?page=editar-venda&id_venda=".$row->id_venda."';\" class='btn btn-success'>Editar</button>
                <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-venda&acao=excluir&id_venda=".$row->id_venda."';}else{false;}\" class='btn btn-danger'>Excluir</button>
            </td>";
            print "</tr>";
        }
        print "</table>";

    }else{
        print "<p>Não encontrou resultado</p>";
}
    