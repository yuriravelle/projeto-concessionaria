<h1>Listar Cliente</h1>

<?php
$sql = "SELECT * FROM `clientes`";
$res = $conn->query($sql);
$qtd = $res->num_rows;

print "<p>Encontrou <b>$qtd</b> resultado(s).</p>";

if ($qtd > 0) {
    print "<table class='table table-bordered table-striped table-hover'>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Nome</th>";
    print "<th>CPF</th>";
    print "<th>E-mail</th>";
    print "<th>Telefone</th>";
    print "<th>Data de nascimento</th>";
    print "<th>Ações</th>";
    print "</tr>";

    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>" . $row->id_clientes . "</td>";
        print "<td>" . $row->nome_cliente . "</td>";
        print "<td>" . $row->cpf_cliente . "</td>";
        print "<td>" . $row->email_cliente . "</td>";
        print "<td>" . $row->telefone_cliente . "</td>";
        print "<td>" . $row->dat_nasc_cliente . "</td>";
        print "<td><a href='?page=editar-cliente&id=" . $row->id_clientes . "' class='btn btn-sm btn-primary'>Editar</a> <a href='?page=salvar-cliente&acao=remover&id=" . $row->id_clientes . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Tem certeza?\")'>Remover</a></td>";
        print "</tr>";
    }

    print "</table>";
} else {
    print "<p>Nenhum cliente encontrado!</p>";
}
?>
