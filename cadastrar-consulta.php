<h1>Cadastrar Consulta</h1>

<form action="?page=salvar-consulta" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	
	<div class="mb-3">
		<label>Nome do Paciente</label>
		<input type="text" name="nome_paciente" class="form-control">
	</div>
	
	<div class="mb-3">
		<label>Data da Consulta</label>
		<input type="datetime-local" name="data_consulta" class="form-control">
	</div>

	<div class="mb-3">
		<label>Especialidade</label>
		<select name="especialidade_consulta" class="form-control">
			<option value="">Selecione a especialidade</option>
			<option value="clinico">Cardiologia</option>
			<option value="cardiologia">Fisioterapia</option>
			<option value="ortopedia">Pediatria</option>
            <option value="ortopedia">Ortopedia</option>
		</select>
	</div>
	
	<div class="mb-3">
		<label>Descrição</label>
		<textarea name="descricao_consulta" class="form-control" rows="4"></textarea>
	</div>

	<div class="mb-3">
		<label>Preço da Consulta</label>
		<input type="number" name="preco_consulta" class="form-control" step="0.01">
	</div>
	
	<div class="mb-3">
		<button type="submit" class="btn btn-success">Salvar</button>
	</div>
</form>
