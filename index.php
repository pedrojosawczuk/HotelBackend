<?php
require_once('db/connection.inc.php');
require_once('user/user.dao.php');

// Instanciar um objeto DAO de pessoa
$userDAO = new UserDAO($pdo);

// Recebe a ação desejada do cliente
$action = @$_REQUEST['action'];
$view = 'Front/login.html'; // View default

if($action == 'login') {
    
    if(@$_REQUEST['email'] && @$_REQUEST['senha']) {
        $userDAO -> login($_REQUEST['email'], $_REQUEST['senha']);
    }
    else {
        $message = 'Email e/ou senha não informados.';
    }
    print_r(@$message);
}

/*
// Decidir qual ação será tomada
if($action == 'novo') {
    $view = 'view/form.php';
} else if($action == 'update') {
    
    if(@$_REQUEST['id']) {
        $view = 'view/form.php';
        $userDAO->getById($_REQUEST['id']);
        print_r($view);
    } else {
        $message = 'A pessoa não está cadastrada.';
    }

} else if($action == 'delete') {
    $id = @$_REQUEST['id'];

    if($id) {
        if($userDAO -> delete($id) > 0)
            $message = 'Pessoa deletada com sucesso.';
        else
            $message = 'Nenhuma pessoa foi deletada.';
    } else
        $message = 'Informe o código da pessoa para deletar.';

} else if($action == 'insert') {
    if(!@$_REQUEST['id']) {
        // Insert
        if(!$userDAO -> insert($_POST)) {
            $view = 'view/form.php';
    
            $message = 'Erro ao salvar pessoa';
        }
    } else {
        // Update
        if(!$userDAO -> update($_POST)) {
            $view = 'view/form.php';
    
            $message = 'Erro ao salvar pessoa';
        }
    }

}
*/
/*
if($view = 'view/list.php') {
    // Buscar as pessoas no Banco de Dados
    $pessoas = $userDAO -> getAll();

    // print_r($pessoas);
}
*/

require_once($view); // Abrindo uma view

?>