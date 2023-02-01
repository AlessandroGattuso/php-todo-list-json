<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./style/index.css">
  <title>php-todo-list-json</title>
</head>
<body>
  <div id="app">
    <div class="container-fluid bg-blue vh-100">
      <h1 class="text-center text-white py-5">Todo list</h1>
      <div class="container d-flex justify-content-center align-items-center flex-column gap-3">
        <div class="card" style="width: 18rem;">
          <ul class="list-group list-group-flush">
            <li v-for="(item , index) in todoList" class="list-group-item d-flex justify-content-between align-items-center">
              <span class="cursor-pointer" @click="setDone(index)">{{ item.task }}</span>
              <div class="d-flex gap-2">
                <button @click="setDone(index)" type="button" class="btn" :class="(item.done) ? 'btn-success' : 'btn-outline-success' "><i class="fa-solid fa-check"></i></button>
                <button @click="deleteTask(index)" type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
              </div>
            </li>
          </ul>
        </div>
        <div class="input-group mb-3" style="width: 18rem;">
          <input v-model="newTask" type="text" class="form-control" placeholder="Add new task" aria-label="Recipient's username" aria-describedby="button-addon2">
          <button @click="addTask" class="btn btn-outline-warning" type="button" id="button-addon2">Send</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.0/axios.min.js" integrity="sha512-A6BG70odTHAJYENyMrDN6Rq+Zezdk+dFiFFN6jH1sB+uJT3SYMV4zDSVR+7VawJzvq7/IrT/2K3YWVKRqOyN0Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript" src="./js/script.js"></script>
</body>
</html>