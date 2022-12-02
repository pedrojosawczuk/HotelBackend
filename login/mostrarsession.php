<?php

function currentuser() {

if(@$_SESSION['classiauto.email'])
    //$message = 'O usuário ' . $_SESSION['classiauto.email'] . ' ' . $_SESSION['classiauto.perfil'] . ' está logado';
    return $_SESSION['classiauto.perfil'];
else
    $message = 'Nenhum usuário está logado';
    return 0;
}

?>