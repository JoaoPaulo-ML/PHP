<?php


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área de Cadastro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            text-align: center;
        }
        a {
            display: block;
            margin: 10px 0;
            padding: 15px;
            font-size: 18px;
            color: #333;
            text-decoration: none;
            background-color: #e7e7e7;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #d4d4d4;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Bem-vindo ao Sistema de Cadastro</h1>
    <a href="Turma.php">Cadastrar Turma</a>
    <a href="Aluno.php">Cadastrar Aluno</a>
    <a href="ListaTurmaAluno.php">Lista de Turmas e Alunos cadastrado</a>
</div>

</body>
</html>
