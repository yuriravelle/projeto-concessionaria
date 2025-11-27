<?php
include_once "config.php";
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $nome = $_POST['nome_marca'];

        $sql = "INSERT INTO marca (
            nome_marca)
            VALUES ('{$nome}')";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastrou com Sucesso!');</script>";
            print "<script>location.href='?page=listar-marca';</script>";
        } else {
            print "<script>alert('Não Cadastrou!');</script>";
            print "<script>location.href='?page=listar-marca';</script>";
        }

        break;

    case 'editar':
        $id = $_POST['id_marca'];
        $nome = $_POST['nome_marca'];

        $sql = "UPDATE marca SET nome_marca = '$nome' WHERE id_marca = $id";
        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Marca atualizada com Sucesso!');</script>";
            print "<script>location.href='?page=listar-marca';</script>";
        } else {
            print "<script>alert('Erro ao atualizar marca!');</script>";
            print "<script>location.href='?page=listar-marca';</script>";
        }

        break;

    case 'remover':
        $id = $_GET['id'];

        $checkSql = "SELECT COUNT(*) as qtd FROM modelo WHERE marca_id_marca = $id";
        $checkRes = $conn->query($checkSql);
        $checkRow = $checkRes->fetch_object();

        if ($checkRow && $checkRow->qtd > 0) {
            print "<script>alert('Não é possível remover: existem modelos vinculados a esta marca. Remova os modelos primeiro.');</script>";
            print "<script>location.href='?page=listar-marca';</script>";
            break;
        }

        $sql = "DELETE FROM marca WHERE id_marca = $id";
        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Marca removida com Sucesso!');</script>";
            print "<script>location.href='?page=listar-marca';</script>";
        } else {
            print "<script>alert('Erro ao remover marca!');</script>";
            print "<script>location.href='?page=listar-marca';</script>";
        }

        break;

}