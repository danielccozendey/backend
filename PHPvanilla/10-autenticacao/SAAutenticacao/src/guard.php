<?php
declare(strict_types=1);

require_once __DIR__ ."/AuthService.php";

AuthService::iniciarSessaoSegura(); 
//inicia a sessão sem instanciar objeto , somente chamando a função

//1. Verificar se o indentificar está registrado na sessão
if(!isset($_SESSION["usuario_id"])) {
    //se não estiver logado - sem id da sessão
    //redireciona para a tela de login
    header("Location: login.php?erro=restrito");
}

//2. Verifica se a sessão expirou por inatividade
if(AuthService::verificarExpiracao()){
    header("Location: login.php?erro=expirado");
}
