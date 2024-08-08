<?php
session_start();
include('dbconnect.php');
// if(isset($_POST['submit'])){  
      if (isset($_POST['submit'])) {
      $mobile_number=$_POST['mobile'];
      $password=$_POST['password'];
      $role=$_POST['role'];
      $select="SELECT * from voting_db where mobile='$mobile_number' and password='$password' and role='$role'";
      $query=mysqli_query($connect,$select);
      $count_row=mysqli_num_rows($query);
      if($count_row>0){
          $select="SELECT * from voting_db where role='2' " ;
          $query_group=mysqli_query($connect,$select);
          $group_count=mysqli_num_rows($query_group);
          if($group_count>0){
            $group_fetch=mysqli_fetch_all($query_group,MYSQLI_ASSOC);
            $_SESSION['groupsdata']=$group_fetch;
            $group_fetch1= $_SESSION['groupsdata'];

          }
      
      $fetch=mysqli_fetch_array($query);
      $_SESSION['id']=$fetch['id'];
     $_SESSION['status']=$fetch['status'];
      $_SESSION['voter']=$fetch;

     
     
      echo "<script>
      alert('login successfully');
      window.location.href = './dashboard.php';
      </script>";
      }
      else{
            echo "<script>
            alert('invalid credentials');
            window.location.href = './login.php';
            </script>";
            }   
      


}

?>


<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link rel="stylesheet" href="style.css">
      
</head>
<body> 
      <div>
      <h1>Online Voting System</h1>
      <hr>
      <h2>Login</h2>
      <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="mobile"  placeholder="Mobile" required> <br> <br>
      <input type="password" name="password"  placeholder="Password" required>   <br> <br>
       <select name="role" required>
            <option value="1"  > Voter</option>
               <option value="2">Group</option>
              </select> <br> <br>
              <button type="submit" name="submit">Login</button> <br> <br>
              <span>New user? <a href="registration.php">Register Here</a></span>
      </form>
      </div>
    <!-- bootstrap js file -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js
 "></script>    
</body>
</html>