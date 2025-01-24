<?php

include_once  "../../module/AnimalDB.php";

class VerificarAnimal{
    public function verificar($id_dono)  // verifica se o usuario ja tem um animal cadastrado
    {
        $this->id_dono = $id_dono;
        $this->AnimalDB = new AnimalDB();
        return $this->AnimalDB->verifyUser($this->id_dono);
    }
}