<?php

    class AcomodacoesDAO {
        function __construct($pdo) {
            $this -> pdo = $pdo;
        }

        public function get($id) {
            //Prepare our select statement.
            $stmt = $this -> pdo -> prepare("SELECT * FROM tb_acomodacoes WHERE id = ?");
            $stmt -> bindParam(1, $id);

            $stmt -> execute();
            return $stmt -> fetchObject();
        }

        public function getAll() {
            //Prepare our select statement.
            $stmt = $this -> pdo -> prepare("SELECT * FROM tb_acomodacoes");
            $stmt -> execute();

            // Retorna um array de objetos
            return $stmt -> fetchAll(PDO::FETCH_CLASS);
        }

        public function insert($acomodacoes) {

            
        $stmt = $this -> pdo -> prepare("INSERT INTO tb_acomodacoes (qt_cama_casal, qt_cama_solteiro,  camas_extras, fk_tarifa) VALUES (:qt_cama_casal, :qt_cama_solteiro, :camas_extras, :tipo_acomodacoes)");

        $stmt -> bindValue(':nome', $acomodacoes['nome']);
        $stmt -> bindValue(':email', $acomodacoes['email']);
        $stmt -> bindValue(':camas_extras', $acomodacoes['camas_extras']);
        $stmt -> bindValue(':tipo_acomodacoes', $acomodacoes['tipo_acomodacoes']);

        return $stmt -> execute();
/*
            $stmt = $this->pdo->prepare("INSERT INTO tb_acomodacoes (qt_cama_casal, qt_cama_solteiro, camas_extras, tipo_acomodacoes) VALUES (:qt_cama_casal, :qt_cama_solteiro, :camas_extras, :tipo_acomodacoes)");
            $stmt -> bindValue(':qt_cama_casal', $acomodacoes -> qt_cama_casal);
            $stmt -> bindValue(':qt_cama_solteiro', $acomodacoes -> qt_cama_solteiro);
            $stmt -> bindValue(':camas_extras', $acomodacoes -> camas_extras);
            $stmt -> bindValue(':tipo_acomodacoes', $acomodacoes -> tipo_acomodacoes);

            $stmt -> execute();
            $acomodacoes = clone $acomodacoes;

            $acomodacoes -> id = $this -> pdo -> lastInsertId();

            return $acomodacoes;*/
        }

        public function update($id, $acomodacoes) {
            $stmt = $this -> pdo -> prepare("UPDATE tb_acomodacoes
                SET
                    qt_cama_casal = :qt_cama_casal,
                    qt_cama_solteiro = :qt_cama_solteiro,
                    camas_extras = :camas_extras,
                    tipo_acomodacoes = :tipo_acomodacoes
                WHERE
                    id = :id");

            $data = [
                'id' => $id,
                'qt_cama_casal' => $acomodacoes -> qt_cama_casal,
                'qt_cama_solteiro' => $acomodacoes -> qt_cama_solteiro,
                'camas_extras' => $acomodacoes -> camas_extras,
                'tipo_acomodacoes' => $acomodacoes -> tipo_acomodacoes,
            ];

            return $stmt -> execute($data);
        }

        public function delete($id) {
            $stmt = $this -> pdo -> prepare("DELETE from tb_acomodacoes WHERE id = ?");
            $stmt -> bindParam(1, $id);

            $stmt -> execute();

            return $stmt -> rowCount(); // Retorna a quantidade de linhas afetadas
        }
    }
?>