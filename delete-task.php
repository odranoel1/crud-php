<?php

include ("db.php");

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM task where id='$id'";
  $result = mysqli_query($cn_db,$query);
  if(!$result) {
    die('Query Failed');
  } else {

    $_SESSION['message'] = 'Task Removed succesfully';
    $_SESSION['message_type'] = 'danger';
    header("Location: index.php");
  }
}
 ?>
