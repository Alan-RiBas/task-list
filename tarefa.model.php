<?php

  class Tarefa{
    // Os atributos desta classe são análogos do tb_tarefa, do DB
    private $id;
    private $id_status;
    private $tarefa;
    private $data_cadastro;

    public function __get($atributo){
      return $this->$atributo;
    }

    public function __set($atributo, $valor){
      $this->$atributo = $valor;
    }

  }

?>