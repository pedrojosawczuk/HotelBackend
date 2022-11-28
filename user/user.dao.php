<?php

class UserDAO
{
    function __construct($pdo)
    {
        $this -> pdo = $pdo;
    }

    public function login($email, $senha)
    {
        //Prepare our select statement.
        $stmt = $this -> pdo -> prepare("SELECT nome, email, perfil FROM tb_user WHERE email = ? AND senha = ?");
        $stmt -> bindParam(1, $email);
        $stmt -> bindParam(2, $senha);

        $stmt -> execute();
        return $stmt -> fetchObject();
    }

    public function get($email)
    {
        //Prepare our select statement.
        $stmt = $this -> pdo -> prepare("SELECT * FROM tb_user WHERE email = ?");
        $stmt -> bindParam(1, $email);

        $stmt -> execute();
        return $stmt -> fetchObject();
    }

    public function getAll()
    {
        //Prepare our select statement.
        $stmt = $this -> pdo -> prepare("SELECT * FROM tb_user");
        $stmt -> execute();

        // Retorna um array de objetos
        return $stmt -> fetchAll(PDO::FETCH_CLASS);
    }

    public function insert($user)
    {
        $stmt = $this -> pdo -> prepare("INSERT INTO tb_user (nome, email,  senha, perfil) VALUES (:nome, :email, :senha, :perfil)");
        $stmt -> bindValue(':nome', $user -> nome);
        $stmt -> bindValue(':email', $user -> email);
        $stmt -> bindValue(':senha', $user -> senha);
        $stmt -> bindValue(':perfil', $user -> perfil);

        $stmt -> execute();
        $user = clone $user;

        $user -> id = $this -> pdo -> lastInsertId();

        return $user;
    }

    public function update($email, $user)
    {
        $stmt = $this -> pdo -> prepare("UPDATE tb_user
            SET
                nome = :nome,
                email = :email,
                senha = :senha,
                perfil = :perfil
            WHERE
                email = :email");

        $data = [/*
            'id' => $id,*/
            'nome' => $user -> nome,
            'email' => $user -> email,
            'senha' => $user -> senha,
            'perfil' => $user -> perfil,
        ];

        return $stmt -> execute($data);
    }

    public function delete($email)
    {
        $stmt = $this -> pdo -> prepare("DELETE from tb_user WHERE email = ?");
        $stmt -> bindParam(1, $email);

        $stmt -> execute();

        return $stmt -> rowCount(); // Retorna a quantidade de linhas afetadas
    }
}