<?php
session_start();
include('dbconnect.php');
$votes=$_POST['votes_value'];
$grp_id=$_POST['id_value'];
$votes_value=$votes+1;
$user_data= $_SESSION['voter'];
$voter_id=$user_data['id'];
$groups=$_SESSION['groupsdata'];
// $group_id=$groups['id'];
$updat_vote_id="UPDATE voting_db set status=1 where id='$voter_id'";
$query_voteid=mysqli_query($connect,$updat_vote_id);
$updat_group="UPDATE voting_db set votes='$votes_value' where id='$grp_id'";
$query=mysqli_query($connect,$updat_group);
if($query_voteid and $query){
      $grps_select=mysqli_query($connect,"SELECT name,image,votes,id,status from voting_db where role=2");
      $grps_fetch=mysqli_fetch_all($grps_select,MYSQLI_ASSOC);
   $_SESSION['grop']=$grps_fetch;
   $_SESSION['status']=1;
     
      echo "<script>
      alert('voting successfully');
     window.location.href = './dashboard.php';
  </script>";
}
else{
      echo "<script>
      alert('Some technical error try again after some time');
      window.location.href = './dashboard.php';
  </script>";
}

?>