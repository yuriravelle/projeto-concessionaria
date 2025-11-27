<h1>Cadastrar Modelo</h1>

<form action="?page=salvar-modelo" method="POST">
    <input type="hidden" name="acao" value="cadastrar">

    <div class="mb-3">
        <label>Marca:</label>
        <select name="marca_id_marca" class="form-control" required>
            <option value="">Selecione a marca</option>
            <?php
            $sql = "SELECT * FROM marca";
            $res = $conn->query($sql);

            while ($row = $res->fetch_object()) {
                echo "<option value='{$row->id_marca}'>{$row->nome_marca}</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Nome do veiculo:</label>
        <input type="text" name="nome_modelo" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Ano:</label>
        <input type="text" name="ano_modelo" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Cor:</label>
        <input type="text" name="cor_modelo" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Tipo:</label>
        <input type="text" name="tipo_modelo" class="form-control" required>
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>