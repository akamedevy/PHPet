<?php
include_once  "../../module/ConsultasDB.php";

class Consulta{
    public static function cadastrar_consulta($dia, $horario, $motivo, $tipo, $id_animal, $id_usuario, $id_veterinario)
    {
        $ConsultasDB = new ConsultasDB;
        return $ConsultasDB->insert_consult($dia, $horario, $motivo, $tipo, $id_animal, $id_usuario, $id_veterinario);
    }
}

?>