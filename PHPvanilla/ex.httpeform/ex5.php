<?php
$erroNome = "";
$erroIdade = "";
$erroCurso = "";
$erroTermos = "";

$nome = "";
$idade = "";
$curso = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome_candidato"] ?? "";
    $idade = $_POST["idade"] ?? "";
    $curso = $_POST["curso_desejado"] ?? "";

    if (strlen(trim($nome)) < 5) {
        $erroNome = "O nome deve ter pelo menos 5 caracteres.";
    }

    if ($idade == "" || !is_numeric($idade) || $idade < 16) {
        $erroIdade = "A idade deve ser igual ou maior que 16 anos.";
    }

    if (
        $curso != "Desenvolvimento de Sistemas" &&
        $curso != "Mecatrônica" &&
        $curso != "Redes"
    ) {
        $erroCurso = "Selecione um curso válido.";
    }

    if (!isset($_POST["aceite_termos"])) {
        $erroTermos = "Você precisa aceitar os termos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Inscrição SENAI</title>
</head>
<body>

<h1>Inscrição em Processo Seletivo do SENAI</h1>

<form method="post">
    <label>Nome do candidato:</label><br>
    <input type="text" name="nome_candidato"
           value="<?php echo htmlspecialchars($nome); ?>">
    <br>
    <span style="color: red;"><?php echo $erroNome; ?></span>
    <br><br>

    <label>Idade:</label><br>
    <input type="number" name="idade"
           value="<?php echo htmlspecialchars($idade); ?>">
    <br>
    <span style="color: red;"><?php echo $erroIdade; ?></span>
    <br><br>

    <label>Curso desejado:</label><br>
    <select name="curso_desejado">
        <option value="">Selecione um curso</option>
        <option value="Desenvolvimento de Sistemas"
            <?php if ($curso == "Desenvolvimento de Sistemas") echo "selected"; ?>>
            Desenvolvimento de Sistemas
        </option>
        <option value="Mecatrônica"
            <?php if ($curso == "Mecatrônica") echo "selected"; ?>>
            Mecatrônica
        </option>
        <option value="Redes"
            <?php if ($curso == "Redes") echo "selected"; ?>>
            Redes
        </option>
    </select>
    <br>
    <span style="color: red;"><?php echo $erroCurso; ?></span>
    <br><br>

    <input type="checkbox" name="aceite_termos" value="sim"
        <?php if (isset($_POST["aceite_termos"])) echo "checked"; ?>>
    <label>Aceito os termos</label>
    <br>
    <span style="color: red;"><?php echo $erroTermos; ?></span>
    <br><br>

    <button type="submit">Enviar inscrição</button>
</form>

</body>
</html>