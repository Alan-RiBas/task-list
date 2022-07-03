<?php
  class Conexao{
    //Conexao com o DB
    private $host = 'localhost';//servidor
    private $dbname = 'task_list';//Nome da tabela
    private $user = 'root';//Usuario DB
    private $pass = '';//Senha

    public function conectar(){
      try{
        //instanciando o PDO
        $conn = new PDO(
          "mysql:host=$this->host;dbname=$this->dbname",
          "$this->user",
          "$this->pass",
        );
        return $conn;
      }catch(PDOException $e){
        echo '<p> {$e->getMessage()}</p>';
      }
    }


    
  }
?>