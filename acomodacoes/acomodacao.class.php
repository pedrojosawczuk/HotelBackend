<?php

    class Acomodacoes {
        function __construct($qt_cama_casal, $qt_cama_solteiro, $camas_extras, $tipo_acomodacoes) {
            $this -> qt_cama_casal = $qt_cama_casal;
            $this -> qt_cama_solteiro = $qt_cama_solteiro;
            $this -> camas_extras = $camas_extras;
            $this -> tipo_acomodacoes = $tipo_acomodacoes;
        }
    }
?>