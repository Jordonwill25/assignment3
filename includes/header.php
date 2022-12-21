<?php include_once "includes/session.php"; ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>World Cup - <?php echo $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand navbar-dark bg-primary">
   
   <div class="container-fluid">
   <a class="navbar-brand" href="index.php">World Cup Matches</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
  <div class="navbar-nav mr-auto">
    <a class="nav-link" href="viewrecords.php">View Records</a>
    
  
    
  </div>
  <div class="navbar-nav ms-auto">

    <?php if(!isset($_SESSION['user_id'])){ ?>

       <a class="nav-link active" aria-current="page" href="login.php ">Login</span></a>

   <?php }else{ ?>
    
    <a class="nav-link active" aria-current="page" href="#"><span>Hello <?php echo $_SESSION['userName'] ?> !</a>
    <a class="nav-link active" aria-current="page" href="logout.php ">Logout</a>

  <?php } ?>

  </div>
</div>
</div>
</nav>
    


  <div Class ="container">