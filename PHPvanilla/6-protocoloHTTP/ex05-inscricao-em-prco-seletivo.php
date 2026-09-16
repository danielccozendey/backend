<?php
$e = []; $nome = $curso = ""; $idade = ""; $ok = false;
$cursos = ["Desenvolvimento de Sistemas", "Mecatrônica", "Redes"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome_candidato'] ?? '');
    $idade = $_POST['idade'] ?? '';
    $curso = $_POST['curso_desejado'] ?? '';
    $ok = isset($_POST['aceite_termos']);

    if (strlen($nome) < 5) $e['nome'] = "Nome deve ter pelo menos 5 caracteres.";
    if (!is_numeric($idade) || $idade < 16) $e['idade'] = "Idade deve ser maior ou igual a 16.";
    if (!in_array($curso, $cursos)) $e['curso'] = "Selecione um curso válido.";
    if (!$ok) $e['aceite'] = "Você deve aceitar os termos.";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="UTF-8"><title>Inscrição SENAI</title></head>
<body>
<h1>Inscrição em Processo Seletivo</h1>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($e)): ?>
    <p style="color:green;">Inscrição de <?= htmlspecialchars($nome) ?> realizada com sucesso!</p>
<?php endif; ?>

<form method="POST">
    Nome do Candidato:<br>
    <input name="nome_candidato" value="<?= htmlspecialchars($nome) ?>"><br>
    <?php if (isset($e['nome'])): ?><span style="color:red;"><?= $e['nome'] ?></span><br><?php endif; ?><br>

    Idade:<br>
    <input name="idade" value="<?= htmlspecialchars($idade) ?>"><br>
    <?php if (isset($e['idade'])): ?><span style="color:red;"><?= $e['idade'] ?></span><br><?php endif; ?><br>

    Curso Desejado:<br>
    <select name="curso_desejado">
        <option value="">Selecione</option>
        <?php foreach ($cursos as $c): ?>
            <option value="<?= $c ?>" <?= $curso === $c ? 'selected' : '' ?>><?= $c ?></option>
        <?php endforeach; ?>
    </select><br>
    <?php if (isset($e['curso'])): ?><span style="color:red;"><?= $e['curso'] ?></span><br><?php endif; ?><br>

    <input type="checkbox" name="aceite_termos" <?= $ok ? 'checked' : '' ?>> Aceito os termos<br>
    <?php if (isset($e['aceite'])): ?><span style="color:red;"><?= $e['aceite'] ?></span><br><?php endif; ?><br>

    <button type="submit">Inscrever-se</button>
</form>
</body>
</html>