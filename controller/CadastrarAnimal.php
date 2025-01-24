<?php

include_once  "../../module/AnimalDB.php";

class CadastrarAnimal{
    public function __construct($nome, $especie, $raca, $idade, $id_dono)
    {
        $this->AnimalDB = new AnimalDB();
        $this->AnimalDB->insert($nome, $especie, $raca, $idade, $id_dono);
            // header('Location: ../public/html/logar.html');
    }
}
?>