<?php

include '../config/db.php';
$id = $_GET['id'];

$sql = " DELETE FROM tarefa WHERE id=$id ";

if ($conn->query($sql) === true) {
    echo "tarefas excluído com sucesso.
        <a href='READ_kanban.php'>Ver tarefas.</a>
        ";
} else {
    echo "Erro " . $sql . '<br>' . $conn->error;
}
$conn -> close();
exit();
