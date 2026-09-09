<?php
// exercicio2_perfil.php

// Dados do usuário
$usuario = [
    "nome" => "Daniel Cazzotti",
    "idade" => 17,
    "cidade" => "Americana",
    "estado" => "SP",
    "premium" => true
];

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Perfil do Usuário</title>
</head>
<body>

    <div class="card">

        <h2>
            <?php
            echo $usuario["nome"];

            // Se o usuário for premium, mostra a estrela do lado do nome
            if ($usuario["premium"] == true) {
                echo "⭐";
            }
            ?>
        </h2>

        <p>Idade: <?php echo $usuario["idade"]; ?> anos</p>

        <p>
            Local:
            <?php
            echo $usuario["cidade"];
            echo " - ";
            echo $usuario["estado"];
            ?>
        </p>

    </div>

</body>
</html>