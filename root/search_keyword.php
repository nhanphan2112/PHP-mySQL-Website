<head>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
  </script>
  
  <style>
	*{
		font-family:Arial, Helvetica, san-serrif;
	}
  </style>

</head>






<?php

include "db_connect.php";
$keywordfromform = $_GET["keyword"];

// Search the database for the keyword 
echo "<h2>Show all jokes with the word $keywordfromform</h2>";
$sql = "SELECT JokeID, Joke_question, Joke_answer FROM Jokes_table WHERE Joke_question LIKE '%" . $keywordfromform . "%'";
$result = $mysqli->query($sql);

?>

<div id="accordion">

<?php
if ($result->num_rows > 0) {
  // output data of each row
  
  
  while($row = $result->fetch_assoc()) {
    //echo "Joke id: " . $row["JokeID"]. " - Joke Question: " . $row["Joke_question"]. " " . $row["Joke_answer"]. "<br>";
	echo "<h3>$row[Joke_question]</h3>";
	echo "<div><p>$row[Joke_answer]</p></div>";
  }
} else {
  echo "0 results";
}


?>

</div>