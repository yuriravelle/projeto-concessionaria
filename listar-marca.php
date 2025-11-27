<h1>Listar Marca</h1>
<?php
    $sql = "SELECT * FROM marca";
    $res = $conn-> query($sql);
    $qtd = $res ->num_rows;

    print "<p> Encontrou <b>$qtd </b> resultado(s). </p>";

    if($res == true){
        print "<table class = 'table table-bordered table-striped table-hover'>";
    }
        print "<tr>";
        print "<th>#</th>";
        print "<th>Nome</th>";
        print "<th>Ações</th>";
        print "<tr>";
        while( $row = $res -> fetch_object() ){
            print "<tr>";
            print "<td>".$row -> id_marca."</td>";
            print "<td>".$row -> nome_marca."</td>";
            print "<td><a href='?page=editar-marca&id=" . $row->id_marca . "' class='btn btn-sm btn-primary'>Editar</a> <a href='?page=salvar-marca&acao=remover&id=" . $row->id_marca . "' class='btn btn-sm btn-danger' onclick='return confirm(\"Tem certeza?\")'>Remover</a></td>";
            print "<tr>";
        }
