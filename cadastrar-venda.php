<?php
include_once "config.php";
?>

<h1>Cadastrar Venda</h1>

<form action="?page=salvar-venda" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    
    <div class="mb-3">
        <label>Data:
            <input type="date" name="data_venda" class="form-control" required>
        </label>
    </div>
    
    <div class="mb-3">
        <label>Valor:
            <input type="text" name="valor_venda" class="form-control" required>
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
                    echo "<option value='{$cliente->id_clientes}'>{$cliente->nome_cliente}</option>";
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
                    echo "<option value='{$func->id_funcionario}'>{$func->nome_funcionario}</option>";
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
                    echo "<option value='{$modelo->id_modelo}'>{$modelo->nome_modelo}</option>";
                }
                ?>
            </select>
        </label>
    </div>
    
    <div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>
