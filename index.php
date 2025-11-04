<?php

include 'config/db.php';

session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

$msg = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"] ?? "";
    $pass = $_POST["password"] ?? "";


    $stmt = $conn->prepare("SELECT id, email, senha FROM usuario WHERE email = ?  AND senha=?");

    $stmt->bind_param("ss", $email, $pass);
    $stmt->execute();
    $result = $stmt->get_result();
    $dados = $result->fetch_assoc();
    $stmt->close();

    if ($dados) {
        $_SESSION["user_id"] = $dados["id"];
    } else {
        echo"Usuário ou senha incorretos!";
    }

}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="../scripts/login_Script.js"></script>
    <link rel="stylesheet" href="../style/styles.css">
    <link rel="icon" href="../assets/icons/Logo.png" type="image/png">
    <title>login</title>

</head>

<body>

    <?php if (!empty($_SESSION["user_id"])): 
             echo"  
            <a href='public/cadastro.php'> cadastro de usuarios</a>

            <br><br>
    
            <a href='public/READ_kanban.php'> ver kanban</a>

            <br><br>
            <a href='index.php?logout=1'> logout</a>";
        ?>

    <?php else: ?>

    <div>
        <form id="Formularios" method="POST">
            <div class="campo"><input class="radious" type="text" name="email" id=""email placeholder="Email"required></div>
            <br>
            <div class="campo"> <input class="radious" type="password" name="password" id="senha" placeholder="Senha" required> </div>
            <br>
            <div class="entrar"><button type="submit">Entrar</button></div>
        </form>

    <?php endif; ?>

</body>

</html>