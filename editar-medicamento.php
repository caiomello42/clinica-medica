<h1>Editar Medicamento</h1>
<?php
    // Busca o medicamento com segurança
    $stmt = $conn->prepare("SELECT * FROM medicamentos WHERE id_medicamento = ?");
    $stmt->bind_param("i", $_REQUEST["id_medicamento"]);
    $stmt->execute();
    $res = $stmt->get_result();
    $row = $res->fetch_object();

    // Verifica se o medicamento foi encontrado
    if (!$row) {
        print "<script>alert('Medicamento não encontrado!');</script>";
        print "<script>location.href='?page=listar-medicamento';</script>";
        exit;
    }
?>
<form action="?page=salvar-medicamento" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_medicamento" value="<?php print $row->id_medicamento; ?>">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" value="<?php print htmlspecialchars($row->nome_medicamento); ?>" required>
    </div>
    <div class="mb-3">
        <label>Descrição</label>
        <textarea name="descricao" class="form-control" required><?php print htmlspecialchars($row->descricao_medicamento); ?></textarea>
    </div>
    <div class="mb-3">
        <label>Preço de Custo</label>
        <input type="number" step="0.01" name="preco_custo" class="form-control" value="<?php print $row->preco_custo; ?>" min="0" required>
    </div>
    <div class="mb-3">
        <label>Preço de Venda</label>
        <input type="number" step="0.01" name="preco_venda" class="form-control" value="<?php print $row->preco_venda; ?>" min="0" required>
    </div>
    <div class="mb-3">
        <label>Estoque Atual</label>
        <input type="number" name="estoque_atual" class="form-control" value="<?php print $row->estoque_atual; ?>" min="0" required>
    </div>
    <div class="mb-3">
        <label>Estoque Mínimo</label>
        <input type="number" name="estoque_minimo" class="form-control" value="<?php print $row->estoque_minimo; ?>" min="0" required>
    </div>
    <div class="mb-3">
        <label>Fornecedor</label>
        <input type="text" name="fornecedor" class="form-control" value="<?php print htmlspecialchars($row->fornecedor); ?>" required>
    </div>
    <div class="mb-3">
        <label>Data de Validade</label>
        <input type="date" name="data_validade" class="form-control" value="<?php print $row->data_validade; ?>" required>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
</form>
