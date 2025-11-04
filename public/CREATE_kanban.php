<?php

include '../config/db.php';

session_start();

if (empty($_SESSION["user_id"])):

    header("Location: ../index.php");

endif

?>

<?php

$usuarios = $conn->query("SELECT id,nome FROM usuario");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];
    $status = $_POST['status'];
    $setor = $_POST['setor'];
    $prioridade = $_POST['prioridade'];
    $descricao = $_POST['descricao'];
    $designado = $_POST['designado'];

    $sql = " INSERT INTO tarefa (nome,status,setor,prioridade,descricao,designado) VALUE ('$nome','$status','$setor','$prioridade','$descricao','$designado')";

    if ($conn->query($sql) === true) {
        echo "Nova tarefa criado com sucesso.";
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
}

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>

<body>

    <form method="POST" action="CREATE_kanban.php">

        <label for="nome">nome:</label>
        <input type="text" name="nome" required>

        <label for="setor">setor:</label>
        <input type="text" name="setor" required>

        <label for="status">status</label>
        <select name="status" required>
            <option value="to do">to do</option>
            <option value="doing">doing</option>
            <option value="done">done</option>
        </select>

        <label for="descricao">descrição:</label>
        <input type="text" name="descricao" required>

        <label for="prioridade">prioridade</label>
        <select name="prioridade" required> 
            <option value="baixa">baixa</option>
            <option value="media">media</option>
            <option value="alta">alta</option>
        </select>

        <label for="designado">pessoa designada</label>
        <select name="designado" required>
            <option value="">Selecione</option>
            <?php while ($row = $usuarios->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>"><?= $row['nome'] ?></option>
            <?php endwhile; ?>
        </select>

        <input type="submit" value="Adicionar">

    </form>

    <a href="READ_kanban.php">Ver registros.</a>

</body>

</html>