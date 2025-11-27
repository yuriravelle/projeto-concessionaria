<?php
include_once "config.php";
?>

<h1>Listar Venda</h1>

<?php
$sql = "SELECT * FROM vendas";
$res = $conn->query($sql);
$qtd = $res->num_rows;

print "<p>Encontrou <b>$qtd</b> resultado(s).</p>";

if ($qtd > 0) {
    print "<table class='table table-bordered table-striped table-hover'>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Data</th>";
    print "<th>Valor</th>";
    print "<th>Cliente</th>";
    print "<th>Funcionário</th>";
    print "<th>Modelo</th>";
    print "<th>Ações</th>";
    print "</tr>";

    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>" . $row->id_vendas . "</td>";
        print "<td>" . $row->data_venda . "</td>";
        print "<td>" . $row->valor_venda . "</td>";
        print "<td>" . $row->clientes_id_clientes . "</td>";
        print "<td>" . $row->funcionario_id_funcionario . "</td>";
        print "<td>" . $row->modelo_id_modelo . "</td>";
        print "<td><a href='?page=editar-venda&id=" . $row->id_vendas . "' class='btn btn-sm btn-primary'>Editar</a> <a href='?page=salvar-venda&acao=remover&id=" . $row->id_vendas . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Tem certeza?\")'>Remover</a></td>";
        print "</tr>";
    }

    print "</table>";
} else {
    print "<p>Nenhuma venda encontrada!</p>";
}
?>
