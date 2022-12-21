<?php 
    $title ="Matches Pages";
    require_once "includes/header.php";
    require_once "includes/autocheck.php";
    require_once "db/conn.php";

    $results= $crud->getRegistrants();

?>

<h1 class="text-center">View Records</h1>



<table class="table">
        <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Football Match</th>
            <th>Seating</th>
            <th>Actions</th>
        </tr>

        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>

            <tr>
                <td><?php echo $r['registrant_Id'] ?></td>
                <td><?php echo $r['firstName'] ?></td>
                <td><?php echo $r['lastName'] ?></td>
                <td><?php echo $r['matches'] ?></td>
                <td><?php echo $r['ballSeats'] ?></td>
                <td><a href="view.php?id= <?php echo $r['registrant_Id'] ?> " class="btn btn-primary">View</a></td>
                <td><a href="Edit.php?id= <?php echo $r['registrant_Id'] ?> " class="btn btn-warning">Edit</a></td>
                <td><a onclick="return confirm('Are you sure you want to delete this record?'); " 
                    href="delete.php?id= <?php echo $r['registrant_Id'] ?> " class="btn btn-danger">Delete</a></td>
            </tr>

        <?php  }  ?>   
        
        

    </table>


































<br>
<br>
<br>
<?php require_once "includes/footer.php"; ?>