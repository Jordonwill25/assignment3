<?php 
    require_once "includes/autocheck.php";
    require_once "db/conn.php"; 
    

    if(!isset($_GET['id'])){
        include "includes/error.php";
        
    }else{
        $id= $_GET['id'];
        
    


        //call delete function
     
            $result= $crud->deleteRegistrant($id);

        //redirect list

        if ($result){
            header("Location: viewRecords.php");
        }else{
           include "includes/error.php";
        }
    
    }














?>