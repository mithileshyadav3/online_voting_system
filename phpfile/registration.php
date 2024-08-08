<?php
include('dbconnect.php');
if (isset($_POST['submit'])) {
 $name=$_POST['name'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];
$cnfpass=$_POST['cnfpass'];
  $address=$_POST['address'];
$image=$_FILES['image']['name'];
$tmp_name=$_FILES['image']['tmp_name'];
$role=$_POST['role'];


if($password===$cnfpass){
      move_uploaded_file($tmp_name,"../photo/".$image);
      $select="SELECT * from voting_db  where mobile='$mobile'";
      $query=mysqli_query($connect,$select);
      $count_row=mysqli_num_rows($query);
      if(!$count_row>0){
        $insertregister="INSERT INTO voting_db(name,mobile,password,address,image,role,status,votes)
  VALUES('$name','$mobile','$password','$address','$image','$role',0,0)";
  $insertregister1=mysqli_query($connect,$insertregister);
  if($insertregister1){
    echo "<script>
    alert('Registration is successful');
    window.location.href = './login.php';
</script>";

  }
  else{
    echo "<script>
    alert('issue occured')
    
     </script>";
    
}
      }
      else{
        echo "<script>
      alert('mobile number already exists')
     
       </script>";
      }



  
}
else{
      echo "<script>
      alert('password does not match')
     
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
      <!-- bootstrap js file -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js
 "></script>  
</head>
<body>
      <h1>Online Voting System</h1>
      <hr>
      <form action="" method="post" enctype="multipart/form-data">
       <h2>Registration</h2>
      <input type="text" name="name" id="" placeholder="Name" required> 
      <input type="mobile" name="mobile" id="" placeholder="Mobile" required> <br> <br>
      <input type="password" name="password" id="" placeholder="Password" required>
      <input type="password" name="cnfpass" id="" placeholder="Confirm Password" required> <br> <br>
      <input type="address" name="address" id="address1" placeholder="Address" required> <br><br>
      <span>Upload image:</span><input type="file" name="image" id="" required> <br> <br>
      Select role: <select id="" name="role">
      <option value="1" > Voter</option>
       <option value="2">Group</option>
      </select> <br> <br>
      <button type="submit" name="submit">Register</button> <br> <br>
      <span>Already user? <a href="login.php">Login here</a></span>   
       <!-- bootstrap js file -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js
       "></script> 
</body>
</html>