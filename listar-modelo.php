<h1>Listar Modelo</h1>
<?php
$sql = "SELECT * FROM modelo";
$res = $conn->query($sql);
$qtd = $res->num_rows;
print "<p> Encontrou <b>$qtd </b> resultado(s). </p>";

if ($res == true) {
    print "<table class = 'table table-bordered table-striped table-hover'>";
}
print "<tr>";
print "<th>#</th>";
print "<th>Nome</th>";
print "<th>Ano</th>";
print "<th>Cor</th>";
print "<th>tipo</th>";
print "<th>Ações</th>";


print "<tr>";
while ($row = $res->fetch_object()) {
    print "<tr>";
    print "<td>" . $row->id_modelo . "</td>";
    print "<td>" . $row->nome_modelo . "</td>";
    print "<td>" . $row->ano_modelo . "</td>";
    print "<td>" . $row->cor_modelo . "</td>";
    print "<td>" . $row->tipo_modelo . "</td>";
    print "<td><a href='?page=editar-modelo&id=" . $row->id_modelo . "' class='btn btn-sm btn-primary'>Editar</a> <a href='?page=salvar-modelo&acao=remover&id=" . $row->id_modelo . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Tem certeza?\")'>Remover</a></td>";




    print "<tr>";
}