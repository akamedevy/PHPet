<?php

class Database
{
    public $conn;
    public string $local="localhost";
    public string $db="phpet";
    public string $user = "root";
    public string $password = "";

    public function __construct(){
        $result = $this->conecta();
    }

    public function conecta(){
        try {
            $this->conn = new PDO("mysql:host=".$this->local.";dbname=$this->db",$this->user,$this->password); 
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $err) {
            die("ERRO DE CONEXAO: " . $err->getMessage());
        }
    }

    public function insert($nome, $cpf, $email, $senha, $tipo_usuario)
    {
        $this->query = "INSERT INTO usuarios (nome, cpf, email, senha, tipo_usuario) VALUES (:nome, :cpf, :email, :senha, :tipo_usuario)";
        $this->cadastrar = $this->conn->prepare($this->query);
        $this->cadastrar->bindParam(':nome', $nome);
        $this->cadastrar->bindParam(':cpf', $cpf);
        $this->cadastrar->bindParam(':email', $email);
        $this->cadastrar->bindParam(':senha', $senha);
        $this->cadastrar->bindParam(':tipo_usuario', $tipo_usuario);
        $this->cadastrar->execute();

        if ($this->cadastrar->rowCount()){
            echo 'cadastrado';
        }
    }

    public function select(string $table = null,string $where = null, string $order = null, string $limit = null, string $fields = '*'): array
    {
        // Montando a query
        $query = "SELECT $fields FROM {$table}";
    
        if ($where) {
            $query .= " WHERE $where";
        }
    
        if ($order) {
            $query .= " ORDER BY $order";
        }
    
        if ($limit) {
            $query .= " LIMIT $limit";
        }
    
        // Preparando e executando a query
        // echo($query);
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function login($cpf)
    {
        $this->query = "SELECT id, nome, cpf, email, senha, tipo_usuario FROM usuarios WHERE cpf = :cpf";
        $this->logar = $this->conn->prepare($this->query);
        $this->logar->bindParam(':cpf', $cpf);
        $this->logar->execute();
        return $this->usuario = $this->logar->fetch(PDO::FETCH_ASSOC);
    }

    public function executar($query,$binds = []){ 
        try{
            $stmt = $this->conn->prepare($query);
            $stmt->execute($binds);
            return $stmt;
        }catch (PDOException $err) {
            die("Connection Failed " . $err->getMessage());
        }
    }

    public function update($tabela,$where, $values){
        $this->table = $tabela;
        $fields = array_keys($values);

        $query = 'UPDATE ' . $this->table .' SET ' .implode('=?,',$fields). '=? WHERE ' . $where;
        
        $result = $this->executar($query,array_values($values));
        
        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    public function delete($delete_table, $delete_rule, $id)
    {
        $query = "DELETE FROM " . $delete_table . " WHERE " . $delete_rule . " = " . $id;
        $this->deletar = $this->conn->prepare($query);
        $this->deletar->execute();
        return TRUE;
    }
}

?>