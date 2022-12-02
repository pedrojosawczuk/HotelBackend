<?php

// Inicializar a sessão
session_start();

if(@$_SESSION['classiauto.email'])
    echo 'O usuário ' . $_SESSION['classiauto.email'] . ' está logado';
else
    echo 'Nenhum usuário está logado';

?>