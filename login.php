<?php 
    $title ="Login Page";
    require_once "includes/header.php";
    require_once "db/conn.php";

    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $userName= strtolower(trim($_POST["userName"]));
        $pword= $_POST["pword"];
        $new_pword= md5($pword.$userName);

        $result= $user->getUser($userName,$new_pword);

        if(!$result){
            echo"<div class= 'alert alert-danger'>Username or Password is incorrect, please try again</div>";
        }else{
            $_SESSION["userName"]= $userName;
            $_SESSION["user_id"]= $result['user_Id'];
            header('Location:viewRecords.php');
        }
      }

?>

<h1 class="text-center">Login Page</h1>


<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <table class="table table-sn">
            <tr>
                <td><label for="userName">Username:</label></td>

                <td><input type="text" name="userName" class="form-control" id="userName" value="<?php if($_SERVER["REQUEST_METHOD"]== "POST") echo $_POST["userName"];?>">
                <?php //if(empty($userName)&& $_SERVER["REQUEST_METHOD"]== "POST") echo "<p class='text-danger'>$userName_error</p>"; ?>
                </td>
            </tr>

            <tr>
                <td><label for="pword">Password:</label></td>

                <td><input type="password" name="pword" class="form-control" id="pword" placeholder="">
                <?php //if(empty($pword) && isset($pword_error)) echo "<p class='text-danger'>$pword_error </p>" ?>
                </td>
            </tr>
        </table><br><br>
        <input type="submit" value="login" class="btn btn-primary btn-block"><br>
        <a href="#">Forgot Password</a> 

    </form>


















<br>
<br>
<br>
<?php require_once "includes/footer.php"; ?>