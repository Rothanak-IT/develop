<?php

$sname = "localhost";

$unmae = "root";

$password = "";

$db_name = "student_db";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);
// $sql="SELECT * from admission";
// $result = mysqli_query($conn,$sql);
// if (!$conn) {
//     echo "Connection failed!";
// }
if (isset($_POST["submit"])) {
     $username = $_POST["name"];
     $email = $_POST["email"];
     $phone = $_POST["phone"];
     $password = $_POST["password"];
     $usertype = "student";
     $result = "";
     $check = "SELECT*FROM user WHERE username='$username'";
     $check_user = mysqli_query($conn, $check);
     $row_count = mysqli_num_rows($check_user);
     if ($row_count == 1) {
          echo "<script type='text/javascript'>alert('Username Already Exist. Try Another One');</script>";
     } else {
          $sql = "INSERT INTO user(username,email,phone,usertype,password) VALUES ('$username','$email','$phone','$usertype','$password')";
          $result = mysqli_query($conn, $sql);
     }
     if ($result) {
          echo "<script type='text/javascript'>alert('Data Upload Success');</script>";
     } else {
          echo "Data Upload Faild";
     }
}


?>

<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
     ?>
     <!DOCTYPE html>
     <html>

     <head>
          <title>HOME</title>
          <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
          <link rel="stylesheet" href="library/bootstrap.min.css" media="screen">
     </head>
     <style>
          * {
               margin: 0;
               padding: 0;
          }

          .header {
               background-color: skyblue;
               line-height: 70px;
               padding-left: 30px;
          }

          a,
          a:hover {
               text-decoration: none !important;
          }

          .logout {
               float: right;
               padding-right: 30px;
          }

          ul {
               background-color: green;
               width: 16%;
               height: 100%;
               position: fixed;
               padding-top: 5%;
               text-align: center;
          }

          ul li {
               list-style: none;
               padding-bottom: 30px;
               font-size: 15px;
          }

          ul li a {
               color: white;
               font-weight: bold;
          }

          ul li a:hover {
               color: skyblue;
               text-transform: none;
          }

          .content {
               margin-left: 20%;
               margin-top: 5%;
          }

          label {
               display: inline-block;
               text-align: right;
               padding-right: 10px;
               width: 100px;
               padding-top: 10px;
               padding-bottom: 10px;
          }
          .top{
               margin-right: 260px;
          }
          .content{
               background-color: skyblue;
               width: 50%;
               padding: 20px;
               
          }
     </style>

     <body>

          <header class="header">
               <a href="">Student Dashbord</a>
               <div class="logout">
                    <a href="logout.php" class="btn btn-primary">Logout</a>
               </div>
          </header>
          <aside>
               <ul>
               <li>
                         <a href="adminsion.php">Admission</a>
                    </li>
                    <li>
                         <a href="addstudent.php">Add Student</a>
                    </li>
                    <li>
                         <a href="viewstudent.php">View Student</a>
                    </li>
                    <li>
                         <a href="addteacher.php">Add Tescher</a>
                    </li>
                    <li>
                         <a href="viewteacher.php">View Teacher</a>
                    </li>
                    <li>
                         <a href="addcourses.php">Add Courses</a>
                    </li>
                    <li>
                         <a href="viewcourses.php">View Courses</a>
                    </li>
               </ul>
          </aside>
          <div>
               <div class="content">
                    <br><br>
                    <center>
                         <h1>Add Student</h1>
                         <br><br>
                         <form action="#" method="POST" >
                              <div>
                                   <label>Username</label>
                                   <input type="text" name="name">
                                   <label for="">Email</label>
                                   <input type="text" name="email">
                              </div>
                              <div>
                                   <label for="">Phone</label>
                                   <input  type="text" name="phone">
                                   <label for="">Password</label>
                                   <input type="text" name="password">
                              </div>
                              <div>
                                   <input class="top btn btn-primary" type="submit" name="submit" value="Add Student">
                              </div>
                         </form>
               </div>
               </center>
          </div>
          <h1>
               <?php echo $_SESSION['name']; ?>
          </h1>


     </body>

     </html>
     <?php
} else {
     header("Location: index.php");
     exit();
}

?>