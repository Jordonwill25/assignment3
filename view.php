<?php 
     $title ="View Page";
     require_once "includes/header.php";
     require_once "db/conn.php";

     //get registrant
    if(!isset($_GET['id'])){

     echo "<h1 class = 'btn btn-warning'>Error in getting data</h1>";
     header("Location: viewrecords.php");

   }else{

       $id= $_GET['id'];
       $results= $crud->getRegistrantsDetails($id);

?>

<img src="<?php echo empty($results['avatarPath']) ? "uploads/blank.jpg "  :$results['avatarPath'] ;  ?>" class= "rounded-circle"style="width:20%; height:20%" />


          <div class="card" style="width: 18rem;">
          <div class="card-header">
          User Information
          </div>
          <ul class="list-group list-group-flush">
          <li class="list-group-item">Full Name: <?php echo  $results['firstName'] ."  ". $results['lastName']; ?></li>
          <li class="list-group-item">Email Address: <?php echo  $results['emailAddress']; ?></li>
          <li class="list-group-item">Phone Number: <?php echo  $results['phoneNumber']; ?></li>
          <li class="list-group-item"> Date of Birth: <?php echo  $results['dateOfBirth']; ?></li>
          <li class="list-group-item">Football Match: <?php echo  $results['matches']; ?></li>
          <li class="list-group-item">Seating: <?php echo  $results['ballSeats']; ?></li>
          </ul>
          </div>
          <br>
               <a href="viewrecords.php?id " class="btn btn-primary">Back To List</a>
               <a href="edit.php?id= <?php echo $results['registrant_Id'] ?> " class="btn btn-warning">Edit</a>
               <a onclick="returnhref="delete.php?id= <?php echo $results['registrant_Id'] ?> class="btn btn-danger"> Delete</a>


<?php }?>






























<br>
<br>
<br>
<?php require_once "includes/footer.php"; ?>