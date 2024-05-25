<?php 
	session_start();

      include_once('config.php');
  
      if (empty($_SESSION['username'])) {
            header("Location: login.php");
      }

      $sql = "SELECT * FROM users";

      $selectUsers = $conn->prepare($sql);
      $selectUsers->execute();

      $users_data = $selectUsers->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="fa/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <h1>,iyfjn</h1>
    
</body>
</html>
    
    
    <main>
  <div class="d-flex justify-content-center align-items-center py-3 mb-3 border-bottom">
    <h1 class="h1">Dashboard</h1>
  </div>
  <?php if($_SESSION['is_admin'] == 'true') { ?>
    <h2>Users</h2>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Username</th>
          <th>Update</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users_data as $user_data) { ?>
        <tr>
          <td> <?php echo $user_data['id']; ?> </td>
          <td> <?php echo $user_data['name']; ?> </td>
          <td> <?php echo $user_data['username']; ?> </td>
          <td> <a href="editUsers.php?id=<?= $user_data['id']; ?>">Update</a> </td>
          <td> <a href="deleteUsers.php?id=<?= $user_data['id']; ?>">Delete</a> </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>


  <?php } ?>

</main>
