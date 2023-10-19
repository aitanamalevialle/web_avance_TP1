<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class CRUD extends PDO {

    // Connexion à la base de données en appelant le constructeur de la classe parente (PDO). 
    public function __construct(){
        // parent::__construct('mysql:host=localhost; dbname=agence_voyages; port=8888; charset=utf8', 'root', 'root');
        parent::__construct('mysql:host=localhost; dbname=e2395216; port=8888; charset=utf8', 'e2395216', '1UoTftoqRgl2YOIab7bw');
    } 

    public function select($table, $field='id', $order='ASC'){
        $sql="SELECT * FROM $table ORDER BY $field $order";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

    public function selectId($table, $value, $field = 'id'){
        $sql="SELECT * FROM $table WHERE $field = '$value'";
        $stmt = $this->query($sql);
        $count = $stmt->rowCount();
        if($count == 1){
            return $stmt->fetch();
        }else{
            header('location:index.php');
        }  
    }

    // Fonction pour effectuer une jointure entre deux tables et afficher leurs données.
    public function selectJoin($table1, $table2, $on, $field='id', $order='ASC'){
        $sql="SELECT * FROM $table1 INNER JOIN $table2 ON $table1.$on = $table2.$on ORDER BY $table1.$field $order";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }      
    
    public function insert($table, $data){
        $nomChamp = implode(", ",array_keys($data));
        $valeurChamp = ":".implode(", :", array_keys($data));
    
        $sql = "INSERT INTO $table ($nomChamp) VALUES ($valeurChamp)";
        $stmt = $this->prepare($sql);
        foreach($data as $key => $value){
            $stmt->bindValue(":$key", $value);
        }
        
        if($stmt->execute()) {
            return $this->lastInsertId();
        } else {
            return false;
        }
    }    

    public function delete($table, $value, $field = 'id'){
        $sql = "DELETE FROM $table WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->execute();
        header('location:index.php');
    }

    // Fonction pour mettre à jour des données dans une table. 
    public function update($table, $data, $field='id'){
        $queryField = null;
        foreach($data as $key=>$value){
            $queryField .="$key =:$key, ";
        }
        $queryField = rtrim($queryField, ", ");
        
        $sql = "UPDATE $table SET $queryField WHERE $field = :$field";

        $stmt = $this->prepare($sql);
        foreach($data as $key => $value){
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        header('location:index.php');
    }

    public function __destruct(){
    }
}
?>