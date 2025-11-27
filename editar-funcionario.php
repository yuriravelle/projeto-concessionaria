<?php
include "config.php";
?>

<h1>Editar Funcionário</h1>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM funcionario WHERE id_funcionario = $id";
    $res = $conn->query($sql);
    $row = $res->fetch_object();

    if ($row) {
        ?>
        <form action="?page=salvar-funcionario" method="POST">
            <input type="hidden" name="acao" value="editar">
            <input type="hidden" name="id_funcionario" value="<?php echo $row->id_funcionario; ?>">
            
            <div class="mb-3">
                <label>Nome:
                    <input type="text" name="nome_funcionario" class="form-control" value="<?php echo $row->nome_funcionario; ?>">
                </label>
            </div>
            
            <div class="mb-3">
                <label>Email:
                    <input type="text" name="email_funcionario" class="form-control" value="<?php echo $row->email_funcionario; ?>">
                </label>
            </div>
            
            <div class="mb-3">
                <label>Telefone:
                    <input type="text" name="telefone_funcionario" class="form-control" value="<?php echo $row->telefone_funcionario; ?>">
                </label>
            </div>
            
            <div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="?page=listar-funcionario" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
        <?php
    } else {
        echo "<p class='alert alert-danger'>Funcionário não encontrado!</p>";
    }
} else {
    echo "<p class='alert alert-danger'>ID do funcionário não foi informado!</p>";
}
?>
