<?php
include_once "config.php";

switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $nome = $_POST['nome_cliente'];
        $email = $_POST['email_cliente'];
        $telefone = $_POST['telefone_cliente'];
        $cpf = $_POST['cpf_cliente'];
        $data = $_POST['dt_nasc_cliente'];

        $sql = "INSERT INTO clientes (nome_cliente, cpf_cliente, email_cliente, telefone_cliente, dat_nasc_cliente)
        VALUES ('$nome', '$cpf', '$email', '$telefone', '$data')";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastrou com Sucesso!');</script>";
            print "<script>location.href='?page=listar-cliente';</script>";
        } else {
            print "<script>alert('Não Cadastrou!');</script>";
            print "<script>location.href='?page=listar-cliente';</script>";
        }

        break;

    case 'editar':
        $id = $_POST['id_clientes'];
        $nome = $_POST['nome_cliente'];
        $email = $_POST['email_cliente'];
        $telefone = $_POST['telefone_cliente'];
        $cpf = $_POST['cpf_cliente'];
        $data = $_POST['dt_nasc_cliente'];

        $sql = "UPDATE clientes SET 
                    nome_cliente = '$nome', 
                    cpf_cliente = '$cpf', 
                    email_cliente = '$email', 
                    telefone_cliente = '$telefone',
                    dat_nasc_cliente = '$data' 
                WHERE id_clientes = $id";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cliente atualizado com Sucesso!');</script>";
            print "<script>location.href='?page=listar-cliente';</script>";
        } else {
            print "<script>alert('Erro ao atualizar cliente!');</script>";
            print "<script>location.href='?page=listar-cliente';</script>";
        }

        break;

    case 'remover':
        $id = $_GET['id'];

        $checkSql = "SELECT COUNT(*) as qtd FROM vendas WHERE clientes_id_clientes = $id";
        $checkRes = $conn->query($checkSql);
        $checkRow = $checkRes->fetch_object();

        if ($checkRow && $checkRow->qtd > 0) {
            print "<script>alert('Não é possível remover: existem vendas vinculadas a este cliente. Remova as vendas primeiro.');</script>";
            print "<script>location.href='?page=listar-cliente';</script>";
            break;
        }

        $sql = "DELETE FROM clientes WHERE id_clientes = $id";
        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cliente removido com Sucesso!');</script>";
            print "<script>location.href='?page=listar-cliente';</script>";
        } else {
            print "<script>alert('Erro ao remover cliente!');</script>";
            print "<script>location.href='?page=listar-cliente';</script>";
        }

        break;
}
