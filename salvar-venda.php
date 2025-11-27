<?php
include_once "config.php";

switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $data = $_POST['data_venda'];
        $valor = $_POST['valor_venda'];
        $cliente = $_POST['clientes_id_clientes'];
        $funcionario = $_POST['funcionario_id_funcionario'];
        $modelo = $_POST['modelo_id_modelo'];

        $sql = "INSERT INTO vendas (data_venda, valor_venda, clientes_id_clientes, funcionario_id_funcionario, modelo_id_modelo)
                VALUES ('$data', '$valor', '$cliente', '$funcionario', '$modelo')";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Venda cadastrada com Sucesso!');</script>";
            print "<script>location.href='?page=listar-venda';</script>";
        } else {
            print "<script>alert('Erro ao cadastrar venda!');</script>";
            print "<script>location.href='?page=listar-venda';</script>";
        }

        break;

    case 'editar':
        $id = $_POST['id_vendas'];
        $data = $_POST['data_venda'];
        $valor = $_POST['valor_venda'];
        $cliente = $_POST['clientes_id_clientes'];
        $funcionario = $_POST['funcionario_id_funcionario'];
        $modelo = $_POST['modelo_id_modelo'];

        $sql = "UPDATE vendas SET 
                    data_venda = '$data',
                    valor_venda = '$valor',
                    clientes_id_clientes = '$cliente',
                    funcionario_id_funcionario = '$funcionario',
                    modelo_id_modelo = '$modelo'
                WHERE id_vendas = $id";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Venda atualizada com Sucesso!');</script>";
            print "<script>location.href='?page=listar-venda';</script>";
        } else {
            print "<script>alert('Erro ao atualizar venda!');</script>";
            print "<script>location.href='?page=listar-venda';</script>";
        }

        break;

    case 'remover':
        $id = $_GET['id'];
        $sql = "DELETE FROM vendas WHERE id_vendas = $id";
        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Venda removida com Sucesso!');</script>";
            print "<script>location.href='?page=listar-venda';</script>";
        } else {
            print "<script>alert('Erro ao remover venda!');</script>";
            print "<script>location.href='?page=listar-venda';</script>";
        }

        break;
}
?>
