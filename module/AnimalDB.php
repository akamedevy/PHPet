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

        // if ($this->cadastrar->rowCount()){
        //     echo 'cadastrado';
        // }
    }

    public function verifyUser($id_dono) // retorna 1 se o animal ja estiver associado ao o id de um usuario, retorna 0 se não.
    {
        $this->query = "SELECT EXISTS( SELECT 1 FROM animais WHERE animais.id_dono = :id_dono ) AS tem_animal";
        $this->selecionar = $this->conn->prepare($this->query);
        $this->selecionar->bindParam(':id_dono', $id_dono);
        $this->selecionar->execute();

        $resultado = $this->selecionar->fetch(PDO::FETCH_ASSOC);

        return $resultado['tem_animal'];
    }
}

// $AnimalDB = new AnimalDB();