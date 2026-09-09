<?php

$funcionarios = [
    ["id" => 1, "nome" => "Ana Souza", "cargo" => "Dev Front-End", "salario" => 4500.00],
    ["id" => 2, "nome" => "Bruno Costa", "cargo" => "Dev Back-End", "salario" => 5200.00],
    ["id" => 3, "nome" => "Carla Dias", "cargo" => "Tech Lead", "salario" => 8900.00],
    ["id" => 4, "nome" => "Daniel Silva", "cargo" => "Estagiário", "salario" => 1500.00],
];

$totalFolha = 0;

?>
<html>
<body>

<h2>Folha de Pagamento</h2>

<table border="1">
<tr>
<td>ID</td>
<td>Nome</td>
<td>Cargo</td>
<td>Salario</td>
</tr>

<?php foreach ($funcionarios as $funcionario) { ?>

<tr>
<td><?php echo $funcionario["id"]; ?></td>
<td><?php echo $funcionario["nome"]; ?></td>
<td><?php echo $funcionario["cargo"]; ?></td>
<td>R$ <?php echo $funcionario["salario"]; ?></td>
</tr>

<?php $totalFolha = $totalFolha + $funcionario["salario"]; ?>

<?php } ?>

</table>

<p>Total: R$ <?php echo $totalFolha; ?></p>

</body>
</html>