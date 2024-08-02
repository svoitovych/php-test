<?php
  $name = $_POST['user-name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (trim($name) == '')
    echo "Please enter your name";
  else if (strlen(trim($name)) <= 3)
    echo "Please enter a valid name";
  else if (trim($email) == '' || trim($password) == '' || $_POST['message'] == "")
    echo "Please enter all fields";
  else {
    $_POST['password'] = md5($password);
    echo '<h1>All Data: </h1>';
    foreach ($_POST as $key => $value) {
      echo '<p>'.$key.': '.$value.'</p>';
    }

    header('location: about.php');

    exit;
  }
