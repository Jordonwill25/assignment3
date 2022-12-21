<?php
$title ="Edit Post";
 require_once "db/conn.php"; 

//get info form form
if(isset($_POST['submitform'])){
    //extracting value from post array
          $id= $_POST['id'];
          $fName= $_POST['fNameForm'];
          $lName= $_POST['lNameForm'];
          $email= $_POST['eAddressForm'];
          $pNumber= $_POST['pNumberForm'];
          $dob= $_POST['dobForm'];
          $matches= $_POST['matchForm'];
          $seats= $_POST['seatForm'];
         



//call crud function

        $result= $crud->editRegistrant($id,$fName, $lName, $email, $pNumber,$dob,$matches,$seats);




//redirect to index page
    if ($result){
        header("Location: viewrecords.php");
    }else{
        include "includes/error.php";
    }

}else{
    include "includes/error.php";
    
    }

?>