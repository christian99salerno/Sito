<?php

  $connessione = mysqli_connect("localhost","root","root","Registrazioni");

  if(!$connessione){
    print "Connection failed";
  }

  ?>

<?php

session_start();

$email = $_POST["email"];
$password = md5($_POST["password"]);

$sql="SELECT EMAIL,PASSWORD FROM Utenti WHERE (EMAIL='$email' AND PASSWORD='$password')";

$result_temp = mysqli_query($connessione,$sql);

$dati = mysqli_fetch_assoc($result_temp);

if (($dati['EMAIL'] == $email)&&($dati['PASSWORD']==$password))
        {
$_SESSION["email"]=$email;
$_SESSION["password"]=$password;
$_SESSION["autorized"]=1;
Header("Location:profile.php");
exit;
        }
else{
    $_SESSION["autorized"]=0; //errore e quindi autorizzazione negata
    Header("Location:index.php");
        }
?>

