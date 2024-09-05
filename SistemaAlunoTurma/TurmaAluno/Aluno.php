<?php
include_once 'servidor.php';

$conect = conexao();
$mensagem = '';

// Obter turmas disponíveis
$queryTurmas = "SELECT id_turma, serie FROM turma";
$resultadoTurmas = mysqli_query($conect, $queryTurmas);
$turmas = mysqli_fetch_all($resultadoTurmas, MYSQLI_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = mysqli_real_escape_string($conect, $_POST['nome']);
    $genero = mysqli_real_escape_string($conect, $_POST['genero']);
    $id_turma = intval($_POST['id_turma']);

    $query = "INSERT INTO aluno (nome, genero, id_turma) VALUES ('$nome', '$genero', '$id_turma')";
    $resultado = mysqli_query($conect, $query);

    if ($resultado) {
        $mensagem = "Aluno cadastrado com sucesso!";
        header("Location: index.php");
    } else {
        $mensagem = "Erro ao cadastrar aluno: " . mysqli_error($conect);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aluno</title>
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
        input[type="text"], select {
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

    <h1>Cadastrar Aluno</h1>

    <?php if ($mensagem): ?>
        <p><?php echo $mensagem; ?></p>
    <?php endif; ?>

    <form action="" method="post">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="genero">Gênero:</label>
        <select id="genero" name="genero" required>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
            <option value="Outros">Outros</option>
        </select>

        <label for="id_turma">Turma:</label>
        <select id="id_turma" name="id_turma" required>
            <?php foreach ($turmas as $turma): ?>
                <option value="<?php echo $turma['id_turma']; ?>"><?php echo $turma['serie']; ?></option>
            <?php endforeach; ?>
        </select>

        <input type="submit" value="Cadastrar">
    </form>
    <a href="index.php">Voltar para o início</a>
</div>

</body>
</html>
