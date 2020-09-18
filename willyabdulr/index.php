<?php
include 'koneksi.php';
error_reporting(0);
  if(isset($_POST['simpan'])){
    $nis = $_POST['nis'];
    $name = $_POST['name'];
    $birth_date = $_POST['birth_date'];
    $gender = $_POST['gender'];
    $class_id = $_POST['class_id'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $sql = "INSERT INTO `siswa` (`nis`, `name`, `birth_date`, `gender`, `class_id`, `phone`, `address`) VALUES ('$nis', '$name', '$birth_date', '$gender', '$class_id', '$phone', '$address')";
    $query =mysqli_query($con,$sql);

  if ($query) {
    echo "<script>alert('Data berhasil masuk');
    document.location.href='?menu=index.php'</script>";
  }else{
    echo "<script>alert('Data gagal masuk');
    document.location.href='?menu=index.php'</script>";
    }
  }

  if(isset($_GET['hapus'])){  
    $sql = mysqli_query($con, "DELETE FROM siswa WHERE nis = '$_GET[id]'");
  if($sql){
    echo "<script>alert('Data berhasil dihapus');
    document.location.href='index.php'</script>";
  }else{
    echo "<script>alert('Data gagal dihapus');
    document.location.href='index.php'</script>";
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

   <br><br><br><br>
      <div class="container">
          <div class="card">
             <div class="card-header">
                <div class="card-body">
                  <div class="col-md-4">
                     <nav class="navbar navbar-navbar-md">
                       <div class="navbar-brand">
                         Input Data Siswa/
                    </div>
                 <u1 class="nav">
               <li class="nav-item">
             <a class="nav-link" href="class.php">Data Kelas </a>
           </li>
        
    </ul>
   </nav>
  </div>

      <div class="card-body">
      <div class="card-block">
      <form method="post">
      <div class="form-group">             
      <div class="row">
          <div class="col">
          <input type="number" name="nis" class="form-control" placeholder="nis"   value="<?php echo $isi['nis']?>">
          </div>
          <div class="col">
          <input type="text" name="name" class="form-control" placeholder="name"  value="<?php echo $isi['name']?>">
          </div>
      </div>
      <div class="form-group">             
      <div class="row">
          <div class="col">
          <input type="date" name="birth_date" class="form-control" placeholder="birth_date"  value="<?php echo $isi['birth_date']?>">
          </div>
          <div class="col">
          <input type="text" name="gender" class="form-control" placeholder="gender"  value="<?php echo $isi['gender']?>">
          </div>
      </div>
      <div class="form-group">             
      <div class="row">
          <div class="col">
          <select class="form-control" name="class_id">
          <?php 
            $sql = "SELECT * FROM class";
            $query = mysqli_query($con,$sql);
            while($r=mysqli_fetch_assoc($query)){ ?>
            <option value="<?= $r['id'];?>"><?= $r['class'];?></option>
            <?php } ?>
          ?>
          </div>
          <div class="col">
          <input type="number" name="phone" class="form-control" placeholder="phone"  value="<?php echo $isi['phone']?>">
          </div>
      </div>
      <div class="form-group">             
   
          <div class="col">
          <input type="text" name="address" class="form-control" placeholder="address"  value="<?php echo $isi['address']?>">
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
            <th>nis</th>
            <th>Name</th>
            <th>birth_date</th>
            <th>gender</th>
            <th>class_id</th>
            <th>phone</th>
            <th>address</th>
            <th>Action</th>      
        </tr>
        </thead>
        <tbody>
          <?php 
            $no=0;

            $sql = mysqli_query($con,"SELECT * FROM siswa");
            while($r=mysqli_fetch_array($sql)){
              $no++;
           ?>
          <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $r['nis'] ?></td>
          <td><?php echo $r['name'] ?></td>
          <td><?php echo $r['birth_date'] ?></td>
          <td><?php echo $r['gender'] ?></td>
          <td><?php echo $r['class_id'] ?></td>
          <td><?php echo $r['phone'] ?></td>
          <td><?php echo $r['address'] ?></td>

         <td><a href="?hapus&id=<?= $r['nis'] ?>" onclick="return confirm('Anda Yakin')">Hapus</a></td>                     
        </tr>
       <?php } ?>
      </tbody>
     </table>
    </div>
  </div>
</div>