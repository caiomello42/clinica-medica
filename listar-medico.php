<h1>Listar Médicos</h1>
<?php
// Consulta SQL para buscar todos os médicos
$sql = "SELECT * FROM medico";

// Executa a consulta
$res = $conn->query($sql);

// Obtém a quantidade de resultados
$qtd = $res->num_rows;

// Verifica se há resultados
if ($qtd > 0) {
    echo "<p>Encontrou <b>$qtd</b> resultado(s)</p>";

    // Inicia a tabela HTML
    echo "<table class='table table-bordered table-striped table-hover'>";
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Nome</th>";
    echo "<th>CRM</th>";
    echo "<th>Especialidade</th>";
    echo "<th>Ações</th>";
    echo "</tr>";

    // Exibe cada médico encontrado
    while ($row = $res->fetch_object()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row->id_medico) . "</td>";
        echo "<td>" . htmlspecialchars($row->nome_medico) . "</td>";
        echo "<td>" . htmlspecialchars($row->crm_medico) . "</td>";
        echo "<td>" . htmlspecialchars($row->especialidade_medico) . "</td>";
        echo "<td>
                <button class='btn btn-success' onclick=\"location.href='?page=editar-medico&id_medico=" . $row->id_medico . "';\">Editar</button>
                <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-medico&acao=excluir&id_medico=" . $row->id_medico . "';}else{false;}\">Excluir</button>
              </td>";
        echo "</tr>";
    }

    // Fecha a tabela HTML
    echo "</table>";
} else {
    // Caso não encontre nenhum resultado
    echo "Não encontrou resultados";
}
?>
