<!--<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: index.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: index.php");

	}
?>
-->

<?php 
session_start();
    require_once("server.php");
    $query = " select * from account ";
    $result = mysqli_query($con,$query);

?>

<!DOCTYPE html>   
<html>
<head>
	<title>Account</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
	<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="Edit">
	<div class="header">
	</div>
	<div class="content">

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>O  _  ><strong><?php echo $_SESSION['username']; ?></strong></p>
			<p> <a href="index1.php?logout='1'" style="color: rgb(0, 0, 0);" class="btn btn-danger">logout</a> </p>
		<?php endif ?>
	</div>

	<div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                        <table class="table table-bordered">
                            <tr>
                                <td> UserName </td>
                                <td> Password </td>
                                <td> Edit  </td>
                            </tr>

                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $username = $row['username'];
                                        $password = $row['password'];
                            ?>
                                    <tr>
                                        <td><?php echo $username['username']?></td>
                                        <td><?php echo $password['password'] ?></td>
                                        <td><a href='server.php?ps=$result[password]' class="btn btn-danger" >Edit</a></td>
                                    </tr>        
                            <?php 
                                    }  
                            ?>       
							                                                     
                                   

                        </table>
                    </div>
                </div>
            </div>
        </div>
		
</body>
</html>
