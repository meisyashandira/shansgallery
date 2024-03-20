<?php
session_start();
$userid = $_SESSION['userid'];
include'../config/koneksi.php';
if ($_SESSION['status'] != 'login') {
  echo "<script>
  alert('Anda belum login!');
  location.href='../index.php';
  </script>";
}

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Website Galeri Foto </title>
  <link rel="stylesheet" type="text/css" href="../assets/css/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-danger bg-primary-subtle">
    <div class="container">
      <a class="navbar-brand" href=""> Shan's Gallery </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
        <div class="navbar-nav me-auto">
        <a href="home.php" class="nav-link"> Home </a>
          <a href="index.php" class="nav-link"> Gallery </a>
          <a href="album.php" class="nav-link"> Album </a>
          <a href="foto.php" class="nav-link"> Foto </a>
        </div>
        
        <a href="../config/aksi_logout.php" class="btn btn-outline-light m-1"> Keluar </a>
      </div>
    </div>
  </nav>

  <div class="container mt-2">
    <div class="row">
      <?php 
      $query = mysqli_query($koneksi, "SELECT * FROM foto INNER JOIN user ON foto.userid=user.userid INNER JOIN album ON foto.albumid=album.albumid");
      while($data = mysqli_fetch_array($query)) {
        ?>
        <div class="col-md-3">
          <a type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid']?>">
            <div class="card">
              <img style ="height: 12rem;" src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
              <div class="card-footer text-center">
        <?php
        $fotoid = $data['fotoid'];
        $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
        $cekbatalsuka = mysqli_query($koneksi, "SELECT * FROM dislike WHERE fotoid='$fotoid' AND userid='$userid'");
        if (mysqli_num_rows($ceksuka) == 1) { ?>
        <a href="../config/proses_like.php?fotoid=<?php echo $data ['fotoid'] ?>" type="submit" name="batalsuka"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
  <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a10 10 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733q.086.18.138.363c.077.27.113.567.113.856s-.036.586-.113.856c-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.2 3.2 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.8 4.8 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
</svg></a>
        
        <?php } else { ?>
        <a href="../config/proses_like.php?fotoid=<?php echo $data ['fotoid'] ?>" type="submit" name="suka"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
  <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a10 10 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733q.086.18.138.363c.077.27.113.567.113.856s-.036.586-.113.856c-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.2 3.2 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.8 4.8 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
</svg></a>
        
        <?php }
        $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
        echo mysqli_num_rows($like). ' ';
        ?>
        <?php
        if (mysqli_num_rows($cekbatalsuka) == 1) { ?>
        <a href="../config/proses_dislike.php?fotoid=<?php echo $data ['fotoid'] ?>" type="submit" name="batal_batalsuka"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-down-fill" viewBox="0 0 16 16">
  <path d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.38 1.38 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51q.205.03.443.051c.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.9 1.9 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.856 0-.29-.036-.586-.113-.857a2 2 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.2 3.2 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28H8c-.605 0-1.07.08-1.466.217a4.8 4.8 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591"/>
</svg></a>
        
        <?php } else { ?>
        <a href="../config/proses_dislike.php?fotoid=<?php echo $data ['fotoid'] ?>" type="submit" name="batalsuka"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-down-fill" viewBox="0 0 16 16">
  <path d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.38 1.38 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51q.205.03.443.051c.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.9 1.9 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.856 0-.29-.036-.586-.113-.857a2 2 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.2 3.2 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28H8c-.605 0-1.07.08-1.466.217a4.8 4.8 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591"/>
</svg></a>
        
        <?php }
        $dislike = mysqli_query($koneksi, "SELECT * FROM dislike WHERE fotoid='$fotoid'");
        echo mysqli_num_rows($dislike). ' ';
        ?>
                <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid']?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-fill" viewBox="0 0 16 16">
  <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9 9 0 0 0 8 15"/>
</svg> </a>
                <?php
                $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
                echo mysqli_num_rows($jmlkomen).' ';
                ?>
              </div>
            </div>
          </a>

          <div class="modal fade" id="komentar<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-body">
                 <div class="row">
                  <div class="col-md-4">
                    <img src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
                  </div>
                  <div class="col-md-4"></div> 
                  <div class="m-2">
                    <div class="overflow-auto">
                      <div class="sticky-top">
                        <strong><?php echo $data['judulfoto'] ?></strong><br>
                        <span class="badge bg-secondary"><?php echo $data['namalengkap'] ?></span>
                        <span class="badge bg-secondary"><?php echo $data['tanggalunggah'] ?></span>
                        <span class="badge bg-primary"><?php echo $data['namaalbum'] ?></span>
                      </div>
                      <hr>
                      <p align="left">
                        <?php echo $data['deskripsifoto'] ?>
                      </p>
                      <hr>
                      <?php
                      $fotoid = $data['fotoid'];
                      $komentar = mysqli_query($koneksi,"SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid WHERE komentarfoto.fotoid='$fotoid'");
                      while($row = mysqli_fetch_array($komentar)){
                      ?>
                      <p align="left">
                        <strong><?php echo $row['namalengkap'] ?></strong>
                        <?php echo $row['isikomentar'] ?>
                      </p>
                    <?php } ?>
                    <hr>
                    <div class="sticky-bottom">
                      <form action="../config/proses_komentar.php" method="POST">
                        <div class="input-group">
                          <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                          <input type="text" name="isikomentar" class="form-control" placeholder="Tambah komentar">
                          <div class="input-group-prepend">
                           <button type="submit" name="kirimkomentar" class="btn btn-outline-primary"> Kirim </button>
                         </div>
                       </div>
                     </form>
                   </div>
                 </div>
               </div>

             </div>
           </div>
         </div>
       </div>
     </div>

   </div>
 <?php } ?>
</div>
</div>

<footer class="d-flex justify-content-center border-top mt-3 bg-primary-subtle relative">
  <p>&copy; MEISYA SHANDIRA WAHYUDI </p>
</footer>

<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>