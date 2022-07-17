<?php
  require "../../task_list_app_private/tarefa.model.php";
  require "../../task_list_app_private/tarefa.service.php";
  require "../../task_list_app_private/conexao.php";

  $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

 if( $acao == 'inserir'){
    $tarefa = new Tarefa();
    $tarefa->__set('tarefa', $_POST['tarefa']);//recebendo tarefa do html(form) via POST

    $conexao = new Conexao();//abre conexao com o DB

    $tarefaService = new TarefaService($conexao, $tarefa);//instancia das F.CRUD
    $tarefaService->inserir();
    header('Location: nova_tarefa.php?inclusao=1');
   }else if($acao == 'recuperar'){ // F.READ

    $tarefa = new Tarefa();
    $conexao = new Conexao();

    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefas = $tarefaService->recuperar();
  }else if($acao == 'atualizar'){  //F.UPDATE
    $tarefa = new Tarefa(); 
    $tarefa->__set('id', $_POST['id']);
    $tarefa->__set('tarefa', $_POST['tarefa']);

    $conexao = new Conexao();
    $tarefaService = new TarefaService($conexao, $tarefa);
    if($tarefaService->atualizar()){
      header('location: todas_tarefas.php');
    }
  }
?>