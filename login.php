<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title> Website Galeri Foto </title>
   <link rel="stylesheet" type="text/css" href="assets/css/index.css">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>



</head>
<body>
<nav class="navbar navbar-expand-lg navbar-danger nav">
  <div class="container">
    <a class="navbar-brand " href="index.php"> Shan's Gallery</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto">
       
      </div>
      <a href="register.php" class="bt">Daftar</a>
      <a href="login.php" class="bt">Masuk</a>
    </div>
  </div>
</nav>

<div class="container py-5 ">
   <div class="row justify-content-center align-items-center">
      <div class="col-md-4">
		<div class="card-loreg">
			
				<div class="text-center">
				<h5> Login Aplikasi </h5>
				</div>
				<form action="config/aksi_login.php" method="POST">
				   <label class="form-label"> Username </label>
				   <input type="text" name="username" class="form-control" required>
				   <label class="form-label"> Password </label>
				   <input type="password" name="password" class="form-control" required>
				   <div class="d-grid mt-2">
					  <button class="btn btn-primary" type="submit" name="kirim"> Masuk </button>
				   </div>
				</form>
				<hr>
				<p> Belum punya akun? <a href="register.php"> Daftar disini! </a></p>
				
			 </div>
		  </div>
	   </div>
	</div>
</div>	

<footer class="d-flex justify-content-center border-top mt-3 fixed-bottom fot">
	<p>&copy; MEISYA SHANDIRA WAHYUDI </p>
</footer>


</body>
</html>