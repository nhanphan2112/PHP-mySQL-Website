<html>
<head>
</head>

<body>
<h1>Jokes Page</h1>

<?php

// four variables to connect to the database 
$host = "localhost";
$username = "root";
$user_pass = "usbw";
$database_in_use = "test";

// create a database connection instance
$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);


// if there are any values in the table, display them one at a time.
if ($mysqli->connect_errno){
	echo "Fail to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

echo $mysqli->host_info . "<br>";


$sql = "SELECT JokeID, Joke_question, Joke_answer FROM Jokes_table";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Joke id: " . $row["JokeID"]. " - Joke Question: " . $row["Joke_question"]. " " . $row["Joke_answer"]. "<br>";
  }
} else {
  echo "0 results";
}
$mysqli->close();


?>
</body>

</html>