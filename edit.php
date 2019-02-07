<?php
  include("db.php");

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id ='$id'";
    $result = mysqli_query($cn_db,$query);

    if(mysqli_num_rows($result) == 1){
      $row = mysqli_fetch_array($result);
      $title = $row['title'];
      $description = $row['description'];
    }
  }

  if(isset($_POST['update'])){
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE task SET title = '$title', description = '$description' WHERE id = '$id'";
    $result = mysqli_query($cn_db,$query);

    if(!$result) {
      die('Query Failed');
    } else {

      $_SESSION['message'] = 'Task update succesfully';
      $_SESSION['message_type'] = 'warning';
      header("Location: index.php");
    }
  }
?>

<?php include ("includes/header.php") ?>

<div class="container" style="margin-top:40px">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <form action="edit.php?id=<?= $_GET['id']; ?>" method="post">
        <div class="form-group">
          <input type="text" class="form-control" name="title" value="<?= $title; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <textarea class="form-control" name="description" rows="2" placeholder="Update Description"><?= $description; ?></textarea>
        </div>
        <button class="btn btn-success" type="submit" name="update">
          Update
        </button>
      </form>
    </div>
  </div>

</div>

<?php include ("includes/footer.php") ?>
