<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

<header>
<img src="https://t4.ftcdn.net/jpg/03/02/12/83/240_F_302128359_q6aCwgAvdYZBPF4XSwxXddLPE0h3Kor1.jpg" width="100px" height="80px">
<h1 class="liketext">SportPro
<a href ="index.html"> <input type="button" value="Logout" style="float:right;"></a></h1>
</header>
<div class="row">
<nav>
		<div class="menu-icon">
			
		</div>
		<ul>
			<li><a href="Add Events.html">Add Events</a></li>
			<li><a href="Edit Events.php"">Edit Events</a></li>
			<li><a href="#" style="color:red;">Reports</a></li>
			<li><a href="Results.php" >Results</a></li>
		
			
		</ul>
	</nav>
               
<div class="col-12">
  <h1>Reports</h1>                          
 <div style="width:100%;border-style:solid; border-radius:10px;text-align:center;border-color:#0000ff"> 
 <form action="" method="post">
Type:<select name="type" class="smalltext">
  <option value="indoor">Indoor</option>
  <option value="outdoor">Outdoor</option>
</select>
Event Name:<select name="event" class="smalltext">
  <option value="cricket">Cricket</option>
  <option value="football">Football</option>
</select><br><br>

 <input type="submit" value="GET Report">
</form>
</div>
<br><br>
<table>
<tr>
<th>Name </th>
<th>Class</th>
<th>E-mail</th>
<th>Contact</th>
</tr>
<?php
error_reporting(0);
$event_name = $_POST['event'];
$type= $_POST['type'];
$servername = "localhost:4306";
$username = 'root';
$password = '';
$dbname = "sportpro";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);//echo $event_name;
//echo $type;

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
// Check connection
//$sql = "SELECT * FROM entry where event='$event_name' AND type='$type'";
$sql = "SELECT * FROM entry where event='$event_name' AND type='$type'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo '<tr>';
        echo "<td>" . $row["username"]."</td><td>" . $row["class"]."</td><td>" . $row["email"]."</td><td>" . $row["contact"]."</td>";
echo '</tr>';  

  }
} else {
    echo "0 results";
}
$conn->close();

?>
  </table>
</div>


</div>

<footer>
  <p>Copyright 2023-2024. All Rights Reserved.</p>
</footer>

</body>
</html>