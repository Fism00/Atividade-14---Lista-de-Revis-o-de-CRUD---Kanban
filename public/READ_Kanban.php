<?php

include '../config/db.php';

session_start();

if (empty($_SESSION["user_id"])):

    header("Location: ../index.php");

endif

?>

<?php
$sql = "SELECT * FROM tarefa";
$verificar = $conn->query($sql);

$todo = 'to do';
$doing = 'doing';
$done = 'done';

$stmt = $conn->prepare("SELECT * FROM tarefa WHERE status = ?");
$stmt->bind_param("s", $todo);
$stmt->execute();
$resultTodo = $stmt->get_result();
$stmt->close();

$stmt = $conn->prepare("SELECT * FROM tarefa WHERE status = ?");
$stmt->bind_param("s", $doing);
$stmt->execute();
$resultDoing = $stmt->get_result();
$stmt->close();

$stmt = $conn->prepare("SELECT * FROM tarefa WHERE status = ?");
$stmt->bind_param("s", $done);
$stmt->execute();
$resultDone = $stmt->get_result();
$stmt->close();

if ($verificar->num_rows > 0) {

        echo "<table border='1'>
        <tr>
        <th>To do</th>
        <th>Prioridade</th>
        <th>Setor</th>
        <th>Quando Criado</th>
        <th>ações</th>
        </tr>";
    
        while($row = $resultTodo->fetch_assoc()) {

            $data_cricacao = date('d/m/Y', strtotime($row['criado_em']));   

            echo "<tr>
            <td><a href='lerdescricao_kanban.php?id={$row['id']}'>" . $row['nome'] . "</a></td>
            <td>". $row['prioridade'] . "</a></td>
            <td>". $row['setor'] . "</a></td>
            <td>". $data_cricacao . "</a></td>
            <td><a href='DELETE_kanban.php?id={$row['id']}'> Deletar </a>
            <a href='UPDATE_kanban.php?id={$row['id']}'> Atualizar</a></td>
            </tr>";
        }
    
        echo "</table>
        <br>";


        echo "<table border='1'>
        <tr>
        <th>doing</th>
        <th>Prioridade</th>
        <th>Setor</th>
        <th>Quando Criado</th>
        <th>ações</th>
        </tr>";
    
        while($row = $resultDoing->fetch_assoc()){

            $data_cricacao = date('d/m/Y', strtotime($row['criado_em']));   

            echo "<tr>
            <td><a href='lerdescricao_kanban.php?id={$row['id']}'>" . $row['nome'] . "</a></td>
            <td>". $row['prioridade'] . "</a></td>
            <td>". $row['setor'] . "</a></td>
            <td>". $data_cricacao . "</a></td>
            <td><a href='DELETE_kanban.php?id={$row['id']}'> Deletar </a>
            <a href='UPDATE_kanban.php?id={$row['id']}'> Atualizar</a></td>
            </tr>";
        }

       echo "</table> <br>";


         echo "<table border='1'>
        <tr>
        <th>done</th>
        <th>Prioridade</th>
        <th>Setor</th>
        <th>Quando Criado</th>
        <th>ações</th>
        </tr>";
    
        while($row = $resultDone->fetch_assoc()) {

            $data_cricacao = date('d/m/Y', strtotime($row['criado_em']));   

            echo "<tr>
            <td><a href='lerdescricao_kanban.php?id={$row['id']}'>" . $row['nome'] . "</a></td>
            <td>". $row['prioridade'] . "</a></td>
            <td>". $row['setor'] . "</a></td>
            <td>". $data_cricacao . "</a></td>
            <td><a href='DELETE_kanban.php?id={$row['id']}'> Deletar </a>
            <a href='UPDATE_kanban.php?id={$row['id']}'> Atualizar</a></td>
            </tr>";
        }

         echo "</table> <br>";

    }else {
    echo "Nenhum tarefa encontrado.";
}

$conn -> close();

echo "<a href='CREATE_kanban.php'>Inserir nova tarefa</a>";

echo "<br>";

echo "<a href='../index.php'> home page</a>";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ler kanban</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    
</body>
</html>