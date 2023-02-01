<?php 

  $todolist = json_decode(file_get_contents('../data/todo-list.json'), true);
  
  if(isset($_POST['addTask']) &&  trim($_POST['addTask']) != ''){

    $todolist[] = [
        "task" => $_POST['addTask'],
        "done" => false,
    ];

    file_put_contents('../data/todo-list.json', json_encode($todolist, JSON_PRETTY_PRINT));
  }

  if(isset($_POST['deleteTask'])){
    unset($todolist[$_POST['deleteTask']]);
    file_put_contents('../data/todo-list.json', json_encode($todolist, JSON_PRETTY_PRINT));
  }

  if(isset($_POST['setDone'])){
    foreach($todolist as $key => $value){
      if($value['task'] == $_POST['setDone'])
          $todolist[$key]['done'] = !$value['done'];
    }
    file_put_contents('../data/todo-list.json', json_encode($todolist, JSON_PRETTY_PRINT));
  }

  header('Content-Type: application/json');
  
  echo json_encode($todolist);

?>