<?php include("db.php"); ?>

<?php include("includes/header.php"); ?>

<div class="container" style="margin-top:40px;">
  <div class="row">
    <div class="col-sm-4">
      <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?>">
          <?= $_SESSION['message'] ?>
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
      <?php session_unset(); } ?>
      <form class="" action="save-task.php" method="post">
        <div class="form-group">
          <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
        </div>
        <div class="form-group">
          <textarea name="description" rows="2" class="form-control" placeholder="Task Description"></textarea>
        </div>
        <input type="submit" class="btn btn-succes btn-block" name="save_task" value="Save Task">
        </form>
    </div>
    <div class="col-sm-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $query = "SELECT * FROM task";
            $result_tasks = mysqli_query($cn_db,$query);

            while ($row = mysqli_fetch_array($result_tasks)) { ?>
              <tr>
                <td><?= $row['title'] ?></td>
                <td><?= $row['description'] ?></td>
                <td><?= $row['created_at'] ?></td>
                <td>
                  <a href="edit.php?id=<?= $row['id']?>" class="btn btn-secondary">
                    <i class="fas fa-marker"></i>
                  </a>
                  <a href="delete-task.php?id=<?= $row['id']?>" class="btn btn-danger">
                    <i class="far fa-trash-alt"></i>
                  </a>
                </td>
              </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include("includes/footer.php"); ?>
