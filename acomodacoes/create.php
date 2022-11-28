<?php

    require_once("../db/connection.inc.php");
    require_once("acomodacoes.dao.php");

    // Verificar se o token é valido
    require_once '../auth/validar-jwt.inc.php';

    $acomodacoesDAO = new AcomodacoesDAO($pdo);

    // Obter o corpo da requisição
    $json = file_get_contents('php://input');

    // Transforma o JSON em um Objeto PHP
    $acomodacoes = json_decode($json);

    $responseBody = '';

    try {
        $acomodacoes = $acomodacoesDAO->insert($acomodacoes);

        $responseBody = json_encode($acomodacoes);
    } catch (Exception $e) {
        // Muda o código de resposta HTTP para 'bad request'
        http_response_code(400);
        $responseBody = '{ "message": "Ocorreu um erro ao tentar executar esta ação. Erro: Código: ' .  $e -> getCode() . '. Mensagem: ' . $e -> getMessage() . '" }';
    }

    // Defique que o conteúdo da resposta será um JSON (application/JSON)
    header('Content-Type: application/json');

    // Exibe a resposta
    print_r($responseBody);
?>