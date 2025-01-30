<?php
require_once "Database.php";

class ConsultasDB extends Database{
    public function __construct()
    {
        parent::__construct(); // inicia a conexão
    }



    public function insert_consult($dia, $horario, $motivo, $tipo, $id_animal, $id_usuario, $id_veterinario)
    {
        $this->query = "INSERT INTO consulta (dia, horario, motivo, tipo, id_animal, id_usuario, id_veterinario) 
                        VALUES (:dia, :horario, :motivo, :tipo, :id_animal, :id_usuario, :id_veterinario);";
        $this->cadastrar = $this->conn->prepare($this->query);
        $this->cadastrar->bindParam(':dia', $dia);
        $this->cadastrar->bindParam(':horario', $horario);
        $this->cadastrar->bindParam(':motivo', $motivo);
        $this->cadastrar->bindParam(':tipo', $tipo);
        $this->cadastrar->bindParam(':id_animal', $id_animal);
        $this->cadastrar->bindParam(':id_usuario', $id_usuario);
        $this->cadastrar->bindParam(':id_veterinario', $id_veterinario);
        $this->cadastrar->execute();
    }
}

?>