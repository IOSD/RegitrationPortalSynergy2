<?php
  //Database details
  DEFINE("DB_SERVER", "localhost");
  DEFINE("DB_USER", "iosdtxwo");
  DEFINE("DB_PASSWORD", "Hackathon@@11");
  DEFINE("DB_NAME", "iosdtxwo_code");

  $google_url="https://www.google.com/recaptcha/api/siteverify";
  $secret='6LcHGy8UAAAAAIEmWOTgQooKsHkGKbysHrKyDbIr';
  $recaptcha=$_POST['g-recaptcha-response'];
  $ip=$_SERVER['REMOTE_ADDR'];
  $url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
  $res=file_get_contents($url);
  $res= json_decode($res, true);

  $connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD);
  if(!$connection){
    die(mysqli_error($connection));
  }

  $db_select = mysqli_select_db($connection,DB_NAME);
  if(!$db_select){
    die("ERROR".mysqli_error($connection));
  }

  function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

  $name = mysqli_real_escape_string($connection, $_POST["name1"]);
  $email = mysqli_real_escape_string($connection, $_POST["email1"]);
  $phone = mysqli_real_escape_string($connection, $_POST["phone1"]);;
  $institute = mysqli_real_escape_string($connection, $_POST["insti"]);
  $codechef = mysqli_real_escape_string($connection, $_POST["codechef1"]);
  $topcoder = mysqli_real_escape_string($connection, $_POST["topcoder1"]);
  $hackerrank = mysqli_real_escape_string($connection, $_POST["hackerrank1"]);

  $name2 = mysqli_real_escape_string($connection, $_POST["name2"]);
  $email2 = mysqli_real_escape_string($connection, $_POST["email2"]);
  $phone2 = mysqli_real_escape_string($connection, $_POST["phone2"]);;
  $codechef2 = mysqli_real_escape_string($connection, $_POST["codechef2"]);
  $topcoder2 = mysqli_real_escape_string($connection, $_POST["topcoder2"]);
  $hackerrank2 = mysqli_real_escape_string($connection, $_POST["hackerrank2"]);
  debug_to_console( "test" );
  debug_to_console( $institute );

  if(isset($_POST["submit"]) && $res['success']){
    $query = "INSERT INTO Teams (`Name 1`, `Email 1`, `Phone 1`, `Name of Institute`, `Codechef 1`, `Topcoder 1`, `Hacker Rank 1`, `Name 2`, `Email 2`, `Phone 2`, `Codechef 2`, `Topcoder 2`, `Hacker Rank 2`) VALUES ('$name', '$email', '$phone', '$institute', '$codechef', '$topcoder', '$hackerrank', '$name2', '$email2', '$phone2', '$codechef2', '$topcoder2', '$hackerrank2')";
    debug_to_console( $query );
    $result = mysqli_query($connection, $query);
    if(!$result){
      die("ERROR".mysqli_error($connection));
    }
    mysqli_close($connection);
    header("Location: index2.html");
  }

  else{
    echo "Try again";
  }

?>
