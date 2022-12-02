<?php

    class TarifaDAO {
        function __construct($pdo) {
            $this -> pdo = $pdo;
        }

        public function get($id) {
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
            $stmt = $this -> pdo -> prepare("INSERT INTO tb_tarifa (tipo_acomodacoes, preco) VALUES (:tipo_acomodacoes, :preco)");
            $stmt -> bindValue(':tipo_acomodacoes', $tarifa -> tipo_acomodacoes);
            $stmt -> bindValue(':preco', $tarifa -> preco);

            $stmt -> execute();
            $tarifa = clone $tarifa;

            $tarifa -> id = $this -> pdo -> lastInsertId();

            return $tarifa;
        }

        public function update($id, $tarifa) {
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

            return $stmt -> execute($data);
        }

        public function delete($id) {
            $stmt = $this -> pdo -> prepare("DELETE from tb_tarifa WHERE id = ?");
            $stmt -> bindParam(1, $id);

            $stmt -> execute();

            return $stmt -> rowCount(); // Retorna a quantidade de linhas afetadas
        }
    }
?>