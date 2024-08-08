<?php
session_start();
if(!isset($_SESSION['id'])){
      header('location:./login.php');
}
 $_SESSION['groupsdata'];
 
$user_data= $_SESSION['voter'];
// $voter_status=$user_data['status'];
$voter_name=$user_data['name'];
$voter_mobile=$user_data['mobile'];
if($_SESSION['status']==1){
      $status="<b class='text-success'>Voted</b>";
}
else{
      $status="<b class='text-danger'>not Voted</b>";   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Dashboard</title>
      <!-- bootstrap css file -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
       <!-- bootsrtap font awesome file -->
       
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="../phpfile/dashstyle.css">
      <style>
            .row_image{
                  width: 200px;
                  /* border-radius: 100%; */
            }
            
      </style>
</head>
<body>
<div class='container-fluid'>
      <h1 class="text-center">Online Voting Machine</h1>
      <a href='logout.php' class='btn btn-primary'> Logout</a>
     
      <hr>
      <div class='row '>
      
      <div class='col-md-6 '>
      <h4 class="text-center ">Condidate</h4>
      <?php
          if(isset($_SESSION['groupsdata'])){
            $groups=$_SESSION['groupsdata'];
            
           
          
         
          
          for($i=0;$i<count($groups);$i++) {
            ?>
             <div class="row">
          <div class='col-md-4 '> 
<img src='../photo/<?php echo $groups[$i]['image']?>' class="row_image">
</div> 
<div class='col-md-8 '>
<h3>Group Name:<?php echo $groups[$i]['name']?></h3>
<h4 name='vote'>Vote:<?php echo $groups[$i]['votes']?></h4>
<form action="votes.php" method="post" >
      <input type="hidden" name="id_value"  value="<?php echo $groups[$i]['id']?>">
      <input type="hidden" name="votes_value"  value="<?php echo $groups[$i]['votes']?>">
      
      <?php
     if($_SESSION['status']==1){
      ?>
      <button type='submit' name='button' class='btn btn-primary mt-3 bg-success'>Voted</button>
      <?php
     }
else{
      ?>
      <button type='submit' name='button' class='btn btn-primary mt-3 bg-danger'>Vote</button> 
      <?php
}
      ?>
</form>



</div>
          </div>
<hr>
<?php
         }}
         else{
            echo"<div>
            <h1>There is no group data</h1>
            </div>";
         }
        ?>    
      </div>
            <div class='col-md-6 '>
                 
            <h4>Voter</h4>
            <img src='../photo/$image' alt=''>
            <div class='m-0'>
<h3> Name:<?php echo $voter_name?></h3>
<h4>Mobile:<?php echo $voter_mobile?></h4>
<h4>status:<?php echo $status ?></h4>
</div>
            </div>
            
      </div>
</div>

 <!-- bootstrap js file -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js
       "></script>   
</body>
</html>
