<h1>Listar Medicamentos no Estoque</h1>

<?php

$sql = "SELECT * FROM medicamentos";

$res = $conn->query($sql);

$qtd = $res->num_rows;

if ($qtd > 0) {
    echo "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    echo "<table class='table table-bordered table-striped table-hover'>";
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Nome</th>";
    echo "<th>Descrição</th>";
    echo "<th>Preço Custo</th>";
    echo "<th>Preço Venda</th>";
    echo "<th>Estoque Atual</th>";
    echo "<th>Estoque Mínimo</th>";
    echo "<th>Fornecedor</th>";
    echo "<th>Data de Validade</th>";
    echo "<th>Ações</th>";
    echo "</tr>";

    while ($row = $res->fetch_assoc()) {
        $preco_custo = "R$ " . number_format($row['preco_custo'], 2, ',', '.');
        $preco_venda = "R$ " . number_format($row['preco_venda'], 2, ',', '.');
        $data_validade = date("d/m/Y", strtotime($row['data_validade']));

        echo "<tr>";
        echo "<td>" . $row['id_medicamento'] . "</td>";
        echo "<td>" . $row['nome_medicamento'] . "</td>";
        echo "<td>" . htmlspecialchars($row['descricao_medicamento']) . "</td>";
        echo "<td>" . $preco_custo . "</td>";
        echo "<td>" . $preco_venda . "</td>";
        echo "<td>" . $row['estoque_atual'] . "</td>";
        echo "<td>" . $row['estoque_minimo'] . "</td>";
        echo "<td>" . htmlspecialchars($row['fornecedor']) . "</td>";
        echo "<td>" . $data_validade . "</td>";
        echo "<td>
                <button class='btn btn-success' onclick=\"location.href='?page=editar-medicamento&id_medicamento=" . $row['id_medicamento'] . "';\">Editar</button>
                <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-medicamento&acao=excluir&id_medicamento=" . $row['id_medicamento'] . "';}else{false;}\">Excluir</button>
              </td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nenhum medicamento encontrado no estoque.";
}
?>
