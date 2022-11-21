<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin - Mahasiswa</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <style>
        .error {color: #FF0000;}
    </style>
</head>

<body class="bg-dark">
<?php
// ob_start();
$nimErr= $namaErr= $kelasErr = ""; 
$nim = $nama= $kelas =""; 
$valid_nim = $valid_nama = $valid_kelas = false; 
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["nim"])) {
        $nimErr = "nim is required";
    } else {
        $nim = sanitize($_POST["nim"]);
        $valid_nim = true;
    }
    if(empty($_POST["nama"])) {
        $namaErr = "Name is required";
    } else {
        $nama = sanitize($_POST["nama"]);
        $valid_nama = true;
    }
    if(empty($_POST["kelas"])) {
        $kelasErr = "class is required";
    } else {
        $kelas = sanitize($_POST["kelas"]);
        $valid_kelas = true;
    }
}

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
    <div class="container">
        <div class="card card-register mx-auto mt-5">
        <div class="card-header">Form Input Mahasiswa</div>
        <div class="card-body">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
              <div class="form-label-group">
                <!-- <input type="text" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus"> -->
                Nim:  <span class="error">*  <?php echo $nimErr;?></span>
                <input type="text" name="nim" class="form-control" required="required" autofocus="autofocus" value="<?php echo $nim;?>">
              </div>
            </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <!-- <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required"> -->
                       Nama: <span class="error">*  <?php echo $namaErr;?></span>
                       <input type="nama" id="inputNama" name="nama" class="form-control"  required="required" value="<?php echo $nama;?>">
                    </div>
                </div>
                    <div class="form-group">
                      <div class="form-label-group">
                      Kelas: <span class="error">* <?php echo $kelasErr;?></span>
                            <select  name="kelas" class="form-control" required="required">
                                <option value="">---Select Class---</option>
                                <option value="5A">5A</option>
                                <option value="5B">5B</option>
                            </select>
                        </div>
                 </div>
                </div>
                <!-- <a class="btn btn-primary btn-block" href="login.html">Register</a> -->
                <input class="btn btn-primary" type="submit" name="submit" value="Submit">
            </form>
            <?php
            //     var_dump($name);
            //     echo "<br>";
            //     var_dump($email);
            //     echo "<br>";
            //     var_dump($pass);
            //     echo "<br>";
            //     var_dump($repass);
            //     echo "<br>";
            //     var_dump($role);
            //     echo "<br>";

            if ($valid_nim && $valid_nama && $valid_kelas == true ){
                echo "<h2>Your Input:</h2>";
                echo $nim;
                echo "<br>";
                echo $nama;
                echo "<br>";
                echo $kelas;
                echo "<br>";
                
        
                include "insert_mahasiswa.php";
                header('Location: tables_mahasiswa.php');
            }
            ?>
            <!-- <div class="text-center">
            <a class="d-block small mt-3" href="login.php">Login Page</a>
            <a class="d-block small" href="forgot.php">Forgot Password?</a>
            </div> -->
        </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
