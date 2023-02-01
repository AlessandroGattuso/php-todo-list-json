<?php 

  $todolist = json_decode(file_get_contents('../data/todo-list.json'), true);
  
  if(isset($_POST['addTask']) &&  trim($_POST['addTask']) != ''){
    $todolist[] = [
        "task" => $_POST['addTask'],
        "done" => false,
    ];
  }

  if(isset($_POST['deleteTask']))
    unset($todolist[$_POST['deleteTask']]);
  

  if(isset($_POST['setDone']))
    $todolist[$_POST['setDone']]['done'] = !$todolist[$_POST['setDone']]['done'];
  

  file_put_contents('../data/todo-list.json', json_encode($todolist, JSON_PRETTY_PRINT));
  
  header('Content-Type: application/json');
  
  echo json_encode($todolist);

?>