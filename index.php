<!DOCTYPE html>
<head>
  <title>Booking</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</head>

<body>
    <h2>
        <?php
            require_once("connection.php");
            session_start();

            if (!isset($_SESSION['user_login'])) {
                header("location: login.php");
            }

            $id = $_SESSION['user_login'];

            $select_stmt = $db->prepare("SELECT * FROM tbl_user WHERE id = :uid");
            $select_stmt->execute(array(':uid' => $id));
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

            if (isset($_SESSION['user_login'])) {

        ?>
        <?php } ?>
    </h2>
    <a href = "logout.php">logout</a>
<br>
<br>
<h1 ALIGN = "CENTER "  > BOOKING </h1>

<br>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Reserve</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" hred="#"></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <ol class="carousel-indicators">
    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://scontent.futp1-1.fna.fbcdn.net/v/t1.0-9/131325998_2840902949521422_170217033604346830_o.jpg?_nc_cat=101&ccb=2&_nc_sid=730e14&_nc_eui2=AeHgVRfKx-Vi7-kaUr7xBldmAPBryr0dlFgA8GvKvR2UWDOmu7j_FnObv1adtNVDmzMWkXh5iOaBThSmRVAHZJdM&_nc_ohc=s28mUx2NxdgAX-4s1Tw&_nc_pt=1&_nc_ht=scontent.futp1-1.fna&oh=2d15f1a99430ee30e135809e8856cc0f&oe=6031AA6C" class="d-block w-100  h-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://scontent.futp1-1.fna.fbcdn.net/v/t1.0-9/132008287_2846962948915422_1645302866290664033_o.jpg?_nc_cat=105&ccb=2&_nc_sid=730e14&_nc_eui2=AeFQazb8Iv0AAamn4hOA41x2sm4QLkhnrWyybhAuSGetbK7aOFBThJMxqkcY1aCK_DoHZbSlPzqy-LsXH941EBtn&_nc_ohc=A7nqKTv6Zz8AX8U2qeO&_nc_pt=1&_nc_ht=scontent.futp1-1.fna&oh=312224cacff6b86a224c2da77b367471&oe=6035076E" class="d-block w-100 h-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://scontent.futp1-1.fna.fbcdn.net/v/t1.0-9/132891951_2846962905582093_762631140954944223_o.jpg?_nc_cat=110&ccb=2&_nc_sid=730e14&_nc_eui2=AeEMjN54n5ERQzmeCRuQ9eB4unQaw-kvyea6dBrD6S_J5v9mfsQegy0jKgSw5ydjxnLoxb4y7vkD2UhhGy3YiX17&_nc_ohc=7JzeHIkZUKYAX9ohN2t&_nc_pt=1&_nc_ht=scontent.futp1-1.fna&oh=f2319840c785b03bc5a16e21bb9e3dab&oe=60335C76" class="d-block w-100 h-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>

<div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>

            <div class="card-body">
              <p class="card-text"></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>

            <div class="card-body">
              <p class="card-text"></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>

            <div class="card-body">
              <p class="card-text"></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        </div>
      </div>
    </div>
  </div>

</body>

</html>
