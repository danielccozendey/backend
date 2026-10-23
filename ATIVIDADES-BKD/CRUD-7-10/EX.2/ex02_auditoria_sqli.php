<?php

$conn = new mysqli("localhost", "root", "", "banco");

function buscarVulneravel(string $termo): void {
    global $conn;

    $sql = "SELECT * FROM usuarios WHERE nome = '$termo'";
    $resultado = $conn->query($sql);

    echo "Consulta vulnerável: " . $resultado->num_rows . " resultados\n";
}

function buscarProtegido(string $termo): void {
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE nome = ?");
    $stmt->bind_param("s", $termo);
    $stmt->execute();

    $resultado = $stmt->get_result();

    echo "Consulta protegida: " . $resultado->num_rows . " resultados\n";
}

$termo = "' OR '1'='1";

buscarVulneravel($termo);
buscarProtegido($termo);

?>