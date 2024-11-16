<h1>Listar Consulta</h1>

<?php
// Consulta SQL para buscar as consultas e dados dos pacientes
$sql = "
    SELECT 
        consulta.id_consulta, 
        consulta.data_consulta, 
        consulta.hora_consulta, 
        consulta.descricao_consulta, 
        paciente.nome_paciente, 
        paciente.email_paciente, 
        paciente.endereco_paciente, 
        paciente.fone_paciente, 
        paciente.cpf_paciente, 
        paciente.dt_nasc_paciente, 
        paciente.sexo_paciente
    FROM consulta
    INNER JOIN paciente ON consulta.id_paciente = paciente.id_paciente
";

// Executa a consulta
$res = $conn->query($sql);

if ($res) {
    $qtd = $res->num_rows;

    // Verifica se há resultados
    if ($qtd > 0) {
        echo "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
        echo "<table class='table table-bordered table-striped table-hover'>";
        echo "<tr>";
        echo "<th>#</th>";
        echo "<th>Nome</th>";
        echo "<th>Data da Consulta</th>";
        echo "<th>Hora da Consulta</th>";
        echo "<th>Descrição</th>";
        echo "<th>Ações</th>";
        echo "</tr>";

        // Exibe os resultados de cada consulta
        while ($row = $res->fetch_object()) {
            // Formata a data para o formato 'd/m/Y'
            $data_consulta = date("d/m/Y", strtotime($row->data_consulta));

            echo "<tr>";
            echo "<td>" . $row->id_consulta . "</td>";
            echo "<td>" . htmlspecialchars($row->nome_paciente) . "</td>";
            echo "<td>" . $data_consulta . "</td>";
            echo "<td>" . $row->hora_consulta . "</td>";
            echo "<td>" . htmlspecialchars($row->descricao_consulta) . "</td>";
            echo "<td>
                    <button class='btn btn-success' onclick=\"location.href='?page=editar-consulta&id_consulta=" . $row->id_consulta . "';\">Editar</button>
                    <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-consulta&acao=excluir&id_consulta=" . $row->id_consulta . "';}else{false;}\">Excluir</button>
                  </td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Não encontrou resultados.";
    }
} else {
    echo "Erro na consulta: " . $conn->error;
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
