<?php
require_once("../db/connection.inc.php");
require_once("user.dao.php");

$userDAO = new UserDAO($pdo);

// Obter o corpo da requisição
$json = file_get_contents('php://input');

// Transforma o JSON em um Objeto PHP
$user = json_decode($json);

$email = $user -> email;
$senha = $user -> senha;

$responseBody = '';

if (!($email || $senha)) { // Retornar um único objeto pelo EMAIL e SENHA
    http_response_code(403);
    $responseBody = '{ "message": "Usuário/Senha Inválidos" }';
} else {
    try {
        $user = $userDAO -> login($email, $senha);
        $responseBody = json_encode($user);
    } catch (Exception $e) {
        // Muda o código de resposta HTTP para 'bad request'
        http_response_code(400);
        $responseBody = '{ "message": "Ocorreu um erro ao tentar executar esta ação. Erro: Código: ' .  $e -> getCode() . '. Mensagem: ' . $e -> getMessage() . '" }';
    }
    
}

// Defique que o conteúdo da resposta será um JSON (application/JSON)
header('Content-Type: application/json');

// Exibe a resposta
print_r($responseBody);