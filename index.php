<?php
require_once('db/connection.inc.php');
require_once('user/model/user.dao.php');
require_once('acomodacoes/model/acomodacoes.dao.php');
require_once('tarifa/model/tarifa.dao.php');
require_once('login/criarsession.php');
require_once('login/mostrarsession.php');

// Instanciar um objeto DAO de pessoa
$userDAO = new UserDAO($pdo);
$acomodacoesDAO = new AcomodacoesDAO($pdo);
$tarifaDAO = new TarifaDAO($pdo);

// Recebe a ação desejada do cliente
$action = @$_REQUEST['action'];
$view = 'Front/login.php'; // View default

if($action == 'userlogin') {
    
    if(@$_REQUEST['email'] && @$_REQUEST['senha']) {
        $user = $userDAO -> login($_REQUEST['email'], $_REQUEST['senha']);
        if($user) {
            $email = $user -> email;
            criarsession($user -> email, $user -> perfil);
            $perfil = currentuser();
            if($perfil == 'admin') {
                $acomodacoes = $acomodacoesDAO -> getAll();
                $view = 'Front/Admin/list-acomodacoes.php';
            } else {
                $view = 'Front/User/index.php';
            }
        } else {
            $message = 'USUÁRIO NÃO ENCONTRADO';
        }
    }
    else {
        $message = 'Email e/ou senha não informados.';
    }
}

else if($action == 'usercadastro') {
    $view = 'Front/cadastro.php';
}

else if($action == 'userinsert') {
    if(@$_REQUEST['nome'] && @$_REQUEST['email'] && @$_REQUEST['senha']) {

        
        if(!$userDAO -> insert($_REQUEST)) {
            //$view = 'Front/login.php';

            $user = $userDAO -> insert($_REQUEST);
            $message = 'Erro ao salvar pessoa';
        } else {
            $message = 'Criado com sucesso';
        }
    } else {
        // Update
        if(!$userDAO -> update($_POST)) {
            //$view = 'view/form.php';
    
            $message = 'Erro ao salvar pessoa';
        }
    }
}

else if($action == 'listacomoda') {
    // Buscar as pessoas no Banco de Dados
    $acomodacoes = $acomodacoesDAO -> getAll();
    $view = 'Front/Admin/list-acomodacoes.php';
}
else if($action == 'createacomoda') {
    $tarifas = $tarifaDAO -> getAll();
    $view = 'Front/Admin/create-acomodacoes.php';
}
else if($action == 'acomodainsert') {
    @$message <- print_r($_REQUEST);
    
    if(!@$_REQUEST['id']) {
        if(!$acomodacoesDAO -> insert($_REQUEST)) {/*
            $acomodacoes = $acomodacoesDAO -> getAll();
            $view = 'Front/Admin/list-acomodacoes.php';*/

            //$acomodacoes = $acomodacoesDAO -> insert($_REQUEST);
            $message = 'Erro ao salvar pessoa';
        }
    } else {
        // Update
        if(!$acomodacoesDAO -> update($_REQUEST['id'], $_REQUEST)) {/*
            $acomodacoes = $acomodacoesDAO -> getAll();
            $view = 'Front/Admin/list-acomodacoes.php';*/
    
            $message = 'Erro ao salvar pessoa';
        }
    }
    $acomodacoes = $acomodacoesDAO -> getAll();
    $view = 'Front/Admin/list-acomodacoes.php';
}
else if($action == 'deletaracomoda') {
    $acomodacoesDAO ->  delete($_REQUEST['id']);
    $acomodacoes = $acomodacoesDAO -> getAll();
    $view = 'Front/Admin/list-acomodacoes.php';
} else if($action == 'editarcomoda') {
    if(@$_REQUEST['id']) {
        $tarifas = $tarifaDAO -> getAll();
        $view = 'Front/Admin/create-acomodacoes.php';
        $acomodacao = $acomodacoesDAO -> getById($_REQUEST['id']);
        print_r($acomodacao);
        print_r($_REQUEST);
    } else {
        $message = 'A pessoa não está cadastrada.';
    }
}

else if($action == 'createtarifa') {
    $view = 'Front/Admin/create-tarifa.php';
}
else if($action == 'salvartarifa') {

    print_r($_REQUEST);
    if(!@$_REQUEST['id']) {
        // Insert
        if(!$tarifaDAO -> insert($_POST)) {
    
            $message = 'Erro ao salvar pessoa';
        }
    } else {
        // Update
        if(!$tarifaDAO -> update($_POST)) {
    
            $message = 'Erro ao salvar pessoa';
        }
    }
    
    $tarifas = $tarifaDAO -> getAll();
    $view = 'Front/Admin/list-tarifa.php';
}

else if($action == 'listtarifa') {
    $tarifas = $tarifaDAO -> getAll();
    $view = 'Front/Admin/list-tarifa.php';
}

else if($action == 'acomodainsert') {
    @$message <- print_r($_REQUEST);
    
    if(!@$_REQUEST['id']) {
        if(!$acomodacoesDAO -> insert($_REQUEST)) {/*
            $acomodacoes = $acomodacoesDAO -> getAll();
            $view = 'Front/Admin/list-acomodacoes.php';*/

            //$acomodacoes = $acomodacoesDAO -> insert($_REQUEST);
            $message = 'Erro ao salvar pessoa';
        }
    } else {
        // Update
        if(!$acomodacoesDAO -> update($_REQUEST['id'], $_REQUEST)) {/*
            $acomodacoes = $acomodacoesDAO -> getAll();
            $view = 'Front/Admin/list-acomodacoes.php';*/
    
            $message = 'Erro ao salvar pessoa';
        }
    }
    $acomodacoes = $acomodacoesDAO -> getAll();
    $view = 'Front/Admin/list-acomodacoes.php';
}

else if($action == 'deletartarifa') {
    $tarifaDAO -> delete($_REQUEST['id']);
    $action = 'listatarifa';
} else if($action == 'editartarifa') {
    if(@$_REQUEST['id']) {
        $view = 'Front/Admin/create-tarifa.php';
        $tarifa = $tarifaDAO -> getById($_REQUEST['id']);
        print_r($tarifa);
        print_r($_REQUEST);
    } else {
        $message = 'A pessoa não está cadastrada.';
    }
}

else if($action == 'listuser') {
    $users = $userDAO -> getAll();
    $view = 'Front/Admin/list-users.php';
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
if($view = 'view/list.php') {
    // Buscar as pessoas no Banco de Dados
    $pessoas = $userDAO -> getAll();

    // print_r($pessoas);
}
*/

else if($action == 'userhotelview') {
    $view = 'Front/User/ohotel.php';
}

else if($action == 'usercreatereserva') {
    $view = 'Front/User/reserva.php';
}

else if($action == 'userhomepage') {
    $view = 'Front/User/index.php';
}

else if($action == 'useracomoda') {
    $acomodacoes = $acomodacoesDAO -> getAll();
    $view = 'Front/User/acomodacoes.php';
}

else if($action == 'logOut') {
    session_start();
    session_destroy();
    $view = 'Front/login.php';
}


require_once($view); // Abrindo uma view

?>