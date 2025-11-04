<?php

include '../config/db.php';

session_start();

if (empty($_SESSION["user_id"])):

    header("Location: ../index.php");

endif

?>

<?php

$sqlusuario = "SELECT id,nome FROM usuario";
$resultUsuario = $conn -> query($sqlusuario);


$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];
    $status = $_POST['status'];
    $setor = $_POST['setor'];
    $prioridade = $_POST['prioridade'];
    $descricao = $_POST['descricao'];
    $designado = $_POST['designado'];

    $sql = "UPDATE tarefa SET nome ='$nome',status ='$status', setor ='$setor', prioridade ='$prioridade', descricao ='$descricao', designado ='$designado' WHERE id=$id";

    if ($conn->query($sql) === true) {
        echo "tarefa atualizado com sucesso.
        <a href='READ_kanban.php'>Ver registros.</a>
        ";
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
    exit(); 
}

$sql = "SELECT * FROM tarefa WHERE id=$id";
$result = $conn -> query($sql);
$row = $result -> fetch_assoc();


?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
</head>

<body>

    <form method="POST" action="UPDATE_kanban.php?id=<?php echo $row['id'];?>">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $row['nome'];?>" required>
        
        <label for="status">status</label>
        <select name="status" required>
            <option value="to do">to do</option>
            <option value="doing">doing</option>
            <option value="done">done</option>
        </select>

        <label for="descricao">descricao:</label>
        <input type="text" name="descricao" value="<?php echo $row['descricao'];?>" required>

        <label for="setor">setor:</label>
        <input type="text" name="setor" value="<?php echo $row['setor'];?>" required >

        <label for="prioridade">status</label>
        <select name="prioridade" required>
            <option value="baixa">baixa</option>
            <option value="media">media</option>
            <option value="alta">alta</option>
        </select>

        <label for="designado">pessoa designada:</label>
        <select name="designado" required>

            <option value="">Selecione</option>
            <?php while ($row = $resultUsuario->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>"><?= ($row['nome']) ?></option>
            <?php endwhile; ?>

        </select>

        <input type="submit" value="Atualizar">

    </form>

    <a href="READ_kanban.php">Ver kanban.</a>

</body>

</html>