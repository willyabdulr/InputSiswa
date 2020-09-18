<?php
include 'koneksi.php';
error_reporting(0);
  if(isset($_POST['simpan'])){
    
    $sql = mysqli_query($con,"INSERT INTO class VALUES ('','$_POST[class]')");

  if ($sql) {
      echo "<script>alert('Data Berhasil Masuk');
      document.location.href='?menu=class.php'</script>";
  }else{
      echo "<script>alert('Data GAgal Masuk');
      document.location.href='?menu=class.php'</script>";
    }
  }

  if(isset($_GET['hapus'])){  
    $sql = mysqli_query($con, "DELETE FROM class WHERE id = '$_GET[id]'");
  if($sql){
      echo "<script>alert('Data berhasil dihapus');
      document.location.href='class.php'</script>";
  }else{
      echo "<script>alert('Data gagal dihapus');
      document.location.href='class.php'</script>";
    }
  }
 ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <title></title>
</head>
<body>

<div class="container">
       <div class="card">
           <div class="card-header">
           <div class="card-body">
           <div class="col-md-4">
           <nav class="navbar navbar-navbar-md">
           <div class="navbar-brand">
           Input Data Siswa/
           </div>

           <li class="nav-item">
           <a class="nav-link" href="index.php">Input Data</a>
           </li>
           </div>
           <div class="card-body">
           <div class="card-block">
      <form method="post"
      <div class="form-group">            
   
          <div class="col">
          <input type="text" name="class" class="form-control" placeholder="class"  value="<?php echo $isi['class']?>">
          </div>
       
                    <br>
                                    
                      <?php if (isset($_GET['edit'])) {?>
                      <td><input class="btn btn-warning" type="submit" name="update" value="update"></td>
                      <?php }else{ ?>
                      <td><input class="btn btn-primary" type="submit" name="simpan" value="simpan"></td>
                      <?php } ?>

</body>

</html>       

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Input Siswa</h6>
  </div>
  <div class="card-body">
  <form method="post" enctype="multipart/form-data">


    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>no</th>
            <th>class</th>
            <th>Action</th>
            
          </tr>
        </thead>
        <tbody>
          <?php 
            $no=0;

            $sql = mysqli_query($con,"SELECT * FROM class");
            while($r=mysqli_fetch_array($sql)){
              $no++;
           ?>
          <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $r['class'] ?></td>
            <td><a href="?hapus&id=<?= $r['id'] ?>" onclick="retfurn confirm('Anda Yakin')">Hapus</a></td>                     
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>