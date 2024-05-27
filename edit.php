<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $data = simplexml_load_file('xml/accounts.xml');
    foreach ($data->account as $account) {
        if ($account->id == $id) {
            $account->username = $_POST['username'];
            $account->email = $_POST['email'];
            $account->password = $_POST['password'];
            if ($_FILES['image']['name'] != '') {
                $image = "./images/" . md5(uniqid(time())) . basename($_FILES['image']['name']);
                $account->image = $image;
                move_uploaded_file($_FILES['image']['tmp_name'], $image);
            }
        }
    }

    if ($data->asXML('xml/accounts.xml')) {
        header('Location: tables.php');
        exit();
    } else {
        echo "Eroare la salvarea datelor.";
    }
} else {
    echo "Nu s-au primit date din formular.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SB Admin 2 - Tables</title>

	<!-- Custom fonts for this template -->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link
		href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
		rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">

	<!-- Custom styles for this page -->
	<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		

		<!-- Edit User Form -->


		<div class="card-body">
			<?php
			$id = $_GET['id'];
			$data = simplexml_load_file('xml/accounts.xml');
			foreach ($data->account as $account) {
				if ($account->id == $id) {
			?>
			<form action="edit.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $account->id ?>">
				<div class="form-group">
					<label for="last_name">Username</label>
					<input type="text" class="form-control" id="username" name="username"
						value="<?php echo $account->username ?>">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email"
						value="<?php echo $account->email ?>">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password"
						value="<?php echo $account->password ?>">
					</div>
					<input type="file" name="image"><br><br>
					<img src="<?php echo $account->image; ?>" width="100px" height="100px"><br><br>
					<input type="submit" name="submit" class="btn btn-primary" value="submit"/>
				</form>
					<?php 
					}
				}
				?>
		</div>



		<!-- Footer -->
		<footer class="sticky-footer bg-white">
			<div class="container my-auto">
				<div class="copyright text-center my-auto">
					<span>Copyright &copy; Your Website 2020</span>
				</div>
			</div>
		</footer>
		<!-- End of Footer -->

	</div>
	<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="logout.php">Logout</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="js/sb-admin-2.min.js"></script>

	<!-- Page level plugins -->
	<script src="vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

	<!-- Page level custom scripts -->
	<script src="js/demo/datatables-demo.js"></script>

</body>

</html>