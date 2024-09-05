<?php
include_once 'servidor.php';

$conect = conexao();
$mensagem = '';

// Obter a lista de alunos com suas respectivas turmas
$query = "
    SELECT a.nome, a.genero, t.serie 
    FROM aluno a
    JOIN turma t ON a.id_turma = t.id_turma
    ORDER BY a.nome
";

$resultado = mysqli_query($conect, $query);
$alunos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos e Turmas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 5% auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
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
    <h1>Lista de Alunos e Suas Turmas</h1>
    
    <?php if (count($alunos) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Gênero</th>
                    <th>Série</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alunos as $aluno): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($aluno['nome']); ?></td>
                        <td><?php echo htmlspecialchars($aluno['genero']); ?></td>
                        <td><?php echo htmlspecialchars($aluno['serie']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Não há alunos cadastrados.</p>
    <?php endif; ?>
    
    <a href="index.php">Voltar para o início</a>
</div>

</body>
</html>
