<?php

    class TarifaDAO {
        function __construct($pdo) {
            $this -> pdo = $pdo;
        }

        public function getById($id) {
            //Prepare our select statement.
            $stmt = $this -> pdo -> prepare("SELECT * FROM tb_tarifa WHERE id = ?");
            $stmt -> bindParam(1, $id);

            $stmt -> execute();
            return $stmt -> fetchObject();
        }

        public function getAll() {
            //Prepare our select statement.
            $stmt = $this -> pdo -> prepare("SELECT * FROM tb_tarifa");
            $stmt -> execute();

            // Retorna um array de objetos
            return $stmt -> fetchAll(PDO::FETCH_CLASS);
        }

        public function insert($tarifa) {
            $sql = 'INSERT INTO tb_tarifa (
                tipo_acomodacoes, preco)
            VALUES (:tipo_acomodacoes, :preco)';
    
            $stmt = $this -> pdo -> prepare($sql);
            $stmt -> bindValue(':tipo_acomodacoes', $tarifa['tipo_acomodacoes']);
            $stmt -> bindValue(':preco', $tarifa['preco']);
            /*
            print_r($tarifa);*/
            
            return $stmt -> execute();
            /*
        $stmt = $this -> pdo -> prepare("INSERT INTO tb_tarifa (tipo_acomodacoes, preco) VALUES (:tipo_acomodacoes, :preco)");
        
        $stmt -> bindValue(':tipo_acomodacoes', $tarifa['tipo_acomodacoes']);
        $stmt -> bindValue(':preco', $tarifa['preco']);

        return $stmt -> execute();/*
        return $stmt -> fetchObject();*/

        }

        public function update($id, $tarifa) {
            
            $sql = 'UPDATE tb_tarifa
            SET
                tipo_acomodacoes = :tipo_acomodacoes,
                preco = :preco
            WHERE
                id = :id';

            $stmt = $this -> pdo -> prepare($sql);
            $stmt -> bindValue(':id', $id);
            $stmt -> bindValue(':tipo_acomodacoes', $tarifa['tipo_acomodacoes']);
            $stmt -> bindValue(':preco', $tarifa['preco']);

            return $stmt -> execute();
            /*
            $stmt = $this -> pdo -> prepare("UPDATE tb_tarifa
                SET
                    tipo_acomodacoes = :tipo_acomodacoes,
                    preco = :preco,
                WHERE
                    id = :id");

            $data = [
                'id' => $id,
                'tipo_acomodacoes' => $tarifa -> tipo_acomodacoes,
                'preco' => $tarifa -> preco,
            ];

            return $stmt -> execute($data);*/
        }

        public function delete($id) {
            $stmt = $this -> pdo -> prepare("DELETE from tb_tarifa WHERE id = ?");
            $stmt -> bindParam(1, $id);

            $stmt -> execute();

            return $stmt -> rowCount(); // Retorna a quantidade de linhas afetadas
        }
    }
?>