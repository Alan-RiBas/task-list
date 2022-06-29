<?php
if(!empty($_POST['usuario']) && !empty($_POST['senha'])){

  $dns = 'mysql:host=localhost;dbname=task_list';
  $usuario = 'root';
  $senha = '';
  try{
    //Tentativa de conexão
    $conexao = new PDO($dns, $usuario, $senha);

    //querySQL
    $query = "SELECT * FROM tb_usuarios where ";
    $query .= " email = :usuario ";
    $query .= " AND senha = :senha ";

    echo $query;
    //Metodo prepare para "preparar" os dados em variaveis e tratar com o bindValue()
    $stmt = $conexao->prepare($query);

    //Tratando os dados da $query utilizando as variaveis " :usuario , :senha "
    $stmt->bindValue(':usuario', $_POST['usuario']);
    $stmt->bindValue(':senha', $_POST['senha']);

    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    echo'<hr>';


    echo '<pre>';
    print_r($usuario);
    echo '</pre>';

  }catch(PDOException $e){
    //Tratamento de erro caso não mantenha conexão(try)
    echo 'Erro: '. $e->getCode().' Mensagem: '.$e->getMessage();

  }

}







/*  

 //verofocando PDOstatement na query()
  $select_query = '
    SELECT * FROM tb_usuarios 
  ';
  $stmt = $conexao->query($select_query);
  $lista_usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);


  foreach($lista_usuarios as $key => $value){
    print_r($value);
    echo '<hr>';
  }
*/

/*

$table_query = '
    CREATE TABLE IF NOT EXISTS tb_usuarios(
      id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
      nome varchar(128) NOT NULL,
      email varchar (64) NOT NULL,
      senha varchar(32) NOT NULL
    )
  ';
  $retorno = $conexao->exec($table_query);
  //0
  echo $retorno;   
  
  $insert_query = '
    INSERT INTO tb_usuarios(
      nome, email, senha
    ) VALUES(
      "Alan Batista de Oliveira Ribas", "alanbatista@gmail.com", "123456"
    )   
  ';
  $retorno = $conexao->exec($insert_query);    
  echo $retorno;  
  
  $insert_query = '
  INSERT INTO tb_usuarios(
    nome, email, senha
  ) VALUES(
    "Joao Batista Ribas", "Joaobatista@gmail.com", "1597456"
  )   
  ';
  $retorno = $conexao->exec($insert_query);     
  echo $retorno; 

  $insert_query = '
  INSERT INTO tb_usuarios(
    nome, email, senha
  ) VALUES(
    "Maria Silva", "MaSilva@gmail.com", "1597456"
  )   
  ';
  $retorno = $conexao->exec($insert_query);     
  echo $retorno;    */
?>


<html>
  <head>
    <meta  charset="utf-9">
    <title>Login</title>
  </head>

  <body>
    <form method="POST" action="Connection.php">
      <input type="text" name="usuario" id="" placeholder="Usuario"/><br /></br />
      <input type="password" name="senha" id="" placeholder="Senha"/><br />
      <button type="submit">Entrar</button>
    </form>
  </body>
</html>






