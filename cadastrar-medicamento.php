<h1>Cadastrar Medicamento</h1>

<form action="?page=salvar-medicamento" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    
    <div class="mb-3">
        <label>Nome do Medicamento</label>
        <input type="text" name="nome_medicamento" class="form-control">
    </div>
    
    <div class="mb-3">
        <label>Descrição</label>
        <textarea name="descricao_medicamento" class="form-control"></textarea>
    </div>
    
    <div class="mb-3">
        <label>Preço de Custo</label>
        <input type="number" name="preco_custo" class="form-control">
    </div>
    
    <div class="mb-3">
        <label>Preço de Venda</label>
        <input type="number" name="preco_venda" class="form-control">
    </div>
    
    <div class="mb-3">
        <label>Quantidade em Estoque</label>
        <input type="number" name="estoque_atual" class="form-control">
    </div>
    
    <div class="mb-3">
        <label>Estoque Mínimo</label>
        <input type="number" name="estoque_minimo" class="form-control">
    </div>
    
    <div class="mb-3">
        <label>Fornecedor</label>
        <input type="text" name="fornecedor" class="form-control">
    </div>
    
    <div class="mb-3">
        <label>Data de Validade</label>
        <input type="date" name="data_validade" class="form-control">
    </div>
    
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>

</form>
