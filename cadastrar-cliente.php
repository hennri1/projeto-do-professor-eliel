<h1>Cadastrar Cliente</h1>
<form action="?page=salvar-cliente" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	<div class="mb-3">
		<label>Nome
			<input type="text" name="nome_cliente" class="form-control">
		</label>
	</div>
	<div class="mb-3">
		<label>E-mail
			<input type="text" name="email_cliente" class="form-control">
		</label>
	</div>
	<div class="mb-3">
		<label>Telefone
			<input type="text" name="telefone_cliente" class="form-control">
		</label>
	</div>
	<div class="mb-3">
		<label>Cpf
			<input type="text" name="cpf_cliente" class="form-control">
		</label>
	</div>
	<div class="mb-3">
		<label>Endereço
			<input type="text" name="endereco_cliente" class="form-control">
		</label>
	</div>
	<div class="mb-3">
		<label>Data de nacimento
			<input type="text" name="dt_nasc_cliente" class="form-control">
		</label>
	</div>
	<div class="mb-3">
		<button type="submit" class="btn btn-primary">Enviar</button>
	</div>
</form>