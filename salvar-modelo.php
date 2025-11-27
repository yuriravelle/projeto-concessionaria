<?php
include_once "config.php";
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $nome  = $_POST['nome_modelo'];
        $cor   = $_POST['cor_modelo'];
        $ano   = $_POST['ano_modelo'];
        $tipo  = $_POST['tipo_modelo'];
        $marca = $_POST['marca_id_marca'];

        $sql = "INSERT INTO modelo (
                    nome_modelo,
                    cor_modelo,
                    ano_modelo,
                    tipo_modelo,
                    marca_id_marca
                ) VALUES (
                    '{$nome}',
                    '{$cor}',
                    '{$ano}',
                    '{$tipo}',
                    '{$marca}'
                )";

        $res = $conn->query($sql);

        if ($res === true) {
            print "<script>alert('Cadastrou com sucesso!');</script>";
            print "<script>location.href='?page=listar-modelo';</script>";
        } else {
            print "<script>alert('Não cadastrou!');</script>";
            print "<script>location.href='?page=listar-modelo';</script>";
        }

        break;

    case 'editar':
        $id = $_POST['id_modelo'];
        $nome = $_POST['nome_modelo'];
        $cor = $_POST['cor_modelo'];
        $ano = $_POST['ano_modelo'];
        $tipo = $_POST['tipo_modelo'];
        $marca = $_POST['marca_id_marca'];

        $sql = "UPDATE modelo SET 
                    nome_modelo = '$nome',
                    cor_modelo = '$cor',
                    ano_modelo = '$ano',
                    tipo_modelo = '$tipo',
                    marca_id_marca = '$marca'
                WHERE id_modelo = $id";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Modelo atualizado com Sucesso!');</script>";
            print "<script>location.href='?page=listar-modelo';</script>";
        } else {
            print "<script>alert('Erro ao atualizar modelo!');</script>";
            print "<script>location.href='?page=listar-modelo';</script>";
        }

        break;

    case 'remover':
        $id = $_GET['id'];
        $sql = "DELETE FROM modelo WHERE id_modelo = $id";
        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Modelo removido com Sucesso!');</script>";
            print "<script>location.href='?page=listar-modelo';</script>";
        } else {
            print "<script>alert('Erro ao remover modelo!');</script>";
            print "<script>location.href='?page=listar-modelo';</script>";
        }

        break;
}
?>
