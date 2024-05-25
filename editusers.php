<?php 
      session_start();
      include_once('../config.php');

      $id = $_GET['id'];

      $sql = "SELECT * FROM users WHERE id=:id";
      $selectUser = $conn->prepare($sql);
      $selectUser->bindParam(':id', $id);
      $selectUser->execute();
      $user_data = $selectUser->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">

</head>
<body class="" style="background-color: #e1e1e1"> 
<nav class="navbar navbar-expand-lg bg-green shadow" style="color: white;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <?php echo "Welcome " . $_SESSION['name']; ?>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home Page</a>
          </li>

        </ul>
        <div class="d-flex">
          <a href="logout.php">
            <button class="btn btn-outline-dark">Logout
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </button>
          </a>
        </div>
      </div>
    </div>
  </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4 offset-4">
                <h1 class="text-success">Edit user details</h1>   
                <div class="table-responsive">
                    <form action="updateUsers.php" method="post">

                        <div class="form-floating mb-2">
                            <input type="number" class="form-control" name="id" id="floatingInput" 
                            value="<?php echo $user_data['id'] ?>">
                            <label for="floatingInput">Id</label>
                        </div>

                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="name" id="floatingInput" placeholder="Name"
                            value="<?php echo $user_data['name'] ?>">
                            <label for="floatingInput">name</label>
                        </div>

                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="username" id="floatingInput" placeholder="Username"
                            value="<?php echo $user_data['username'] ?>">
                            <label for="floatingInput">Username</label>
                        </div>
                        <button class="w-100 btn btn-lg btn-success " type="submit" name="submit">Change</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>