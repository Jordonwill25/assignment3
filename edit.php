<?php 
    $title ="Edit Record";
    require_once "includes/header.php"; 
    require_once "includes/autocheck.php";
    require_once "db/conn.php";  

    $result1= $crud->getMatches();
    $result2= $crud->getSeats();
   

    if(!isset($_GET['id'])){

      include "includes/error.php";
      header("Location: viewRecords.php");
    }else{
        $id= $_GET['id'];
        $registrant= $crud->getRegistrantsDetails($id);
    
     ?>

     
<form method="post" action="editpost.php" class="col-md-12" enctype="multipart/form-data">
<input type="hidden"  name ="id" value= "<?php echo $registrant['registrant_Id']?>"> 

  <div class="col-md-12">
    <label for="fNameForm" class="form-label">First Name</label>
    <input required type="text" class="form-control" value= "<?php echo $registrant['firstName']?>" id="fNameForm" name="fNameForm">
  </div><br>

  <div class="col-md-12">
    <label for="lNameForm" class="form-label">Last Name</label>
    <input required type="text" class="form-control" value= "<?php echo $registrant['lastName']?>" id="lNameForm" name="lNameForm">
  </div><br>

  <div class="col-12">
    <label for="eAddressForm" class="form-label">Email Address</label>
    <input required type="email" class="form-control" value= "<?php echo $registrant['emailAddress']?>" id="eAddressForm" aria-describedby="emailHelp" id="eAddressForm" name="eAddressForm">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div><br>

  <div class="col-12">
    <label for="pNumberForm" class="form-label">Phone Number</label>
    <input required type="text" class="form-control" value= "<?php echo $registrant['phoneNumber']?>" id="pNumberForm" placeholder="123-874-5679" name="pNumberForm">
  </div><br>

  <div class="col-md-12">
    <label for="dobForm" class="form-label">Date of Birth</label>
    <input required type="date" class="form-control" value= "<?php echo $registrant['dateOfBirth']?>" id="dobForm" placeholder="yy-mm-dd" name="dobForm">
  </div><br>

  <div class="col-md-12">
    <label for="matchForm" class="form-label">Choose a match to watch</label>
    <select class="form-select" aria-label="Default select example" id="matchForm" name="matchForm">
       <?php while ($r = $result1->fetch(PDO::FETCH_ASSOC)) {?>

        <option value="<?php echo $r['matches_Id'] ?>"     <?php if($r['matches_Id']
            == $registrant['matches_Id']) echo "selected" ?>> <!--in option tag-->

            <?php echo $r['matches']; ?> 
     </option>

      <?php }?>
    </select>
  </div><br>

  <div class="col-md-12">
    <label for="seatForm" class="form-label">select seating</label>
    <select class="form-select" aria-label="Default select example" id="seatForm" name="seatForm">
        <?php while ($r = $result2->fetch(PDO::FETCH_ASSOC)) {?>

          <option value="<?php echo $r['seats_Id'] ?>"     <?php if($r['seats_Id']
            == $registrant['seats_Id']) echo "selected" ?>> <!--in option tag-->

            <?php echo $r['ballSeats']; ?> 
     </option>
      <?php }?>
    </select>
  </div><br>
  <?php }?>
<!--
  <div class="col-md-12 custom-file form-control" style="background-color: cyan;">
    <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
    <label class="custom-file-label" for="avatar">Choose File</label>
    <div id="avatar" class="form-text text-dark">Adding a profile picture is optional</div>
  </div>-->
  
 <br>
  <div class="col-12">
    <button type="submit" name="submitform" class="btn btn-primary">Save Changes</button>
    <a href="viewRecords.php?id " class="btn btn-primary">Back To List</a>
  </div>
</form>
<br>

