<?php 

include_once('lib/config.php');
include_once('lib/database.php');

$db = new Database();


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $query = "INSERT INTO contacts(`name`,`email`,`subject`,`message`) VALUES ('$name','$email','$subject','$message')";
    $insert = $db->insert($query);

    if ($insert) {

      $to = $_POST['email'];
      $txt = "
      <html>
<head>
<title>HTML email</title>
</head>
<body>
<p>Thanks for contact with us. I will contact you soon!</p>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>
<tr>
<td>John</td>
<td>Doe</td>
</tr>
</table>
</body>
</html>
";

            // Always set content-type when sending HTML email
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      $headers .= 'From: kanakdebanth826@gmail.com'       . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();


      $sentemail = mail($to,$subject,$txt, $headers);


        echo "<div class='alert alert-success' role='alert'>
          Data Submit Successfully
        </div>";

        ?>
        <!-- <script>
            setTimeout(function(){
                window.location.href = "contact.php";
            },2000);
        </script> -->
   <?php } else{
        echo "<div class='alert alert-danger' role='alert'>
          Data submit Fail!
        </div>";
   }
     
 }

 ?>