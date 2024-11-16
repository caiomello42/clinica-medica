<?php
switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        $id_paciente = $_POST['id_paciente'];        
        $data_consulta = $_POST['data_consulta'];    
        $especialidade = $_POST['especialidade_consulta']; 
        $descricao = $_POST['descricao_consulta'];    
        $preco = $_POST['preco_consulta'];           

        // SQL para inserir consulta
        $sql = "INSERT INTO consulta (
                    id_paciente,
                    data_consulta,
                    especialidade_consulta,
                    descricao_consulta,
                    preco_consulta
                ) VALUES (
                    '{$id_paciente}',
                    '{$data_consulta}',
                    '{$especialidade}',
                    '{$descricao}',
                    '{$preco}'
                )";

        $res = $conn->query($sql);

        if ($res) {
            print "<script>alert('Consulta cadastrada com sucesso!');</script>";
            print "<script>location.href='?page=listar-consulta';</script>";
        } else {
            print "<script>alert('Não foi possível cadastrar a consulta.');</script>";
            print "<script>location.href='?page=listar-consulta';</script>";
        }
        break;

    case 'editar':
        $id_consulta = $_POST['id_consulta'];  
        $id_paciente = $_POST['id_paciente'];  
        $data_consulta = $_POST['data_consulta'];  
        $especialidade = $_POST['especialidade_consulta'];
        $descricao = $_POST['descricao_consulta'];  
        $preco = $_POST['preco_consulta'];  

        $sql = "UPDATE consulta SET
                    id_paciente='{$id_paciente}',
                    data_consulta='{$data_consulta}',
                    especialidade_consulta='{$especialidade}',
                    descricao_consulta='{$descricao}',
                    preco_consulta='{$preco}'
                WHERE id_consulta = {$id_consulta}";

        $res = $conn->query($sql);

        if ($res) {
            print "<script>alert('Consulta editada com sucesso!');</script>";
            print "<script>location.href='?page=listar-consulta';</script>";
        } else {
            print "<script>alert('Não foi possível editar a consulta.');</script>";
            print "<script>location.href='?page=listar-consulta';</script>";
        }
        break;

    case 'excluir':
        $sql = "DELETE FROM consulta WHERE id_consulta = " . $_REQUEST["id_consulta"];

        $res = $conn->query($sql);

        if ($res) {
            print "<script>alert('Consulta excluída com sucesso!');</script>";
            print "<script>location.href='?page=listar-consulta';</script>";
        } else {
            print "<script>alert('Não foi possível excluir a consulta.');</script>";
            print "<script>location.href='?page=listar-consulta';</script>";
        }
        break;
}
?>
