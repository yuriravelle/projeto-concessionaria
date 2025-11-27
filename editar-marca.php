<?php
include "config.php";
?>

<h1>Editar Marca</h1>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM marca WHERE id_marca = $id";
    $res = $conn->query($sql);
    $row = $res->fetch_object();

    if ($row) {
        ?>
        <form action="?page=salvar-marca" method="POST">
            <input type="hidden" name="acao" value="editar">
            <input type="hidden" name="id_marca" value="<?php echo $row->id_marca; ?>">
            
            <div class="mb-3">
                <label>Nome:
                    <input type="text" name="nome_marca" class="form-control" value="<?php echo $row->nome_marca; ?>">
                </label>
            </div>
            
            <div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="?page=listar-marca" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
        <?php
    } else {
        echo "<p class='alert alert-danger'>Marca não encontrada!</p>";
    }
} else {
    echo "<p class='alert alert-danger'>ID da marca não foi informado!</p>";
}
?>
