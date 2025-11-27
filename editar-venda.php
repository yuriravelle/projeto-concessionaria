<?php
include_once "config.php";
?>

<h1>Editar Venda</h1>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM vendas WHERE id_vendas = $id";
    $res = $conn->query($sql);
    $row = $res->fetch_object();

    if ($row) {
        ?>
        <form action="?page=salvar-venda" method="POST">
            <input type="hidden" name="acao" value="editar">
            <input type="hidden" name="id_vendas" value="<?php echo $row->id_vendas; ?>">
            
            <div class="mb-3">
                <label>Data:
                    <input type="text" name="data_venda" class="form-control" value="<?php echo $row->data_venda; ?>">
                </label>
            </div>
            
            <div class="mb-3">
                <label>Valor:
                    <input type="text" name="valor_venda" class="form-control" value="<?php echo $row->valor_venda; ?>">
                </label>
            </div>
            
            <div class="mb-3">
                <label>Cliente:
                    <select name="clientes_id_clientes" class="form-control" required>
                        <option value="">Selecione o cliente</option>
                        <?php
                        $sql_cliente = "SELECT * FROM clientes";
                        $res_cliente = $conn->query($sql_cliente);

                        while ($cliente = $res_cliente->fetch_object()) {
                            $selected = ($cliente->id_clientes == $row->clientes_id_clientes) ? 'selected' : '';
                            echo "<option value='{$cliente->id_clientes}' $selected>{$cliente->nome_cliente}</option>";
                        }
                        ?>
                    </select>
                </label>
            </div>
            
            <div class="mb-3">
                <label>Funcionário:
                    <select name="funcionario_id_funcionario" class="form-control" required>
                        <option value="">Selecione o funcionário</option>
                        <?php
                        $sql_func = "SELECT * FROM funcionario";
                        $res_func = $conn->query($sql_func);

                        while ($func = $res_func->fetch_object()) {
                            $selected = ($func->id_funcionario == $row->funcionario_id_funcionario) ? 'selected' : '';
                            echo "<option value='{$func->id_funcionario}' $selected>{$func->nome_funcionario}</option>";
                        }
                        ?>
                    </select>
                </label>
            </div>
            
            <div class="mb-3">
                <label>Modelo:
                    <select name="modelo_id_modelo" class="form-control" required>
                        <option value="">Selecione o modelo</option>
                        <?php
                        $sql_modelo = "SELECT * FROM modelo";
                        $res_modelo = $conn->query($sql_modelo);

                        while ($modelo = $res_modelo->fetch_object()) {
                            $selected = ($modelo->id_modelo == $row->modelo_id_modelo) ? 'selected' : '';
                            echo "<option value='{$modelo->id_modelo}' $selected>{$modelo->nome_modelo}</option>";
                        }
                        ?>
                    </select>
                </label>
            </div>
            
            <div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="?page=listar-venda" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
        <?php
    } else {
        echo "<p class='alert alert-danger'>Venda não encontrada!</p>";
    }
} else {
    echo "<p class='alert alert-danger'>ID da venda não foi informado!</p>";
}
?>
