<?php

include "Database.php";

class AnimalDB extends Database{
    public function __construct()
    {
        parent::__construct(); // inicia a conexão
    }

    public function insert($nome, $especie, $raca, $idade, $id_dono)
    {
        $this->query = "INSERT INTO animais (nome, especie, raca, idade, id_dono) 
                        VALUES (:nome, :especie, :raca, :idade, :id_dono);";
        $this->cadastrar = $this->conn->prepare($this->query);
        $this->cadastrar->bindParam(':nome', $nome);
        $this->cadastrar->bindParam(':especie', $especie);
        $this->cadastrar->bindParam(':raca', $raca);
        $this->cadastrar->bindParam(':idade', $idade);
        $this->cadastrar->bindParam(':id_dono', $id_dono);
        $this->cadastrar->execute();

        if ($this->cadastrar->rowCount()){
            echo 'cadastrado';
        }
    }
}

$AnimalDB = new AnimalDB();