<?php

$filmes = [
    ["titulo" => "Matrix", "genero" => "Ficção", "classificacao_idade" => 16],
    ["titulo" => "Shrek", "genero" => "Animação", "classificacao_idade" => 0],
    ["titulo" => "Deadpool", "genero" => "Ação", "classificacao_idade" => 18],
    ["titulo" => "Procurando Nemo", "genero" => "Animação", "classificacao_idade" => 0],
    ["titulo" => "Vingadores", "genero" => "Ação", "classificacao_idade" => 12]
];

// array_filter percorre o array e mantém só os itens que passam no teste
// fn($filme) => ... é uma Arrow Function: uma forma curta de escrever uma função
$filmesInfantis = array_filter($filmes, fn($filme) => $filme["classificacao_idade"] <= 12);

?>
<html>
<body>

<h2>Filmes Infantis</h2>

<ul>
<?php foreach ($filmesInfantis as $filme) { ?>
    <li><?php echo $filme["titulo"]; ?> (Livre para <?php echo $filme["classificacao_idade"]; ?> anos)</li>
<?php } ?>
</ul>

</body>
</html>