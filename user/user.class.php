<?php
    class User {
        function __construct($nome, $nascimento, $telefone, $email, $login, $senha)
        {
            $this -> nome = $nome;
            $this -> email = $email;
            $this -> senha = $senha;
            $this -> perfil = $perfil;
        }
    }