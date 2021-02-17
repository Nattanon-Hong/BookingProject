<?php
    require_once('connection.php');
    
    if  (isset($_REQUEST['btn_register'])) {
        $username = strip_tags($_REQUEST['txt_username']);
        $password = strip_tags($_REQUEST['txt_password']);
        $phone = strip_tags($_REQUEST['txt_phone']);

        if  (empty($username)) {
            $errorMsg[] = "Please enter username"; 
        } else if (empty($password)) {
            $errorMsg[] = "Please enter password";
        } else if (strlen($password) < 8 ) {
            $errorMsg[] = "Password must be atleast 8 characters";
        } else if (empty($phone)) {
            $errorMsg[] = "Please enter phone number";  
        } else {
            try {
                $select_stmt = $db->prepare("SELECT username FROM tbl_user WHERE username = :uname or phone = :uphone");
                $select_stmt->execute(array(':uname' => $username, ':uphone' => $phone));
               // $select_stmt->execute(array(':uphone' => $phone));
                $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

                if ($row['username'] == $username) {
                    $errorMsg[] = "Sorry username already exists";
                //}  else if ($row['phone'] == $phone) {
                  //  $errorMsg[] = "Sorry phnoe number already exists";
                }  else if (!isset($errorMsg)) { 
                    $new_password = password_hash($password, PASSWORD_DEFAULT);
                    $insert_stmt = $db->prepare("INSERT INTO tbl_user (username, password, phone) VALUE (:uname, :upassword, :uphone) " );
                    if ($insert_stmt->execute(array(
                       ':uname' => $username,
                       ':upassword' => $new_password,
                       ':uphone' => $phone
                   ))) {
                       $registerMsg = "Register successfuly.... Please click on login";
                   }
                } else if ($row['phone'] == $phone ) {
                    $errorMsg[] = "Sorry phone number alredeady exists";
                }   
           } catch (PDOException $e) { 
            echo $e->getMessage();
           }
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>



  <div class="container text-center">
      <h1 class="mt-5">Register</h1> <br>
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
          if (isset($registerMsg)) {
      ?>        
          <div class="alert alert-success">
              <strong><?php echo $registerMsg; ?></strong>
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
            <label for="password" class="col-sm-3 control-label">Confirm Password </label>
            <div class="col-sm-6">
                <input type="password" name="txt_cnpassword" class="form-control" placeholder="Confirm your password">
            </div>
        </div>
      </div>
      <br>
      <div class="form-group">
        <div class="row">
            <label for="uname" class="col-sm-3 control-label">Name </label> 
            <div class="col-sm-6">
                <input type="text" name="txt_name" class="form-control" placeholder="Enter your name">
            <br>
            </div>
        </div>
      </div>

      <div class="form-group">
        <div class="row">
            <label for="phone" class="col-sm-3 control-label">Phone </label>
            <div class="col-sm-6">
                <input type="txt" name="txt_phone" class="form-control" placeholder="Enter your phone" maxlenght = 10 >
            </div>
        </div>
      </div>
      <br>

      <div class="form-group">
          <div class="row">
              <div class="col-sm12">
                  <input type="submit" name="btn_register" class="btn btn-primary" value="Register">
              </div>
          </div>
      </div>
      <br>
      <div class="form-group">
          <div class="row">
              <div class="col-sm12">
                  <p>You have a account login here <a href="login.php">Login</a></p>

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