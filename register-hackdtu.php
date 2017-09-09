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
  $phone = mysqli_real_escape_string($connection, $_POST["phone"]);
  $github1 = mysqli_real_escape_string($connection, $_POST["github1"]);
  $institute = mysqli_real_escape_string($connection, $_POST["institute"]);
  $team = mysqli_real_escape_string($connection, $_POST["team"]);
  $member2 = mysqli_real_escape_string($connection, $_POST["member2"]);
  $github2 = mysqli_real_escape_string($connection, $_POST["github2"]);
  $member3 = mysqli_real_escape_string($connection, $_POST["member3"]);
  $github3 = mysqli_real_escape_string($connection, $_POST["github3"]);
  $member4 = mysqli_real_escape_string($connection, $_POST["member4"]);
  $github4 = mysqli_real_escape_string($connection, $_POST["github4"]);
  $question = mysqli_real_escape_string($connection, $_POST["question"]);

  if(isset($_POST["submit"])){ //table name goes down here
    $query = "INSERT INTO table_name (name, email, phone, github1, institute, team, member2, github2, member3, github3, member4, github4, question) VALUES ('$name', '$email', '$phone', '$github1', '$institute', '$team', '$member2', '$github2, '$member3','$github3', '$member4', '$github4', '$question')";
    $result = mysqli_query($connection, $query);
    if(!result){
      die("ERROR".mysqli_error($connection));
    }
  }
  mysqli_close($connection);
  header("Location: index.html");
?>