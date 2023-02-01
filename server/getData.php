<?php 

  $string = file_get_contents('../data/todo-list.json');

  $todolist = json_decode($string, true);
  
  if(isset($_POST['addTask'])){
    
    $todo_obj =[
        "task" => $_POST['addTask'],
        "done" => false,
    ];

    $todolist[] = $todo_obj;

    file_put_contents('../data/todo-list.json', json_encode($todolist));
  }

  if(isset($_POST['deleteTask'])){
    foreach($todolist as $key => $value){
      if($value['task'] == $_POST['deleteTask'])
          unset($todolist[$key]);
    }
    file_put_contents('../data/todo-list.json', json_encode($todolist));
  }

  if(isset($_POST['setDone'])){
    foreach($todolist as $key => $value){
      if($value['task'] == $_POST['setDone'])
          $todolist[$key]['done'] = !$value['done'];
    }
    file_put_contents('../data/todo-list.json', json_encode($todolist));
  }

  header('Content-Type: application/json');
  
  echo json_encode($todolist);

?>