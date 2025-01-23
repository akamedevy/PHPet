<?php

include "../../module/AnimalDB.php";

class CadastrarAnimal{
    public function __construct($nome, $especie, $raca, $idade, $id_dono)
    {
        $AnimalDB = new AnimalDB();
        $AnimalDB->insert($nome, $especie, $raca, $idade, $id_dono);
            // header('Location: ../public/html/logar.html');
    }
}
?>