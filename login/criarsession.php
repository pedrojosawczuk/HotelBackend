<?php

function criarsession($email, $perfil) {
    
    // Exemplo de criação de SESSION
/*
    // Obtendo o nome de um usuário
    $email = $_REQUEST['email'];*/

    if(!@$email) {
        $message = 'Usuário não existe';
        exit;
    }

    // Inicializa a sessão
    session_start();

    // Armazenando dados na sessão do cliente (navegador)
    $_SESSION['classiauto.email'] = $email;
    $_SESSION['classiauto.perfil'] = $perfil;

    $message = 'Sessão criada para o usuário ' . $email .  ' ' . $perfil;
}

?>