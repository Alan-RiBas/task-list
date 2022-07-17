<?php
  class TarefaService{

    private $conn;
    private $tarefa;
    
    public function __construct(Conexao $conn, Tarefa $tarefa){//Passando parâmetros tem de vir das classes setadas.
      $this->conn = $conn->conectar();
      $this->tarefa = $tarefa;
    }
    
    //Classe de aplicação CRUD.  
    public function inserir(){ //F.CREATE
      $query = 'insert into tb_tarefas(tarefa) values(:tarefa)';//usando ':tarefa' para tratar com bindValue e evitar SQLinjection
      $statemant = $this->conn->prepare($query);
      $statemant->bindValue(':tarefa', $this->tarefa->__get('tarefa'));//atraves do metodo __get estamos recuperando o POST('tarefa') e passando via bindValue
      $statemant->execute();
    }
    
    public function recuperar(){//F.READ
      $query = 'select
                   t.id, s.status, t.tarefa
                from
                   tb_tarefas as t
                   left join tb_status as s 
                   on(t.id_status = s.id)
                ';//usando ':tarefa' para tratar com bindValue e evitar SQLinjection
      $statemant = $this->conn->prepare($query);
      $statemant->execute();
      return $statemant->fetchAll(PDO::FETCH_OBJ);
    }
     
    public function atualizar(){ //F.UPDATE
      $query = 'update tb_tarefas set tarefa = :tarefa where id = :id'; 
      $statemant = $this->conn->prepare($query);
      $statemant->bindValue(':tarefa',$this->tarefa->__get('tarefa'));
      $statemant->bindValue(':id',$this->tarefa->__get('id'));
      return $statemant->execute();
    }
    
    public function remover(){//F.DELETE
        
    }      
  }  
?>