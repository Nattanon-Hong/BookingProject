<?php

    require_once('connection.php');

    session_start();

    if (isset($_SESSION['user_login'])) {
        header("location: index.php");
    }

    if (isset($_REQUEST['btn_login'])) {
        $username = strip_tags($_REQUEST['txt_username']);
        $password = strip_tags($_REQUEST['txt_password']);

        if (empty($username)) {
            $errorMsg[] = "Please enter username";
        } else if (empty($password)) {
            $errorMsg[] = "Please enter password";
        } else {
            try {
                $select_stmt = $db->prepare("SELECT * FROM tbl_user WHERE username = :uname");
                $select_stmt->execute(array(':uname' => $username));
                $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

                if ($select_stmt->rowCount() > 0) {
                    if ($username == $row['username']) {
                        if (password_verify($password, $row['password'])) {
                            $_SESSION['user_login'] =$row['id'];
                            $loginMsg = "Login success";
                            header("refresh:0.5;index.php");
                        } else {
                            $errorMsg[] = "Wrong password";
                        }
                    }else {
                        $errorMsg[] = "Wrong username";
                    }
                }
            } catch(PDOException $e) {
                $e-getMessage();
            }
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>



  <div class="container text-center">
      <h1 class="mt-5">Login</h1> <br>
  <form action="" class="form-horizontal mt-3 " method="post">
  <?php 
          if (isset($errorMsg)) {
              foreach($errorMsg as $error) {

      ?>        
          <div class="alert alert-dange">
              <strong><?php echo $error; ?></strong>
          </div>
      <?php
              }
          }  
      ?>
      <?php 
          if (isset($loginMsg)) {
      ?>        
          <div class="alert alert-success">
              <strong><?php echo $loginMsg; ?></strong>
          </div>
      <?php
              }
 
      ?>
      <div class="form-group">
        <div class="row">
            <label for="username" class="col-sm-3 control-label">Username </label> 
            <div class="col-sm-6">
                <input type="text" name="txt_username" class="form-control" placeholder="Enter your username">
            <br>
            </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
            <label for="password" class="col-sm-3 control-label">Password </label>
            <div class="col-sm-6">
                <input type="password" name="txt_password" class="form-control" placeholder="Enter your password">
            
            </div>
        </div>
      </div>
      <br> 
      <div class="form-group">
          <div class="row">
              <div class="col-sm12">
                  <input type="submit" name="btn_login" class="btn btn-success" value="Login">
              </div>
          </div>
      </div>
      <br>
      <div class="form-group">
          <div class="row">
              <div class="col-sm12">
                  <p>You don't have a account login here <a href="register.php">Register</a></p>

              </div>
          </div>
      </div>
    </form>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>


</body>
</html>