
function editar(id, txt_tarefa){
  //Criar um form de edição
  let form = document.createElement('form')
  form.action = 'index.php?pag=index&acao=atualizar'
  form.method = 'POST'
  form.className = 'row'

  //criar um input para entrada de texto
  let inputTarefa = document.createElement('input')
  inputTarefa.type = 'text'
  inputTarefa.name = 'tarefa'
  inputTarefa.className = 'col-9 form-control'
  inputTarefa.value =  txt_tarefa

  //criar um input hidden para guardar o id da tarefa
  let inputId = document.createElement('input')
  inputId.type = 'hidden'
  inputId.name = 'id'
  inputId.value = id 

  //criar um button para envio do form
  let button = document.createElement('button')
  button.type = 'submit'
  button.className = 'col-3 btn btn-info'
  button.innerHTML = 'Atualizar'

  //Incluir intens no form
  form.appendChild(inputTarefa)
  form.appendChild(button)
  form.appendChild(inputId)

  //selecionar a div tarefa
  let tarefa = document.getElementById('tarefa_'+id)

  //limpar o texto da tarefa para a  inclusao do form
  tarefa.innerHTML = ''

  //incluir o form na pagina
  tarefa.insertBefore(form, tarefa[0])
}

function remover(id){
  location.href = 'index.php?pag=index&acao=remover&id='+ id
}

function marcarRealizada(id){
  location.href = 'index.php?pag=index&acao=marcarRealizada&id='+ id
}