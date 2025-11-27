<?php
include_once "config.php";
    switch($_REQUEST['acao']){
        case 'cadastrar':
            $nome = $_POST['nome_funcionario'];
            $email = $_POST['email_funcionario'];
            $telefone = $_POST['telefone_funcionario'];
            
            $sql = "INSERT INTO funcionario (
            nome_funcionario, email_funcionario, telefone_funcionario)
            VALUES ( '{$nome}','{$email}','{$telefone}')";

            $res = $conn ->query($sql);

            if($res == true){
                print "<script>alert('Cadastrou com Sucesso!');</script>";
                print "<script>location.href='?page=listar-funcionario';</script>";
            }else{
                print "<script>alert('Não Cadastrou!');</script>";
                print "<script>location.href='?page=listar-funcionario';</script>";
            }
            
            break;

        case 'editar':
            $id = $_POST['id_funcionario'];
            $nome = $_POST['nome_funcionario'];
            $email = $_POST['email_funcionario'];
            $telefone = $_POST['telefone_funcionario'];

            $sql = "UPDATE funcionario SET 
                        nome_funcionario = '$nome', 
                        email_funcionario = '$email', 
                        telefone_funcionario = '$telefone' 
                    WHERE id_funcionario = $id";

            $res = $conn->query($sql);

            if ($res == true) {
                print "<script>alert('Funcionário atualizado com Sucesso!');</script>";
                print "<script>location.href='?page=listar-funcionario';</script>";
            } else {
                print "<script>alert('Erro ao atualizar funcionário!');</script>";
                print "<script>location.href='?page=listar-funcionario';</script>";
            }

            break;

        case 'remover':
                $id = $_GET['id'];

                $checkSql = "SELECT COUNT(*) as qtd FROM vendas WHERE funcionario_id_funcionario = $id";
                $checkRes = $conn->query($checkSql);
                $checkRow = $checkRes->fetch_object();

                if ($checkRow && $checkRow->qtd > 0) {
                    print "<script>alert('Não é possível remover: existem vendas vinculadas a este funcionário. Remova as vendas primeiro.');</script>";
                    print "<script>location.href='?page=listar-funcionario';</script>";
                    break;
                }

                $sql = "DELETE FROM funcionario WHERE id_funcionario = $id";
                $res = $conn->query($sql);

                if ($res == true) {
                    print "<script>alert('Funcionário removido com Sucesso!');</script>";
                    print "<script>location.href='?page=listar-funcionario';</script>";
                } else {
                    print "<script>alert('Erro ao remover funcionário!');</script>";
                    print "<script>location.href='?page=listar-funcionario';</script>";
                }

                break;
    
    
    
    
        }