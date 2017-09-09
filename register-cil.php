<?php
  //Database details
  DEFINE("DB_SERVER", "");
  DEFINE("DB_USER", "");
  DEFINE("DB_PASSWORD", "");
  DEFINE("DB_NAME", "");

  $connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD);
  if(!$connection){
    die(mysqli_error($connection));
  }

  $db_select = mysqli_select_db($connection,DB_NAME);
  if(!$db_select){
    die("ERROR".mysqli_error($connection));
  }

  $name = mysqli_real_escape_string($connection, $_POST["name"]);
  $email = mysqli_real_escape_string($connection, $_POST["email"]);
  $phone = mysqli_real_escape_string($connection, $_POST["phone"]);;
  $institute = mysqli_real_escape_string($connection, $_POST["institute"]);
  $codechef = mysqli_real_escape_string($connection, $_POST["codechef"]);
  $topcoder = mysqli_real_escape_string($connection, $_POST["topcoder"]);
  $hackerrank = mysqli_real_escape_string($connection, $_POST["hackerrank"]);

  if(isset($_POST["submit"])){ //table name goes down here
    $query = "INSERT INTO table_name (name, email, phone, institute, , codechef, topcoder, hackerrank) VALUES ('$name', '$email', '$phone', '$institute', '$codechef', '$topcoder', '$hackerrank')";
    $result = mysqli_query($connection, $query);
    if(!result){
      die("ERROR".mysqli_error($connection));
    }
  }
  mysqli_close($connection);
  header("Location: index.html");
?>