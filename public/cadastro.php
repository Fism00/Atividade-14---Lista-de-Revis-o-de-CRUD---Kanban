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
    $cep = $_POST['cep'];
    
    $url = "https://viacep.com.br/ws/{$cep}/json/";
    
    $response = file_get_contents($url);
    $dados = json_decode($response, true);

    $estado = $dados['localidade'];
    $cidade = $dados['uf'];

if (isset($dados['erro']) && $dados['erro'] === true) {
        echo "CEP não encontrado!";
    }else{

    $sql = " INSERT INTO usuario (nome,email,senha,estado,cidade) VALUE ('$name','$email','$senha','$estado','$cidade')";

    if ($conn->query($sql) === true) {
        echo "Novo usuario criado com sucesso.";
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();}
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

        <label for="cep">cep:</label>
        <input type="number" name="cep">

        <label for="senha">senha: </label>
        <input type="password" name="senha" required>

        <input type="submit" value="criar usuario">

    </form>

    <a href="READ_kanban.php">Ver kanban.</a>

</body>

</html>