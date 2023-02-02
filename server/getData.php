<?php 

  $todolist = json_decode(file_get_contents('../data/todo-list.json'), true);
  header('Content-Type: application/json');
  
  if(isset($_POST['addTask']) &&  $_POST['addTask'] != ''){
    $todolist[] = [
        "task" => $_POST['addTask'],
        "done" => false,
    ];
  }

  if(isset($_POST['deleteTask']))
    unset($todolist[$_POST['deleteTask']]);
  
  if(isset($_POST['setDone']))
    $todolist[$_POST['setDone']]['done'] = !$todolist[$_POST['setDone']]['done'];

  if(isset($_POST['editTask']) && isset($_POST['editString'])){
    $todolist[$_POST['editTask']]['task'] = $_POST['editString'];
  }

  file_put_contents('../data/todo-list.json', json_encode($todolist, JSON_PRETTY_PRINT));
  
  
  echo file_get_contents('../data/todo-list.json');

?>