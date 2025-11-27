<h1>Cadastrar Cliente</h1>
<form action="?page=salvar-cliente" method="POST">
    <input type="hidden" name="acao" value="cadastrar"></input>
    <div class="mb-3">
        <label>Nome:
            <input type="text" name="nome_cliente" class="form-control">
        <label>
    </div>
    <div class="mb-3">
        <label>CPF:
            <input type="text" name="cpf_cliente" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>Email:
            <input type="text" name="email_cliente" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>Telefone:
            <input type="text" name="telefone_cliente" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>Endereço:
            <input type="text" name="endereco_cliente" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>Data de nascimento:
            <input type="date" name="dt_nasc_cliente" class="form-control">
        </label>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>