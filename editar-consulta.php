<h1>Editar Consulta</h1>

<?php
// Verifica se o ID da consulta foi fornecido e é válido
$id_consulta = isset($_REQUEST['id_consulta']) ? intval($_REQUEST['id_consulta']) : 0;

if ($id_consulta <= 0) {
    die("ID da consulta inválido.");
}

// Prepara a consulta SQL para buscar os dados da consulta
$sql = "SELECT * FROM consulta WHERE id_consulta = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $id_consulta); // Bind do parâmetro
    $stmt->execute();
    $res = $stmt->get_result();

    // Verifica se a consulta foi encontrada
    if ($res->num_rows > 0) {
        $row = $res->fetch_object();
    } else {
        die("Consulta não encontrada.");
    }
    $stmt->close();
} else {
    die("Erro ao preparar a consulta.");
}
?>

<form action="?page=salvar-consulta" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_consulta" value="<?php echo $row->id_consulta; ?>">

    <!-- Nome do Paciente -->
    <div class="mb-3">
        <label>Nome do Paciente</label>
        <input type="text" name="nome_paciente" class="form-control" value="<?php echo htmlspecialchars($row->nome_paciente); ?>" required>
    </div>

    <!-- Data da Consulta -->
    <div class="mb-3">
        <label>Data da Consulta</label>
        <input type="datetime-local" name="data_consulta" class="form-control" value="<?php echo date('Y-m-d\TH:i', strtotime($row->data_consulta)); ?>" required>
    </div>

    <!-- Especialidade -->
    <div class="mb-3">
        <label>Especialidade</label>
        <input type="text" name="especialidade_consulta" class="form-control" value="<?php echo htmlspecialchars($row->especialidade_consulta); ?>" required>
    </div>

    <!-- Descrição -->
    <div class="mb-3">
        <label>Descrição</label>
        <textarea name="descricao_consulta" class="form-control" rows="4" required><?php echo htmlspecialchars($row->descricao_consulta); ?></textarea>
    </div>

    <!-- Preço da Consulta -->
    <div class="mb-3">
        <label>Preço da Consulta</label>
        <input type="number" name="preco_consulta" class="form-control" value="<?php echo number_format($row->preco_consulta, 2, '.', ''); ?>" step="0.01" required>
    </div>

    <!-- Botão de Salvar -->
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
</form>
