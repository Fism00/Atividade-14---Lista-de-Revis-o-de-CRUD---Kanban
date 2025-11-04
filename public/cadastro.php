<?php

include '../config/db.php';

session_start();

if (empty($_SESSION["user_id"])):

    header("Location: ../index.php");

endif

?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = " INSERT INTO usuario (nome,email,senha) VALUE ('$name','$email','$senha')";

    if ($conn->query($sql) === true) {
        echo "Novo usuario criado com sucesso.";
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

    <form method="POST" action="cadastro.php">

        <label for="name">Nome:</label>
        <input type="text" name="name" required>

        <label for="email">email:</label>
        <input type="text" name="email">

        <label for="senha">senha: </label>
        <input type="password" name="senha" required>

        <input type="submit" value="criar usuario">

    </form>

    <a href="READ_kanban.php">Ver kanban.</a>

</body>

</html>