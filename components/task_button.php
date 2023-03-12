<div class="text-center" id="div-button-task">
    <button class="btn btn-secondary mb-2" type="submit" id="add-button" onclick="showInputTask()">Adicione uma nova tarefa</button>
</div>

<script>
    const showInputTask = () => {
        // remove the add new task button
        const div = document.getElementById("div-button-task")
        const addBtn = document.getElementById("add-button")
        div.removeChild(addBtn)
        // create the form 
        const form = document.createElement("form")
        form.action = ""
        form.method = "post"
        const label = document.createElement("label")
        label.className = "form-label my-2"
        label.textContent = "Insira sua tarefa:"
        const input = document.createElement("input")
        input.type = "text"
        input.name = "title"
        input.className = "form-control my-2"
        input.placeholder = "Ex.: passear com o Bidu."
        const sendBtn = document.createElement("button")
        sendBtn.className = "btn btn-primary my-2"
        sendBtn.type = "submit"
        sendBtn.textContent = "Criar tarefa"
        form.appendChild(label)
        form.appendChild(input)
        form.appendChild(sendBtn)
        div.appendChild(form)
    }
</script>

<?php 
if(!empty($_POST)) 
{
    $title = $_POST["title"];
    if (isset($title)) 
    {
        printTask($title, 4);
    } 
    else 
    {
        echo "
            <div class='alert alert-warning text-center' role='alert'>
              <h4 class='alert-heading'>ERRO ENCONTRADO</h4>
              <p>Insira um nome pra tarefa!</p>
            </div>";
        }
}

function printTask($title, $id) 
{
    echo "
    <div class='form-check'>
        <input type='hidden' name='id' value={$id}>
        <input class='form-check-input' type='checkbox' id='input-checkbox'>
        <label class='form-check-label' for='input-checkbox'> {$title}
        </label>
    </div>
    ";
}
?>

