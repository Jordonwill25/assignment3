<?php
 $title ="Success";
 require_once "includes/header.php";  
 require_once "db/conn.php";


 if(isset($_POST['submitform'])){
  //extracting value from post array
       
        $fName= $_POST['fNameForm'];
        $lName= $_POST['lNameForm'];
        $eAddress= $_POST['eAddressForm'];
        $pNumber= $_POST['pNumberForm'];
        $dob= $_POST['dobForm'];
        $matches= $_POST['matchForm'];
        $seats= $_POST['seatForm'];

      $orgin_file= $_FILES["avatar"]["tmp_name"];
      $ext= pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
      $targetDir= 'uploads/';
      $destination= "$targetDir$pNumber.$ext";
      move_uploaded_file($orgin_file,$destination);

        $Success =$crud->insertuser($fName,$lName,$eAddress,$pNumber,$dob,$matches,$seats,$destination);



        if(!$Success){
          echo " <h1 class='text-center text-danger'>There was an error in registering</h1>";
     
         }else{
           //sendEmail::sendMail($email, "Welcom To Your New School","You have been Registered");
           echo " <h1 class='text-center text-success'>You have been registered</h1>";
          
         }


 }

?>





<img src="<?php echo"$destination"; ?>" style="width:30%; height:30%" />
<div class="card" style="width: 18rem;">
  <div class="card-header">
    Registration information
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Full Name: <?php echo $_POST['fNameForm'] ."  ". $_POST['lNameForm']; ?></li>
    <li class="list-group-item">Football Match: <?php echo $_POST['matchForm']; ?></li>
    <li class="list-group-item">Contact Number: <?php echo $_POST['pNumberForm']; ?></li>
    <li class="list-group-item"> Email Address: <?php echo $_POST['eAddressForm']; ?></li>
    <li class="list-group-item">Date of Birth: <?php echo $_POST['dobForm']; ?></li>
    <li class="list-group-item">Seating: <?php echo $_POST['seatForm']; ?></li>
   
  </ul>
</div>

<br>
<br>
<br>
    <?php  require_once "includes/footer.php";    ?>