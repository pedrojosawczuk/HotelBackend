<?php
    class User {
        function __construct($nome, $email, $senha, $perfil)
        {
            $this -> nome = $nome;
            $this -> email = $email;
            $this -> senha = $senha;
            $this -> perfil = $perfil;
        }
    }