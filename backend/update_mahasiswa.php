<?php

// require "database.php";
//                 $sql= "SELECT * FROM user WHERE email='$_GET[email]'";
//                 $result = $conn->query($sql);
                
            $nimErr = $namaErr = $kelasErr =  "";
            $nim = $nama = $kelas = "";
            
            $attr5A=$attr5B="";
            require "database.php";
            // $email= $_GET['email'];
            $sql= "SELECT * FROM mahasiswa WHERE nim='$_GET[nim]'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0){
                while($row=$result->fetch_assoc()){
               
            switch ($row['kelas']){
                case "5A":
                    $attr5A = "selected";
                    break;
                case "5B":
                    $attr5B= "selected";
                    break;
                default:
                $attr5A=$attr5B="";
             }
        //  }
        // }
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
      .error { color: #FF0000;

      }
      </style>
      <title>Update Mahasiswa</title>
    </head>
        <body>
        <div class="container-fluid">
      <div class="container" style="padding-left: 30%; padding-right: 30%; padding-top: 4%">
      <div class="row">
          <div class="col text-light" style="background-color: #ba55d3">
            
                <!-- alert untuk success -->
                <!-- <?php if(isset($success)) : ?>
                <?php endif; ?>
                alert untuk error
                <?php if(isset($error)) : ?>
                <?php endif; ?> -->
                
                <h2 class="text-light">UPDATE FORM MAHASISWA</h2>
                
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                <div class="mb-3">
                <label class="form-label">NIM</label>
                <span class="error">* <?php echo $nimErr;?></span>
                <?php echo "<br>";?> <input type="text" name="nim" class="form-control" value="<?= $row['nim'];?>"readonly>
                </div>
                <div class="mb-3">
                <label class="form-label">Nama</label>
                <span class="error">* <?php echo $namaErr;?></span>
                <?php echo "<br>";?> <input type="text" name="nama" class="form-control" value="<?= $row['nama'];?>">
                </div>
                <div class="mb-3">
                <label class="form-label">Kelas</label>
                <span class="error">* <?php echo $kelasErr;?></span>
                <?php echo "<br>";?> <select name="kelas" class="form-control" id="role" maxlength="100">
                        <option value="">---SELECT---</option>
                        <option value="5A" <?php echo $attr5A;?> >5A</option>
                        <option value="5B" <?php echo $attr5B;?>>5B</option>
                      </select>
                </div>
 
           <?php
                }
            }else{
                echo "0 results";
            }
            ?>
            <input type="submit" name="submit" value="UPDATE" > 
                </form>
                          
</body>
</html>
<?php
function sanitize($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
          }
          $valName = $valEmail = $valPass= $valRole = false;
          if(isset($_POST['submit'])){
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                //echo "tesname".$_POST['name'];                echo "tesmail".$_POST['email'];

              if(empty($_POST["nim"])) {
                  $nimErr = "Nim is required";
              } else {
                  $nim = sanitize($_POST["nim"]);
                  // if(!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                  //     $nameErr = "Only letters and white space allowed";
                  // }else{
                      // $valName = true;
                  // }
                  $valNim = true;
              }
              if(empty($_POST["nama"])){
                  $namaErr = "Name is require";
              }else{
                  $nama = sanitize($_POST["nama"]);
                  // if(!preg_match("/^(?=.\d)(?=.[a-z])(?=.*[A-Z]).{8,}/",$pass)) {
                  //     $passErr = "Invalid password format";
                  // }
                  $valNama = true;
              } 

              
              if(empty($_POST["kelas"])){
                  $kelasErr = "Class is required";
              }else{
                  $kelas = sanitize($_POST["kelas"]);
                  $valKelas = true;
              }
              if ($valNama && $valKelas == true ){
                    
                $sql2= "UPDATE mahasiswa SET nama='$nama', kelas='$kelas' WHERE nim='$_POST[nim]'";
                if ($conn->query($sql2)=== TRUE){
                    header("location: tables_mahasiswa.php");
                } else {
                    //pesan error gagal update data
                    echo "Data Gagal Diupate!".$conn->error;
                
                }
      $conn->close();
      }
          }
        }
          
                
        
           ?>