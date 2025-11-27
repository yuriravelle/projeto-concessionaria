<?php
include "config.php";
?>

<h1>Editar Modelo</h1>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM modelo WHERE id_modelo = $id";
    $res = $conn->query($sql);
    $row = $res->fetch_object();

    if ($row) {
        ?>
        <form action="?page=salvar-modelo" method="POST">
            <input type="hidden" name="acao" value="editar">
            <input type="hidden" name="id_modelo" value="<?php echo $row->id_modelo; ?>">
            
            <div class="mb-3">
                <label>Marca:
                    <select name="marca_id_marca" class="form-control" required>
                        <option value="">Selecione a marca</option>
                        <?php
                        $sql_marca = "SELECT * FROM marca";
                        $res_marca = $conn->query($sql_marca);

                        while ($marca = $res_marca->fetch_object()) {
                            $selected = ($marca->id_marca == $row->marca_id_marca) ? 'selected' : '';
                            echo "<option value='{$marca->id_marca}' $selected>{$marca->nome_marca}</option>";
                        }
                        ?>
                    </select>
                </label>
            </div>
            
            <div class="mb-3">
                <label>Nome do veículo:
                    <input type="text" name="nome_modelo" class="form-control" value="<?php echo $row->nome_modelo; ?>">
                </label>
            </div>
            
            <div class="mb-3">
                <label>Ano:
                    <input type="text" name="ano_modelo" class="form-control" value="<?php echo $row->ano_modelo; ?>">
                </label>
            </div>
            
            <div class="mb-3">
                <label>Cor:
                    <input type="text" name="cor_modelo" class="form-control" value="<?php echo $row->cor_modelo; ?>">
                </label>
            </div>
            
            <div class="mb-3">
                <label>Tipo:
                    <input type="text" name="tipo_modelo" class="form-control" value="<?php echo $row->tipo_modelo; ?>">
                </label>
            </div>
            
            <div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="?page=listar-modelo" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
        <?php
    } else {
        echo "<p class='alert alert-danger'>Modelo não encontrado!</p>";
    }
} else {
    echo "<p class='alert alert-danger'>ID do modelo não foi informado!</p>";
}
?>
