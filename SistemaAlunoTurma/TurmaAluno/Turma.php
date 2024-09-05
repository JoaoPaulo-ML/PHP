<?php
include_once 'servidor.php';

$conect = conexao();
$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $serie = mysqli_real_escape_string($conect, $_POST['serie']);

    $query = "INSERT INTO turma (serie) VALUES ('$serie')";
    $resultado = mysqli_query($conect, $query);

    if ($resultado) {
        $mensagem = "Turma cadastrada com sucesso!";
        header("Location: index.php");
    } else {
        $mensagem = "Erro ao cadastrar turma: " . mysqli_error($conect);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Turma</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 60%;
            margin: 5% auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        form {
            margin: 20px 0;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        a {
            display: inline-block;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Cadastrar Turma</h1>
    <?php if ($mensagem): ?>
        <p><?php echo $mensagem; ?></p>
    <?php endif; ?>
    <form action="" method="post">
        <label for="serie">Numero da série:</label>
        <input type="text" id="serie" name="serie" required>
        <input type="submit" value="Cadastrar">
    </form>
    <a href="index.php">Voltar para o início</a>
</div>

</body>
</html>
