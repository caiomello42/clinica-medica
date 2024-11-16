<?php

switch ($_REQUEST["acao"]) {
    
    
    case 'cadastrar':
        // Coleta os dados do formulário
        $nome_medicamento = $_POST['nome_medicamento'];
        $descricao_medicamento = $_POST['descricao_medicamento'];
        $preco_custo = $_POST['preco_custo'];
        $preco_venda = $_POST['preco_venda'];
        $estoque_atual = $_POST['estoque_atual'];
        $estoque_minimo = $_POST['estoque_minimo'];
        $fornecedor = $_POST['fornecedor'];
        $data_validade = $_POST['data_validade'];

        $sql = "INSERT INTO medicamentos (
                    nome_medicamento,
                    descricao_medicamento,
                    preco_custo,
                    preco_venda,
                    estoque_atual,
                    estoque_minimo,
                    fornecedor,
                    data_validade)
                VALUES(
                    '{$nome_medicamento}',
                    '{$descricao_medicamento}',
                    '{$preco_custo}',
                    '{$preco_venda}',
                    '{$estoque_atual}',
                    '{$estoque_minimo}',
                    '{$fornecedor}',
                    '{$data_validade}'
                )";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastrado com sucesso!');</script>";
            print "<script>location.href='?page=listar-medicamento';</script>";
        } else {
            print "<script>alert('Erro ao cadastrar!');</script>";
            print "<script>location.href='?page=listar-medicamento';</script>";
        }
        break;
    
    case 'editar':
        $nome_medicamento = $_POST['nome_medicamento'];
        $descricao_medicamento = $_POST['descricao_medicamento'];
        $preco_custo = $_POST['preco_custo'];
        $preco_venda = $_POST['preco_venda'];
        $estoque_atual = $_POST['estoque_atual'];
        $estoque_minimo = $_POST['estoque_minimo'];
        $fornecedor = $_POST['fornecedor'];
        $data_validade = $_POST['data_validade'];

        $sql = "UPDATE medicamentos SET
                    nome_medicamento='{$nome_medicamento}',
                    descricao_medicamento='{$descricao_medicamento}',
                    preco_custo='{$preco_custo}',
                    preco_venda='{$preco_venda}',
                    estoque_atual='{$estoque_atual}',
                    estoque_minimo='{$estoque_minimo}',
                    fornecedor='{$fornecedor}',
                    data_validade='{$data_validade}'
                WHERE
                    id_medicamento=" . $_REQUEST['id_medicamento'];

        // Executa a consulta
        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Editado com sucesso!');</script>";
            print "<script>location.href='?page=listar-medicamento';</script>";
        } else {
            print "<script>alert('Erro ao editar!');</script>";
            print "<script>location.href='?page=listar-medicamento';</script>";
        }
        break;

    case 'excluir':
        $sql = "DELETE FROM medicamentos WHERE id_medicamento=" . $_REQUEST['id_medicamento'];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Excluído com sucesso!');</script>";
            print "<script>location.href='?page=listar-medicamento';</script>";
        } else {
            print "<script>alert('Erro ao excluir!');</script>";
            print "<script>location.href='?page=listar-medicamento';</script>";
        }
        break;
}
?>
