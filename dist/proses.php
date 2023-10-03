<?php
// Secret Key ini kita ambil dari halaman Google reCaptcha
// Sesuai pada catatan saya di STEP 1 nomor 6
$secret_key = "6LdIak0oAAAAADh-mEbaacz6tWQotFQQWlIeHxxd";
// Disini kita akan melakukan komunkasi dengan google recpatcha
// dengan mengirimkan scret key dan hasil dari response recaptcha nya
$verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
$response = json_decode($verify);
if($response->success){ // Jika proses validasi captcha berhasil
  session_start();
  
  require 'app/config.php';
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $email= $_POST['email'];
      $password = $_POST['password'];
  
      // Membuat prepared statement
      $stmt = $conn->prepare("SELECT id_user FROM user WHERE email = ? AND password = ?");
      $stmt->bind_param("ss", $email, $password);
      $stmt->execute();
      $stmt->store_result();
  
      if ($stmt->num_rows == 1) {
          $_SESSION['email'] = $email;
          header("location: dashboard.html"); 
      } else {
          $error = "Username atau password salah.";
      }
  
      $stmt->close();
  }
}else{ // Jika captcha tidak valid
  echo '<script>alert("apakah anda bukan manusia");window.location="login.php "</script>';
 
}
?>