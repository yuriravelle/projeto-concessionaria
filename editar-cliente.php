<?php
include "config.php";
?>

<h1>Editar Cliente</h1>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM clientes WHERE id_clientes = $id";
    $res = $conn->query($sql);
    $row = $res->fetch_object();

    if ($row) {
        ?>
        <form action="?page=salvar-cliente" method="POST">
            <input type="hidden" name="acao" value="editar">
            <input type="hidden" name="id_clientes" value="<?php echo $row->id_clientes; ?>">
            
            <div class="mb-3">
                <label>Nome:
                    <input type="text" name="nome_cliente" class="form-control" value="<?php echo $row->nome_cliente; ?>">
                </label>
            </div>
            
            <div class="mb-3">
                <label>CPF:
                    <input type="text" name="cpf_cliente" class="form-control" value="<?php echo $row->cpf_cliente; ?>">
                </label>
            </div>
            
            <div class="mb-3">
                <label>Email:
                    <input type="text" name="email_cliente" class="form-control" value="<?php echo $row->email_cliente; ?>">
                </label>
            </div>
            
            <div class="mb-3">
                <label>Telefone:
                    <input type="text" name="telefone_cliente" class="form-control" value="<?php echo $row->telefone_cliente; ?>">
                </label>
            </div>
            
            <div class="mb-3">
                <label>Data de nascimento:
                    <input type="date" name="dt_nasc_cliente" class="form-control" value="<?php echo $row->dat_nasc_cliente; ?>">
                </label>
            </div>
            
            <div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="?page=listar-cliente" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
        <?php
    } else {
        echo "<p class='alert alert-danger'>Cliente não encontrado!</p>";
    }
} else {
    echo "<p class='alert alert-danger'>ID do cliente não foi informado!</p>";
}
?>
